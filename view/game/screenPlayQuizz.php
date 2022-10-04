<?php 

require __DIR__."/../../assets/template/_header.php";

?>
<?php require __DIR__."/../../assets/template/_nav.php"?>
<div id="topPart">
        <div id="containerTitles">
            <h1>La catégorie</h1>
            <p><i></i>La question : blah blah blah ?</p>
        </div>
            <h2>La sous-catégorie</h2>
        

</div>

<div id="visitPlace">
    <div id="infoVisitPlace">
        <h3>Visitez cet endroit</h3>
        <ul>
            <li><strong>Adresse : </strong> 666 rue de l'enfer, ResponsiveDeLaMuerte</li>
            <li><strong>Téléphone :</strong> xx xx xx xx xx</li>
            <li><strong>À proximité de :</strong>  ton Âme</li>
            <li><strong>Temps de trajet : </strong> Une vie entière Bro</li>
        </ul>

    </div>
    <div><a class="showInfo" href="">Voir sur la carte</a></div>
    <div id="buttonVisitPlace">Visitez cet endroit</div>
</div>

<div id="bottomPart">
    <article id="propositions">
        <button class="pick">Réponse : A</button>
        <button class="pick">Réponse : B</button>
        <button class="pick">Réponse : C</button>
        <button class="pick">Réponse : D</button>
        </article>
    <span><a href="">Question suivante <i class="fa-solid fa-chevron-right"></i></a></span>
</div> 

<?php require __DIR__."/../../assets/template/_footer.php"; ?>