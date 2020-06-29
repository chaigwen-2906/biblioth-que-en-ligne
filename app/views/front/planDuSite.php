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

    <title> Plan du site - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="app/public/css/header.css">
    <link rel="stylesheet" href="app/public/css/footer.css">
    <link rel="stylesheet" href="app/public/css/planDuSite.css"> -->
   
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>

        <?php require_once("app/views/layout/header.php"); ?>

        <main class="planDuSite">
            <!-- FILS D'ARIANE  -->
            <div class ="filArianePlanDuSite" >
                <a href="./front-home"> 
                    Accueil >
                </a>
                    Plan du site
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- CONTENEUR DE PLAN DU SITE -->
            <section class="contenuPlanDuSite">
                <h1>
                    Le plan du site 
                </h1>
                <ul>
                    <li><a href="./front-home">Accueil</a>
                        <ul>
                            <li><a href="./front-coupDeCoeurs">Coup de coeurs</a></li>
                            <li><a href="./front-nouveaute">Nouveautées</a></li>
                            <li><a href="./front-atelier">Ateliers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">S'identifier</a></li>
                    <li><a href="#">Creez votre compte</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="./front-mentionsLegales">Mentions Légales</a></li>
                    <li><a href="./front-conditionsGenerales">Conditions générales</a></li>
                    <li><a href="./front-rgpd">RGPD</a></li>
                    <li><a href="./front-planDuSite">Plan du sîte</a></li>
                </ul>
            </section>
        </main>



        
        <?php require_once("app/views/layout/footer.php") ?> 

    </body>

</html>