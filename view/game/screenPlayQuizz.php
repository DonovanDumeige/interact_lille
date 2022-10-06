<?php
require __DIR__ . "/../../assets/template/_header.php";
require __DIR__ . "/../../assets/template/_nav.php";
if ($data) {
?>

    <div class="topPart">
        <div class="containerTitles">
            <?php foreach ($data as $d) {  ?>
                <?php echo $d['question'] ?>
                <h1><?php echo $d['NOM_CAT'] ?></h1>
                <p>
                    <?php if ($d['question'] === NULL) { ?>
                        <i class="fa-solid fa-lightbulb"></i> Le saviez-vous ?

                    <?php
                    } else {
                        echo $d['question'];
                    } ?>
                </p>
        </div>
        <h2><?php $d['NOM_LIEU'] ?></h2>


    </div>

    <div class="visitPlace">
        <div class="infoVisitPlace">
            <h3>Visitez cet endroit</h3>
            <ul>
                <li><strong>Adresse : </strong> 666 rue de l'enfer, ResponsiveDeLaMuerte</li>
                <li><strong>Téléphone :</strong> xx xx xx xx xx</li>
                <li><strong>À proximité de :</strong> ton Âme</li>
                <li><strong>Temps de trajet : </strong> Une vie entière Bro</li>
            </ul>

        </div>
        <div><a class="showInfo" href="">Voir sur la carte</a></div>
        <div class="buttonVisitPlace">Visitez cet endroit</div>
    </div>

    <div class="bottomPart">
        <?php if ($d['question'] !== NULL) { ?>
            <form class="propositions" action="" method='POST'>
                <div class="pick">
                    <input type="radio" name="good" id="r1" value="1">
                    <label for="r1"><?php echo $d['r1']; ?></label>
                </div>

                <div class="pick">
                    <input type="radio" name="good" id='r2' value="2">
                    <label for="r2"><?php echo $d['r2']; ?></label>
                </div>

                <div class="pick">
                    <input type="radio" name="good" id="r3" value="3">
                    <label for="r3"><?php echo $d['r3']; ?></label>
                </div>

                <div class="pick">
                    <input type="radio" name="good" id="r4" value="4">
                    <label for="r4"><?php echo $d['r4']; ?></label>
                </div>
                <span class="error"><?php echo $error['good'] ?? "" ?></span>
                <input type="submit" name="check" value="Vérifions la réponse !">
            </form>
        <?php
                } #endif question =! NULL
                else { ?>
            <div class="tell">
                <?php echo $d['anecdote'] ?>
            </div>
            <button class="nextElement"><a href="">Question suivante &gt; </a></button>
    <?php } #end else
            } #endforeach 
    ?>
    </div>

<?php
} #endif $data
require __DIR__ . "/../../assets/template/_footer.php"; ?>