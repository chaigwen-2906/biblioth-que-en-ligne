/////////////////////   CHARGEMENT ONLOAD

//gestion de la taille de l'impage de fond de la home
window.onload = function(){ 
    let imagedefond = document.querySelector(".imgDeFond");
    if(imagedefond != null)
    {
        let imageHeight = imagedefond.height;
        let imagecitation = document.querySelector(".citation");
        if(imagecitation != null)
        {
            imagecitation.style.height = imageHeight+"px";
        }
    }
};

//jquery : création de l'accordéon pour la faq
$( function() {
    
    $( "#divListFAQ" ).accordion({
      heightStyle: "content"
    });
});

//jquery creation du datatime picker pour la date de naissance
$(function() {
    $( "#dateCreez" ).datepicker();
    $( "#dateCreez" ).datepicker( "option", "dateFormat", "dd/mm/yy" );
    $( "#dateCreez" ).datepicker( "option", "showAnim", "clip" );
    $( "#dateCreez" ).datepicker( "option", "duration", "slow" );
});






/////////////////////   DECLARATION DES VARIABLES


// -----regex nom et prenom---------
let nomprenomValid= /^[a-zA-ZéèîïÉÈÎÏ]{1,}[a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
//-----------regex mail-------
let mailValid = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,5}$/;
// ----regex Mobile --------
let telephoneValid = /^(\d\d){5}$/;
//-----regex password--------
let PassValid = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
//-----regex date de naissance---------
let DateValid = /^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/;

//Bouton Accepter Cookie
let BtnCookieAccepter = document.getElementById("BtnCookieAccepter");


//Bouton acces FAQ
let boutonFaq = document.getElementById("boutonFaq");
//Bouton fermeture modal FAQ
let fermerModalFaq = document.getElementById("fermerModalFaq");


//Bouton s'identifier
let boutonSidentifier = document.getElementById("boutonSidentifier");
//Bouton fermeture modal s'identifier
let boutonFermerModalConnection = document.getElementById("fermerModalConnection");
//Bouton valider identification
let testIdentifier= document.getElementById("boutonEnvoyerIdentifier");
//Bouton besoin compte
let btnBesoinCompte = document.getElementById("btnBesoinCompte");


//Bouton créer son compte
let boutonCreerCompte = document.getElementById("boutonCreerCompte");
//Bouton fermeture modal créer compte
let fermerModalCreerCompte = document.getElementById("fermerModalCreerCompte");
//Bouton valider création compte
let formValidCreez = document.getElementById("boutonEnvoyerCreez");


//Bouton Retour en haut (scroll)
let btnHaut = document.getElementById("retourHaut");

//Bouton Valider modif mot de passe de la page monCompte
let formValidPass = document.getElementById("comptePassEnregistrer");
//Bouton Valider modif compte de la page monCompte
let formValidMonCompte = document.getElementById("compteEnregistrer");


//Tableau d'image du slider Coup de coeur
let tabImgSlider = 
[
    "./../app/public/image/slider/biblio.jpg",
    "./../app/public/image/slider/la_biblio.jpg",
    "./../app/public/image/slider/lecture.png",
    "./../app/public/image/slider/livre_magic.png",
    "./../app/public/image/slider/livre.png"
];
//Compteur d'image du slider
let numImgSlider = 0;
//Element html img du slider Coup de coeur
let imgSlider = document.getElementById("imgSlider");
//bouton revenir à l'image précédente
let gauche = document.getElementById("gauche");
//Bouton passer à l'image suivante
let droite = document.getElementById("droite");









/////////////////////   GESTION DES ACTIONS

////// Gestion du bandeau Cookies
BtnCookieAccepter.addEventListener("click",function(){
    sessionStorage.setItem('AcceptCookie', 'ok');
    masquerBandeauCookies();
});
// masque le bandeau 
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
$("#btnBurger").click(function(){
    if($(".navMenuBurger").is(":visible")){
        $(".navMenuBurger").hide("slow");
    }
    else{
        $(".navMenuBurger").show("slow");
    }
});





////// Gestion du Moteur de recherche
$(".selectionLivres").hide();
$(".btnloupe").click(function(){
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
    document.getElementById('errorMailIdentifier').textContent = "";
    document.getElementById('errorMotDePasseIdentifier').textContent = "";
    document.getElementById('erreurPostFormulaireConnexion').textContent = "";
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

    validSomething(event, emailIdentifier, mailValid, errorMailIdentifier, "email");
    validSomething(event, motDePasseIdentifier, PassValid, errorMotDePasseIdentifier, "mot de passe");
});
btnBesoinCompte.addEventListener("click", function(){
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
fermerModalCreerCompte.addEventListener("click",function(e) {
    //On désactive le comportement du lien
    e.preventDefault();

    //On affiche le modalConnection
    $("#modalCreerCompte").hide("slow");
});
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
   
});




////// Gestion du bouton retour en haut (scroll)
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





////// Gestion des formulaires MonCompte
if(formValidPass != null){
    formValidPass.addEventListener("click",function(event){

        // on test si il y a une erreur
        validSomething(event, nouveauMotPasse, PassValid, erreurNouveauMotPasse, "Mot de passe");
        validSomething(event, confirmNouveauMotPasse, PassValid, erreurConfirNouveauMotPasse, " Nouveau mot de passe");

        // on test si les champs sont identique
        validIdentique(event, nouveauMotPasse, confirmNouveauMotPasse, erreurConfirNouveauMotPasse, "Mot de passe saisie");
    });
}
if(formValidMonCompte != null)
{
    formValidMonCompte.addEventListener("click",function(event){
        //il doit absoloument cocher un bouton  
       validCivilite(event, civiliteMonsieur, civiliteMadame, erreurCiviliteCompte, "Civilité");
   
       validSomething(event, nomCompte, nomprenomValid, erreurNomCompte, "Nom");
       validSomething(event, prenomCompte, nomprenomValid, erreurPrenomCompte, "Prénom");
       validSomething(event, emailCompte, mailValid, erreurEmailCompte, "Email");
       validSomething(event, mobileCompte, telephoneValid, erreurMobileCompte, "Mobile");
   
       //on verifier le format mais la valeur a le droit d'être vide
       validSomethingVideAutorise(event, telephoneCompte, telephoneValid, erreurFixeCompte, "Fixe");
   
       // le champs accepte d'être vide 
       validSomethingNonVide(event, adresseCompte, erreurAdresseCompte, "Adresse");
   
       validSomething(event, dateNaissanceCompte, DateValid, erreurDateNaissanceCompte, "Date de naissance");
       
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
function AfficheNouveaute(imgs) {
    var etendreImg = document.getElementsByClassName("etendreImg");
    var imgText = document.getElementsByClassName("imgtext");
    etendreImg[0].src = imgs.src;
    imgText[0].innerHTML = imgs.alt;
    etendreImg[0].parentElement.style.display = "block";
}





////// Fonction de recherche sur l'API BAN
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