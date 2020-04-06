//$fonction s'execute au chargement de la page
$( function() {
    
    $( "#divListFAQ" ).accordion({
      heightStyle: "content"
    });
});


// déclaration de toute les regex 

// -----on test le nom et prenom---------
let nomprenomValid= /^[a-zA-ZéèîïÉÈÎÏ]{2,}[a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

//-----------on test le mail-------
let mailValid = /^[a-z0-9._-]+@[a-z0-9._-]+com|[a-z0-9._-]+@[a-z0-9._-]+fr$/;

// ---- On teste le Mobile --------
let telephoneValid = /^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$/;

//-----on teste le password--------
let PassValid = (/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[éèîï&ÉÈÎÏ])([a-zA-Z0-9éèîï&ÉÈÎÏ]{8,})$/);

//-----on teste la date de naissance---------
let DateValid = (/^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/);




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

    //On enlève les erreurs
    document.getElementById('errorMailIdentifier').textContent = "";
    document.getElementById('errorMotDePasseIdentifier').textContent = "";
    document.getElementById('erreurPostFormulaireConnexion').textContent = "";
    //On vide les champs
    document.getElementById("emailIdentifier").value="";
    document.getElementById("motDePasseIdentifier").value="";
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

    //On enlève les erreurs
    document.getElementById('errorCiviliteCreez').textContent = "";
    document.getElementById('errorPrenomCreez').textContent = "";
    document.getElementById('errorNomCreez').textContent = "";
    document.getElementById('errorMailCreez').textContent = "";
    document.getElementById('errorMobileCreez').textContent = "";
    document.getElementById('errorTelephoneCreez').textContent = "";
    document.getElementById('errorMotDePasseCreez').textContent = "";
    document.getElementById('errorMotDePasseCreezConfirm').textContent = "";
    document.getElementById('errorAdresseCreez').textContent = "";
    document.getElementById('errorDateCreez').textContent = "";
    document.getElementById('erreurPostFormulaireCreer').textContent = "";
    //On vide les champs
    document.getElementById("civiliteMRCreez").checked=false;
    document.getElementById("civiliteMMECreez").checked=false;
    document.getElementById("numeroAbonneCreez").value="";
    document.getElementById("nomCreez").value="";
    document.getElementById("prenomCreez").value="";
    document.getElementById("emailCreez").value="";
    document.getElementById("mobileCreez").value="";
    document.getElementById("telephoneCreez").value="";
    document.getElementById("motDePasseCreez").value="";
    document.getElementById("motDePasseCreezConfirm").value="";
    document.getElementById("adresseCreez").value="";
    document.getElementById("dateCreez").value="";
    document.getElementById("conditionsUtilisation").checked=false;
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



// -------------------------------CREATION DE TEST AVANT ENVOIE DE FORMULAIRE S'IDENTIFIER----------------------------*/

let testIdentifier= document.getElementById("boutonEnvoyerIdentifier");

testIdentifier.addEventListener("click",function(event){

    validSomething(event, emailIdentifier, mailValid, errorMailIdentifier, "email");
    validSomething(event, motDePasseIdentifier, PassValid, errorMotDePasseIdentifier, "mot de passe");
})


//DANS S'IDENTIFIER-66TRAITEMENT BOUTON CREEZ VOTRE COMPTE
let btnBesoinCompte = document.getElementById("btnBesoinCompte");

btnBesoinCompte.addEventListener("click", function(){
    //On masque le modal dialog s'identifier
    $("#modalConnection").hide("slow");
    //On affiche le modal dialog creer son compte
    $("#modalCreerCompte").show("slow");
});
/* ------------------------------FIN CREATION DE TEST AVANT ENVOIE DE FORMULAIRE S'IDENTIFIER--------------------------*/



/*--------------------CREATION DE TEST AVANT ENVOIE DE FORMULAIRE CREEZ VOTRE COMPTE----------------------------------*/

