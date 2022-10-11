<?php 


require __DIR__."/../../assets/template/_header.php";
require __DIR__."/../../assets/template/_nav.php";
if($answer) {
?>

<?php foreach($answer as $a) { ?>

<div class="topPart">
        <div class="containerTitles">
            <h1><?php echo $a['NOM_CAT']?></h1>
            <p><i></i><?php echo $a['question']?></p>
        </div>
            <h2><?php echo $a['NOM_LIEU']?></h2>
        

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
        <?php echo $_SESSION['answer']?"Correct":"Dommage..." ?>
    </h1>
        <h3>Réponse : 
            <?php echo $reponse ?>
        </h3>
        <h4><i class="fa-solid fa-lightbulb"></i> Le saviez-vous ?</h4>
        <p><?php echo $a['anecdote'] ?></p>
    </div>
    <button class="nextElement">
    
        <a 
        <?php if( $a['ID'] < $total) { ?>
            href="/place/question?id=<?php echo $a['ID']+1 ?>"
        <?php
        } #endif
        else { ?>
        href="/categories"
        >
        <?php } #endelse?>
        Question suivante <i class="fa-solid fa-chevron-right"></i></a>
    </button>
    <?php } #endforeach ?>
</div> 

<?php 
}#endif
require __DIR__."/../../assets/template/_footer.php"; ?>
