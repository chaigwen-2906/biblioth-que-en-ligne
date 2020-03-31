<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Panier">
    <meta name="description" content="Panier">
    <meta name="title" content="Notre bibliothèque en ligne">
    <meta http-equiv="expires" content="43200" />

    <title> Panier - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/panier.css">
   
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>


        <?php require_once("./app/views/layout/header.php"); ?>

        <main class="panier">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianePanier" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Votre Panier
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- SECTION PANIER -->
            <section class="sectionCommande">
                <div class="commande">
                    <h1>
                        Mes commandes à confirmer
                    </h1>
                    <figure>
                        <img src="./../app/public/image/bouton/poubelle.png" alt="Supprimer" title="Supprimer">
                    </figure>
                </div>

                <!-- BOUTON VALIDER COMMANDE  -->
                <div class="bouton">
                    <a href="./detailLivre?id=" class="rechercheEnSavoirPlus">
                       Valider
                    </a>
                </div>
                <!--FIN BOUTON VALIDER COMMANDE   -->

            </section>
            <!--FIN SECTION PANIER -->

            <!-- CONFIRMER LES COMMANDE -->
            <section class="sectionCommandeConfirmer">
                <div class="commandeConfirmer">
                    <h1>
                        Mes demandes validées
                    </h1>
                </div>
                <!--FIN CONFIRMER LES COMMANDE -->

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