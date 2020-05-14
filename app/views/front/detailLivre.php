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

    <title> Détail des livres - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/detailLivre.css"> -->
    
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>

        <?php require_once("./app/views/layout/header.php"); ?>

        <main class="detailLivre">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianeLivre" >
                <a href="./home"> 
                    Accueil >
                </a>
                    Résumé du livre
            </div>
            <!--FIN  FILS D'ARIANE  -->
            
            <h1 class ="grosTitre">
                Résumé du livre
            </h1>
            <!-- INFO DU LIVRE  -->
            <section class ="sectionDescripLivre">
                <aside class="titreImgReseaux">
                    <h2>
                        <?= $DetailLivre['nom']; ?>
                    </h2>
                    <hr separator>
                    <figure class="reglageImg">
                        <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($DetailLivre['image'])."'
                        alt='".$DetailLivre['nom']."' title='".$DetailLivre['nom']."' />";?>
                    </figure>
                    <hr separator>
                    <figure class="réglageReseaux">
                        <ul>
                            <li><a href="https://www.facebook.com/" target="_blank"><img src="./../app/public/image/reseaux/FacebookEcusson.png" 
                                alt="Facebook" title="Facebook">
                            </a></li>
                            <li><a href="https://twitter.com/accueil?lang=fr" target="_blank"><img src="./../app/public/image/reseaux/TwitterEcusson.png"
                                alt="Twitter" title="Twitter"> 
                            </a></li>
                            <li><a href="https://www.youtube.com/" target="_blank"><img src="./../app/public/image/reseaux/YoutubeEcusson.png"
                                alt="Youtube" title="Youtube">
                            </a></li>
                            <li><a href="https://www.linkedin.com/" target="_blank"><img src="./../app/public/image/reseaux/LinkedinEcusson.png"
                                alt="Linkedin" title="Linkedin">
                            </a></li>
                        </ul>
                    </figure>
                    <!-- Si la variable de session idClient existe :l'utilisateur est connecté -->
                    <!-- alors on affiche le bouton réserver   -->
                    <?php if(isset($_SESSION['idClient'])){ ?>
                        <?php if($DetailLivre['disponible'] == "oui"){ ?>
                            <a id="btnReserver" class="monBoutton" href="./<?= $this->nomPage;?>?action2=ajoutePanier&id=<?= $_GET['id'];?>">
                                Réserver
                            </a>
                        <?php } 
                        else{ ?>
                             <p class="livreIndisponible">
                                Ce livre est actuellement indisponible
                             </p>   
                        <?php } ?>
                    <?php } ?>
                </aside>
                <section class="divDesResum">
                    <article class="livreDescription">
                        <h2>
                            Description
                        </h2>
                        <hr separator>
                        <p>
                            <?= $DetailLivre['description']; ?>
                        </p>
                    </article>
                    <article class="infoLivre">
                        <h2>
                            Fiche technique
                        </h2>
                        <hr separator>
                        <div class="ficheTecknic">
                            <ul>
                                <?php
                                    $dateDepublication = new datetime($DetailLivre['dateDePublication']);
                                ?>
                                <li>Date de publication : <?= $dateDepublication->format('d/m/Y H:i'); ?></li>
                                <li>Disponibilité : <?= $DetailLivre['disponible']; ?></li>
                                <li>Nombre de pages : <?= $DetailLivre['nbDePage']; ?></li>
                                <li>Dimension : <?= $DetailLivre['dimension']; ?></li>
                            </ul>
                            <ul>
                                <li>Langue : <?= $DetailLivre['langue']; ?></li>
                                <li>Isbn : <?= $DetailLivre['isbn']; ?></li>
                                <li>Ean<?= $DetailLivre['ean']; ?></li>
                            </ul>  
                        </div>
                    </article>
                </section>
            </section>
            <!-- FIN INFO DU LIVRE  -->

            <!-- COMMENTAIRE SUR LE LIVRE  -->               
            <section class="sectionCommentaireLivre">
                <!-- Si la variable de session idClient existe :l'utilisateur est connecté -->
                <!-- alors on affiche le formulaire qui permet de poster un commentaire  -->
                <?php if(isset($_SESSION['idClient'])){ ?>
                   
                    <form method="POST" action="./<?= $this->nomPage;?>?action2=ajouteCommentaire&id=<?= $_GET['id'];?>" id="sectionCommentaire" name="formAjoutCommentaire" class="commentaireLivre">
                        <h2>
                            Commentaires sur le livre
                        </h2>
                        <hr separator>
                        <h3>
                            Poster votre commentaire :
                        </h3>
                        <article>
                            <label for="note">Note :</label>
                            <input class="inputNote" type="number" name="note" min="0" max= "5"  >
                        </article>
                        <article class="commentaire">        
                            <label for="commentaire">
                                Votre commentaire :
                            </label>
                            <textarea class="reglCommentaire" name="description" placeholder="Entrer votre message" cols="50" rows="3"></textarea>
                        </article>
                        <a id="btnPoster" class="monBoutton" onclick="window.document.formAjoutCommentaire.submit();">
                            Posté !
                        </a>
                    </form>
                    
                <?php } ?>
                <!--FIN COMMENTAIRE SUR LE LIVRE  -->   


                <!-- DERNIERS COMMENTAIRES POSTER  -->
                <article class="dernierCommentaire">
                    <h2>
                        Les commentaires
                    </h2>
                    <hr separator>
                    <?php foreach ($listCommentaire as $unCommentaire) {?>
                        <h3 class="posterLe">
                            Posté par : <?= $unCommentaire['nom']." ".$unCommentaire['prenom']; ?> <br> 
                            <?php 
                                    //récupération de la date sous forme d'un datetime
                                    // puis utilisation de la fonction format pour afficher avec le format attendu
                                    $date = new DateTime($unCommentaire['date']);
                                ?>
                                Le : <?= $date->format('d/m/Y H:i'); ?>
                        </h3>
                        <figure>
                            Note :<?= $unCommentaire['note']; ?>/10
                        </figure>
                        <p class="commentaire">
                            <strong>Commentaire : </strong> <?= $unCommentaire['description']; ?>
                        </p>
                        <hr class="separatorCommentaire" separator>
                    <?php } ?>
                </article>
                <!-- DERNIERS COMMENTAIRES POSTER  -->
               
            </section>
        </main>
        
        <?php require_once("./app/views/layout/footer.php") ?> 

        <!---------------------- jQuery ---------------------------------->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!---------- Appel du javascript  / Call of javascript------------>
        <script type="text/javascript" src="./../app/public/js/allJavaScript.js"></script>

    </body>

</html>