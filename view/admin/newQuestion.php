<?php

$title = "Nouvelle question";
$mainClass = "admin-section";
$mainTitle = "Créer un élément de jeu";

require __DIR__."/../../assets/template/_header-admin.php";

// todo : pour la partie sélection des question il faut du JS pour avoir les lieux affichés, selon la categorie
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
    
                <select name="categorie" id="categorie" required>
                    <option value=""></option>
                    <?php foreach ($catList as $categorie) : 
                    //? La catégorie est inutile dans l'état. 
                    //? Il faut pouvoir filtrer les lieux selon la categorie sélectionnée. 
                    //todo JS à prévoir pour créer le filtre
                    ?>
                    <option value="<?php echo $categorie['ID'] ?>">
                        <?php echo $categorie['NOM_CAT']?>
                </option>
                    <?php endforeach; ?>
                </select>
                <span class="error"><?php echo $error['categorie']??"" ?></span>
            </div>

            <div class="place">
                <label for="place">Choix du lieu </label>
                <select name="place" id="place" required>
                
                <option value=""></option>
                <?php foreach ($places as $place) : ?>
                <option value="<?php echo $place['ID'] ?>">
                    <?php echo $place['NOM_LIEU']??"" ?>
                </option>
                <?php endforeach; ?>
                </select>
                <span class="error"><?php echo $error['place']??"" ?></span>
            </div>

        </fieldset>

        <fieldset class="gestionQuizz">
            <legend>Gestion du quizz</legend>

            <div class="question">
                <label for="question">Indiquer la nouvelle question : </label>
                <input type="text" name="question" id="question">
                <span class="error"><?php echo $error['question']??""?></span>
            </div>

            <div class="reponse">
                <input type="radio" name="good" value="1">
                <label for="r1">Réponse 1 :</label>
                <input type="text" name="r1"><br>
    
                <input type="radio" name="good" value="2">
                <label for="r2">Réponse 2 : </label>
                <input type="text" name="r2"><br>

                <input type="radio" name="good" value="3">
                <label for="r3">Réponse 3 :</label>
                <input type="text" name="r3"><br>

                <input type="radio" name="good" value="4">
                <label for="r4">Réponse 4 : </label>
                <input type="text" name="r4"><br>
                <span>cocher la bonne réponse</span>
                
            </div>

            <div class="anecdote">
                <label for="anecdote">Préciser une anecdote :</label>
                <textarea name="anecdote" id="anecdote" cols="30" rows="10" required></textarea>
                <span class="error"><?php echo $error['anecdote']??"" ?></span>
            </div>
        </fieldset>
        <input type="submit" name="setGame" value="Créer l'élément de jeu">
        <span class="error"><?php echo $error['setGame']??"" ?></span>


    </form>
</div>

<?php require __DIR__."/../../assets/template/_footer-admin.php"; ?>