<?php
$title = "accueil";
$mainClass = "accueil";

require "./routes.php";
require "./class/Autoloader.php";
require "./class/Router.php";

Autoloader::register();
Router::routing();

?>

<link rel="stylesheet" href="/assets/style/style.css">
<main id="startMain">
    <button id="contactSupport">Contacter le support</button>
    <div id="startBox">
    <h1>Interact'Lille</h1>
    <p>Découvrir la ville autrement</p>
    <input type="submit" id="playButton" name="playButton" value="Jouer">
    </div>
    <span><a href="" id="howToPlay">Comment jouer ?</a></span>
</main>