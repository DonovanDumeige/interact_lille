<?php require "../assets/template/_header.php";

//todo Idée : on peut agir sur le comportement de la progress bar en PHP ?
//todo c'est à  cela que servira $total
/* 
    Dans l'idée on aurait :
    $perCentQuestion = 100/$total;

    On obtiendrait ainsi un pourcentage d'avancée sur le nombre total de questions
    sur le lieu
    On peut avoir la même idée sur la categorie
    $progressBar = 0;
    $progressBar += $perCentQuestion.%;

    if($progressBar = 100){
        header choix categorie
    }
 */
$total = count($questions);
?>
<main id="screenPlayQuizzMain">

<div id="topPart"><?php require "../assets/template/_nav.php"?>
        <div id="containerTitles">
            <h1>La catégorie</h1>
            <p><i></i>La question : blah blah blah ?</p>
        </div>
            <h2>La sous-catégorie</h2>
        

</div>

<article id="visitPlace">
    <div id="infoVisitPlace">
        <h3>Visitez cet endroit</h3>
        <ul>
            <li>Adresse : 666 rue de l'enfer, ResponsiveDeLaMuerte</li>
            <li>Telephone : xx xx xx xx xx</li>
            <li>À proximité de : ton Âme</li>
            <li>Temps de trajet : Une vie entière Bro</li>
        </ul>

    </div>
    <div><a class="showInfo" href="">Voir sur la carte</a></div>
    
    <div id="buttonVisitPlace">Visitez cet endroit</div>
</article>

<div id="bottomPart">
    <article id="propositions">
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

    <span><a href="">Question suivante <i class="fa-solid fa-chevron-right"></i></a></span>
</div> 
</main>
<?php require "../assets/template/_footer.php"?>