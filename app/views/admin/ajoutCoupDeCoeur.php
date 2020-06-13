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
        <link rel="stylesheet" href="app/public/css/admin/ajout.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>
        <main class="ajoutLivre">
            <!--BOUTON RETOUR  -->
            <figure class="retour">
                <a href="./admin-listeCoupDeCoeur">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Ajouter un coup de coeur
            </h1>
            <form method="POST" action="./admin-<?= $this->nomPage;?>?action2=ajoutCoupDeCoeur">

                <!-- ID LIVRE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="selectLivre">Livre :</label>
                    <select class="conteneurInputAjout" name="selectLivre">
                            <?php
                                foreach($listLivre AS $unLivre)
                                {
                                    echo "<option value='".$unLivre['idLivre']."'>".$unLivre['nom']." - ".$unLivre['nomAuteur']."</option>";
                                }
                            ?>
                    </select>
                </section>

                <!-- auteur  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="auteur">Auteur :</label>
                    <input class="conteneurInputAjout" type="text" name="auteur" placeholder="auteur" required >             
                </section>

                <!-- commentaire  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="commentaire">Commentaire :</label>
                    <input class="conteneurInputAjout" type="text" name="commentaire" placeholder="commentaire">             
                </section>

                <!-- dateDePublication -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dateDePublication">Date de publication :</label>
                    <input class="conteneurInputAjout" type="date" name="dateDePublication" placeholder="dateDePublication " required>             
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