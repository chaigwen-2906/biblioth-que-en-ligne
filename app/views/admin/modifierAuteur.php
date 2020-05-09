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
        <link rel="stylesheet" href="./../app/public/css/admin/ajout.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>
        <main class="ajoutLivre">
            <!--BOUTON RETOUR  -->
            <figure class="retour">
                <a href="./listeAuteur">
                    <img src="./../app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Modifier un auteur
            </h1>
            <form  method="POST" action="./<?= $this->nomPage;?>?action2=modifierAuteur&idAuteur=<?= $idAuteur;?>">

                <!-- NOM  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nom"> Nom de l'auteur :</label>
                    <input class=conteneurInputAjout type="text" name="nom" value="<?= $unAuteur->getNomAuteur(); ?>">             
                </section>

                <!-- PRENOM  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="prenom"> Prénom de l'auteur :</label>
                    <input class=conteneurInputAjout type="text" name="prenom" value="<?= $unAuteur->getPrenomAuteur(); ?>">             
                </section>


                <!-- BOUTON VALIDER  -->
                <section>
                    <input class="boutonValiderAjoutLivre" id="btnValideAjoutLivre"  type="submit" value="Valider">
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