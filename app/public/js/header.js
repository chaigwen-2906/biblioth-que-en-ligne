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