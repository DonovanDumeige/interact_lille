<?php

use Class\AbstractController;
use Model\AdminModel;
use Model\GameModel;
session_start();
var_dump($_SESSION)."<br>"; 
require __DIR__."/../assets/service/_isLogged.php";

class GameController extends AbstractController 
{
    private AdminModel $db;
    private GameModel $db2;
    
    public function __construct()
    {
        $this->db = new AdminModel();
        $this->db2 = new GameModel();
    
    }
    public function start()
    {

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['playButton'])){

            //header("Location: /categories");
            die;
        }
        $this->render("game/start.php",[
            "title"=>"Accueil",
            "mainClass"=>"startMain"
        ]);
    }
    

    
    public function readCategories()
    {
        $progressBar = 0;
        $categories = $this->db->getAllCategories();
        
        $this->render("game/categories.php",[
            "categories"=>$categories,
            "title"=>"Categories",
            "mainClass"=>"section-categorie",
            "progressBar"=>$progressBar
        ]);
    }

    public function readPlaces()
    {
        $progressBar = 0;
        $_SESSION['categorie'] = $_GET['id'];
        
        $places = $this->db2->getPlacesByID((int)$_GET['id']);
        $this->render("game/lieu.php", [
            "title"=>"Choix du lieu",
            "places"=>$places,
            "progressBar"=>$progressBar
        ]);
    }

            
    public function readQuestion()
    {
        
        $_SESSION['IDQuestion'] = $_GET['id'];
        $data = $this->db->getQuestionWithPlaceAndCategorie((int)$_GET['id']);
        $_SESSION['lieu'] = $data[0]['ID_LIEU'];
        $error =[];
        $br = "";
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['check']))
        {
            if(!isset($_POST['good']))
            {
                $error['good'] = "Veuillez choisir une réponse";
            }
            else
            {
                $br = (int)$_POST['good'];
            }
            
            if(empty($error))
            {
                if($br == $data[0]['br'])
                {
                    $_SESSION['answer'] = true;
                }
                else
                {
                    $_SESSION['answer'] = false;
                }
                header("Location: /place/question/answer?id=".$_GET['id']);
            }
            
        }
        $this->render("game/screenPlayQuizz.php",[
            "title"=>"Quizz",
            "mainClass"=>"screenPlayQuizzMain",
            "data"=>$data
        ]);
    }

    public function readAnswer(){
    
    $answer = $this->db->getQuestionWithPlaceAndCategorie((int)$_GET['id']);
    $verify = $this->db2->getIDsbyPlace((int)$_SESSION['lieu']);

    # Récupère le texte de la bonne réponse en fonction de l'ID de 'br'.
    switch ($answer[0]['br']) {
        case 1:
            $reponse = $answer[0]['r1'];
            break;
        
        case 2:
            $reponse = $answer[0]['r2'];
            break;
        
        case 3:
            $reponse = $answer[0]['r3'];
            break;
        
        case 4:
            $reponse = $answer[0]['r4'];
            break;
        
        default:
            "Rien à afficher";
            break;
    }
    if($_SESSION['answer']){
            $class = "correct";
    }
    else{
        $class = "incorrect";
    }
    
        $this->render("game/screenPlayResult.php", [
            "title"=>"Reponse",
            "mainClass"=>"screenPlayQuizzMain",
            "answer"=>$answer,
            "class"=>$class,
            "reponse"=>$reponse
        ]);
    }

}
?>