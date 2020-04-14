<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="./../app/public/css/admin/connectionAdministrateur.css">
</head>
    <body>
        <section class="administrateur">
            <h1>
                Connection à l'administration
            </h1>
            <form class="conteneurForm" method="POST" action="./<?= $this->nomPage;?>?action2=connectionAdministrateur">

                <!-- NOM  -->
                <article class="divContenuAdministrateur">
                    <label class="labelAdministrateur" for="nom"> Nom d'utilisateur </label>
                    <input type="text" name="nom" class="inputAdministrateur" value="" > 
                    <span id="erreurNom"></span>
                </article>
                <!-- NOUVEAU MOT DE PASSE  -->
                <article class="divContenuAdministrateur">
                    <label class="labelAdministrateur" for="motPasse"> mot de passe</label>
                    <input type="text" name="motPasse" class="inputAdministrateur" value="" placeholder=" mot de passe" required/>
                    <span id="erreur"></span>
                </article>

            </form>
            <!-- BOUTON CONNECTER  -->
            <div>
                <p class="boutonConnecterAdmisnistrer" >
                    <input id="btnConnectAdministrateur" class="boutonAdministrer"  type="submit" value="Connecter">
                </p>
            </div>
        
        </section>
        
    </body>
</html>