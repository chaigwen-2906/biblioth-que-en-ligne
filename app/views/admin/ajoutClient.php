<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- je n'index pas cette pas là  -->
        <meta name="robots" content="noindex">

        <meta name="title" content="Notre bibliothèque en ligne">
        
        <title> Ajouter un client - Ma bibliothèque en ligne</title>

        <!-- Appel des feuilles de style --/ Calling style sheets-->
        <link rel="stylesheet" href="./../app/public/css/admin/ajout.css">
 
        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="./../app/public/image/logo-flavicon/flavicon.jpg" />

    </head>

    <body>
        <main class="ajoutLivre">
            <!--BOUTON RETOUR  -->
            <figure class="retour">
                <a href="./listeClient">
                    <img src="./../app/public/image/bouton/retour.png" alt=" Retour" title=" Retour">
                    Retour 
                </a>
            </figure>
            <!-- FIN BOUTON RETOUR  -->

            <h1>
                Ajouter un client
            </h1>
            <form method="POST" action="./<?= $this->nomPage;?>?action2=ajoutClient">

                <!-- numeroAbonne  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="numeroAbonne">Numéro d'abonné :</label>
                    <input class=conteneurInputAjout type="text" name="numeroAbonne" placeholder="numeroAbonne" >             
                </section>

                <!-- civilite  -->
                <section class="conteneurSection">
                <label class="conteneurLabel" for="selectciviliteDispo">civilite :</label>
                    <select class=conteneurInputAjout  name="civilite" placeholder="civilite">
                            <option value="Monsieur">Monsieur</option>
                            <option value="Madame">Madame</option>
                    </select>            
                </section>

                <!-- nom  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nom">Nom :</label>
                    <textarea class=conteneurInputAjout name="nom" placeholder="nom"></textarea>            
                </section>

                <!-- prenom  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="prenom">Prénom :</label>
                    <input class=conteneurInputAjout type="text" name="prenom" placeholder="prenom">             
                </section>

                <!-- email  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="email">Email :</label>
                    <input class=conteneurInputAjout type="email" name="email" placeholder="email">             
                </section>

                <!-- telephoneMobile  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="telephoneMobile">Télèphone mobile  :</label>
                    <input class=conteneurInputAjout type="tel" name="telephoneMobile" placeholder="telephoneMobile ">             
                </section>

                <!-- telephoneFixe -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="telephoneFixe">Télèphone fixe  :</label>
                    <input class=conteneurInputAjout type="tel" name="telephoneFixe" placeholder="telephoneFixe ">             
                </section>

                <!-- adresse -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="adresse">Adresse  :</label>
                    <input class=conteneurInputAjout type="text" name="adresse" placeholder="adresse ">             
                </section>

                <!-- dateDeNaissance -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dateDeNaissance">Date de naissance :</label>
                    <input class=conteneurInputAjout type="date" name="dateDeNaissance" placeholder="dateDeNaissance " required>             
                </section>

                <!-- motDePasse -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="motDePasse">Mot de passe  :</label>
                    <input class=conteneurInputAjout type="password" name="motDePasse" placeholder="motDePasse ">             
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