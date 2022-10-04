"use strict";

// todo créer le pop up de la carte "Comment jouer ?"

let image = document.createElement('img'),
    title = document.createElement('h1');
const img = {
        ID : ["id1","id2","id3"], // correspond aux catégories
        src : {
            id1:["img1", "img2","img3", 'img4', 'img5'], //correspond aux images du lieu
            id2:['img6','img7','img8','img9', 'img10'],
            id3:['img11','img12','img13','img14', 'img15'],
        },
        title:
        {
            id1:["Vieux-Lille", "Grand-Place", "nom3", "nom4","nom5"]
        }
    }
console.log(img.ID);

switch (img.ID) {
    case "id1":
        for (img.src.id1 in img.src) {
            for (let i = 0; i < img.src.id1.length; i++) {
                image.src = img.src.id1[i]
                console.log(image)
            }         
        }
        break;
    default:
        break;
}

if(img.ID == "id1"){
    console.log("ca fonctionne")
}