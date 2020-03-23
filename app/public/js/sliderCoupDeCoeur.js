//initialise le tableau img
let tabImgSlider = 
[
    "./../app/public/image/slider/biblio.jpg",
    "./../app/public/image/slider/la_biblio.jpg",
    "./../app/public/image/slider/lecture.png",
    "./../app/public/image/slider/livre_magic.png",
    "./../app/public/image/slider/livre.png",
    
];

let numImgSlider = 0;
let imgSlider = document.getElementById("imgSlider");
let gauche = document.getElementById("gauche");
let droite = document.getElementById("droite");

//on initialise le slider sur la première image
imgSlider.src=tabImgSlider[numImgSlider];

//tourne tt seul
setInterval("nextImage()", 4000);

// abonne element clickable a gauche
gauche.addEventListener('click', function() {
    previousImage();
});
 // abonne element clickable a droite
droite.addEventListener('click', function() {
    nextImage();
});


function nextImage()
{
    //incremente le num
    numImgSlider = numImgSlider+1;
    if (numImgSlider==5){
        numImgSlider=0;
    }
    //console.log(numImgSlider);
     //on modifie le src de l'imgSlider
    imgSlider.src=tabImgSlider[numImgSlider];
    //console.log(tabImgSlider[numImgSlider]);
}


function previousImage()
{
    //decremente le num
    numImgSlider = numImgSlider-1;
    if (numImgSlider==-1){
        numImgSlider=4;
    }
   
     imgSlider.src=tabImgSlider[numImgSlider];
}
