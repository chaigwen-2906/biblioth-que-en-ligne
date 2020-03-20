<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Détail des livres">
    <meta name="description" content="Détail des livres">
    <meta name="title" content="Notre bibliothèque en ligne">
    <meta http-equiv="expires" content="43200" />

    <title> Détail des livres - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="./../app/public/css/header.css">
    <link rel="stylesheet" href="./../app/public/css/footer.css">
    <link rel="stylesheet" href="./../app/public/css/detailLivre.css">
    
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>

        <?php require_once("./app/views/layout/header.php"); ?>

        <br><br><br><br><br><br><br><br>
        <main class="detailLivre">
            <h1 class ="grosTitre">
                Résumé du livre
            </h1>
            <section class ="sectionDescripLivre">
                <aside class="titreImgReseaux">
                    <h2>
                        <?= $DetailLivre['nom']; ?>
                    </h2>
                    <hr separator>
                    <figure class="reglageImg">
                        <?= "<img src='data:image/png|image/jpeg|image/gif|image/jpg;base64,".base64_encode($DetailLivre['image'])."' />";?>
                    </figure>
                    <hr separator>
                    <figure class="réglageReseaux">
                        <ul>
                            <li><a href="https://www.facebook.com/" target="_blank"><img src="./../app/public/image/reseaux/FacebookEcusson.png"
                                alt="facebook" title="facebook">
                            </a></li>
                            <li><a href="https://twitter.com/accueil?lang=fr" target="_blank"><img src="./../app/public/image/reseaux/TwitterEcusson.png"
                                alt="twitter" title="twitter"> 
                            </a></li>
                            <li><a href="https://www.youtube.com/" target="_blank"><img src="./../app/public/image/reseaux/youtubeEcusson.png"
                                alt="Instagram" title="Instagram">
                            </a></li>
                            <li><a href="https://www.linkedin.com/" target="_blank"><img src="./../app/public/image/reseaux/linkedinEcusson.png"
                                alt="Instagram" title="Instagram">
                            </a></li>
                        </ul>
                    </figure>
                </aside>
                <div class="divDesResum">
                    <article class ="livreDescription">
                        <h2>
                            Description
                        </h2>
                        <hr separator>
                        <p>
                            <?= $DetailLivre['description']; ?>
                        </p>
                    </article>
                    <article class ="infoLivre">
                        <h2>
                            Fiche technique
                        </h2>
                        <hr separator>
                        <section class ="ficheTecknic">
                            <ul>
                                <li>Date de publication : <?= $DetailLivre['dateDePublication']; ?></li>
                                <li>Disponibilité : <?= $DetailLivre['disponible']; ?></li>
                                <li>Nombre de pages : <?= $DetailLivre['nbDePage']; ?></li>
                                <li>Dimension : <?= $DetailLivre['dimension']; ?></li>
                            </ul>
                            <ul>
                                <li>Langue : <?= $DetailLivre['langue']; ?></li>
                                <li>Isbn : <?= $DetailLivre['isbn']; ?></li>
                                <li>Ean<?= $DetailLivre['ean']; ?></li>
                            </ul>  
                        </section>
                    </article>
                </div>
            </section>
            <section class="sectionCommentaireLivre">
                <article class ="commentaireLivre">
                    <h2>
                        Commentaires sur le livre
                    </h2>
                    <hr separator>
                    <h3>
                        Poster votre commentaire :
                    </h3>
                    <figure>
                        Note : <img src="./../app/public/image/icon/start.png">
                    </figure>
                    <div class="commentaire">        
                        <label  for="commentaire">
                            Les offres de nos partenaires : 
                        </label><br>
                        <textarea class="reglCommentaire" 
                            name="message"  placeholder="Entrer votre message">
                        </textarea>
                    </div>
                    <a class="valideCommentaire" href="#">
                        Poster !
                    </a>
                </article>
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