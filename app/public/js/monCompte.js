/*--------------------CREATION DE TEST AVANT ENVOIE DE FORMULAIRE MON COMPTE----------------------------------*/
let formValidMonCompte = document.getElementById("compteEnregistrer");

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

// on gére le mot de passes
let formValidPass = document.getElementById("comptePassEnregistrer");

formValidPass.addEventListener("click",function(event){

    // on test si il y a une erreur
    validSomething(event, nouveauMotPasse, PassValid, erreurNouveauMotPasse, "Mot de passe");
    validSomething(event, confirmNouveauMotPasse, PassValid, erreurConfirNouveauMotPasse, " Nouveau mot de passe");

    // on test si les champs sont identique
    validIdentique(event, nouveauMotPasse, confirmNouveauMotPasse, erreurConfirNouveauMotPasse, "Mot de passe saisie");
});

