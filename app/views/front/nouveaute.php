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

    <title> Nouveautés - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/nouveaute.css"> -->
    
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>


        <?php require_once("./app/views/layout/header.php"); ?>

        <main class="nouveaute">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianeNouveaute" >
                <a href="./home">
                    Accueil >
                </a>
                    Nos nouveautés
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- CAROUSSEL NOUVEAUTE  -->
            
            <figure class="figureSlid">
                <div class="divImgSlider">
                    <img class="imgSlider" src="./../app/public/image/img/filleEncre.jpg" alt="La fille d'encre et étoiles" title="La fille d'encre et étoiles"  onclick="afficheNouveaute(this);">
                </div>
                <div class="divImgSlider">
                    <img class="imgSlider" src="./../app/public/image/img/luluNelson1.jpg" alt="Tome-1: Cap sur l'Afrique" title="Tome-1: Cap sur l'Afrique"  onclick="afficheNouveaute(this);">
                </div>
                <div class="divImgSlider">
                    <img class="imgSlider" src="./../app/public/image/img/guerreDesClans.jpg" alt="éclipse" title="éclipse"  onclick="afficheNouveaute(this);">
                </div>
                <div class="divImgSlider">
                    <img class="imgSlider" src="./../app/public/image/img/droitEnf.jpg" alt="Les cahiers filliozat" title="Les cahiers filliozat" onclick="afficheNouveaute(this);">
                </div>
                <div class="divImgSlider">
                    <img class="imgSlider" src="./../app/public/image/img/queteDesOurs.jpg" alt="Les dernières contrées sauvages" title="Les dernières contrées sauvages" onclick="afficheNouveaute(this);">
                </div>
                <div class="divImgSlider">
                    <img class="imgSlider" src="./../app/public/image/img/royaumeDesLoups.jpg" alt="Une nouvelle étoile" title="Une nouvelle étoile"  onclick="afficheNouveaute(this);">
                </div>
                <div class="divImgSlider">
                    <img class="imgSlider" src="./../app/public/image/img/parfumAmours.jpg" alt="Parfum d'amours" title="Parfum d'amours" onclick="afficheNouveaute(this);">
                </div>    
            </figure>

            <div class="SliderNew">
                <div class="enteteSlider">
                    <div class="imgtext"></div>
                    <span onclick="this.parentElement.parentElement.style.display='none'" class="fermerBtn">&times;</span>
                </div>
                <img class="etendreImg">
            </div>
           

            <!--FIN CAROUSSEL NOUVEAUTE  -->

            <!-- BLOCK NOUVEAUTES -->
            <div class="blockContenu">
                <h1 class="titreMain">
                    Nouveautés
                </h1>
                <!--------------LIVRE NOUVEAUTES------------------>
                <div class="articles">  
                    <?php foreach ($listNouveautes as $uneNouveaute) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                                Nouveauté
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                                <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($uneNouveaute['image'])."'
                                alt='".$uneNouveaute['nom']."' title='".$uneNouveaute['nom']."' />";?>
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
                </div>
            </div>
            <!--FIN NOUVEAUTES -->


        </main>


        
        <?php require_once("./app/views/layout/footer.php") ?> 

        <!--class active-->
        <script type="text/javascript">
            menuActive(2);
        </script>

    </body>

</html>