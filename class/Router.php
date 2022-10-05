<?php 
class Router
{
    public static function routing()
    {
        $url = filter_var($_SERVER["REQUEST_URI"], FILTER_SANITIZE_URL);
        $url = explode("?",$url)[0];
        $url = trim($url, "/");

        if(array_key_exists($url, ROUTES))
        {
            // J'inclu le fichier.
            require "./controller/".ROUTES[$url]["controller"].".php";
            // J'instancie ma classe.
            $controller = new (ROUTES[$url]["controller"])();
            // J'appelle la méthode.
            $controller->{ROUTES[$url]["fonction"]}();
        }
        else
        {
            require "view/404.php";
        }
    }
}
?>