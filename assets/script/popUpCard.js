const card = document.querySelector(".howTo-card");
// const a = document.querySelector(".popUp");
const i = document.querySelector(".howTo-card i");

document.querySelectorAll('.popUp').forEach(a => {
    a.addEventListener('click', poppingUp)})
i.addEventListener("click", closeCard);

function poppingUp(){
    card.style.display = "grid"
    card.style.zIndex = "5"
}

function closeCard(){
    card.style.display = "none"
    card.style.zIndex = "1"
}