<?php

use Class\AbstractController;
use Model\UserModel;


Class UserController extends AbstractController{
    
    private UserModel $db;


    public function __construct()
    {
        $this->db = new UserModel();
        
        
    }
    public function login()
    {
        session_name("USERSESS");
        session_start();
        $users= $this->db->allUsers();
        $count = count($users);

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['playButton']))
        {
            if(!isset($_COOKIE['user_id'])){
            $newUser = $count+1;
            $this->db->createUser($newUser);
            setcookie('user_id', $newUser, time()+(3600*24)*364, '/');
            $this->setFlash("Bonjour utilisateur n°".$newUser." Bienvenue !");
            } else {
            $this->setFlash("Bonjour utilisateur n°".$_COOKIE['user_id']." ! Déjà de retour ?");

            }
        $this->getFlash();
        header("Refresh: 2; url= /categories");
        die;
   
    }

    $this->render("game/start.php",[
        "title"=>"Accueil",
        "mainClass"=>"startMain"
    ]);
    }

    
}


?>