<?php

$title = "Modifier une question";
$mainClass = "admin-section";
$mainTitle = "Modifier un élément de jeu";

require __DIR__ . "/../../assets/template/_header.php";

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
    
                <select name="categorie" id="categorie">
                    <option value=""></option>
                    <?php foreach ($catList as $categorie) : 
                    //? même problème que newQuestion.php
                    ?>
                    <option 
                    value="<?php echo $categorie['ID'] ?>"
                    <?php #Récupérer la catégorie par défaut de la question
                    if($dataMessage[0]['ID_CAT'] == $categorie['ID']): ?>
                        selected
                    <?php endif; ?>
                    >
                        <?php echo $categorie['NOM_CAT'] ?>
                </option>
                    <?php endforeach; ?>
                </select>
                <span class="error"><?php echo $error['categorie']??"" ?></span>
            </div>

            <div class="place">
                <label for="place">Choix du lieu </label>
                <select name="place" id="place">
                
                <option value=""></option>
                <?php foreach ($places as $place): ?>
                <option value=
                "<?php 
                # récupère l'ID du lieu
                echo $place['ID'] ?>"

                <?php 
                # Je veux que le lieu relié à l'id de la question soit sélectionné directement dans les options
                if($dataMessage[0]['ID_LIEU'] === $place['ID']) : ?>
                    selected 
                <?php endif; ?>
                >
    
                <?php echo $place['NOM_LIEU'] ?>
                </option>
                <?php endforeach; ?>
                </select>
                <span class="error"><?php echo $error['place']??"" ?></span>
            </div>

        </fieldset>

        <fieldset class="gestionQuizz">
            <legend>Gestion du quizz</legend>

            <div class="question">
                <label for="question">Modifier la question : </label>
                <input type="text" name="question" 
                id="question" value="<?php echo $dataMessage[0]['question']; ?>">
                <span class="error"><?php echo $error['question']??"";?></span>
            </div>

            <div class="reponse">
                <!-- Réponse 1 -->
                <span class="error"><?php echo $error['good']??"" ;?></span>
                <input type="radio" name="good" value="1"
                <?php if($dataMessage[0]['br'] == 1): ?>
                    checked
                <?php endif; ?>
                >
                <label for="r1">Réponse 1 :</label>
                <input type="text" name="r1" value="<?php echo $dataMessage[0]['r1']; ?>"><br>
                <span class="error"><?php echo $error['r1']??""; ?></span>

                <!-- Réponse 2 -->
                <input type="radio" name="good" value="2"
                <?php if($dataMessage[0]['br'] == 2): ?>
                    checked
                <?php endif; ?>
                >
                <label for="r2">Réponse 2 : </label>
                <input type="text" name="r2" value="<?php echo $dataMessage[0]['r2']; ?>"><br>
                <span class="error"><?php echo $error['r2']??""; ?></span>

                <!-- Réponse 3 -->
                <input type="radio" name="good" value="3"
                <?php if($dataMessage[0]['br'] == 3): ?>
                    checked
                <?php endif; ?>
                >
                <label for="r3">Réponse 3 :</label>
                <input type="text" name="r3" value="<?php echo $dataMessage[0]['r3']; ?>"><br>
                <span class="error"><?php echo $error['r3']??"" ?></span>

                <!-- Réponse 4 -->
                <input type="radio" name="good" value="4"
                <?php if($dataMessage[0]['br'] == 4): ?>
                    checked
                <?php endif; ?>
                >
                <label for="r4">Réponse 4 : </label>
                <input type="text" name="r4" value="<?php echo $dataMessage[0]['r4']; ?>"><br>
                <span class="error"><?php echo $error['r4']??"" ?></span>
                <span>cocher la bonne réponse</span>
                
            </div>

            <div class="anecdote">
                <label for="anecdote">Modifier l'anecdote :</label>
                <textarea name="anecdote" id="anecdote" cols="30" rows="10" 
                ><?php echo $dataMessage[0]['anecdote']; ?> 
                </textarea>
                <span class="error"><?php echo $error['anecdote']??"" ?></span>
            </div>
        </fieldset>
        <input type="submit" name="upGame" value="Modifier l'élément de jeu">
        <span class="error"><?php echo $error['upGame']??"" ?></span>


    </form>
    </section>
</div>