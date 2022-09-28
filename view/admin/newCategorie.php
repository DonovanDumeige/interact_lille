<?php

$title = "Nouvelle question";
$mainClass = "admin-section";
$mainTitle = "Créer un nouveau lieu";

require __DIR__ . "/../../assets/template/_header.php";
?>

<?php require __DIR__ . "/../../assets/template/_nav2.php"; ?>

<div class="mainContent">
    <h2><?php echo $mainTitle ?? "Bienvenue administrateur" ?></h2>
    <form action="" method="POST">

        <div class="categorie">
            <label for="">Créer une nouvelle categorie </label>
            <input type="text" name="" id="">
        </div>

        <input type="submit" name="setPlace" value="Créer la catégorie">


    </form>
    </section>
</div>