<?php 

require __DIR__."/../../assets/template/_header.php";
require __DIR__."/../../assets/template/_nav.php";

?>

<div class="topPart">
        <div class="containerTitles">
            <h1>La catégorie</h1>
            <p><i></i>La question : blah blah blah ?</p>
        </div>
            <h2>La sous-catégorie</h2>
        

</div>

<div class="visitPlace">
    <div class="infoVisitPlace">
        <h3>Visitez cet endroit</h3>
        <ul>
            <li><strong>Adresse : </strong> 666 rue de l'enfer, ResponsiveDeLaMuerte</li>
            <li><strong>Téléphone :</strong> xx xx xx xx xx</li>
            <li><strong>À proximité de :</strong>  ton Âme</li>
            <li><strong>Temps de trajet : </strong> Une vie entière Bro</li>
        </ul>

    </div>
    <div><a class="showInfo" href="">Voir sur la carte</a></div>
    <div class="buttonVisitPlace">Visitez cet endroit</div>
</div>

<div class="bottomPart">
    <article class="propositions">
        <button class="pick">Réponse : A</button>
        <button class="pick">Réponse : B</button>
        <button class="pick">Réponse : C</button>
        <button class="pick">Réponse : D</button>
        </article>

        <?php
// todo idée pour avancer dans les questions
/* dans le href du <a> 
if($data['question'] == NULL)
{ # soit on passe à la question suivante
    href="/play/answer?id=$data['ID']";
}
else{ #soit on passe d'abord par l'anecdote
    href="/play/anecdote?id= $data['ID']";
} */

//todo idée pour arriver soit sur correct/incorrect
/* Impossible de cumuler renvoyer sur deux fichiers différent.
Essayer $_SESSION
if($data['br'] == $_POST['check'])
{ #renvoi vers correct
    $_SESSION['answer'] = true;
}
else{ #renvoi vers incorrect
    $_SESSION['answer'] = false
}
En fonction de la réponse sur le p (ou div) qui donne la réponse
echo $_SESSION['answer']?"Correct":"Incorrect";
Il faut aussi changer la classe :
class = "<?php echo $_SESSION['answer']?'good':'bad' ?>"; */

?>

    <button class="nextElement"><a href="">Question suivante <i class="fa-solid fa-chevron-right"></i></a></button>
</div> 

<?php require __DIR__."/../../assets/template/_footer.php"; ?>
