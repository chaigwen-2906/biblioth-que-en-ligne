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
        <!-- <link rel="stylesheet" href="app/public/css/admin/connectionAdministrateur.css"> -->
        <link rel="stylesheet" href="app/public/css/admin/stylesAdmin.css">

        <!-- Appel a l'icon dans le champs d'ouverture --/ Call to the icon in the opening field-->
        <link rel="icon" href="app/public/image/logo-flavicon/flavicon.jpg" />

    </head>
    <body>
        <main>
            <section class="administrateur">
                <h1>
                    Connection à l'administration
                </h1>
                <form class="conteneurForm" method="POST" action="./admin-<?= $this->nomPage;?>?action2=connectionAdministrateur">

                    <!-- NOM  -->
                    <article class="divContenuAdministrateur">
                        <label class="labelAdministrateur" for="nom"> Nom d'utilisateur </label>
                        <input type="text" name="nom" class="inputAdministrateur" value=""/> 
                        <span id="erreurNom"></span>
                    </article>
                    <!-- NOUVEAU MOT DE PASSE  -->
                    <article class="divContenuAdministrateur">
                        <label class="labelAdministrateur" for="motPasse"> mot de passe</label>
                        <input type="password" name="motPasse" class="inputAdministrateur" value=""/>
                        <span id="erreur"></span>
                    </article>

                
                <!-- BOUTON CONNECTER  -->
                <div>
                    <p class="boutonConnecterAdmisnistrer" >
                        <input id="btnConnectAdministrateur" class="boutonAdministrer"  type="submit" value="Connecter">
                    </p>
                </div>
                </form>
            
            </section>
        </main>
        <footer>
            <p>
                &copy; La bibliothèque en ligne 2020. Développeur web: Lemoine Gwénola
            </p>
        </footer>
        
    </body>

   

</html>