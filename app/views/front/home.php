<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="bibliothèque">
    <meta name="description" content="Réservez vos livres">
    <meta name="title" content="Notre bibliothèque en ligne">
    <meta http-equiv="expires" content="43200" />

    <title> Accueil - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/accueil.css">
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>


        <?php require_once("./app/views/layout/header.php"); ?>


        <!--------image de fond fixer pour scroller dessus. et se trouve dessous la barre de recheche--------------->
        <!-- background image fix to scroll on. and is below the search bar -->
        <figure class="imageDeFondAccueil">
            <img class="imgDeFond" src="./../app/public/image/imgFond/livreDeFond.png" alt=" une bibliothèque"
                title="une bibliothèque">
        </figure>


        <main class="Accueil">
            <div  class="citation">
                <blockquote>
                    &laquo; La lumière est dans le livre. Ouvrez le livre tout grand.
                    Laisez-le rayonner &raquo;
                </blockquote>
                <p>
                    (Victor Hugo, Proses philosophique, 1860-1865)
                </p>
                <hr class="separator">  
            </div>
            <div class="blockContenu">
                <h1 class="titreMain">
                    La bibliothèque ou tout est fait pour lire 
                </h1>
                <!--------------livre coup de coeur, favorite book------------------>
                <div class="articles">
                    <article class="articleLivres">
                        <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                        <h3>
                            Coup de coeur
                        </h3>
                        <hr separator>
                        <figure class="imgArticleLivre">
                            <img src="./../app/public/image/img/luluNelson1.jpg">
                        </figure>
                        <h4>
                            Lulu et Nelson
                        </h4>
                        <hr separator>
                        <a href="#" class="button">
                            En savoir plus !!
                        </a>
                        <p>
                            Auteurs : Aurélie Neyret 
                        </p>
                        <p class="dateDeSortie">
                            Date de sortie : 27/11/2019
                        </p>
                    </article>
                    <article class="articleLivres">
                        <h3>
                            Coup de coeur
                        </h3>
                        <hr separator>
                        <figure class="imgArticleLivre">
                            <img src="./../app/public/image/img/laly.jpg">
                        </figure>
                        <h4>
                            Lady'S - Tome 14 - Code Vampir
                        </h4>
                        <hr separator>
                        <a href="#" class="button">
                            En savoir plus !!
                        </a>
                        <p>
                            Auteurs : Philippe Aymond.
                        </p>
                        <p class="dateDeSortie">
                            Date de sortie :05/12/2019
                        </p>
                    </article>
                    <article class="articleLivres">
                        <h3>
                            Coup de coeur
                        </h3>
                        <hr separator>
                        <figure class="imgArticleLivre">
                            <img src="./../app/public/image/img/guerreDesClans.jpg">
                        </figure>
                        <h4>
                            La Guerre Des Clans - Tome 4 Eclipse
                        </h4>
                        <hr separator>
                        <a href="#" class="button">
                            En savoir plus !!
                        </a>
                        <p>
                            Éditeur : Hunter Erin
                        </p>
                        <p class="dateDeSortie">
                            Date de publication : 03/10/2019
                        </p>
                    </article>
                    <article class="articleLivres">
                        <h3>
                            Coup de coeur
                        </h3>
                        <hr separator>
                        <figure class="imgArticleLivre">
                            <img src="./../app/public/image/img/ki_hi.jpg">
                        </figure>
                        <h4>
                            Ki et Hi - Tome 5
                            Le Dragon Céleste
                        </h4>
                        <hr separator>
                        <a href="#" class="button">
                            En savoir plus !!
                        </a>
                        <p>
                            Auteurs : Fanny Antigny , Kevin
                        </p>
                        <p class="dateDeSortie">
                            Date de sortie :05/12/2019
                        </p>
                    </article>
                </div>
            </div>
            <!-- --------------------les livre Manga, Manga books----------------------->
            <!-- <h1 class="titreMain">
                Manga !!!
            </h1> -->
        </main>


        <?php require_once("./app/views/layout/footer.php") ?> 

        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/header.js"></script>
        <script type="text/javascript" src="./../app/public/js/accueil.js"></script>

    </body>

</html>


