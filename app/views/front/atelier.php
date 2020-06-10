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

    <title> Atelier - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/atelier.css"> -->
    
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>


        <?php require_once("./app/views/layout/header.php"); ?>
        
        <main class ="atelier">
            <!-- FILS D'ARIANE  -->
            <div class ="filArianeAtelier" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Nos ateliers
            </div>
            <!--FIN  FILS D'ARIANE  -->

             <!-- SECTION YOU TUBE API (VIDEO-ATELIER) -->
             <section class =" sectionYoutube">
                <article>
                    <h3>
                        Nos videos
                    </h3>
                </article>
                <figure class ="figureVideo">
                    <div>
                        <h6>bibliobingo!</h6>
                        <div id="player1"></div>
                    </div>
                    <div>
                        <h6>atelier enfants, "La lune a disparu" !</h6>
                        <div id="player2"></div>
                    </div>
                    <div>
                        <h6>speed booking</h6>
                        <div id="player3"></div>
                    </div>
                    <div>
                        <h6>FAIS TON FILM</h6>
                        <div id="player4"></div>
                    </div>
                </figure>
            </section>
            <!--FIN SECTION YOU TUBE API (VIDEO-ATELIER) -->

            <!-- BLOCK ATELIERS  -->
            <section class="blockContenu">
                <h1 class="titreMain">
                   Les prochains ateliers à venir 
                </h1>
                <!-------------- LIVRE ATELIERS------------------>
                <div class="articles">  
                    <?php foreach ($listAtelier as $unAtelier) {?>

                        <article class="articleLivres">
                            <!--ici se trouvent les info sur les livres, here is the info on the books----------->
                            <h3>
                              Atelier
                            </h3>
                            <hr separator>
                            <figure class="imgArticleLivre">
                               <img src ="../app/public/image/icon/calendrier.png" alt="Calendier" title="Calendrier">
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
                </div>
            </section>
            <!--FIN BLOCK ATELIERS-->

        </main>



        
        <?php require_once("./app/views/layout/footer.php") ?> 

        <!--class active-->
        <script type="text/javascript">
            menuActive(3);
        </script>

    </body>

</html>