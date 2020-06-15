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
                <a href="./admin-listeAtelier">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Ajouter un atelier
            </h1>
            <form enctype="multipart/form-data" method="POST" action="./admin-<?= $this->nomPage;?>?action2=ajoutAtelier">

                <!-- NOM  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nom">Nom de l'atelier :</label>
                    <input class=conteneurInputAjout type="text" name="nom" placeholder="Nom de l'atelier" required>             
                </section>

                <!-- DATE DU JOUR  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="date">Date de l'atelier :</label>
                    <input class=conteneurInputAjout type="date" name="date" required>             
                </section>

                <!-- DESCRIPTION  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="description">Description de l'atelier  :</label>
                    <textarea class=conteneurInputAjout name="description" placeholder="Entrer votre description" required></textarea>            
                </section>

                <!-- HORAIRE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="horaire">Horaire de l'atelier  :</label>
                    <input class=conteneurInputAjout type="time" name="horaire" required>             
                </section>

                <!-- AGE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="age">Age pour l'atelier :</label>
                    <input class=conteneurInputAjout type="number" name="age" placeholder="Age pour l'atelier" required>             
                </section>

                <!-- CAPACITE  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="capacite">Capacité de l'atelier :</label>
                    <input class=conteneurInputAjout type="number" name="capacite" placeholder="Capacité de l'atelier" required>             
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