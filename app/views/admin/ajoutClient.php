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
                <a href="./admin-listeClient">
                    <img src="app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Ajouter un client
            </h1>
            <form method="POST" action="./admin-<?= $this->nomPage;?>?action2=ajoutClient">

                <!-- numeroAbonne  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="numeroAbonneClient">Numéro d'abonné :</label>
                    <input class=conteneurInputAjout type="text" id="numeroAbonneClient" name="numeroAbonneClient" placeholder="numeroAbonne" >             
                </section>

                <!-- civilite  -->
                <section class="conteneurSection">
                <label class="conteneurLabel" for="selectciviliteDispoClient">civilite :</label>
                    <select class=conteneurInputAjout id="selectciviliteDispoClient"  name="civilite" placeholder="civilite">
                            <option value="Monsieur">Monsieur</option>
                            <option value="Madame">Madame</option>
                    </select>            
                </section>

                <!-- nom  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nomClient">Nom :</label>
                    <textarea class=conteneurInputAjout id="nomClient"  name="nomClient" placeholder="nom"></textarea>            
                </section>

                <!-- prenom  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="prenomClient">Prénom :</label>
                    <input class=conteneurInputAjout type="text" id="prenomClient" name="prenomClient" placeholder="prenom">             
                </section>

                <!-- email  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="emailClient">Email :</label>
                    <input class=conteneurInputAjout type="email" id="emailClient"  name="emailClient" placeholder="email">             
                </section>

                <!-- telephoneMobile  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="telephoneMobileClient">Télèphone mobile  :</label>
                    <input class=conteneurInputAjout type="tel" id="telephoneMobileClient" name="telephoneMobileClient" placeholder="telephoneMobile ">             
                </section>

                <!-- telephoneFixe -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="telephoneFixeClient">Télèphone fixe  :</label>
                    <input class=conteneurInputAjout type="tel" id="telephoneFixeClient" name="telephoneFixeClient" placeholder="telephoneFixe ">             
                </section>

                <!-- adresse -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="adresseClient">Adresse  :</label>
                    <input class=conteneurInputAjout type="text" id="adresseClient" name="adresseClient" placeholder="adresse ">             
                </section>

                <!-- dateDeNaissance -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dateDeNaissanceClient">Date de naissance :</label>
                    <input class=conteneurInputAjout type="date" id="dateDeNaissanceClient" name="dateDeNaissanceClient" placeholder="dateDeNaissance " required>             
                </section>

                <!-- motDePasse -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="motDePasseClient">Mot de passe  :</label>
                    <input class=conteneurInputAjout type="password" id="motDePasseClient" name="motDePasseClient" placeholder="motDePasse ">             
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