<?php

$title = "Categories";
$mainClass = "section-categorie";
require ("../assets/template/_header.php");
?>

<button id="support"><a href="#">Contacter le support</a></button>
<h1>
    Choisissez une categorie
</h1>

<div class="catContainer">
    <!-- Categorie 1 -->
    <div class="categorie one">
        <div class="dataBox">
            <h3 class="dataTitle">Histoire de Lille</h3>
            <div class="progressBar"></div>
            <p class="progressCent">
                0%
            </p>
        </div>
    </div>

    <!-- Categorie 2 -->
    <div class="categorie two">
        <div class="dataBox">
            <h3 class="dataTitle">Sites et monuments</h3>
            <div class="progressBar"></div>
            <p class="progressCent">
                0%
            </p>
        </div>
    </div>

    <!-- Categorie 3 -->
    <div class="categorie three">
        <div class="dataBox">
            <h3 class="dataTitle">Parcs et jardins</h3>
            <div class="progressBar"></div>
            <p class="progressCent">
                0%
            </p>
        </div>
    </div>

</div>
<button id="howTo">Comment jouer ? &gt; </button>


<?php
require ("../assets/template/_footer.php");
?>
