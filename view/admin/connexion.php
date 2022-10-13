<?php


require __DIR__."/../../assets/template/_header-admin.php";
$mainClass = "login-container"
?>

<div class="pagelogin">

<form action="" method="POST" class = "login">
    <label for="email" class="email">Email</label><br>
    <input type="email" id="email" name="email">
    <span class="error"> <?php echo $error['email']??""; ?> </span>
    <br>
    
    <label for="password">Mot de passe</label><br>
    <input type="password" id="password" name="password">
    <span class="error"> <?php echo $error['password']??""; ?></span>
    <br>
    
    <input type="submit" value="Se connecter" name="login" class="submit">
    <span class="error"><?php echo $error['login']??""; ?> </span>
</form>

</div>
<?php
require __DIR__."/../../assets/template/_footer-admin.php";
?>