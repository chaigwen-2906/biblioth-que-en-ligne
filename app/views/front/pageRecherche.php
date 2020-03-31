<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Recherche livre">
    <meta name="description" content="Recherche livre">
    <meta name="title" content="Notre bibliothèque en ligne">
    <meta http-equiv="expires" content="43200" />

    <title> Recherche livre - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/pageRecherche.css">
   
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>

        <?php require_once("./app/views/layout/header.php"); ?>
        

        <main class="recherche">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianeRecherche" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Résultat de la recherche
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- TITRE PAGE -->
            <h1>
                Résultat de la recherche
            </h1>
            <!-- FIN TITRE  -->

            <hr separator class="separateurH1">

            <!-- SECTION RECHERCHE -->
            <section class="sectionRecherche">
                <?php foreach ($resultPageRecherche as $uneRecherche) {?>
                    <div class="descriptionLivre">
                        <!--TITRE, IMAGE DES LIVRE -->
                        <aside class="titreImgReseaux">
                            <h3>
                                <?= $uneRecherche['nom']; ?>
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($uneRecherche['image'])."'
                                alt='".$uneRecherche['nom']."' title='".$uneRecherche['nom']."' />";?>
                            </figure>
                            <!--FIN TITRE, IMAGE DES LIVRE -->

                            <hr separator>

                        </aside> 
                        
                        <!-- DESCRIPTION DU LIVRE  -->
                        <article class="livreDescription">
                            <h2>
                                Description
                            </h2>
                            <hr separator>
                            <p>
                                <?php $descriptionCourte = substr($uneRecherche['description'],0,200); ?>
                                <?= $descriptionCourte."..."; ?>
                            </p>
                        </article> 
                        

                        <hr separator>

                        <!-- BOUTON EN SAVOIR PLUS  -->
                            <?php 
                                //création du lien vers la page detailLivre en passant l'idLivre du coup de coeur 
                                // en paramètre
                                echo "<a href='./detailLivre?id=".$uneRecherche['idLivre']."' class='bouton'>"; 
                            ?>
                                En savoir plus !!
                            </a>
                    
                        <!--FIN BOUTON EN SAVOIR PLUS  -->

                    <!--FIN DESCRIPTION DU LIVRE  -->
                    </div>
                <?php } ?>
            <!--FIN SECTION RECHERCHE -->
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