
export function create(imgs){
    // Crée mon carousel.
    // if (path == idDuLieu){ background image = ""}
    const carousel = document.querySelector(".carousel");

    const dots = document.createElement("div");
    dots.classList.add("dots");
    imgs.forEach((img, i)=>{
        const div = document.createElement("div");
        div.classList.add("items", "fade");
        const image = document.createElement("img");
        image.src = img;
        div.append(image);
        const dot = document.createElement("span");
        dot.classList.add("dot");
        dot.dataset.id = i;
        dots.append(dot);
        carousel.append(div);
    })
    carousel.append(dots);
    const next = document.createElement("a");
    next.classList.add("next");
    next.innerHTML = "&#10095;";
    next.style.fontSize ="40px";
    const prev = document.createElement("a");
    prev.classList.add("prev");
    prev.style.fontSize ="40px";
    prev.innerHTML = "&#10094;";
    carousel.append(next, prev);
    return carousel;
}
function select(){
    return {
        dots: document.querySelectorAll(".dot"),
        items: document.querySelectorAll(".items"),
        btns: document.querySelectorAll(".next, .prev")
    }
}
function showItems(n){
    const carousel = select();
    let index = n> carousel.items.length -1 ? 0: n<0? carousel.items.length-1: n;
    carousel.items.forEach((item, i)=>{
        item.style.display = "none";
        carousel.dots[i].classList.remove("active");
    })
    carousel.items[index].style.display = "block";
    carousel.dots[index].classList.add("active");
}
function currentItem(e){
    let n = parseInt(e.target.dataset.id);
    showItems(n);
}
function changeItem(e){
    let n = document.querySelector(".dot.active").dataset.id;
    if(e.target.classList.contains("next")){
        showItems(++n);
    }else{
        showItems(--n);
    }
}
export default function init(){
    showItems(0);
    const carousel = select();
    carousel.btns.forEach(btn=>btn.addEventListener("pointerdown", changeItem, currentItem));
}