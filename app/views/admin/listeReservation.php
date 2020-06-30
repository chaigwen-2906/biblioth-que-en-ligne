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
                    Gestion réservation
                </h1>
                <!-- FIN TITRE PAGE  -->

                <!-- RECHERCHE  -->
                <section class="rechercheLivre" >
                    <label for="champRecherche"> Recherche sur le nom : </label> 
                    <input type="text" id="champRecherche">
                </section> 
                <!-- FIN RECHERCHE -->


                <!-- LES RESERVATION A VALIDEE  -->
                <section class="sectionCommande">
                    <h2 class="titreCommum">
                        Les réservations à validées.
                    </h2>

                    <?php foreach ($listeReservationAValider as $uneReservationAValide) {?>

                        <section class="detail">
                            <p class="conteneur1">
                                <span> Nom et prénom du client :&nbsp;</span><?= $uneReservationAValide['nomClient']." ".$uneReservationAValide['prenomClient']; ?>
                            </p>
                            <p class="conteneur2">
                                <span>Nom du livre :&nbsp;</span><?= $uneReservationAValide['nomLivre']; ?>
                            </p>
                            <p class="conteneur3">
                                <span>La disponibilitée :&nbsp;</span><?= $uneReservationAValide['disponible']; ?>
                            </p>
                            <p class="conteneur4">
                            <?php if($uneReservationAValide['disponible'] == "oui" ) {   ?>
                                <a   href="./admin-<?= $this->nomPage;?>?action2=validerReservation&idReservation=<?=$uneReservationAValide['idReservation'];?>">   
                                    <span> Validée</span>
                                </a>
                            <?php }?>
                                <a href="./admin-<?= $this->nomPage;?>?action2=supprimerReservation&idReservation=<?=$uneReservationAValide['idReservation'];?>"   >   
                                    <span>Supprimer</span>
                                </a>
                            </p>
                        </section>

                    <?php } ?>
                </section>
                <!--FIN LES RESERVATION A VALIDEE -->

                <!-- LES RESERVATION EN COURS  -->
                <section>
                    <h2 class="titreCommum">
                        Les réservations en cours.
                    </h2>

                    <!-- DETAIL SUR LEs reservation  -->
                    <?php foreach ($listeReservationValidee as $uneReservationValide) {?>

                        <section class="detail">
                            <p class="conteneur1">
                                <span> Nom et prénom du client :&nbsp;</span><?= $uneReservationValide['nomClient']." ".$uneReservationValide['prenomClient']; ?>
                            </p>
                            <p class="conteneur2">
                                <span>Nom du livre :&nbsp;</span><?= $uneReservationValide['nomLivre']; ?>
                            </p>
                            <p class="conteneur3">
                                <?php 
                                    $tempDate = substr($uneReservationValide['dateDeDebut'],0,10);
                                    $tabdate = explode('-',$tempDate);
                                    $date = $tabdate[2]."/".$tabdate[1]."/".$tabdate[0];
                                ?>
                                <span>La date de début :&nbsp;</span><?= $date; ?>
                            </p>
                            <p class="conteneur4">
                                <a href="./admin-<?= $this->nomPage;?>?action2=stopperReservation&idReservation=<?=$uneReservationValide['idReservation'];?>"   >   
                                    <span>Stopper</span>
                                </a>
                            </p>
                        </section>

                    <?php } ?>
                </section>
                    <!-- FIN DETAIL SUR LE LIVRE     -->



                <!-- SUPPRIMER LES RESERVATION  -->
                <section>
                <h2 class="titreCommum">
                    Les réservations terminées
                </h2>
            
                    <!-- DETAIL SUR LEs reservation  -->
                    <?php foreach ($listeReservationTerminee as $uneReservationTerminee) {?>

                        <section class="detail">
                            <p class="conteneur1">
                                <span> Nom et prénom du client :&nbsp;</span><?= $uneReservationTerminee['nomClient']." ".$uneReservationTerminee['prenomClient']; ?>
                            </p>
                            <p class="conteneur2">
                                <span>Nom du livre :&nbsp;</span><?= $uneReservationTerminee['nomLivre']; ?>
                            </p>
                            <p class="conteneur3">
                                <?php 
                                    $tempDate = substr($uneReservationTerminee['dateDeDebut'],0,10);
                                    $tabdate = explode('-',$tempDate);
                                    $date = $tabdate[2]."/".$tabdate[1]."/".$tabdate[0];
                                ?>
                                <span>La date de début :&nbsp;</span><?= $date; ?>
                            </p>  
                        </section>

                    <?php } ?>
                </section>
                <!--FIN SUPPRIMER LES RESERVATION  -->
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