
// Premier slide
const slideOne = document.querySelector(".slideOne");
const titleOne = document.querySelector(".titleOne");
const buttonOne = document.querySelector(".buttonOne");
// Deuxieme slide
const slideTwo = document.querySelector(".slideTwo");
const titleTwo = document.querySelector(".titleTwo");
const buttonTwo = document.querySelector(".buttonTwo");
// Troisieme slide
const slideThree = document.querySelector(".slideThree");
const titleThree = document.querySelector(".titleThree");
const buttonThree = document.querySelector(".buttonThree");
// quatrieme slide
const slideFour = document.querySelector(".slideFour");
const titleFour = document.querySelector(".titleFour");
const buttonFour = document.querySelector(".buttonFour");
// cinquième slide
const slideFive = document.querySelector(".slideFive");
const titleFive = document.querySelector(".titleFive");
const buttonFive = document.querySelector(".buttonFive");


if(window.location.href === "http://interact_lille.localhost/categorie/places?id=1"){

    titleOne.textContent = "Vieux-Lille"
    slideOne.style.backgroundImage= "url(../assets/img/vieuxlille.jpg)"
    slideOne.style.backgroundSize="cover"
    slideOne.style.backgroundPosition="center"
    // buttonOne.textContent = ""

    titleTwo.textContent = "Beffroi"
    slideTwo.style.backgroundImage= "url(../assets/img/beffroi.jpg)"
    slideTwo.style.backgroundSize="cover"
    slideTwo.style.backgroundPosition="center"

    titleThree.textContent = "Citadelle"
    slideThree.style.backgroundImage= "url(../assets/img/citadelle.jpg)"
    slideThree.style.backgroundSize="cover"
    slideThree.style.backgroundPosition="center"

    titleFour.textContent = "Esplanade de Lille"
    slideFour.style.backgroundImage= "url(../assets/img/esplanade.jpg)"
    slideFour.style.backgroundSize="cover"
    slideFour.style.backgroundPosition="center"

    titleFive.textContent = "place du Général de Gaulle"
    slideFive.style.backgroundImage= "url(../assets/img/placegg.jpg)"
    slideFive.style.backgroundSize="cover"
    slideFive.style.backgroundPosition="center"

}

if(window.location.href === "http://interact_lille.localhost/categorie/places?id=2"){
    titleOne.textContent = "Au moyen-âge"
    slideOne.style.backgroundImage= "url(../assets/img/ma.jpg)"
    slideOne.style.backgroundSize="cover"
    slideOne.style.backgroundPosition="center"

    titleTwo.textContent = "Pendant l'antiquité"
    slideTwo.style.backgroundImage= "url(../assets/img/ant.jpg)"
    slideTwo.style.backgroundSize="cover"
    slideTwo.style.backgroundPosition="center"

    titleThree.textContent = "A la renaissance"
    slideThree.style.backgroundImage= "url(../assets/img/renaissance.jpg)"
    slideThree.style.backgroundSize="cover"
    slideThree.style.backgroundPosition="center"

    titleFour.textContent = "Epoque moderne"
    slideFour.style.backgroundImage= "url(../assets/img/moderne.jpg)"
    slideFour.style.backgroundSize="cover"
    slideFour.style.backgroundPosition="center"

}

if(window.location.href === "http://interact_lille.localhost/categorie/places?id=3"){
    titleOne.textContent = "Parc des Géants"
    slideOne.style.backgroundImage= "url(../assets/img/parcgeant.jpg)"
    slideOne.style.backgroundSize="cover"
    slideOne.style.backgroundPosition="center"


    titleTwo.textContent = "Jardin aux plantes"
    slideTwo.style.backgroundImage= "url(../assets/img/jardinplantes.jpg)"
    slideTwo.style.backgroundSize="cover"
    slideTwo.style.backgroundPosition="center"

    titleThree.textContent = "Jardin lorem"
    // slideTwo.style.backgroundImage= "url(../assets/img/beffroi.jpg)"
    // slideTwo.style.backgroundSize="cover"
    // slideTwo.style.backgroundPosition="center"

    titleFour.textContent = "Jardin ipsum"
    // slideTwo.style.backgroundImage= "url(../assets/img/beffroi.jpg)"
    // slideTwo.style.backgroundSize="cover"
    // slideTwo.style.backgroundPosition="center"
}
