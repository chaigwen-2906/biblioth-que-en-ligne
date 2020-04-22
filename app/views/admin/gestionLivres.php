<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- je n'index pas cette pas là  -->
        <meta name="robots" content="noindex">

        <meta name="title" content="Notre bibliothèque en ligne">
        
        <title> Détail des livres - Ma bibliothèque en ligne</title>

        <!-- Appel des feuilles de style --/ Calling style sheets-->
        <link rel="stylesheet" href="./../app/public/css/admin/gestion.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>

        <main class="gestion">
                <!--BOUTON RETOUR  -->
                <figure class="retour">
                    <a href="./accueil">
                        <img src="./../app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                        Retour 
                    </a>
                </figure>
                <!-- FIN BOUTON RETOUR  -->

                <!-- TITRE PAGE  -->
                <h1>
                    Gestion des livres
                </h1>
                <!-- FIN TITRE PAGE  -->

                <!-- AJOUTE LIVRE  -->
                <section class="ajout">
                    <a  href="./<?= $this->nomPage;?>?action2=ajouterLivre">   
                        Ajouter un livre !!
                    </a>
                </section> 
                <!-- FIN AJOUTE LIVRE  -->

                <!-- DETAIL SUR LE LIVRE  -->
                <?php foreach ($listeLivres as $unLivre) {?>

                    <section class="detail">
                        <p class=conteneur1>
                            Nom : <?= $unLivre['nom']; ?>
                        </p>
                        <p class=conteneur2>
                            Auteur : <?= $unLivre['auteur']; ?>
                        </p>
                        <p class=conteneur3>
                            éditeur : <?= $unLivre['auteur']; ?>
                        </p>
                        <p class=conteneur4>
                            <a  href="./<?= $this->nomPage;?>?action2=modifierLivre">   
                                Modifier
                            </a>
                            <a  href="./<?= $this->nomPage;?>?action2=supprimerLivre">   
                                Supprimer
                            </a>
                        </p>
                    </section>

                <?php } ?>
                <!-- FIN DETAIL SUR LE LIVRE     -->
            
        </main>
    </body>    
    <footer>
        <p>
            &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
        </p>
    </footer>
</html>