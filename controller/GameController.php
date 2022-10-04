<?php

use Class\AbstractController;
use Model\AdminModel;


require __DIR__."/../assets/service/_isLogged.php";

class GameController extends AbstractController 
{
    private AdminModel $db;
    
    public function __construct()
    {
        $this->db = new AdminModel();
    
    }
    public function start()
    {
        $this->render("game/start.php",[
            "title"=>"Accueil",
            "mainClass"=>"startMain"
        ]);
    }
    
        
    public function readQuestion(){
        $this->render("game/screenPlayQuizz.php",[
            "title"=>"Quizz",
            "mainClass"=>"screenPlayQuizzMain"
        ]);
    }

    public function readAnswer(){
        $this->render("game/screenPlayResult.php", [
            "title"=>"Reponse",
            "mainClass"=>"screenPlayQuizzMain"
        ]);
    }
    
    public function readCategories()
    {
        $categories = $this->db->getAllCategories();
        $this->render("game/categories.php",[
            "categories"=>$categories,
            "title"=>"Categories",
            "mainClass"=>"section-categorie"
        ]);
    }

    public function readPlaces()
    {
        $this->render("game/lieu.php", [
            "title"=>"Choix du lieu"
        ]);
    }


}
?>