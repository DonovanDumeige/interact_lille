<?php 
$title = "Quizz";
$mainClass = "screenPlayQuizzMain";
require __DIR__."/../assets/template/_header.php"
?>
<div class="topPart"><?php require "../assets/template/_nav.php"?>
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
    <span><a href="">Question suivante <i class="fa-solid fa-chevron-right"></i></a></span>
</div> 

<?php require __DIR__."/../../assets/template/_footer.php"; ?>
