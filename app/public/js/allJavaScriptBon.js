/////////////////////   CHARGEMENT ONLOAD

//gestion de la taille de l'impage de fond de la home  - managing the size of the background image of the home 
window.onload = function(){ 
    let imageDeFond = document.querySelector(".imgDeFond");
    if(imageDeFond != null)
    {
        let imageHeight = imageDeFond.height;
        let imageCitation = document.querySelector(".citation");
        if(imageCitation != null)
        {
            imageCitation.style.height = imageHeight+"px";
        }
    }
};

//jquery : création de l'accordéon pour la faq  - creation of the accordion for the faq 
$( function() {
    
    $( "#divListFAQ" ).accordion({
      heightStyle: "content"
    });
});

//jquery creation du datatime picker pour la date de naissance  - jquery creation of datatime picker for date of birth 
$(function() {
    $( "#dateCreer" ).datepicker();
    $( "#dateCreer" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
    $( "#dateCreer" ).datepicker( "option", "showAnim", "clip" );
    $( "#dateCreer" ).datepicker( "option", "duration", "slow" );
});






//   DECLARATION DES VARIABLES - VARIABLE DECLARATION 


// -----regex nom et prenom---------regex name and surname
let regexNomPrenom= /^[a-zA-ZéèîïÉÈÎÏ]{1,}[a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
//-----------regex mail-------regex mail
let regexMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,5}$/;
// ----regex Mobile --------
let regexTelephone = /^(\d\d){5}$/;
//-----regex mot de passe--------regex password
let regexMotDePasse = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
//-----regex date de naissance---------regex date of birth
let regexDate = /^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/;

//Bouton Accepter Cookie -  Accept Cookie button
let boutonAccepterCookie = document.getElementById("boutonAccepterCookie");


//Bouton acces FAQ - FAQ access button
let boutonFaq = document.getElementById("boutonFaq");
//Bouton fermeture modal FAQ - Modal close button FAQ
let fermerModalFaq = document.getElementById("fermerModalFaq");


//Bouton s'identifier - Login button
let boutonSidentifier = document.getElementById("boutonSidentifier");
//Bouton fermeture modal s'identifier - Modal close button identify
let boutonFermerModalConnection = document.getElementById("fermerModalConnection");
//Bouton valider identification - Validate identification button
let testIdentifier= document.getElementById("boutonEnvoyerIdentifier");
//Bouton besoin compte - Account need button
let boutonBesoinCompte = document.getElementById("boutonBesoinCompte");


//Bouton créer son compte - Create account button
let boutonCreerCompte = document.getElementById("boutonCreerCompte");
//Bouton fermeture modal créer compte - Modal close button create account
let fermerModalCreerCompte = document.getElementById("fermerModalCreerCompte");
//Bouton valider création compte - Validate account creation button
let formValidCreer = document.getElementById("boutonEnvoyerCreez");


//Bouton Retour en haut (scroll) - Back to top button (scroll)
let boutonHaut = document.getElementById("retourHaut");

//Bouton Valider modif mot de passe de la page monCompte - Validate button modify password on the myAccount page
let formValidPass = document.getElementById("comptePassEnregistrer");
//Bouton Valider modif compte de la page monCompte - Validate button modify account on the myAccount page
let formValidMonCompte = document.getElementById("compteEnregistrer");


//Tableau d'image du slider Coup de coeur - Picture table of the Favorite slider
let tabImgSlider = 
[
    "./../app/public/image/slider/biblio.jpg",
    "./../app/public/image/slider/la_biblio.jpg",
    "./../app/public/image/slider/lecture.png",
    "./../app/public/image/slider/livre_magic.png",
    "./../app/public/image/slider/livre.png"
];
//Compteur d'image du slider - Slider image counter
let numImgSlider = 0;
//Element html img du slider Coup de coeur - Element html img of the slider Favorite
let imgSlider = document.getElementById("imgSlider");
//bouton revenir à l'image précédente - button return to previous image
let gauche = document.getElementById("gauche");
//Bouton passer à l'image suivante - Go to next image button
let droite = document.getElementById("droite");









// GESTION DES ACTIONS - EQUITY MANAGEMENT

////// Gestion du bandeau Cookies - Management of the Cookies banner
boutonAccepterCookie.addEventListener("click",function(){
    sessionStorage.setItem('AcceptCookie', 'ok');
    masquerBandeauCookies();
});
// masque le bandeau - hide the blindfold
function masquerBandeauCookies(){
    let divBandeauCookies = document.getElementById("barreCookie");
    divBandeauCookies.style.display = "none";
}
//On teste si une variable de session acceptCookies existe
if(sessionStorage.getItem('AcceptCookie'))
{
    if(sessionStorage.getItem('AcceptCookie') == 'ok')
    {
        masquerBandeauCookies();
    }
}




////// Gestion du Menu 
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




////// Gestion du MenuBurger 
$("#boutonBurger").click(function(){
    if($(".navMenuBurger").is(":visible")){
        $(".navMenuBurger").hide("slow");
    }
    else{
        $(".navMenuBurger").show("slow");
    }
});





////// Gestion du Moteur de recherche 
$(".selectionLivres").hide();
$(".boutonLoupe").click(function(){
    if($(".selectionLivres").is(":visible")){
        $(".selectionLivres").hide("slow");
    }
    else{
        $(".selectionLivres").show("slow");
    }
});
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
    }
    else{

        window.document.formRecherche.submit();
    }
}





