"use strict";

// todo créer le pop up de la carte "Comment jouer ?"


const btn = document.querySelector('#howTo')
const closeMark = document.querySelector(".howTo-card i");
const card = document.querySelector('.howTo-card');

btn.onclick = appear;
closeMark.onclick = appear;

function appear()
{
    card.classList.toggle("grid");
}

const btnAnswer = document.getElementById('#answer');
console.log(btnAnswer)
let progressBar = 0
let pcq = 50;

function increment(e){
    e.preventDefault()
    let save = [""];
    progressBar += pcq;
    console.log(progressBar);
    if(progressBar == 100){
        let newpB = progressBar
        save = save.push(newpB)
        progressBar = 0;;
    }
    
    console.log(save);
}
// btnAnswer.addEventListener("click", increment);


