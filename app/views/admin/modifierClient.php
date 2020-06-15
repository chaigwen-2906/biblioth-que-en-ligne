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
                Modifier un client
            </h1>
            <form method="POST" action="./admin-<?= $this->nomPage;?>-<?= $idClient;?>?action2=modifierClient">

               <!-- numeroAbonne  -->
               <section class="conteneurSection">
                    <label class="conteneurLabel" for="numeroAbonne">numeroAbonne :</label>
                    <input class=conteneurInputAjout type="number" name="numeroAbonne" value="<?= $unClient->getNumeroAbonne(); ?>">             
                </section>

                <!-- civilite  -->
                <section class="conteneurSection">
                <label class="conteneurLabel" for="selectciviliteDispo">civilite :</label>
                    <select class=conteneurInputAjout  name="civilite">
                        <option value='Monsieur'<?php if($unClient->getCivilite() == 'Monsieur'){ echo " selected"; } ?>>Monsieur</option>
                        <option value='Madame'<?php if($unClient->getCivilite() == 'Madame'){ echo " selected"; } ?>>Madame</option>  
                    </select>            
                </section>

                <!-- nom  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="nom">nom :</label>
                    <input class=conteneurInputAjout type="text" name="nom" value="<?= $unClient->getNom(); ?>">             
                </section>

                <!-- prenom  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="prenom">prenom :</label>
                    <input class=conteneurInputAjout type="text" name="prenom" value="<?= $unClient->getPrenom(); ?>">             
                </section>

                <!-- email  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="email">email :</label>
                    <input class=conteneurInputAjout type="email" name="email" value="<?= $unClient->getEmail(); ?>">             
                </section>

                <!-- telephoneMobile  -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="telephoneMobile">telephoneMobile  :</label>
                    <input class=conteneurInputAjout type="tel" name="telephoneMobile" value="<?= $unClient->getTelephoneMobile(); ?>">             
                </section>

                <!-- telephoneFixe -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="telephoneFixe">telephoneFixe  :</label>
                    <input class=conteneurInputAjout type="tel" name="telephoneFixe" value="<?= $unClient->getTelephoneFixe(); ?>">             
                </section>

                <!-- adresse -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="adresse">adresse  :</label>
                    <input class=conteneurInputAjout type="text" name="adresse" value="<?= $unClient->getAdresse(); ?>">             
                </section>

                <!-- dateDeNaissance -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="dateDeNaissance">date De Naissance :</label>
                    <input class=conteneurInputAjout type="date" name="dateDeNaissance" value="<?= $unClient->getDateDeNaissance(); ?>">             
                </section>

                <!-- motDePasse -->
                <section class="conteneurSection">
                    <label class="conteneurLabel" for="motDePasse">motDePasse  :</label>
                    <input class=conteneurInputAjout type="password" name="motDePasse" value="<?= $unClient->getMotDePasse(); ?>">             
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