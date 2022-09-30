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

class AdminController extends AbstractController
{
    use \Class\Trait\Debug;

    private AdminModel $db;
    private string $regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";
    function __construct()
    {
        $this->db = new AdminModel();
    }

    public function login():void
    {
        isLogged(false, "/");
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
                $verify = $this->db->getAdminByEmail($email);
                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $error['email'] = "Adresse mail non valide";
                }
                elseif($email =! $verify['email'])
                {
                    $error["email"] = "Cet email est déjà enregistré";
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
                    $$error = "Veuillez entrer un mot de passe valide.";
                }
            }
            # fin traitement mot de passe
            
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
        $this->render("admin/connexion.php");
    }

    public function read()
    {
        $questions = $this->db->getAllQuestions();
        
        $place = $this->db->getPlaceByID();
        

        #view
        $this->render("admin/listeQuestions.php",
        ["questions"=>$questions,
        "place"=>$place,
        "title"=>"Liste questions"]);
    }

    public function create()
    {
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
            "catList"=>$catList,
        ]);
    }

    public function update()
    {
                #view
                $this->render("admin/update.php");
    }
}
?>