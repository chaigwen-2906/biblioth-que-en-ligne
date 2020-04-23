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
        <link rel="stylesheet" href="./../app/public/css/admin/accueil.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>

        <main class="accueil">
            <!-- BOUTON SE DECONNECTER  -->
            <figure class="seDeconnecter">
                <a  href="./<?= $this->nomPage;?>?action2=seDeconnecter">
                    <img src="./../app/public/image/bouton/disconnect.png" alt="Se déconnecter" title="Se déconnecter">
                </a>
            </figure>
            <!-- FIN BOUTON DECONNECTER  -->

            <!-- TITRE  -->
            <h1>
                Administration du site 'Ma bibliothèque en ligne'
            </h1>
            <!-- FIN TITRE  -->

            <!-- SECTION RESERVER  -->
            <section class="gestionReserver">
                <a href="">
                    <article class="gererReservations">
                        Gérer les reservations
                    </article>
                </a>
            </section>
            <!-- FIN SECTION RESERVER  -->

            <!-- SECTION DES ARTICLES  -->
            <section class="gestionsDesTables">

                <a href="./listeLivres">
                    <article class="gererArticle">
                        Gérer les livres
                    </article>
                </a>

                <a href="./listeAuteur">    
                    <article class="gererArticle">
                        Gérer les auteurs
                    </article>
                </a>

                <a href="">
                    <article class="gererArticle">
                        Gérer les ateliers
                    </article>
                </a>

                <a href=""> 
                    <article class="gererArticle">
                        Gérer les catégories 
                    </article>
                </a>

                <a href="">
                    <article class="gererArticle">
                        Gérer les clients
                    </article>
                </a>

                <a href="">
                    <article class="gererArticle">
                        Gérer les coups de coeur
                    </article>
                </a>

                <a href="">
                    <article class="gererArticle">
                        Gérer les éditeurs
                    </article>
                </a>

                <a href="">
                    <article class="gererArticle">
                        Gérer les FAQ
                    </article>
                </a>
                <a href="">
                    <article class="gererArticle">
                    Paramètrage des pages
                    </article>
                </a>
            </section>
            <!-- FIN SECTION DES ARTICLES  -->
        </main>

        <footer>
            <p>
                &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
            </p>
        </footer>
    </body>

    

</html>