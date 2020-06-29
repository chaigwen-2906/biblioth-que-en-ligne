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

    <title> Page d'erreur - Ma bibliothèque en ligne</title>

    <!-- Appel des feuilles de style --/ Calling style sheets-->
    <link rel="stylesheet" href="app/public/css/styles.css">
    <!-- <link rel="stylesheet" href="app/public/css/header.css">
    <link rel="stylesheet" href="app/public/css/footer.css">
    <link rel="stylesheet" href="app/public/css/pageErreur.css">
    -->
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
    
    <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
    <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    <!-- Appel des feuilles de style jquery --/ Calling style sheets jquery-->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

    <body>

        <?php require_once("app/views/layout/header.php"); ?>

        <main class="pageErreur">

            <!-- FILS D'ARIANE  -->
            <div class ="filArianePageErreur" >
                <a href="./front-home"> 
                    Accueil >
                </a>
                    Page d'erreur
            </div>
            <!--FIN  FILS D'ARIANE  -->

            <!-- PAGE 404 -->
            <figure>
                <img class="erreur404" src="app/public/image/img/erreur404.jpg" alt="Erreur de page " title="Erreur de page">
            </figure>
           
 
        </main> 
        
        <?php require_once("app/views/layout/footer.php") ?> 

    </body>

</html>