////// Gestion du modal FAQ 
boutonFaq.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalFaq").show("slow");
});
fermerModalFaq.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalFaq").hide("slow");
});






////// Gestion du modal s'identifier 
boutonSidentifier.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On enlève les erreurs
    ['MailIdentifier', 'MotDePasseIdentifier', 'PostFormulaireConnexion'].forEach(function (id) {
        document.getElementById(`erreur${id}`).textContent = "";
      });
    //On vide les champs
    document.getElementById("motDePasseIdentifier").value="";
    //On affiche le modalConnection
    $("#modalConnection").show("slow");
});
boutonFermerModalConnection.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalConnection").hide("slow");
});
testIdentifier.addEventListener("click",function(event){

    validSomething(event, emailIdentifier, regexMail, erreurMailIdentifier, "email");
    validSomething(event, motDePasseIdentifier, regexMotDePasse, erreurMotDePasseIdentifier, "mot de passe");
});
boutonBesoinCompte.addEventListener("click", function(){
    //On masque le modal dialog s'identifier
    $("#modalConnection").hide("slow");
    //On affiche le modal dialog creer son compte
    $("#modalCreerCompte").show("slow");
});




////// Gestion du modal création de compte 
boutonCreerCompte.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On enlève les erreurs
    
    ['CiviliteCreer', 'PrenomCreer', 'NomCreer', 'MailCreer', 'MobileCreer', 'TelephoneCreer',
          'MotDePasseCreer', 'MotDePasseCreerConfirm', 'AdresseCreer', 'DateCreer', 'PostFormulaireCreer'
      ].forEach(function (id) {
        document.getElementById(`error${id}`).textContent = "";
      });
    //On vide les champs
    document.getElementById("civiliteMRCreer").checked=false;
    document.getElementById("civiliteMMECreer").checked=false;
    document.getElementById("numeroAbonneCreer").value="";
    document.getElementById("nomCreer").value="";
    document.getElementById("prenomCreer").value="";
    document.getElementById("emailCreer").value="";
    document.getElementById("mobileCreer").value="";
    document.getElementById("telephoneCreer").value="";
    document.getElementById("motDePasseCreer").value="";
    document.getElementById("motDePasseCreerConfirm").value="";
    document.getElementById("adresseCreer").value="";
    document.getElementById("dateCreer").value="";
    document.getElementById("conditionsUtilisation").checked=false;
    //On affiche le modalConnection
    $("#modalCreerCompte").show("slow");
});
fermerModalCreerCompte.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalCreerCompte").hide("slow");
});
formValidCreer.addEventListener("click",function(event){
    //il doit absoloument cocher un bouton  
    validCivilite(event, civiliteMRCreer, civiliteMMECreer, erreurCiviliteCreer, "Civilité");

    validSomething(event, nomCreer, regexNomPrenom, erreurNomCreer, "Nom");
    validSomething(event, prenomCreer, regexNomPrenom, erreurPrenomCreer, "Prénom");
    validSomething(event, emailCreer, regexMail, erreurMailCreer, "Email");
    validSomething(event, mobileCreer, regexTelephone, erreurMobileCreer, "Mobile");
    //on verifier le format mais la valeur a le droit d'être vide
    validSomethingVideAutorise(event, telephoneCreer, regexTelephone, erreurTelephoneCreer, "Fixe");
    // le champs accepte d'être vide 
    validSomethingNonVide(event, adresseCreer, erreurAdresseCreer, "Adresse")
    validSomething(event, dateCreer, regexDate, erreurDateCreer, "Date");
    validSomething(event, motDePasseCreer, regexMotDePasse, erreurMotDePasseCreer, "Mot de passe");
    validSomething(event, motDePasseCreerConfirm, regexMotDePasse, erreurMotDePasseCreerConfirm, "Mot de passe");
    // on test si les champs sont identique
    validIdentique(event, motDePasseCreer, motDePasseCreerConfirm, erreurMotDePasseCreerConfirm, "Mot de passe saisie");
    //on gére les checkbox
    validationCheckbox(event,conditionsUtilisation,errorCheckbox, "Conditions utilisation")
   
});




