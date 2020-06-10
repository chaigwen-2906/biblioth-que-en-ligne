window.onload=function(){let imageDeFond=document.querySelector(".imgDeFond");if(imageDeFond!=null){let imageHeight=imageDeFond.height;let imageCitation=document.querySelector(".citation");if(imageCitation!=null){imageCitation.style.height=imageHeight+"px"}}};$(function(){$("#divListFAQ").accordion({heightStyle:"content"})});$(function(){$("#dateCreer").datepicker();$("#dateCreer").datepicker("option","dateFormat","dd/mm/yy");$("#dateCreer").datepicker("option","showAnim","clip");$("#dateCreer").datepicker("option","duration","slow")});let regexNomPrenom=/^[a-zA-ZéèîïÉÈÎÏ]{1,}[a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;let regexMail=/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,5}$/;let regexTelephone=/^(\d\d){5}$/;let regexMotDePasse=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;let regexDate=/^[0-9]{2}[/]{1}[0-9]{2}[/]{1}[0-9]{4}$/;let boutonAccepterCookie=document.getElementById("boutonAccepterCookie");let boutonFaq=document.getElementById("boutonFaq");let fermerModalFaq=document.getElementById("fermerModalFaq");let boutonSidentifier=document.getElementById("boutonSidentifier");let boutonFermerModalConnection=document.getElementById("fermerModalConnection");let testIdentifier=document.getElementById("boutonEnvoyerIdentifier");let boutonBesoinCompte=document.getElementById("boutonBesoinCompte");let boutonCreerCompte=document.getElementById("boutonCreerCompte");let fermerModalCreerCompte=document.getElementById("fermerModalCreerCompte");let formValidCreer=document.getElementById("boutonEnvoyerCreez");let boutonHaut=document.getElementById("retourHaut");let formValidPass=document.getElementById("comptePassEnregistrer");let formValidMonCompte=document.getElementById("compteEnregistrer");let tabImgSlider=["./../app/public/image/slider/biblio.jpg","./../app/public/image/slider/la_biblio.jpg","./../app/public/image/slider/lecture.png","./../app/public/image/slider/livre_magic.png","./../app/public/image/slider/livre.png"];let numImgSlider=0;let imgSlider=document.getElementById("imgSlider");let gauche=document.getElementById("gauche");let droite=document.getElementById("droite");
boutonAccepterCookie.addEventListener("click",function(){sessionStorage.setItem('AcceptCookie', 'ok');masquerBandeauCookies()});function masquerBandeauCookies(){let divBandeauCookies=document.getElementById("barreCookie");divBandeauCookies.style.display="none";}if(sessionStorage.getItem('AcceptCookie')){if(sessionStorage.getItem('AcceptCookie')=='ok'){masquerBandeauCookies()}};function menuActive(indexActive){let conteneurMenu=document.getElementById("conteneurMenu");let tabElementLi=conteneurMenu.getElementsByClassName("nav-item");tabElementLi[indexActive].className+=" active";let conteneurMenuBurger=document.getElementById("conteneurMenuBurger");let tabElementLiBurger=conteneurMenuBurger.getElementsByClassName("nav-item");tabElementLiBurger[indexActive].className+=" active"};$("#boutonBurger").click(function(){if($(".navMenuBurger").is(":visible")){$(".navMenuBurger").hide("slow")}else{$(".navMenuBurger").show("slow")}});
$(".selectionLivres").hide();$(".boutonLoupe").click(function(){if($(".selectionLivres").is(":visible")){$(".selectionLivres").hide("slow")}else{$(".selectionLivres").show("slow")}});function verificationRecherche(){let selectCategorie=document.getElementById("selectCategorie");let choix=selectCategorie.selectedIndex;let valeurCategorie=selectCategorie.options[choix].value;let champRecherche=document.getElementById("champRecherche").value;if(valeurCategorie==0&&champRecherche==""){alert("Veuillez choisir une catégorie et / ou saisir du texte !")}else{window.document.formRecherche.submit()}};boutonFaq.addEventListener("click",function(e){e.preventDefault();$("#modalFaq").show("slow")});fermerModalFaq.addEventListener("click",function(e){e.preventDefault();$("#modalFaq").hide("slow")});if(boutonSidentifier!=null){boutonSidentifier.addEventListener("click",function(e){e.preventDefault();document.getElementById('erreurMailIdentifier').textContent="";document.getElementById('erreurMotDePasseIdentifier').textContent="";document.getElementById('erreurPostFormulaireConnexion').textContent="";document.getElementById("motDePasseIdentifier").value="";$("#modalConnection").show("slow")});}boutonFermerModalConnection.addEventListener("click",function(e){e.preventDefault();$("#modalConnection").hide("slow")});testIdentifier.addEventListener("click",function(event){validSomething(event,emailIdentifier,regexMail,erreurMailIdentifier,"email");validSomething(event,motDePasseIdentifier,regexMotDePasse,erreurMotDePasseIdentifier,"mot de passe")});boutonBesoinCompte.addEventListener("click",function(){$("#modalConnection").hide("slow");$("#modalCreerCompte").show("slow")});if(boutonCreerCompte!=null){boutonCreerCompte.addEventListener("click",function(e){e.preventDefault();document.getElementById('erreurCiviliteCreer').textContent="";document.getElementById('erreurPrenomCreer').textContent="";document.getElementById('erreurNomCreer').textContent="";document.getElementById('erreurMailCreer').textContent="";document.getElementById('erreurMobileCreer').textContent="";document.getElementById('erreurTelephoneCreer').textContent="";document.getElementById('erreurMotDePasseCreer').textContent="";document.getElementById('erreurMotDePasseCreerConfirm').textContent="";document.getElementById('erreurAdresseCreer').textContent="";document.getElementById('erreurDateCreer').textContent="";document.getElementById('erreurPostFormulaireCreer').textContent="";document.getElementById("civiliteMRCreer").checked=!1;document.getElementById("civiliteMMECreer").checked=!1;document.getElementById("numeroAbonneCreer").value="";document.getElementById("nomCreer").value="";document.getElementById("prenomCreer").value="";document.getElementById("emailCreer").value="";document.getElementById("mobileCreer").value="";document.getElementById("telephoneCreer").value="";document.getElementById("motDePasseCreer").value="";document.getElementById("motDePasseCreerConfirm").value="";document.getElementById("adresseCreer").value="";document.getElementById("dateCreer").value="";document.getElementById("conditionsUtilisation").checked=!1;$("#modalCreerCompte").show("slow")});}fermerModalCreerCompte.addEventListener("click",function(e){e.preventDefault();$("#modalCreerCompte").hide("slow")});formValidCreer.addEventListener("click",function(event){validCivilite(event,civiliteMRCreer,civiliteMMECreer,erreurCiviliteCreer,"Civilité");validSomething(event,nomCreer,regexNomPrenom,erreurNomCreer,"Nom");validSomething(event,prenomCreer,regexNomPrenom,erreurPrenomCreer,"Prénom");validSomething(event,emailCreer,regexMail,erreurMailCreer,"Email");validSomething(event,mobileCreer,regexTelephone,erreurMobileCreer,"Mobile");validSomethingVideAutorise(event,telephoneCreer,regexTelephone,erreurTelephoneCreer,"Fixe");validSomethingNonVide(event,adresseCreer,erreurAdresseCreer,"Adresse")
validSomething(event,dateCreer,regexDate,erreurDateCreer,"Date");validSomething(event,motDePasseCreer,regexMotDePasse,erreurMotDePasseCreer,"Mot de passe");validSomething(event,motDePasseCreerConfirm,regexMotDePasse,erreurMotDePasseCreerConfirm,"Mot de passe");validIdentique(event,motDePasseCreer,motDePasseCreerConfirm,erreurMotDePasseCreerConfirm,"Mot de passe saisie");validationCheckbox(event,conditionsUtilisation,errorCheckbox,"Conditions utilisation")});
boutonHaut.addEventListener("click",function(){retourneEnHaut()});function retourneEnHaut(){window.scrollTo(0,0);}boutonHaut.style.display="none";window.onscroll=function(){afficheBoutonHaut(boutonHaut)};function afficheBoutonHaut(boutonHaut){if(document.documentElement.scrollTop>250){boutonHaut.style.display="block";}else{boutonHaut.style.display="none"}};
if(formValidPass!=null){formValidPass.addEventListener("click",function(event){validSomething(event,nouveauMotPasse,regexMotDePasse,erreurNouveauMotPasse,"Mot de passe");validSomething(event,confirmNouveauMotPasse,regexMotDePasse,erreurConfirNouveauMotPasse,"Nouveau mot de passe");validIdentique(event,nouveauMotPasse,confirmNouveauMotPasse,erreurConfirNouveauMotPasse,"Mot de passe saisie")})}if(formValidMonCompte!=null){formValidMonCompte.addEventListener("click",function(event){validCivilite(event,civiliteMonsieur,civiliteMadame,erreurCiviliteCompte,"Civilité");validSomething(event,nomCompte,regexNomPrenom,erreurNomCompte,"Nom");validSomething(event,prenomCompte,regexNomPrenom,erreurPrenomCompte,"Prénom");validSomething(event,emailCompte,regexMail,erreurEmailCompte,"Email");validSomething(event,mobileCompte,regexTelephone,erreurMobileCompte,"Mobile");validSomethingVideAutorise(event,telephoneCompte,regexTelephone,erreurFixeCompte,"Fixe");validSomethingNonVide(event,adresseCompte,erreurAdresseCompte,"Adresse");validSomething(event,dateNaissanceCompte,regexDate,erreurDateNaissanceCompte,"Date de naissance")})};
if(imgSlider!=null){imgSlider.src=tabImgSlider[numImgSlider];setInterval("nextImage()",4000);}if(gauche!=null){gauche.addEventListener('click',function(){previousImage()})}if(droite!=null){droite.addEventListener('click',function(){nextImage()})}function nextImage(){numImgSlider=numImgSlider+1;if(numImgSlider==5){numImgSlider=0;}imgSlider.src=tabImgSlider[numImgSlider];}function previousImage(){numImgSlider=numImgSlider-1;if(numImgSlider==-1){numImgSlider=4;}imgSlider.src=tabImgSlider[numImgSlider]};
function afficheNouveaute(imgs){var etendreImg=document.getElementsByClassName("etendreImg");var imgText=document.getElementsByClassName("imgtext");etendreImg[0].src=imgs.src;imgText[0].innerHTML=imgs.alt;etendreImg[0].parentElement.style.display="block"};
function search(){let adresse=document.getElementById("adresseCreer").value;if(adresse!=""){$("#adresseCreer").autocomplete({source:function(request,response){$.ajax({url:'https://api-adresse.data.gouv.fr/search/?',data:{q:adresse},dataType:"json",success:function(data){response($.map(data.features,function(item){console.log(item.properties.label);return{label:item.properties.label,value:item.properties.label}}))}})}})}};
function onYouTubeIframeAPIReady(){player1=new YT.Player('player1',{height:'143',width:'255',videoId:'GwYVr1ZFb-8',events:{}});player2=new YT.Player('player2',{height:'143',width:'255',videoId:'VVrG8KhDwHU',events:{}});player3=new YT.Player('player3',{height:'143',width:'255',videoId:'ydmlTbi6hdM',events:{}});player4=new YT.Player('player4',{height:'143',width:'255',videoId:'EA-RkfWvZPk',events:{}})}
function validCivilite(event,element1,element2,output,prefix){output.textContent=prefix+" manquant(e)";if(!element1.checked&&!element2.checked){event.preventDefault();output.textContent=prefix+" manquant(e)";output.style.color="red";}else{output.textContent="";}}function validSomething(event,element,nomValid,output,prefix){if(element.validity.valueMissing){event.preventDefault();output.textContent=prefix+" manquant(e)";output.style.color="red";}else if(nomValid.test(element.value)===false){event.preventDefault();output.textContent="format incorrect";output.style.color="red";}else{output.textContent="";}}function validSomethingVideAutorise(event,element,nomValid,output,prefix){if(element.value!=""){if(nomValid.test(element.value)===false){event.preventDefault();output.textContent="format incorrect";output.style.color="red";}else{output.textContent="";}}else{output.textContent="";}}function validSomethingNonVide(event,element,output,prefix){if(element.validity.valueMissing){event.preventDefault();output.textContent=prefix+" manquant(e)";output.style.color="red";}}function validIdentique(event,element1,element2,output,prefix){if(!(element1.value==element2.value)){event.preventDefault();output.textContent=prefix+"différent";output.style.color="red";}else{output.textContent="";}}function validationCheckbox(event,element,output,prefix){if(!element.checked){event.preventDefault();output.textContent=prefix+" manquant(e)";output.style.color="red";}else{output.textContent=""}};