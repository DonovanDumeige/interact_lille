<?php
$this->getFlash();

if($questions):
?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Intitulé</th>
            <th>Anecdote</th>
            <th>Réponse 1</th>
            <th>Reponse 2</th>
            <th>Reponse 3</th>
            <th>Reponse 4</th>
            <th>Bonne réponse</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($questions as $question): ?>
            <tr>
                <td><?php echo $question["ID"] ?></td>
                <td><?php echo $question["question"] ?></td>
                <td><?php echo $question["anecdote"] ?></td>
                <td><?php echo $question["r1"] ?></td>
                <td><?php echo $question["r2"] ?></td>
                <td><?php echo $question["r3"] ?></td>
                <td><?php echo $question["r4"] ?></td>
                <td><?php echo $question["br"] ?></td>
                <td>
                    <a href="./admin/update?id=<?php echo $question["ID"]?>"> Modifier</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    <p>Aucune question trouvée.</p>
<?php endif; ?>