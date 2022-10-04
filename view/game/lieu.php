<?php

require __DIR__."/../../assets/template/_header.php";
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

    $total = count($questions);
 */

?>

<!-- Container du carousel, manipuler en JS-->
<?php __DIR__."../../assets/template/_nav.php"; ?>

<script type="module" src="../assets/script/carousel.js" defer></script>


<div class="container">

<!-- Cette div ne sert à rien juste à faire du placement en grid -->
<div class="void"></div> 
<!-- ----- -->

<div class="dataBox">
    <div class="progressBar"></div>
    <div class="progressCent">0%</div>
</div>

<button>Découvrir ce monument</button>
</div>


<?php require __DIR__."/../../assets/template/_footer.php"; ?>

