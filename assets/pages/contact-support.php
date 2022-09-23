<?php

$mainClass = "section-support";
$title = " Support";

require "../template/_header.php";
// todo il faudra peut être mettre une valeur numérique sur l'option, selon la façon dont on traite les données.
?>

<div class="formContainer">
<h1>Un problème ?<br> Une suggestion ?</h1>

<span class="error"><?php $error['submit']??"";?> </span>
<form action="" method="POST">

    <!-- Raison du contact -->
    <label for="reason">Pourquoi nous contacter ? <sup>*</sup></label>
    <select name="reason" id="reason" required>
        <option value="signaler">Signaler un problème</option>
        <option value="suggérer">Suggérer une amélioration</option>
    </select>
    <span class="error"><?php $error['reason']??""; ?></span>
 

    <!-- Requête -->
    <label for="request"> Nom de la requête : <sup>*</sup></label>
    <input type="text" name="request" id="request" 
    placeholder = "Ex: Proposer de nouveaux lieux"
    required>
    <span class="error"><?php $error['request']??""; ?></span>


    <!-- Message -->
    <label for="mess">Message :<sup>*</sup></label>
    <textarea 
    name="mess" 
    id="mess" 
    cols="30" 
    rows="10"
    placeholder = "Décrire précisément la raison du contact"
    ></textarea>
    <span class="error br"><?php $error['mess']??""; ?></span>
    
    <!-- Mail -->
    <label for="email">Adresse mail :<sup>*</sup></label>
    <input type="email" name="email" id="email" required>
    <span class="error"><?php $error['email']??""; ?></span>

    <!-- Fichier à upload -->
    <label for="file">Joindre un fichier (optionnel):</label>
    <input type="file" name="file" id="file"">
    <span class="error"><?php $error['file']??""; ?></span>

    <input type="submit" value="Envoyer" name="submit">
</form>
</div>
<?php require "../template/_footer.php";