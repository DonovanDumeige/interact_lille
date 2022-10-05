<?php

session_start();
if(isset($_SESSION["logged"]) && $_SESSION['logged'] == true){
    header("location:/listeQuestions.php");
    exit;
}
$username = $email = $password = "";
$error = [];
$regexPass = "/^(?=.*[!?@#$%^&*+-])(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]).{6,}$/";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['inscription'])){
    #on inclus notre service de connexion
    require("../../assets/service/_pdo.php");

    # On se connecte à notre BDD
    $pdo = connexionPDO();

    # mail :
    if(empty($_POST['email'])){
        $error['email'] = 'Veuillez saisir un email';
    } else{
        $email = cleanData($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error['email'] = 'Veuillez saisir un email valide';
        }
     
        $sql = $pdo->prepare("SELECT * FROM admin WHERE email=:em");
        $sql->execute(['em' =>$email]);
        $resultat = $sql->fetch();
        if($resultat){
            $error['email'] = 'Cet email est déjà enregistré';
        }
    }
    if(empty($_POST['password'])){
        $error['password'] = "Veuillez saisir un mot de passe";
    }else {
        $password = cleanData($_POST['password']);
        if(!preg_match($regexPass, $password)){
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
        $sql = $pdo->prepare("INSERT INTO admin(email, password) VALUES(?,?)");
        /* 
            A la place d'un placeholder nommé comme précédemment, je peux utiliser des "?".
            Dans ce cas là, ce ne sera pas un tableau associatif que je donnerais mais un tableau
            classique. Seulement, ici l'ordre est très important.
        */
        $sql->execute([$email, $password]);
        header("Location:/listeQuestion.php");
    }
}
$title = "Create";
require __DIR__."/../../assets/template/_header-admin.php";
?>
<form action="" method="post">

    <label for="email">Adresse mail :</label>
    <input type="email" name="email" id="email">
    <span class="error"><?php echo $error["email"]??"" ; ?>
    </span>
    <br>
    
    <!-- Mot de passe -->
    <label for="">Mot de passe</label>
    <input type="password" name="password" id="password" required>
    <span class="error"><?php echo $error["password"]??"" ; ?>
    </span>
    <br>

    <!-- Confirmation mot de passe -->
    <label for="passwordBis"> Confirmez votre mot de passe</label>
    <input type="password" name="passwordBis" id="passwordBis" required>
    <span class="error"><?php echo $error["passwordBis"]??"" ; ?>
    </span>
    <br>
    
    <input type="submit" value="Envoyer" name="inscription">
</form>
<!-- Pour des raison de simplicité du cours, nous n'ajoutons pas de sécurité supplémentaire
à ce formulaire. Mais pensez à le faire sur vos projets !  -->
<?php
require __DIR__."/../../assets/template/_footer-admin.php";
?>