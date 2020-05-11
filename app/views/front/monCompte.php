<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?= $this->listMetas['keywords']; ?>">
    <meta name="description" content="<?= $this->listMetas['description']; ?>">
    <meta name="title" content="<?= $this->listMetas['title']; ?>">
    <meta http-equiv="expires" content="43200" />

    <title> Mon compte - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/monCompte.css"> -->
   
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
                            <?= $monCompte['nom']; ?>
                        </p>
                    </article>
                    <!-- PRENOM  -->
                    <article class="articleCompte">
                        <h3>
                            Votre prénom
                        </h3>
                        <p class="champsCompte">
                            <?= $monCompte['prenom']; ?>
                        </p>
                    </article>
                    <!-- EMAIL  -->
                    <article class="articleCompte">
                        <h3>
                            Votre E-mail
                        </h3>
                        <p class="champsCompte">
                            <?= $monCompte['email']; ?>
                        </p>
                    </article>
                    <!-- TEL MOBILE  -->
                    <article class="articleCompte">
                        <h3>
                            Votre téléphone mobile
                        </h3>
                        <p class="champsCompte">
                            <?= $monCompte['telephoneMobile']; ?>
                        </p>
                    </article>
                    <!-- TEL FIXE  -->
                    <article class="articleCompte">
                        <h3>
                            Votre téléphone fixe
                        </h3>
                        <p class="champsCompte">
                            <?= $monCompte['telephoneFixe']; ?>
                        </p>
                    </article>
                    <!-- ADRESSE  -->
                    <article class="articleCompte">
                        <h3>
                            Votre adresse
                        </h3>
                        <p class="champsCompte">
                            <?= $monCompte['adresse']; ?>
                        </p>
                    </article>
                    <!-- DATE NAISSANCE  -->
                    <article class="articleCompte">
                        <h3>
                            Votre date de naissance 
                        </h3>
                        <p class="champsCompte">
                            <?= $monCompte['dateDeNaissance']; ?>
                        </p>
                
                    </article>

                <!-- BOUTON ENREGISTRE OU RETOUR  -->
                <div class="boutonModifier">
                    <a href="./<?= $this->nomPage;?>?action2=modifier" class="monBoutton">Modifier</a>
                </div>
            </section>

                     
            <!-- MON COMPTE MODIFIER -->
            <section class="conteneurMonCompteModifier">
                <form id="formCompte" method="POST" action="./<?= $this->nomPage;?>?action2=enregistrerInfosPers">
                    <h1>
                        Mon compte
                    </h1> 
                    <h2>
                        Modifier mes informations personnelle
                    </h2>
                    <!-- CIVILITE  -->
                    <article class="compteCivilite">
                        <input type="radio" name="Civilite" value="monsieur" id="civiliteMonsieur" <?php if($monCompte['civilite'] == "monsieur"){echo "checked";} ?>>
                        <label for="monsieur" class="petit">M</label>
                        <input type="radio" name="Civilite" value="madame" id="civiliteMadame" <?php if($monCompte['civilite'] == "madame"){echo "checked";} ?>>
                        <label for="madame" class="petit">Mme</label>
                        <span id="erreurCiviliteCompte"></span>
                    </article> 
                    <!-- NOM  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="nom">Votre nom</label>
                        <input type="text" name="nom" id="nomCompte"  class="champsCompteModifier" value="<?= $monCompte['nom']; ?>" required="required"> 
                        <span id="erreurNomCompte"></span>
                    </article>

                    <!-- PRENOM  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="prenom">Votre prénom</label>
                        <input type="text" name="prenom" id="prenomCompte" class="champsCompteModifier" value="<?= $monCompte['prenom']; ?>" required="required"><br>
                        <span id="erreurPrenomCompte"></span> 
                    </article>

                    <!-- E-MAIL  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="email">Votre email</label>
                        <input type="email" name="email" id="emailCompte"  class="champsCompteModifier" value="<?= $monCompte['email']; ?>"  required="required"><br> 
                        <span id="erreurEmailCompte"></span>
                    </article>

                    <!-- TELEPHONE MOBILE  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="mobile">Votre téléphone mobile</label>
                        <input type="tel" name="mobile" id="mobileCompte" class="champsCompteModifier" value="<?= $monCompte['telephoneMobile']; ?>" required="required" /><br> 
                        <span id="erreurMobileCompte"></span>
                    </article>

                    <!-- TELEPHONE FIXE  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="fixe">Votre téléphone fixe</label>
                        <input type="tel" name="fixe" id="telephoneCompte"  class="champsCompteModifier" value="<?= $monCompte['telephoneFixe']; ?>" required="required"/><br> 
                        <span id="erreurFixeCompte"></span>
                    </article>

                    <!-- ADRESSE  -->
                    <article id="" class="divContenuCompte">
                        <label class="labelAdresse" for="adresse">Votre adresse</label>
                        <input type="text" name="adresse" id="adresseCompte" class="champsCompteModifier" value="<?= $monCompte['adresse']; ?>" required="required" />
                        <span id="erreurAdresseCompte"></span>
                    </article>

                    <!-- DATE DE NAISSANCE  -->
                    <article id="" class="divContenuCompte">
                        <label class="labelAdresse" for="date">Votre date de naissance</label>
                        <input type="text" name="dateNaissance" id="dateNaissanceCompte" class="champsCompteModifier" value="<?= $monCompte['dateDeNaissance']; ?>" required="required"/>
                        <span id="erreurDateNaissanceCompte"></span>
                    </article>

                    <!-- BOUTON ENREGISTRER OU RETOUR  -->
                    <div>
                        <p class="boutonEnregistrer" >
                            <input class="monBoutton" id="compteEnregistrer" type="submit" value="Enregistrer">
                            <a class="monBoutton" href="./monCompte">Retour</a>
                        </p>
                    </div>
                </form>
            </section>
            <!-- CONTENEUR MODIFIER LE MOT DE PASSE  -->
            <section class="conteneurCompteMotPass">
                <form id="formCompte" method="POST" action="./<?= $this->nomPage;?>?action2=enregistrerPassword">
                    <h2>
                        Modifier mon mot de passe
                    </h2>

                    <!-- NOUVEAU MOT DE PASSE  -->
                    <article  class="divContenuCompte">
                        <label class="labelAdresse" for="nouveauMotPasse">Entrée votre nouveau mot de passe</label>
                        <input type="text" name="nouveauMotPasse" id="nouveauMotPasse" class="champsCompteModifier" value="" placeholder="Entrée votre nouveau mot de passe" required/>
                        <span id="erreurNouveauMotPasse"></span>
                    </article>

                    <!-- CONFIRME NOUVEAU MOT DE PASSE  -->
                    <article class="divContenuCompte">
                        <label class="labelAdresse" for="confirmNouveauMotPasse">Confirmé votre nouveau mot de passe</label>
                        <input type="text" name="confirNouveauMotPasse" id="confirmNouveauMotPasse" class="champsCompteModifier" value="" placeholder="Entrée votre nouveau mot de passe" required/>
                        <span id="erreurConfirNouveauMotPasse"></span>
                    </article>

                    <!-- BOUTON ENREGISTRE OU RETOUR  -->
                    <div>
                        <p class="boutonEnregistrer" >
                            <input class="monBoutton" id="comptePassEnregistrer" type="submit" value="Enregistrer">
                            <a class="monBoutton" href="./monCompte">Retour</a>
                        </p>
                    </div>
                </form> 
            </section>

            
            
        </main> 

       
        
        <?php require_once("./app/views/layout/footer.php") ?> 

        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/header.js"></script>
        <script type="text/javascript" src="./../app/public/js/monCompte.js"></script>

    </body>

</html>