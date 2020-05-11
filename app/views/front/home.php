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

    <title> Accueil - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/accueil.css"> -->
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
            <!-- BLOCK COUP DE COEURS  -->
            <div class="blockContenu">
                <h1 class="titreMain">
                     Nos coups de coeurs du moment 
                </h1>
                <!--------------livre coup de coeur, favorite book------------------>
                <section class="articles">  
                    <?php foreach ($listCdCoeur as $unCoupDeCoeur) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                                Coup de coeur
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($unCoupDeCoeur['image'])."' 
                                alt='".$unCoupDeCoeur['nom']."' title='".$unCoupDeCoeur['nom']."'/>";?>
                            </figure>
                            <h4>
                                <?= $unCoupDeCoeur['nom']; ?>
                            </h4>
                            <hr separator>
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./detailLivre?id=".$unCoupDeCoeur['idLivre']."' class='button'>"; 
                            ?>
                                En savoir plus !!
                            </a>
                            <p>
                                Auteurs : <?= $unCoupDeCoeur['nomAuteur']." ".$unCoupDeCoeur['prenomAuteur']; ?>
                            </p>
                            <p class="dateDeSortie">
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($unCoupDeCoeur['dateDePublication']);
                                ?>
                                Date de publication : <?= $date->format('d/m/Y'); ?>
                            </p>
                        </article>
                    <?php } ?>
                </section>
            </div>
            <!--FIN BLOCK COUP DE COEURS  -->

            <!-- BLOCK NOUVEAUTES -->
            <div class="blockContenu">
                <h1 class="titreMain">
                    Nouveautés
                </h1>
                <!--------------LIVRE NOUVEAUTES------------------>
                <section class="articles">  
                    <?php foreach ($listNouveautes as $uneNouveaute) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                                Nouveauté
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($uneNouveaute['image'])."'
                                 alt='".$uneNouveaute['nom']."' title='".$uneNouveaute['nom']."'/>";?>
                            </figure>
                            <h4>
                                <?= $uneNouveaute['nom']; ?>
                            </h4>
                            <hr separator>
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./detailLivre?id=".$uneNouveaute['idLivre']."' class='button'>"; 
                            ?>
                                En savoir plus !!
                            </a>
                            <p>
                                Auteurs : <?= $uneNouveaute['nomAuteur']." ".$uneNouveaute['prenomAuteur']; ?>
                            </p>
                            <p class="dateDeSortie">
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($uneNouveaute['dateDePublication']);
                                ?>
                                Date de publication : <?= $date->format('d/m/Y'); ?>
                            </p>
                        </article>
                    <?php } ?>
                </section>
            </div>
            <!--FIN NOUVEAUTES -->

            <!-- BLOCK ATELIERS  -->
            <div class="blockContenu">
                <h1 class="titreMain">
                   Les prochains ateliers à venir 
                </h1>
                <!-------------- LIVRE ATELIERS------------------>
                <section class="articles">  
                    <?php foreach ($listAtelier as $unAtelier) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                              Atelier
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                               <img src ="../app/public/image/icon/calendrier.png" alt="Calendrier" title="Calendrier">
                            </figure>
                            <h4>
                                <?= $unAtelier['nom']; ?>
                            </h4>
                            <p>
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($unAtelier['date']);
                                ?>
                                Date : <?= $date->format('d/m/Y'); ?> à  <?= substr($unAtelier["heure"],0,5); ?>
                            </p>
                            <p>
                                Age: <?= $unAtelier["age"]; ?> et +
                            </p>
                            <hr separator>
                        
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./detailAtelier?id=".$unAtelier['idAtelier']."' class='button'>";
                            ?>
                                En savoir plus !!
                            </a>
                        </article>
                    <?php } ?>
                </section>
            </div>
            <!--FIN BLOCK ATELIERS-->

            <!-- BLOCK MANGAS  -->
            <div class="blockContenu">
                <h1 class="titreMain">
                    Les Mangas
                </h1>
                <!--------------LIVRE MANGAS ------------------>
                <section class="articles">  
                    <?php foreach ($listMangas as $unMangas) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                                Mangas
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($unMangas['image'])."' 
                                alt='".$unMangas['nom']."' title='".$unMangas['nom']."' />";?>
                            </figure>
                            <h4>
                                <?= $unMangas['nom']; ?>
                            </h4>
                            <hr separator>
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./detailLivre?id=".$unMangas['idLivre']."' class='button'>"; 
                            ?>
                                En savoir plus !!
                            </a>
                            <p>
                                Auteurs : <?= $unMangas['nomAuteur']." ".$unMangas['prenomAuteur']; ?>
                            </p>
                            <p class="dateDeSortie">
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($unMangas['dateDePublication']);
                                ?>
                                Date de publication : <?= $date->format('d/m/Y'); ?>
                            </p>
                        </article>
                    <?php } ?>
                </section>
            </div>
            <!--FIN BLOCK MANGAS  -->

             <!-- BLOCK  BANDES DESSINEES  -->
             <div class="blockContenu">
                <h1 class="titreMain">
                    Les bandes dessinées
                </h1>
                <!-------------- LIVRE  BANDES DESSINEES------------------>
                <section class="articles">  
                    <?php foreach ($listBandesDessinees as $uneBandesDessinees ) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                                Bandes dessinées
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($uneBandesDessinees['image'])."' 
                                alt='".$uneBandesDessinees['nom']."' title='".$uneBandesDessinees['nom']."' />";?>
                            </figure>
                            <h4>
                                <?= $uneBandesDessinees['nom']; ?>
                            </h4>
                            <hr separator>
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./detailLivre?id=".$uneBandesDessinees['idLivre']."' class='button'>"; 
                            ?>
                                En savoir plus !!
                            </a>
                            <p>
                                Auteurs : <?= $uneBandesDessinees['nomAuteur']." ".$uneBandesDessinees['prenomAuteur']; ?>
                            </p>
                            <p class="dateDeSortie">
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($uneBandesDessinees['dateDePublication']);
                                ?>
                                Date de publication : <?= $date->format('d/m/Y'); ?>
                            </p>
                        </article>
                    <?php } ?>
                </section>
            </div>
            <!--FIN BLOCK BANDES DESSINEES-->

             <!-- BLOCK  CUISINE  -->
             <div class="blockContenu">
                <h1 class="titreMain">
                    La cuisine
                </h1>
                <!-------------- LIVRE  CUISINE------------------>
                <section class="articles">  
                    <?php foreach ($listCuisine as $uneCuisine ) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                                Cuisine
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($uneCuisine['image'])."'
                                alt='".$uneCuisine['nom']."' title='".$uneCuisine['nom']."' />";?>
                            </figure>
                            <h4>
                                <?= $uneCuisine['nom']; ?>
                            </h4>
                            <hr separator>
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./detailLivre?id=".$uneCuisine['idLivre']."' class='button'>"; 
                            ?>
                                En savoir plus !!
                            </a>
                            <p>
                                Auteurs : <?= $uneCuisine['nomAuteur']." ".$uneCuisine['prenomAuteur']; ?>
                            </p>
                            <p class="dateDeSortie">
                                <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($uneCuisine['dateDePublication']);
                                ?>
                                Date de publication : <?= $date->format('d/m/Y'); ?>
                            </p>
                        </article>
                    <?php } ?>
                </section>
            </div>
            <!--FIN BLOCK CUISINE-->

        </main>


        <?php require_once("./app/views/layout/footer.php"); ?> 


        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/header.js"></script>
        <script type="text/javascript" src="./../app/public/js/accueil.js"></script>

        <!--class active-->
        <script type="text/javascript">
            menuActive(0);
        </script>

    </body>

</html>


