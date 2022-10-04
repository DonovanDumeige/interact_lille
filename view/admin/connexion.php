<?php


require __DIR__."/../../assets/template/_header-admin.php";
?>



<form action="" method="POST">
    <label for="">Email</label><br>
    <input type="email" id="email" name="email">
    <span class="error"> <?php echo $error['email']??""; ?> </span>
    <br>
    
    <label for="password">Mot de passe</label><br>
    <input type="password" id="password" name="password">
    <span class="error"> <?php echo $error['password']??""; ?></span>
    <br>
    
    <input type="submit" value="Se connecter" name="login">
    <span class="error"><?php echo $error['login']??""; ?> </span>
</form>

<?php
require __DIR__."/../../assets/template/_footer-admin.php";
?>