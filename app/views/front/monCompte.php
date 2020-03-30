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

            <div class="conteneurMonCompte">
                <form id="formCompte">
                    <h1>
                        Mon compte
                    </h1> 
                    <div class="compteCivilite">
                        <input type="radio" name="Civilite" value="monsieur" id="monsieur">
                        <label for="monsieur" class="petit">M</label>
                        <input type="radio" name="Civilite" value="madame" id="madame">
                        <label for="madame" class="petit">Mme</label>
                    </div> 
                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="nom">Nom*</label>
                        <input type="text" name="nom" id="nom" class="inputAdresse"
                            placeholder="Entrer votre nom *" maxlength="20" required="required">
                        <span id="errorNom"></span>
                    </div>
            
                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="prenom">Votre prénom*</label>
                        <input type="text" name="prenom" id="prenom"class="inputAdresse" 
                        placeholder="Entrer votre prénom*" required="required"><br>
                        <span id="errorPrenom"></span> 
                    </div>
                
                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="email">Votre email*</label>
                        <input type="email" name="email" id="e_mail" class="inputAdresse"
                            placeholder="Entrer votre email*" required="required"><br> 
                        <span id="error_Mail"></span>
                    </div>
                    
                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="mobile">Votre téléphone mobile</label>
                        <input type="tel" name="mobile" id="Mobile" class="inputAdresse"
                            placeholder="Entrer votre numéro"required/><br> 
                        <span id="errorMobile"></span>
                    </div>

                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="fixe">Votre téléphone fixe</label>
                        <input type="tel" name="fixe" id="fixe" class="inputAdresse"
                            placeholder="Entrer votre numéro"required/><br> 
                        <span id="errorFixe"></span>
                    </div>
                
                    <div id="" class="divContenuCompte">
                        <label class="labelAdresse" for="adresse">Votre adresse</label>
                        <input type="text" name="adresse" id="adresse" class="inputAdresse"
                            placeholder="Entrer votre adresse" required />
                    </div>
                    
                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="message">Votre message</label>
                        <textarea  name="message" id="message" class="inputAdresse" 
                            placeholder="Entrer votre message"></textarea>  
                    </div>

                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="date">Votre date de naissance</label>
                        <textarea  name="date" id="date" class="inputAdresse" 
                            placeholder="Entrer votre date"></textarea>  
                    </div>
                    <div class="divContenuCompte">
                        <label class="labelAdresse" for="motPasse">Votre mot de passe</label>
                        <textarea  name="motPasse" id="motPasse" class="inputAdresse" 
                            placeholder="Entrer votre mot de passe"></textarea>  
                    </div>
                
                    <div class="divcontenuBouton">
                        <p class="bouton" >
                            <input class="btnCompteValider" id="compteValider" type="submit" value="Envoyer">
                            <input class="btnCompteAnnuler" id="compteAnnuler" type="submit" value="Annuler">
                        </p>
                        <p>
                            * champ obligatoire
                        </p>
                    </div>
                </form>
            </div>
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