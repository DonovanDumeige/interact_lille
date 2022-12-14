<?php
/* Doit contenir

- Une fonction pour créer une nouvelle question ou anecdote 
- Une fonction pour la modifier
- Une fonction pour la supprimer
- Une fonction pour afficher la liste globale des questions + actions admin (supp,up)
- Gère la connexion/deconnexion
*/

use Class\AbstractController;
use Class\Interface\CrudInterface;
use Model\AdminModel;

require __DIR__."/../assets/service/_isLogged.php";

class AdminController extends AbstractController implements CrudInterface
{
    use \Class\Trait\Debug;

    private AdminModel $db;
    private string $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";
    function __construct()
    {
        $this->db = new AdminModel();
    }
    public function register(){

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['inscription'])){
  
        
            # mail :
            if(empty($_POST['email'])){
                $error['email'] = 'Veuillez saisir un email';
            } else{
                $email = cleanData($_POST['email']);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error['email'] = 'Veuillez saisir un email valide';
                }
             
                $resultat = $this->db->getAdminbyEmail($email);
                if($resultat){
                    $error['email'] = 'Cet email est déjà enregistré';
                }
            }
            if(empty($_POST['password'])){
                $error['password'] = "Veuillez saisir un mot de passe";
            }else {
                $password = cleanData($_POST['password']);
                if(!preg_match($this->regexPass, $password)){
                    $error['password'] = "Veuillez saisir un mot de passe valide";
                } else {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                }
            }
            # vérification du mot de passe
            if(empty($_POST['passwordBis'])){
                $error['passwordBis'] = "Veuillez confirmer votre mot de passe";
                
            } else{
                if($_POST['password'] != $_POST['passwordBis']){
                    $error['passwordBis'] = "Veuillez saisir le mot de passe.";
                }
            }
            if(empty($error)){
                $this->db->createAdmin($email, $password);
                header("Location: login");
            }
        }
        $this->render("admin/createAdmin.php");
    }
    public function login()
    {
        isLogged(false, "/admin");
        $email = $password = $verify = "";
        $error = [];
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['login']))
        {   
            #traitement mail
            if(empty($_POST["email"]))
            {
                $error['email'] = "Veuillez entrer une adresse mail.";
            }
            else
            {
                $email = cleanData($_POST['email']);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $error['email'] = "Adresse mail non valide";
                }
            } # fin traitement mail

            #traitement password
            if(empty($_POST['password']))
            {
                $error['password'] =  "Veuillez indiquer un mot de passe.";
            }
    
            else
            {
                $password = cleandata($_POST['password']);
                if(!preg_match($this->regexPass, $password))
                {
                    $error['password'] = "Veuillez entrer un mot de passe valide.";
                }
            }
            # fin traitement mot de passe
            $verify = $this->db->getAdminbyEmail($email);
            #envoi données
            if(empty($error))
            {
                if($verify)
                {
                    if(password_verify($password, $verify['password']))
                    {
                        $_SESSION['logged'] = true;
                        $_SESSION['email'] = $verify['email'];
                        $_SESSION['idUser'] = $verify["ID"];
                        $_SESSION['expire'] =  time()+(60*60);
                        header("Location:/admin");
                        exit;
                    }
                    else
                    {
                        $error['login'] = "Mot de passe incorrect.";
                    }
                }
                else
                {
                    $error['login'] = "Email incorrect.";
                }
            }
        } #fin traitement
        $this->render("admin/connexion.php", [
            "title"=>"Se connecter",
            "mainClass"=>"login-container"
        ]);
    }

    //todo faire function logout

    function logout()
{
    isLogged(true, "/login");
    unset($_SESSION);
    session_destroy();
    setcookie("PHPSESSID", "", time()-3600);
    header("Location: /login");
    exit;
}
    public function read()
    {   
        isLogged(true, "/login");
        $questions = $this->db->getQuestionAndPlaceByID();
        

        #view
        $this->render("admin/listeQuestions.php",
        ["questions"=>$questions,
        "title"=>"Liste questions",
        "mainClass"=>"admin-section"]);
    }

    public function create()
    {
        isLogged(true, "/login");
        $places= $this->db->getAllPlaces();
        $catList = $this->db->getAllCategories();
        $error = [];
        $nom_cat = $id_lieu = $question = $anecdote = $r1 = $r2 = $r3 = $r4 = $br ="";
        #view
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['setGame']))
        {
            
            #Gestion des optionnels 
            if(!empty($_POST['question'])){
                $question = cleanData($_POST['question']);
                if (!preg_match("/^[A-Za-z0-9éèà' ,-?]{0,255}$/", $_POST['question'])) {
                    $error['question'] = "Format invalide";
                }
            }
            if(!empty($_POST['r1']))
            {
                $r1 = cleanData($_POST['r1']);
            }
            if(!empty($_POST['r2']))
            {
                $r2 = cleanData($_POST['r2']);
            }
            if(!empty($_POST['r3']))
            {
                $r3 = cleanData($_POST['r3']);
            }
            if(!empty($_POST['r4']))
            {
                $r4 = cleanData($_POST['r4']);
            }
            if(!empty($_POST['good']))
            {
                $br = cleandata($_POST['good']);
            }

            #gestion de l'obligatoire

            if(empty($_POST['anecdote'])){
                $error['anecdote'] = "Vous devez indiquer une anecdote.";
            }
            else
            {
                $anecdote = cleanData($_POST['anecdote']);
            }

            if(empty($_POST['place']))
            {
                $error['place'] = "Veuillez sélectionner un lieu";
            }
            else
            {
                $id_lieu = cleandata($_POST['place']);
            }   

            if(empty($_POST['categorie']))
            {
                $error['place'] = "Veuillez sélectionner une catégorie";
            }

            var_dump($error);
            if(empty($error))
            {
                $this->db->addQuestion(
                    $id_lieu, $question, $anecdote, $r1, $r2, $r3, $r4, $br);
                $this->setFlash("La question a bien été ajoutée");
                header("Location:/admin");
            } 
        }
        $this->render("admin/newQuestion.php",[
            "places"=>$places,
            "catList"=>$catList
        ]);
    }

    public function update()
    {   
        isLogged(true, "/login");
        # places et catList alimentent les select
        $places= $this->db->getAllPlaces();
        $catList = $this->db->getAllCategories();
        #dataMessage alimente la valeur par défaut
        $dataMessage= $this->db->getQuestionWithPlaceAndCategorie($_GET['id']);
        $error = [];
        $id_lieu = $question = $anecdote = $r1 = $r2 = $r3 = $r4 = $br ="";

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['upGame']))
        {
            #traitement lieu
            if(!empty($_POST['place']))
            {
                $id_lieu = cleanData($_POST['place']);
                if(!preg_match("/^\d$/", $id_lieu))
                {
                    $error['place'] = "Impossible de modifier la valeur";
                }
            }
            #fin traitement lieu

            #traitement question
            if(!empty($_POST['question']))
            {
                $question = cleanData($_POST['question']);
            }
            else{
                $error['question'] = "Veuillez indiquer une question";
            }
            #fin traitement question

            #traitement r1
            if(!empty($_POST['r1']))
            {
                $r1 = cleanData($_POST['r1']);
            }
            else{
                $error['r1'] ="Veuillez indiquer une réponse";
            }
            #fin traitement r1

            #traitement r2
            if(!empty($_POST['r2']))
            {
                $r2 = cleanData($_POST['r2']);
            }
            else{
                $error['r2'] ="Veuillez indiquer une réponse";
            }
            #fin traitement r2

            #traitement r3
            if(!empty($_POST['r3']))
            {
                $r3 = cleanData($_POST['r3']);
            }
            else{
                $error['r3'] ="Veuillez indiquer une réponse";
            }
            #fin traitement r3

            #traitement r4
            if(!empty($_POST['r4']))
            {
                $r4 = cleanData($_POST['r4']);
            }
            else{
                $error['r4'] ="Veuillez indiquer une réponse";
            }
            #fin traitement r4

            #traitement anecdote
            if(!empty($_POST['anecdote']))
            {
                $anecdote = cleanData($_POST['anecdote']);
            }
            else{
                $error['r4'] ="Veuillez indiquer une anecdote";
            }
            #fin traitement anecdote
            #traitement br
            if(!empty($_POST['good']))
            {
                $br = cleanData($_POST['good']);
            }
            else{
                $error['good'] = "Veuillez cocher la bonne réponse.";
            }
            #fin traitement br

            #envoi des données
            
            if(empty($error))
            {
                $this->db->updateQuestionById($id_lieu, $question, $anecdote,$r1,$r2,$r3, $r4, $br, $_GET['id'] );
                $this->setflash("La question a bien été modifiée.");
                header("Location: /admin");
            }
            else
            {
                $error['upGame'] = "Formulaire invalide";
            }
        
        }

        #view
        $this->render("admin/update.php", [
        "places"=>$places,
        "catList"=>$catList,
        "dataMessage"=>$dataMessage,
        "title"=>"Modifier une question",
        ]);
    }

    public function delete()
    {
        
        $this->db->deleteQuestionById((int)$_GET['id']);
        $this->setFlash("La question a bien été supprimé");
        header("Location: /admin");
    }
}
?>