//EFFET SUR LE BLOC DATE 
$(function() {
    $( "#dateCreez" ).datepicker();
    $( "#dateCreez" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
    $( "#dateCreez" ).datepicker( "option", "showAnim", "clip" );
    $( "#dateCreez" ).datepicker( "option", "duration", "slow" );
});
//FIN EFFET SUR LE BLOC DATE 

let formValidCreez = document.getElementById("boutonEnvoyerCreez");

formValidCreez.addEventListener("click",function(event){
    //il doit absoloument cocher un bouton  
    validCivilite(event, civiliteMRCreez, civiliteMMECreez, errorCiviliteCreez, "Civilité");

    validSomething(event, nomCreez, nomprenomValid, errorNomCreez, "Nom");
    validSomething(event, prenomCreez, nomprenomValid, errorPrenomCreez, "Prénom");
    validSomething(event, emailCreez, mailValid, errorMailCreez, "Email");
    validSomething(event, mobileCreez, telephoneValid, errorMobileCreez, "Mobile");
    //on verifier le format mais la valeur a le droit d'être vide
    validSomethingVideAutorise(event, telephoneCreez, telephoneValid, errorTelephoneCreez, "Fixe");
    // le champs accepte d'être vide 
    validSomethingNonVide(event, adresseCreez, errorAdresseCreez, "Adresse")
    validSomething(event, dateCreez, DateValid, errorDateCreez, "Date");
    validSomething(event, motDePasseCreez, PassValid, errorMotDePasseCreez, "Mot de passe");
    validSomething(event, motDePasseCreezConfirm, PassValid, errorMotDePasseCreezConfirm, "Mot de passe");
    // on test si les champs sont identique
    validIdentique(event, motDePasseCreez, motDePasseCreezConfirm, errorMotDePasseCreezConfirm, "Mot de passe saisie");
    //on gére les checkbox
    validationCheckbox(event,conditionsUtilisation,errorCheckbox, "Conditions utilisation")
   
}) 

//VALIDE LE CHAMPS CIVILITE
function validCivilite(event, element1, element2, output, prefix){
        output.textContent = prefix + " manquante";
        //si le champs est vide alors il ecrira:
    if(!element1.checked && !element2.checked){
        event.preventDefault();
        output.textContent = prefix + " manquant(e)";
        output.style.color = "red";
    }
    else{
        output.textContent = "";
    }
}

//on verifier le format mais la valeur a le droit d'être vide
function validSomethingVideAutorise(event, element, nomValid, output, prefix){
    //si le champs est vide alors il ecrira: prenom manquant en rouge
    if(element.value != ""){
        //le champ n'est pas vide
        if (nomValid.test(element.value)=== false){
            //stop l'envoie du formulaire 
            event.preventDefault();
            output.textContent = "format incorrect";
            output.style.color = "red";
        }
        else{
            output.textContent = "";
        }
    }
    else{
        //le champ est vide
        output.textContent = "";
    }
}

function validSomethingNonVide(event, element, output, prefix){
    //le champs telephone accepte d'être vide 
    if(element.validity.valueMissing){
        event.preventDefault();
        output.textContent = prefix + " manquant(e)";
        output.style.color = "red";
    }
}

// VALIDE TOUT LES CHAMPS DE NOM A CONFIRMER MOT DE PASSE 
function validSomething(event, element, nomValid, output, prefix){
    
    if(element.validity.valueMissing){
        event.preventDefault();
        output.textContent = prefix + " manquant(e)";
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

function validIdentique(event, element1, element2,output, prefix)
{   // on test si les champs sont identique
    if(!(element1.value == element2.value)){
        event.preventDefault();
        output.textContent = prefix + " différent";
        output.style.color = "red";
    }
    else{
        output.textContent = "";
    }
}

// VALIDE LA CHECKBOX CONDITION UTILISATION 
function validationCheckbox(event,element,output, prefix){
    //si le champs est vide alors il ecrira: manquant en rouge
    if(!element.checked){
        event.preventDefault();
        output.textContent = prefix + " manquant(e)";
        output.style.color = "red";
    }
    else{
        output.textContent = "";
    }
    
}

//API AJAX RECUPERATION DE L'ADRESSE DANS LE FORMULAIRE CREEZ VOTRE COMPTE 

/*saisie de l'adresse avec 5 dans l'historique */
function search(){
    let adresse = document.getElementById("adresseCreez").value

    if(adresse != "")
    {
        //On génère l'autocomplétion sur le champ adresse
        $("#adresseCreez").autocomplete({
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






