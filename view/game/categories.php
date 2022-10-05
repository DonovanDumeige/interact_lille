<?php

require __DIR__."/../../assets/template/_header.php"; 
?>

<button id="support"><a class="supp" href="#">Contacter le support</a></button>
<h1>
    Choisissez une categorie
</h1>

<div class="catContainer">

<?php if($categories): ?>
    <?php foreach ($categories as $c): ?>
    <div class="categorie <?php switch ($c["ID"])
     {
        case 1:
            echo 'one';
            break;
        case 2:
            echo 'two';
            break;
        case 3:
            echo 'three';
        default:
            "";
            break;
    } 
    ?>">
    <a href="/categorie/places?id=<?php echo $c['ID']?>" class="path">
        <div class="dataBox">
            <h3 class="dataTitle"><?php echo $c['NOM_CAT'] ?></h3>
            <div class="progressBar"></div>
            <p class="progressCent">
                0%
            </p>
        </div>
        </a>
    </div>
    <?php endforeach; ?>


    <!-- Categorie 1 -->
<!--     <div class="categorie one">
        <div class="dataBox">
            <h3 class="dataTitle">Histoire de Lille</h3>
            <div class="progressBar"></div>
            <p class="progressCent">
                0%
            </p>
        </div>
    </div>
 -->
    <!-- Categorie 2 -->
<!--     <div class="categorie two">
        <div class="dataBox">
            <h3 class="dataTitle">Sites et monuments</h3>
            <div class="progressBar"></div>
            <p class="progressCent">
                0%
            </p>
        </div>
    </div> -->

    <!-- Categorie 3 -->
<!--     <div class="categorie three">
        <div class="dataBox">
            <h3 class="dataTitle">Parcs et jardins</h3>
            <div class="progressBar"></div>
            <p class="progressCent">
                0%
            </p>
        </div>
    </div> -->

</div>
<button id="howTo"><a href="#" class="howToPlay">Comment jouer ? &gt; </a></span></button>



<?php 
endif;
require __DIR__."/../../assets/template/_footer.php";  ?>

