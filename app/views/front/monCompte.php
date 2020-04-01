<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Mon compte">
    <meta name="description" content="Mon compte">
    <meta name="title" content="Notre bibliothèque en ligne">
    <meta http-equiv="expires" content="43200" />

    <title> Mon compte - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/moncompte.css">
   
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>

        <?php require_once("./app/views/layout/header.php"); ?>

        <main class="monCompte">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianeMonCompte" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Mon compte
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- MON COMPTE -->
            <section class="conteneurMonCompte">
                <h1>
                    Mon compte 
                </h1>
                <h2>
                    Mes informations personnelle 
                </h2>
                <!-- NOM  -->
                <article class="articleCompte">
                    <h3>
                        Votre nom
                    </h3>
                    <p class="champsCompte">
                        Lemoine
                    </p>
                </article>
                <!-- PRENOM  -->
                <article class="articleCompte">
                    <h3>
                        Votre prénom
                    </h3>
                    <p class="champsCompte">
                        Gwénola
                    </p>
                </article>
                <!-- EMAIL  -->
                <article class="articleCompte">
                    <h3>
                        Votre E-mail
                    </h3>
                    <p class="champsCompte">
                        chaigwen@hotmail.fr
                    </p>
                </article>
                <!-- TEL MOBILE  -->
                <article class="articleCompte">
                    <h3>
                        Votre téléphone mobile
                    </h3>
                    <p class="champsCompte">
                        06-10-43-32-49
                    </p>
                </article>
                <!-- TEL FIXE  -->
                <article class="articleCompte">
                    <h3>
                        Votre téléphone fixe
                    </h3>
                    <p class="champsCompte">
                        09-45-95-87-85
                    </p>
                </article>
                <!-- ADRESSE  -->
                <article class="articleCompte">
                    <h3>
                        Votre adresse
                    </h3>
                    <p class="champsCompte">
                        Rue du peuplier
                    </p>
                </article>
                <!-- DATE NAISSANCE  -->
                <article class="articleCompte">
                    <h3>
                        Votre date de naissance 
                    </h3>
                    <p class="champsCompte">
                        13/10/1981
                    </p>
                </article>

                <!-- BOUTON ENREGISTRE OU RETOUR  -->
                <div class="divcontenuBouton">
                    <p class="bouton" >
                        <input class="btnCompteModifier" id="compteModifier" type="submit" value="Modifier">
                    </p>
                </div>
            </section>

            <!-- MON COMPTE MODIFIER -->
            <section class="conteneurMonCompteModifier">
                <form id="formCompte" method="POST" action="#">
                    <h1>
                        Mon compte
                    </h1> 
                    <h2>
                        Modifier mes informations personnelle
                    </h2>
                    <!-- CIVILITE  -->
                    <article class="compteCivilite">
                        <input type="radio" name="Civilite" value="monsieur" id="monsieur">
                        <label for="monsieur" class="petit">M</label>
                        <input type="radio" name="Civilite" value="madame" id="madame">
                        <label for="madame" class="petit">Mme</label>
                    </article> 
                    <!-- NOM  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="nom">Votre nom*</label>
                        <input type="text" name="nom" id="nom"  class="champsCompteModifier" value="Lemoine" required="required"> 
                        <span id="erreurNom"></span>
                    </article>

                    <!-- PRENOM  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="prenom">Votre prénom*</label>
                        <input type="text" name="prenom" id="prenom" class="champsCompteModifier" value="Gwénola" required="required"><br>
                        <span id="erreurPrenom"></span> 
                    </article>

                    <!-- E-MAIL  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="email">Votre email*</label>
                        <input type="email" name="email" id="email"  class="champsCompteModifier" value="chaigwen@hotmail.fr"  required="required"><br> 
                        <span id="erreurEMail"></span>
                    </article>

                    <!-- TELEPHONE MOBILE  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="mobile">Votre téléphone mobile</label>
                        <input type="tel" name="mobile" id="Mobile" class="champsCompteModifier" value="06-10-43-32-49" required="required"/><br> 
                        <span id="errorMobile"></span>
                    </article>

                    <!-- TELEPHONE FIXE  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="fixe">Votre téléphone fixe</label>
                        <input type="tel" name="fixe" id="fixe"  class="champsCompteModifier" value="09-45-95-87-85" required="required"/><br> 
                        <span id="errorFixe"></span>
                    </article>

                    <!-- ADRESSE  -->
                    <article id="" class="divContenuCompte">
                        <label class="labelAdresse" for="adresse">Votre adresse*</label>
                        <input type="text" name="adresse" id="adresse" class="champsCompteModifier" value="Rue du peulier" required="required" />
                        <span id="erreurAdresse"></span>
                    </article>

                    <!-- DATE DE NAISSANCE  -->
                    <article id="" class="divContenuCompte">
                        <label class="labelAdresse" for="date">Votre date de naissance</label>
                        <input type="text" name="dateNaissance" id="dateNaissance" class="champsCompteModifier" value="13/10/1981" required="required"/>
                        <span id="erreurDateNaissance"></span>
                    </article>

                    <!-- BOUTON ENREGISTRER OU RETOUR  -->
                    <div class="divcontenuBouton">
                        <p class="bouton" >
                            <input class="btnCompteEnregistrer" id="compteEnregistrer" type="submit" value="Enregistrer">
                            <input class="btnCompteRetour" id="compteRetour" type="submit" value="Retour">
                        </p>
                        <p>
                            * champ obligatoire
                        </p>
                    </div>
                </form>
            </section>
            <!-- CONTENEUR MODIFIER LE MOT DE PASSE  -->
            <section class="conteneurCompteMotPass">
            <h2>
                Modifier mon mot de passe
            </h2>

            <!-- ANCIEN MOT DE PASSE  -->
            <article id="" class="divContenuCompte">
                <label class="labelAdresse" for="ancienMotPasse">Entrée votre ancien mot de passe</label>
                <input type="text" name="ancienMotPasse" id="ancienMotPasse" class="champsCompteModifier" value="Entrée votre ancien mot de passe" required="required"/>
                <span id="erreurAncienMotPasse"></span>
            </article>

            <!-- NOUVEAU MOT DE PASSE  -->
            <article id="" class="divContenuCompte">
                <label class="labelAdresse" for="nouveauMotPasse">Entrée votre nouveau mot de passe</label>
                <input type="text" name="nouveauMotPasse" id="nouveauMotPasse" class="champsCompteModifier" value="Entrée votre nouveau mot de passe" required="required"/>
                <span id="erreurNouveauMotPasse"></span>
            </article>

            <!-- CONFIRME NOUVEAU MOT DE PASSE  -->
            <article id="" class="divContenuCompte">
                <label class="labelAdresse" for="confirNouveauMotPasse">Confirmé votre nouveau mot de passe</label>
                <input type="text" name="confirNouveauMotPasse" id="confirNouveauMotPasse" class="champsCompteModifier" value="Entrée votre nouveau mot de passe" required="required"/>
                <span id="erreurConfirNouveauMotPasse"></span>
            </article>

             <!-- BOUTON ENREGISTRE OU RETOUR  -->
             <div class="divcontenuBouton">
                <p class="bouton" >
                    <input class="btnCompteEnregistrer" id="compteEnregistrer" type="submit" value="Enregistrer">
                    <input class="btnCompteRetour" id="compteRetour" type="submit" value="Retour">
                </p>
                <p>
                    * champ obligatoire
                </p>
            </div>
            </section>
        </main> 

       
        
        <?php require_once("./app/views/layout/footer.php") ?> 

        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/header.js"></script>
        <script type="text/javascript" src="./../app/public/js/sliderCoupDeCoeur.js"></script>

        <!--class active-->
        <script type="text/javascript">
            menuActive(1);
        </script>

    </body>

</html>