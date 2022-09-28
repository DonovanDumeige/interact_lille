<?php

$title = "Nouvelle question";
$mainClass = "admin-section";
$mainTitle = "Créer un élément de jeu";

require __DIR__ . "/../../assets/template/_header.php";
?>

<?php require __DIR__ . "/../../assets/template/_nav2.php"; ?>

<div class="mainContent">
    <h2><?php echo $mainTitle ?? "Bienvenue administrateur" ?></h2>
    <form action="" method="POST">

        <!-- Categorie et lieu -->
        <fieldset class="metaData">
            <legend>Metadonnées</legend>

            <div class="categorie">
                <label for="categorie">Choix de la categorie :</label>
                <select name="categorie" id="categorie">
                    <option value="1">Histoire de Lille</option>
                    <option value="2" selected>Lieux et monuments</option>
                    <option value="3">Parcs et jardins</option>
                </select>
            </div>

            <div class="place">
                <label for="">Choix du lieu </label>
                <select name="" id="">
                    <option value="1">Histoire de Lille</option>
                    <option value="2">Lieux et monuments</option>
                    <option value="3">Parcs et jardins</option>
                </select>
            </div>

        </fieldset>

        <fieldset class="gestionQuizz">
            <legend>Gestion du quizz</legend>

            <div class="question">
                <label for="">Indiquer la nouvelle question : </label>
                <input type="text" name="" id="">
            </div>

            <div class="reponse">
                <input type="radio" name="good">
                <label for="r1">Réponse 1 :</label>
                <input type="text" name="r1"><br>

                <input type="radio" name="good" id="">
                <label for="r1">Réponse 2 : </label>
                <input type="text" name="r2"><br>

                <input type="radio" name="good" id="">
                <label for="r1">Réponse 3 :</label>
                <input type="text" name="r3"><br>

                <input type="radio" name="good" id="">
                <label for="r1">Réponse 4 : </label>
                <input type="text" name="r4"><br>
                <span>cocher la bonne réponse</span>
            </div>

            <div class="anecdote">
                <label for="">Préciser une anecdote :</label>
                <textarea name="" id="" cols="30" rows="10">
                </textarea>
            </div>
        </fieldset>
        <input type="submit" name="setGame" value="Créer l'élément de jeu">


    </form>
    </section>
</div>