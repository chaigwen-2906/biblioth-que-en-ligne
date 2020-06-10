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

    <title> Mot de passe oublier - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/passOublier.css"> -->
   
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>

        <?php require_once("./app/views/layout/header.php"); ?>

        <main class="passOublier">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianePassOublier" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Mot de passe oublier
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- PAGE MOT DE PASSE OUBLIER-->
            <h1>
                Mot de passe oublier ?
            </h1>
            <p>
                Cliquez sur le bouton envoyer, et un nouveau mot de passe vous sera envoyé dans 
                votre boite e-mail.
                A bientôt.
            </p>
            <section>
                <form class="conteneurPassOublier" method="POST"  action="./<?= $this->nomPage;?>?action2=motDePasseOublier">
                    <label class="labelAdresse" for="adresseMail">Votre adresse e-mail : </label>
                    <input class="champsPass" name="adresseMail" id="adresseMail" placeholder="Entrer votre adresse e-mail">    
                    <input type="submit" class="monBoutton" name="adresseMailOublier" value="Envoyer">
                </form>
            </section>
        </main> 
        
        <?php require_once("./app/views/layout/footer.php") ?> 

    </body>

</html>