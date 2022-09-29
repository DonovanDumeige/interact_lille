<?php
$this->getFlash();
var_dump($place);
if($questions):
?>

<?php foreach ($questions as $question): ?>

<form action="" method="post">
<select name="" id="">
    <option value=""></option>
</select>

</form>
<div class="question-container">
    <div class="metadata">
        <div class="qID"><?php echo $question["ID"] ?></div>
        <div class="qContent"><?php echo $question["question"] ?></div>
        <div class="qPlace"><?php echo $place['NOM_LIEU'] ?></div>

    </div>
    <div class="actions">
        <button>
            <a href="admin/question?id=<?php echo $question["ID"] ?>">Voir les réponses</a>
        </button>

        <button>
            <a href="admin/update?id=<?php echo $question["ID"] ?>">Modifier</a>
        </button>

        <button>
            <a href="admin/delete?id="<?php echo $question["ID"] ?>>Supprimer</a>
        </button>

    </div>
</div>
<?php endforeach; ?>
<?php else: ?>
    <p>Aucune question trouvée.</p>
<?php endif; ?>