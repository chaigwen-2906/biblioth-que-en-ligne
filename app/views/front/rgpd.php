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

    <title> Rgpd - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/rgpd.css">
   
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>


        <?php require_once("./app/views/layout/header.php"); ?>


        <main class="rgpd">
            <!-- FILS D'ARIANE  -->
            <div class ="filArianeRgpd" >
                <a href="./home"> 
                    Accueil >
                </a>
                    rgpd
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- CONTENEUR RGPD  -->
            <section class="contenuRgpd">
                <h1>
                    Traitement de données à caractère personnel
                </h1>
                <p>
                    1. Conformément à l'article 34 de la loi « Informatique et Libertés » n° 78-17 du 6 janvier 1978, modifiée,
                    notre site internet a fait l’objet de déclaration auprès de la Commission Nationale Informatique
                    et Libertés, numéro xxxxxxx en date du 13 mars 2015.<br>
                </p>
                <p>
                    2. La bibliothèque s’engage à prendre toutes les mesures nécessaires, au regard des moyens techniques dont elle
                    dispose, permettant de garantir la sécurité et la confidentialité des informations fournies par l’utilisateur.<br>
                </p>
                <p>
                    3. L’usager dispose d’un droit d’accès, de modification, de rectification et de suppression des données qui le 
                    concernent (art. 34 de la loi " Informatique et Libertés "). Pour l’exercer, il peut solliciter la bibliothèque par 
                    l’intermédiaire du lien "Nous contacter" de la page d’accueil au travers des coordonnées affichées ou du formulaire 
                    à sa disposition dénommé « vous avez des difficultés avec le portail ? ». Des courriers peuvent être également êtes 
                    adressés à « xxxxxxxx- xxxxxxxx – xxxxxxxxx- xxxxxxx – xxxxxx xxxxx ».<br>
                </p>
                <p>   
                    4. Les données saisies par l’usager sont à l’usage exclusif des services de la xxxxxx en charge de traiter les 
                    demandes qu’il a formulées.<br>
                </p>
                <p>  
                    5. La bibliothèque s'engage à n'opérer aucune commercialisation des informations et documents transmis par l'usager et 
                    à ne pas les communiquer à des tiers, en dehors des cas prévus par la loi ou dans le cas d'une démarche faite à 
                    votre demande
                </p>
            </section>
        </main>

            
        <?php require_once("./app/views/layout/footer.php") ?> 

        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/header.js"></script>

    </body>

</html>