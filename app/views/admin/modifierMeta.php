<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- je n'index pas cette pas là  -->
        <meta name="robots" content="noindex">
        <meta name="title" content="Notre bibliothèque en ligne">

        <!-- Appel des feuilles de style --/ Calling style sheets-->
        <!-- <link rel="stylesheet" href="app/public/css/admin/ajout.css"> -->
        <link rel="stylesheet" href="app/public/css/admin/stylesAdmin.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>
        <main class="ajoutLivre">
            <!--BOUTON RETOUR  -->
            <figure class="retour">
                <a href="./admin-listeMeta">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Modifier les metas
            </h1>
            <form method="POST" action="./admin-<?= $this->nomPage;?>-<?= $idMeta;?>?action2=modifierMeta">
     
                <!-- nomPage  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nomPageModif">Nom de la page :</label>
                    <input class=conteneurInputAjout type="text" id="nomPageModif" name="nomPageModif" value="<?= $unMeta->getNomPage(); ?>" >             
                </section>

                <!-- keywords  -->                
                 <section class="conteneurSection">
                    <label class="conteneurLabel" for="keywordsModif">Keywords :</label>
                    <input class=conteneurInputAjout type="text" id="keywordsModif" name="keywordsModif" value="<?= $unMeta->getKeywords(); ?>" >             
                </section>

                <!-- description  -->
                 <section class="conteneurSection">
                    <label class="conteneurLabel" for="descriptionModif">Description :</label>
                    <input class=conteneurInputAjout type="text" id="descriptionModif" name="descriptionModif" value="<?= $unMeta->getDescription(); ?>" >             
                </section>

                <!-- title  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="titleModif">Title :</label>
                    <input class=conteneurInputAjout type="text" id="titleModif" name="titleModif" value="<?= $unMeta->getTitle(); ?>">             
                </section>


                <!-- BOUTON VALIDER  -->
                <section>
                    <input class="boutonValiderAjoutLivre" id="btnValideAjoutLivre" type="submit" value="Valider">
                </section>
                
            </form>    
        </main>
        <footer>
            <p>
                &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
            </p>
        </footer>
    </body>
    
</html>