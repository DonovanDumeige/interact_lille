<?php

if ($questions) :
?>

    <div class="flash"><?php $this->getFlash(); ?></div>

    <?php require __DIR__ . "/../../assets/template/_nav2.php"; ?>
    <!-- <form action="" method="post">
    <select name="" id="">
    <option value=""></option>
    </select>
    </form> -->
    <?php foreach ($questions as $question) :

        //todo ci-dessous créer un filtre par catégorie 
    ?>



    <div class="list-container">    
        <div class="question-container">
            <div class="metadata">
                <div class="qID"><?php echo $question["ID"] ?></div>
                <div class="qContent"><?php echo $question["question"] ?></div>
                <div class="qPlace"><?php echo $question["NOM_LIEU"] ?></div>
            </div>

            <div class="actions">
            <button>
                <a href="/admin/question?id=<?php echo $question["ID"] ?>">Voir les réponses</a>
            </button>

            <button>
                <a href="/admin/update?id=<?php echo $question["ID"] ?>">Modifier</a>
            </button>

            <button>
                <a href="/admin/delete?id=<?php echo $question["ID"] ?>">Supprimer</a>
            </button>

            </div>
        </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>Aucune question trouvée.</p>
    </div>

    <?php
endif;
