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

    <title> Détail des atelier - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/detailAtelier.css"> -->
    
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>


        <?php require_once("./app/views/layout/header.php"); ?>

        <main class="detailAtelier">

        <!-- FILS D'ARIANE  -->
        <div class ="filArianeAtelier" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Atelier
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- NOM DE ATELIER -->
            <h1>
                <?= $DetailAtelier['nom']; ?>
            </h1>
            
            <!-- DESCRIPTION ATELIER   -->
            <section class ="sectionDescriptionAtelier">
                <article class="descriptionAtelier">
                    <h2>
                        Description 
                    </h2>
                    <hr separator>
                    <p>
                        <?= $DetailAtelier['description']; ?>
                    </p>
                    <hr separator>
                    <!-- <h2>
                        Contexte de l'animation
                    </h2>
                    <hr separator>
                    <p>
                        <?= $DetailAtelier['contexteAnimation']; ?>
                    </p> -->
                </article>
            </section>
            <!--FIN DESCRIPTION ATELIER -->

            <!-- RESERVATION ATELIER  -->
            <section class="sectionReservationAtelier">
                <article class ="reservationAtelier">
                        <h2>
                            Date de l'atelier
                        </h2>
                        <hr separator>
                        <h3>
                            <?= $DetailAtelier['date']; ?> à <?= $DetailAtelier['heure']; ?>
                            rendez-vous pour l'activité  " <?= $DetailAtelier['nom']; ?>"  d'une capacité 
                            <?= $DetailAtelier['capacite']; ?> personne et à partir <?= $DetailAtelier['age']; ?> ans.
                        </h3>
                </article>
            </section>
            <!--FIN RESERVATION ATELIER  -->

        </main>



            
        <?php require_once("./app/views/layout/footer.php") ?> 

        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/allJavaScriptMin.js"></script>

    </body>

</html>