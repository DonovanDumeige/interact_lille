<?php

use Class\AbstractController;
use Model\AdminModel;


require __DIR__."/../assets/service/_isLogged.php";

class UserController extends AbstractController 
{
    private AdminModel $db;
    
    public function __construct()
    {
        $this->db = new AdminModel();
    
    }
    public function readPlay()
    {
        $this->render("game/");
    }

    public function readAnswer(){
        $this->render("game/");
    }
    
    public function readCategories()
    {
        $this->render("game/categories.php");
    }

    public function readPlaces()
    {
        $this->render("game/");
    }


}
?>