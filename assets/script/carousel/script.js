"use strict";

const images = ["../../assets/img/lille.jpg","../assets/img/parc.jpg","../assets/img/monument.jpg"];

async function addCarousel(){
    const m = document.querySelector("main")
    const slides = await import("./carousel.js")
    const carousel = slides.create(images);
    m.appendChild(carousel);
    slides.default();
}addCarousel()