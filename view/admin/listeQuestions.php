<?php
$this->getFlash();

if($questions):
?>

<?php foreach ($questions as $question): ?>
<div class="question-container">
    <div class="metadata">
        <div class="qID"><?php echo question["ID"] ?></div>
        <div class="qContent"><?php echo question["INTITULE"] ?></div>
        <div class="qPlace"><?php echo question[""] ?></div>
    </div>
    <div class="actions">
        <button>
            <a href="admin/question?id="></a>
        </button>

        <button>
            <a href="admin/update?id="></a>
        </button>

        <button>
            <a href="admin/delete?id="></a>
        </button>

    </div>
</div>
<?php endforeach; ?>
<?php else: ?>
    <p>Aucune question trouvée.</p>
<?php endif; ?>