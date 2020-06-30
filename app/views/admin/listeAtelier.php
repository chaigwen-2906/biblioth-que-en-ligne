<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- je n'index pas cette pas là  -->
        <meta name="robots" content="noindex">
        <meta name="title" content="Notre bibliothèque en ligne">

        <!-- Appel des feuilles de style --/ Calling style sheets-->
        <!-- <link rel="stylesheet" href="app/public/css/admin/gestion.css"> -->
        <link rel="stylesheet" href="app/public/css/admin/stylesAdmin.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>

        <main class="gestion">
                <!--BOUTON RETOUR  -->
                <figure class="retour">
                    <a href="./admin-accueil">
                        <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                        Retour 
                    </a>
                </figure>
                <!-- FIN BOUTON RETOUR  -->

                <!-- TITRE PAGE  -->
                <h1>
                    Gestion des ateliers
                </h1>
                <!-- FIN TITRE PAGE  -->

                <!-- AJOUTE  -->
                <section class="ajout">
                    <a href="./admin-ajoutAtelier">   
                        Ajouter un atelier !!
                    </a>
                </section> 
                <!-- FIN AJOUTE  -->

                <!-- RECHERCHE  -->
                <section class="rechercheLivre" >
                    <label for="champRecherche"> Recherche sur le nom : </label> 
                    <input type="text" id="champRecherche">
                </section> 
                <!-- FIN RECHERCHE -->

                <!-- DETAIL   -->
                <?php foreach ($listeAtelier as $unAtelier) {?>

                    <section class="detail">
                        <p class="conteneur1">
                            <span>Nom :&nbsp;</span><?= $unAtelier['nom']; ?>
                        </p>
                        <p class="conteneur2">
                            <?php 
                                $tempDate = substr($unAtelier['date'],0,10);
                                $tabdate = explode('-',$tempDate);
                                $date = $tabdate[2]."/".$tabdate[1]."/".$tabdate[0];
                            ?>
                            <span>Date :&nbsp;</span><?= $date; ?>
                        </p>
                        
                        <p class="conteneur4">
                            <a  href="./admin-modifierAtelier-<?= $unAtelier['idAtelier']; ?>">   
                                <span> Modifier</span>
                            </a>
                            <a  href="./admin-supprimerAtelier-<?= $unAtelier['idAtelier']; ?>">   
                                <span>Supprimer</span>
                            </a>
                        </p>
                    </section>

                <?php } ?>
                <!-- FIN DETAIL    -->
            
        </main>

        <footer>
            <p>
                &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
            </p>
        </footer>

        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="app/public/js/admin/gestionLivres.js"></script>

    </body>    
    
</html>