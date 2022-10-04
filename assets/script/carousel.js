const images = ["./img/lille.jpg","./img/parc.jpg","./img/monument.jpg"];
const carousel = create(images);
document.body.append(carousel);
// start();

function create(imgs){
    const container = document.createElement("div");
    container.classList.add("carousel-container");
    imgs.forEach((img, i)=>{
        const div = document.createElement("div");
        div.classList.add("items", "fade");
        const image = document.createElement("img");
        image.src = img;
        div.append(image);
        container.append(div);
    })
    const next = document.createElement("a");
    next.classList.add("next");
    next.innerHTML = "&#10095;";
    const prev = document.createElement("a");
    prev.classList.add("prev");
    prev.innerHTML = "&#10094;";
    container.append(next, prev);
    return container;
}
function select(){
    // Selectionne les éléments interactif de mon carousel.
    return {
        items: document.querySelectorAll(".items"),
        btns: document.querySelectorAll(".next, .prev")
    }
}
function showItems(n){
    // Affiche un élément de mon carousel et cache les autres.
    const carousel = select();
    let index = n> carousel.items.length -1 ? 0: n<0? carousel.items.length-1: n;
    // if(n > carousel.items.length-1){
    //     let index = 0;
    // }
    // else if( n<0){
    //     let index = carousel.items.length-1;
    // }
    // else{
    //     let index = n;
    // }
    carousel.items.forEach((item)=>{
        item.style.display = "none";
    })
    carousel.items[index].style.display = "block";
}
// function currentItem(e){
//     // Affiche l'image qui correspond au point.
//     let n = parseInt(e.target.dataset.id);
//     showItems(n);
// }
function changeItem(e){
    let n = document.querySelector(".dot.active").dataset.id;
    if(e.target.classList.contains("next")){
        showItems(++n);
    }else{
        showItems(--n);
    }
}
function init(){
    // Affiche la première image et ajoute les écouteurs d'évènment.
    showItems(0);
    const carousel = select();
    carousel.dots.forEach(dot=>dot.addEventListener("pointerdown", currentItem));
    carousel.btns.forEach(btn=>btn.addEventListener("pointerdown", changeItem));
}