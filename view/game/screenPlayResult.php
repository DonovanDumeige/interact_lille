<?php 
echo "Session: ".print_r($_SESSION,1).'<br>';

require __DIR__."/../../assets/template/_header.php";
require __DIR__."/../../assets/template/_nav.php";
if($answer) {
?>

<?php foreach($answer as $a) { ?>


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
    <div><a class="showInfo" href="#">Voir sur la carte</a></div>
    <div class="buttonVisitPlace">Visitez cet endroit</div>
</div>

<div class="bottomPart">
    <div class="results">
        <h1 class="<?php echo $class??""?>">
    </h1>
        <h3>Réponse : </h3>
        <h4><i class="fa-solid fa-lightbulb"></i> Le saviez-vous ?</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ullamcorper eget mauris in pellentesque. 
        Proin eu urna vehicula, feugiat nisl vel, vehicula neque. Aenean venenatis suscipitla, nec sodales tortor semper ut. 
        Integer bibendum a quam vitae commut.</p>
    </div>
    <button class="nextElement"><a href="/">Question suivante <i class="fa-solid fa-chevron-right"></i></a></button>
    <?php } #endforeach ?>
</div> 

<?php 
}#endif
require __DIR__."/../../assets/template/_footer.php"; ?>
