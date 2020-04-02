$( function() {
    
    $( "#divListFAQ" ).accordion({
      heightStyle: "content"
    });

    //On récupère la variable de session 'idClient'
    let idClient = sessionStorage.getItem('idClient');
    gestionModeConnecte(idClient);
});

//----------------------------------------- GESTION DU MODE CONNECTER-------------------------------------------------- 
function gestionModeConnecte(idClient){
    if(idClient == null)
    {
        //client non connecté
        //On affiche les boutons de connexion
        $(".bloc_connexion").show();
        //On masque les boutons de gestion du compte
        $(".bloc_deconnexion").hide();

        //On masque les boutons RESERVER dans la page detailLlivre(les btn sont cacher tant que on est pas connecter)
        $("#btnReserver").hide();
        //On masque les boutons POSTE dans la page detailLlivre(les btn sont cacher tant que on est pas connecter)
        $("#sectionCommentaire").hide();
    }
    else{
        //client connecté
        //On masque les boutons de connexion
        $(".bloc_connexion").hide();
        //On affciche les boutons de gestion du compte
        $(".bloc_deconnexion").show();

        // on modifie la valeur du champs cacher hiddenIdClient 
        $("#hiddenIdClient").val(idClient);
        $("#hiddenIdClientMonCompteModifier").val(idClient);
    }
}
//----------------------------------------- GESTION DU MODE CONNECTER-------------------------------------------------- 


//-------------------------------------------------- MENU BURGER------------------------------------------------------- 

//MenuBurger
$("#btnBurger").click(function(){
    if($(".navMenuBurger").is(":visible")){
        $(".navMenuBurger").hide("slow");
    }
    else{
        $(".navMenuBurger").show("slow");
    }
});
//--------------------------------------------------FIN MENU BURGER------------------------------------------------------- 

//-------------------------------------------------BANDEAU RECHERCHER ----------------------------------------------------
$(".selectionLivres").hide();
$(".btnloupe").click(function(){
    if($(".selectionLivres").is(":visible")){
        $(".selectionLivres").hide("slow");
    }
    else{
        $(".selectionLivres").show("slow");
    }
});
//----------------------------------------------fin BANDEAU RECHERCHER ----------------------------------------------------


//------------------------------------------------- Modal Connection ------------------------------------------------------
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
//----------------------------------------------FIN Modal Connection ------------------------------------------------------

//--------------------------------------------- Modal Creer Compte---------------------------------------------------------
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
//----------------------------------------------FIN  MODAL CREEZ VOTRE COMPTE------------------------------------------------


//-----------------------------------------------------MODAL FAQ-------------------------------------------------------------
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

//-------------------------------------------------FIN MODAL FAQ---------------------------------------------------------------

//-----------------------------------TEST CHAMPS RECHERCHE (SOIE PAR CATEGORIE || champs de recherhe)--------------------------
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
//-----------------------------------TEST CHAMPS RECHERCHE (SOIE PAR CATEGORIE || champs de recherhe)--------------------------

// ------------------------------------------GESTION DU MENU CLASS ACTIVE -----------------------------------------------------

function menuActive(indexActive){
    // traitement pour le menu normal
        //On récupère le conteneur du menu
        let conteneurMenu = document.getElementById("conteneurMenu");

        //On récupère dans un tableau les éléments li qui porte la classe nav-item
        let tabElementLi = conteneurMenu.getElementsByClassName("nav-item");

        //On ajoute la classe active sur l'élément dont l'index est indexActive
        tabElementLi[indexActive].className += " active";

    // traitement pour le menu burger
        //On récupère le conteneur du menu
        let conteneurMenuBurger = document.getElementById("conteneurMenuBurger");

        //On récupère dans un tableau les éléments li qui porte la classe nav-item
        let tabElementLiBurger = conteneurMenuBurger.getElementsByClassName("nav-item");

        //On ajoute la classe active sur l'élément dont l'index est indexActive
        tabElementLiBurger[indexActive].className += " active";
}
//----------------------------------------FIN GESTION DU MENU CLASS ACTIVE ----------------------------------

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
/*-------------------------------------------------fin gestion du retour en haut -------------------------------------*/



/*--------------------CREATION DE TEST AVANT ENVOIE DE FORMULAIRE CREEZ VOTRE COMPTE---------------*/

//EFFET SUR LE BLOC DATE 
$(function() {
    $( "#dateCreez" ).datepicker();
    $( "#dateCreez" ).datepicker( "option", "showAnim", "clip" );
    $( "#dateCreez" ).datepicker( "option", "duration", "slow" );
});
//FIN EFFET SUR LE BLOC DATE 

let formValidCreez = document.getElementById("boutonEnvoyerCreez");

