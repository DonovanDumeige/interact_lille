<?php 
namespace Class;
abstract class AbstractController
{
    /**
     * Affiche un message flash;
     *
     * @return void
     */
    protected function getFlash(): void
    {
        if(isset($_SESSION["flash"]))
        {
            echo $_SESSION["flash"];
            unset($_SESSION["flash"]);
        }
    }
    /**
     * paramètre un message flash
     *
     * @param string $flash
     * @return void
     */
    protected function setFlash(string $flash):void
    {
        $_SESSION["flash"] = $flash;
    }
    protected function render(string $view, array $options = []):void
    {
        foreach($options as $op=>$val)
        {
            switch($op)
            {
                case "title":
                    $title = $val;
                    break;
                case "header":
                    $headerTitle = $val;
                    break;
                default:
                    $$op = $val;
            }
        }
        require __DIR__."/../assets/template/_header.php";
        require __DIR__."/../view/".$view;
        require __DIR__."/../assets/template/_footer.php";
    }
}
?>