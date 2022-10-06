<?php 
require __DIR__."/../../assets/template/_header.php";

?>
    <button id="support"><a class="supp" href="#">Contacter le support</a></button>
    <div class="startBox">
        <h1>Interact'Lille</h1>
        <p>Découvrir la ville autrement</p>
        <form action="" method="POST">
        <input type="submit" class="playButton" name="playButton" value="Jouer">
        </form>
    </div>
    
    <button id="howTo"><a href="/categories" class="howToPlay">Comment jouer ?</a></button>

    <?php require __DIR__."/../../assets/template/_footer-admin.php";?>