formValidCreez.addEventListener("click",function(event){
   
    validSomething(event, prenomCreez, prenomValidCreez, errorPrenomCreez, "prénom");
    validSomething(event, nomCreez, nomValidCreez, errorNomCreez, "nom");
    validSomething(event, emailCreez, mailValidCreez, errorMailCreez, "email");
    validSomething(event, mobileCreez, MobileValidCreez, errorMobileCreez, "mobile");
    validSomething(event, motDePasseCreez, PassValidCreez, errorMotDePasseCreez, "mot de passe");
    validSomething(event, motDePasseConfirm, PassValidConfirm, errorMotDePasseConfirm, "mot de passe");
    validSomething(event, adresse, adresseValidCreez ,errorAdresse, "adresse");
    validSomething(event, dateCreez, DateValidCreez, errorDateCreez, "date");
   
}) 
// -----on test le prenom---------
let prenomValidCreez = /^[a-zA-ZéèîïÉÈÎÏ]{2,}[a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

// ---- On teste le nom ----------
let nomValidCreez = /^[a-zA-ZéèîïÉÈÎÏ]{2,}[a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/ ;

//-----------on test le mail-------
let mailValidCreez = /^[a-z0-9._-]+@[a-z0-9._-]+com|[a-z0-9._-]+@[a-z0-9._-]+fr$/;

// ---- On teste le Mobile --------
let MobileValidCreez = /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/;

//-----on teste le password--------
let PassValidCreez = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[éèîï&ÉÈÎÏ])([a-zA-Z0-9éèîï&ÉÈÎÏ]{8,})$/);

//-----on teste De PasseConfirm----
let PassValidConfirm = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[éèîï&ÉÈÎÏ])([a-zA-Z0-9éèîï&ÉÈÎÏ]{8,})$/);

//-----on teste la date de naissance---------
let DateValidCreez = (/^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/);

//-----on teste l'adresse--------
let adresseValidCreez = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[éèîï&ÉÈÎÏ])([a-zA-Z0-9éèîï&ÉÈÎÏ]{30,})$/);



function validSomething(event, element, nomValid, output, prefix){
    //si le champs est vide alors il ecrira: prenom manquant en bleu
    if(element.validity.valueMissing){
        event.preventDefault();
        output.textContent = prefix + " manquant";
        output.style.color = "red";
    }
    // si le format de données est incorrect
    else if (nomValid.test(element.value)=== false){
        //stop l'envoie du formulaire 
        event.preventDefault();
        output.textContent = "format incorrect";
        output.style.color = "red";
    }
    else{
        output.textContent = "";
    }
}


//API AJAX RECUPERATION DE L'ADRESSE DANS LE FORMULAIRE CREEZ VOTRE COMPTE 

/*saisie de l'adresse avec 5 dans l'historique */
function search(){
    let adresse = document.getElementById("adresse").value

    if(adresse != "")
    {
        //On génère l'autocomplétion sur le champ adresse
        $("#adresse").autocomplete({
            //on adapte la source d'autocompletion
            source: function (request, response) {
                //On effectue la requete AJAX vers l'API adresse
                $.ajax({
                    //url d'appel
                    url: 'https://api-adresse.data.gouv.fr/search/?', 
                    //paramètre en entré de la fonction search de l'API adresse
                    data: { q: adresse}, 
                    //type de donnée attendu en sortie
                    dataType: "json", 
                    //En cas de succès que fait-on?
                    success: function (data) { 
                        // on parcours les features de notre réponse
                        response($.map(data.features, function (item) {
                            //Pour chaque feature on récupère la propriété  properties.label
                            console.log(item.properties.label); 
                            //on retourne l'élément dans la liste d'autocompletion
                            return { label: item.properties.label, value: item.properties.label}; 
                        }));
                    }
                });
            }
        });

    }  
}
/*--------------------FIN CREATION DE TEST AVANT ENVOIE DE FORMULAIRE CREEZ VOTRE COMPTE----------*/




// -------------------------------CREATION DE TEST AVANT ENVOIE DE FORMULAIRE S'IDENTIFIER--------*/

let testIdentifier= document.getElementById("boutonEnvoyerIdentifier");

testIdentifier.addEventListener("click",function(event){

    validSomething(event, emailIdentifier, mailValidIdentifier, errorMailIdentifier, "email");
    validSomething(event, motDePasseIdentifier, PassValidIdentifier, errorMotDePasseIdentifier, "mot de passe");
})

 //-----------on test le mail-------
 let mailValidIdentifier = /^[a-z0-9._-]+@[a-z0-9._-]+com|[a-z0-9._-]+@[a-z0-9._-]+fr$/;

 //-----on teste le password--------
let PassValidIdentifier = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[éèîï&ÉÈÎÏ])([a-zA-Z0-9éèîï&ÉÈÎÏ]{8,})$/);

function validSomething(event, element, nomValid, output, prefix){
    //si le champs est vide alors il ecrira: prenom manquant en bleu
    if(element.validity.valueMissing){
        event.preventDefault();
        output.textContent = prefix + " manquant";
        output.style.color = "red";
    }
    // si le format de données est incorrect
    else if (nomValid.test(element.value)=== false){
        //stop l'envoie du formulaire 
        event.preventDefault();
        output.textContent = "format incorrect";
        output.style.color = "red";
    }
    else{
        output.textContent = "";
    }

}


/*----------DANS S'IDENTIFIER-----------------------TRAITEMENT BOUTON CREEZ VOTRE COMPTE------------------*/
let btnBesoinCompte = document.getElementById("btnBesoinCompte");

btnBesoinCompte.addEventListener("click", function(){
    //On masque le modal dialog s'identifier
    $("#modalConnection").hide("slow");
    //On affiche le modal dialog creer son compte
    $("#modalCreerCompte").show("slow");
});



