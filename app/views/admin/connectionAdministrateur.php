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
            <form method="POST" action="./<?= $this->nomPage;?>?action2=connectionAdministrateur">

                <!-- NOM  -->
                <article class="divContenuCompte">
                    <label class="labelAdresse" for="nom">Votre nom</label>
                    <input type="text" name="nom" id="nomCompte"  class="champsCompteModifier" value="" required="required"> 
                    <span id="erreurNomCompte"></span>
                </article>
                <!-- NOUVEAU MOT DE PASSE  -->
                <article id="" class="divContenuCompte">
                    <label class="labelAdresse" for="nouveauMotPasse">Entrée votre nouveau mot de passe</label>
                    <input type="text" name="nouveauMotPasse" id="nouveauMotPasse" class="champsCompteModifier" value="" placeholder="Entrée votre nouveau mot de passe" required/>
                    <span id="erreurNouveauMotPasse"></span>
                </article>

            </form>
        
        </section>
        
    </body>
</html>