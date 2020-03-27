$( function() {
    $( "#divListFAQ" ).accordion({
      heightStyle: "content"
    });
});


//MenuBurger
$("#btnBurger").click(function(){
    if($(".navMenuBurger").is(":visible")){
        $(".navMenuBurger").hide("slow");
    }
    else{
        $(".navMenuBurger").show("slow");
    }
});


//-------------------bandeauMenu ---------------------------------
$(".selectionLivres").hide();
$(".btnloupe").click(function(){
    if($(".selectionLivres").is(":visible")){
        $(".selectionLivres").hide("slow");
    }
    else{
        $(".selectionLivres").show("slow");
    }
});

//------------------ Modal Connection ---------------//
let boutonSidentifier = document.getElementById("boutonSidentifier");

boutonSidentifier.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalConnection").show("slow");
});

let boutonFermerModalConnection = document.getElementById("fermerModalConnection");
boutonFermerModalConnection.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalConnection").hide("slow");
});

//------------------ Modal Creer Compte ---------------//
let boutonCreerCompte = document.getElementById("boutonCreerCompte");
boutonCreerCompte.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalCreerCompte").show("slow");
});

let fermerModalCreerCompte = document.getElementById("fermerModalCreerCompte");
fermerModalCreerCompte.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalCreerCompte").hide("slow");
});
//------------------FIN  Modal Creer Compte ---------------//

//--------------------MODAL FAQ---------------------------//
let boutonFaq = document.getElementById("boutonFaq");
boutonFaq.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalFaq").show("slow");
});

let fermerModalFaq = document.getElementById("fermerModalFaq");
fermerModalFaq.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalFaq").hide("slow");
});

//---------------FIN MODAL FAQ---------------------------//


// GESTION DU FORMULAIRE DE RECHERCHE 
// let boutonRechercher = document.getElementById("boutonRechercher");

// boutonRechercher.addEventListener("click",function(e){
//     alert('test');
//     let selectCategorie = document.getElementById("selectCategorie");
//     let choix = selectCategorie.selectedIndex;//récupèration de l'index de l' <option> choisi par l'utilisateur
//     let valeurCategorie = selectCategorie.options[choix].value;//récuperation de la valeur de  <l'option> d'index "choix" 
//     alert(valeurCategorie);
// });

function verificationRecherche()
{
    //On récupère l'id de la categorie choisie
    let selectCategorie = document.getElementById("selectCategorie");
    let choix = selectCategorie.selectedIndex;//récupèration de l'index de l' <option> choisi par l'utilisateur
    let valeurCategorie = selectCategorie.options[choix].value;//récuperation de la valeur de  <l'option> d'index "choix" 
    
    //On récupère la valeur du champ texte
    let champRecherche = document.getElementById("champRecherche").value;
    //on teste 
    if (valeurCategorie == 0 && champRecherche == "" ){
        
        alert ("Veuillez choisir une catégorie et / ou saisir du texte !");
        return false;
    }
    else{

        return true;
    }
     
}


/* ------------------------------------------Gestion du menu class Ative--------------------------------- */

function menuActive(indexActive){

    //On récupère le conteneur du menu
    let conteneurMenu = document.getElementById("conteneurMenu");

    //On récupère dans un tableau les éléments li qui porte la classe nav-item
    let tabElementLi = conteneurMenu.getElementsByClassName("nav-item");

    //On ajoute la classe active sur l'élément dont l'index est indexActive
    tabElementLi[indexActive].className += " active";
}


/*----------------------------------------------------gestion du retour en haut -------------------------------------*/
let btnHaut = document.getElementById("retourHaut");

btnHaut.addEventListener("click",function(){
    retourneEnHaut();
});
function retourneEnHaut(){
    //scroll 0.0 veut dire: horizon && vertical
    window.scrollTo(0,0);
}

/* Affichage du bouton retour en haut*/
btnHaut.style.display = "none";
/*Lorsque qu'un scrool est réalisé sur la fenetre, on appelle la fonction AfficheBtnHaut */
window.onscroll = function() {AfficheBtnHaut(btnHaut)};

function AfficheBtnHaut(btnHaut) {
    if (document.documentElement.scrollTop > 250) {
        btnHaut.style.display = "block";
    }
    else{
        btnHaut.style.display = "none";
    }
}
