
// Premier slide
const slideOne = document.querySelector(".slideOne");
const titleOne = document.querySelector(".titleOne");
const buttonOne = document.querySelector(".buttonOne a");
console.log(buttonOne);
// Deuxieme slide
const slideTwo = document.querySelector(".slideTwo");
const titleTwo = document.querySelector(".titleTwo");
const buttonTwo = document.querySelector(".buttonTwo a");
// Troisieme slide
const slideThree = document.querySelector(".slideThree");
const titleThree = document.querySelector(".titleThree");
const buttonThree = document.querySelector(".buttonThree a");
// quatrieme slide
const slideFour = document.querySelector(".slideFour");
const titleFour = document.querySelector(".titleFour");
const buttonFour = document.querySelector(".buttonFour a");
// cinquième slide
const slideFive = document.querySelector(".slideFive");
const titleFive = document.querySelector(".titleFive");
const buttonFive = document.querySelector(".buttonFive a");


if(window.location.pathname+window.location.search === "/categorie/places?id=1"){

    titleOne.textContent = "Vieux-Lille"
    slideOne.style.backgroundImage= "url(../assets/img/vieuxlille.jpg)"
    slideOne.style.backgroundSize="cover"
    slideOne.style.backgroundPosition="center"
    buttonOne.setAttribute("href", "/place/question?id=1")

    titleTwo.textContent = "Beffroi"
    slideTwo.style.backgroundImage= "url(../assets/img/beffroi.jpg)"
    slideTwo.style.backgroundSize="cover"
    slideTwo.style.backgroundPosition="center"
    buttonTwo.setAttribute("href", "/place/question?id=3")

    titleThree.textContent = "Citadelle"
    slideThree.style.backgroundImage= "url(../assets/img/citadelle.jpg)"
    slideThree.style.backgroundSize="cover"
    slideThree.style.backgroundPosition="center"
    buttonThree.setAttribute("href", "/place/question?id=5")

    titleFour.textContent = "Esplanade de Lille"
    slideFour.style.backgroundImage= "url(../assets/img/esplanade.jpg)"
    slideFour.style.backgroundSize="cover"
    slideFour.style.backgroundPosition="center"
    buttonFour.setAttribute("href", "/place/question?id=9")

    titleFive.textContent = "place du Général de Gaulle"
    slideFive.style.backgroundImage= "url(../assets/img/placegg.jpg)"
    slideFive.style.backgroundSize="cover"
    slideFive.style.backgroundPosition="center"
    buttonFive.setAttribute("href", "/place/question?id=7")

}

if(window.location.pathname+window.location.search === "/categorie/places?id=2"){
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

if(window.location.pathname+window.location.search === "/categorie/places?id=3"){
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
