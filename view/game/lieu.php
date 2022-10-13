<?php
require __DIR__ . "/../../assets/template/_header.php";
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

    $total = count($places);
    $progress = 100/$total;
    
 */
?>
<script type="module" src="../../assets/script/carousel/carousel.js" defer></script>

<!-- Container du carousel, manipuler en JS-->

<?php __DIR__ . "/../../assets/template/_nav.php"; ?>

<div class="container">


    <div class="carousel">

        <div class="carousel__track-container">

            <button class="carousel__button carousel__button--left ">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <ul class="carousel__track">

                <li class="carousel__slide current-slide slideOne">
                    <h3 class="placeTitle  titleOne">Vieux Lille</h3>
                    <div class="progressBar"></div>
                    <div class="progressCent">0%</div>
                    <button class="buttonOne"><a>Découvrir ce monument</a></button>
                </li>

                <li class="carousel__slide slideTwo">
                    <h3 class="placeTitle  titleTwo">Vieux Lille</h3>
                    <div class="progressBar"></div>
                    <div class="progressCent">0%</div>
                    <button class="buttonTwo"><a>Découvrir ce monument</a></button>
                </li>

                <li class="carousel__slide slideThree">
                    <h3 class="placeTitle titleThree">Vieux Lille</h3>
                    <div class="progressBar"></div>
                    <div class="progressCent">0%</div>
                    <button class="buttonThree"><a>Découvrir ce monument</a>t</button>
                </li>

                <li class="carousel__slide  slideFour">
                    <h3 class="placeTitle titleFour">Vieux Lille</h3>
                    <div class="progressBar"></div>
                    <div class="progressCent">0%</div>
                    <button class="buttonFour"><a>Découvrir ce monument</a></button>
                </li>

                <li class="carousel__slide slideFive">
                    <h3 class="placeTitle  titleFive">Vieux Lille</h3>
                    <div class="progressBar"></div>
                    <div class="progressCent">0%</div>
                    <button class="buttonFive"><a>Découvrir ce monument</a></button>
                </li>

            </ul>
            <button class="carousel__button carousel__button--right">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>


    <?php require __DIR__ . "/../../assets/template/_footer.php"; ?>