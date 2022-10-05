<?php

if(session_status()=== PHP_SESSION_NONE){
    session_start();
}

function isLogged(bool $logged = true, string $redirect = "/"){
    if($logged){

        if(!isset($_SESSION['expire']) or time() > $_SESSION['expire']){
            unset($_SESSION);
            session_destroy();
            setcookie('PHPSESSID', '', time()-3600);
        }
        if(!isset($_SESSION['logged']) or $_SESSION['logged'] != true){
            header("Location: ".$redirect);
            die;

        } 
    }else {
        if(isset($_SESSION['logged']) and $_SESSION['logged'] === true){
            header("Location: ".$redirect);
            die;
        }
    }
}

?>