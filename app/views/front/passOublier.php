<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Mot de passe oublier">
    <meta name="description" content="Mot de passe oublier">
    <meta name="title" content="Notre bibliothèque en ligne">
    <meta http-equiv="expires" content="43200" />

    <title> Mot de passe oublier - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/passOublier.css">
   
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
                Mots de passe oublier ?
            </h1>
            <div class="divContenuPassOublier">
                <label class="labelAdresse" for="motPasse">Votre mot de passe</label>
                <textarea  name="motPasse" id="motPasse" class="inputAdresse" 
                    placeholder="Entrer votre mot de passe"></textarea>  
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