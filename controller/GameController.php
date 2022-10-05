<?php

use Class\AbstractController;
use Model\AdminModel;
use Model\GameModel;
session_start();
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
        $places = $this->db2->getPlacesByID($_GET['id']);
        $this->render("game/lieu.php", [
            "title"=>"Choix du lieu",
            "places"=>$places,
            "progressBar"=>$progressBar
        ]);
    }

            
    public function readQuestion()
    {
        $data = $this->db->getQuestionWithPlaceAndCategorie($_GET['id']);
        $error =[];
        $br = "";
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['check']))
        {
            var_dump($_POST)."<br>";
            var_dump($_SESSION)."<br>";
            
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

                header("Location: /place/question/answer?id=".$data[0]['ID']);
            }
            
        }
        
        $this->render("game/screenPlayQuizz.php",[
            "title"=>"Quizz",
            "mainClass"=>"screenPlayQuizzMain",
            "data"=>$data
        ]);
    }

    public function readAnswer(){
    
    $answer = $this->db->getQuestionWithPlaceAndCategorie($_GET['id']);
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
            "class"=>$class
        ]);
    }

}
?>