////// Gestion du bouton retour en haut (scroll) 
boutonHaut.addEventListener("click",function(){
    retourneEnHaut();
});
function retourneEnHaut(){
    //scroll 0.0 veut dire: horizon && vertical
    window.scrollTo(0,0);
}
/* Affichage du bouton retour en haut*/
boutonHaut.style.display = "none";
/*Lorsque qu'un scrool est réalisé sur la fenetre, on appelle la fonction afficheBoutonHaut */
window.onscroll = function() {afficheBoutonHaut(boutonHaut)};
function afficheBoutonHaut(boutonHaut) {
    if (document.documentElement.scrollTop > 250) {
        boutonHaut.style.display = "block";
    }
    else{
        boutonHaut.style.display = "none";
    }
}





////// Gestion des formulaires MonCompte 
if(formValidPass != null){
    formValidPass.addEventListener("click",function(event){

        // on test si il y a une erreur
        validSomething(event, nouveauMotPasse, regexMotDePasse, erreurNouveauMotPasse, "Mot de passe");
        validSomething(event, confirmNouveauMotPasse, regexMotDePasse, erreurConfirNouveauMotPasse, " Nouveau mot de passe");

        // on test si les champs sont identique
        validIdentique(event, nouveauMotPasse, confirmNouveauMotPasse, erreurConfirNouveauMotPasse, "Mot de passe saisie");
    });
}
if(formValidMonCompte != null)
{
    formValidMonCompte.addEventListener("click",function(event){
        //il doit absoloument cocher un bouton  
       validCivilite(event, civiliteMonsieur, civiliteMadame, erreurCiviliteCompte, "Civilité");
   
       validSomething(event, nomCompte, regexNomPrenom, erreurNomCompte, "Nom");
       validSomething(event, prenomCompte, regexNomPrenom, erreurPrenomCompte, "Prénom");
       validSomething(event, emailCompte, regexMail, erreurEmailCompte, "Email");
       validSomething(event, mobileCompte, regexTelephone, erreurMobileCompte, "Mobile");
   
       //on verifier le format mais la valeur a le droit d'être vide
       validSomethingVideAutorise(event, telephoneCompte, regexTelephone, erreurFixeCompte, "Fixe");
   
       // le champs accepte d'être vide 
       validSomethingNonVide(event, adresseCompte, erreurAdresseCompte, "Adresse");
   
       validSomething(event, dateNaissanceCompte, regexDate, erreurDateNaissanceCompte, "Date de naissance");
       
   });
}



////// Gestion du slider Coup de coeur 
if(imgSlider != null)
{
    //on initialise le slider sur la première image
    imgSlider.src=tabImgSlider[numImgSlider];
    //tourne tt seul
    setInterval("nextImage()", 4000);
}
if(gauche != null)
{
    // abonne element clickable a gauche
    gauche.addEventListener('click', function() {
        previousImage();
    });
}
if(droite != null)
{
    // abonne element clickable a droite
    droite.addEventListener('click', function() {
        nextImage();
    });
}
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





////// Gestion de l'affichage des nouveautés 
function afficheNouveaute(imgs) {
    var etendreImg = document.getElementsByClassName("etendreImg");
    var imgText = document.getElementsByClassName("imgtext");
    etendreImg[0].src = imgs.src;
    imgText[0].innerHTML = imgs.alt;
    etendreImg[0].parentElement.style.display = "block";
}





////// Fonction de recherche sur l'API BAN 
function search(){
    let adresse = document.getElementById("adresseCreer").value

    if(adresse != "")
    {
        //On génère l'autocomplétion sur le champ adresse
        $("#adresseCreer").autocomplete({
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


//Fonction appel API youtube pour la page Atelier 
function onYouTubeIframeAPIReady() {
    player1 = new YT.Player('player1', {
        height: '143',
        width: '255',
        videoId: 'GwYVr1ZFb-8',
        events: {}
    });
    

    player2 = new YT.Player('player2', {
        height: '143',
        width: '255',
        videoId: 'VVrG8KhDwHU',
        events: {}
    });
    player3 = new YT.Player('player3', {
        height: '143',
        width: '255',
        videoId: 'ydmlTbi6hdM',
        events: {}
    });
    player4 = new YT.Player('player4', {
        height: '143',
        width: '255',
        videoId: 'EA-RkfWvZPk',
        events: {}
    });
}



////// Fonction de validation des formulaires
//VALIDE LE CHAMPS CIVILITE
function validCivilite(event, element1, element2, output, prefix){
    output.textContent = prefix + " manquant(e)";
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
function validIdentique(event, element1, element2, output, prefix)
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
function validationCheckbox(event,element,output,prefix){
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