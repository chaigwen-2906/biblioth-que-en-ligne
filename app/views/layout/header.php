<header>
    <!------Bandeau (logo, titre, renseignement(FAQ)), Banner (logo, title, information)------->
    <div class="bandeau">
        <figure class="headerLogo">
            <a href="./front-home">
                <img class="retoucheLogo" src="app/public/image/logo-flavicon/toutUnivere1.png" alt="Tout l'univers"
                    title="Tout l'univers">
            </a>
        </figure>
        <h1>
            Ma bibliothèque en ligne
        </h1>
        <div class="logo">
            <a href="" id="boutonFaq">
                <img class="retouchePointIntero" src="app/public/image/logo-flavicon/pointIntero1.png" alt="Foire aux questions" title="Foire aux questions">
            </a>
        </div>
    </div>
    
    <!-------------------Menu principal, Main Menu--------------------------->
    <nav class="menu_principal">

        
        <?php
        if(isset($_SESSION['idClient'])){
        ?>
            <!-- Bloc déconnexion - s'affiche en mode connecté -->
            <figure class="bloc_deconnexion">
                <a href="./front-monCompte">
                    <img id="boutonCompte" src="app/public/image/bouton/compte.png" alt="Mon compte" title="Mon compte">
                </a>

                <a href="./front-panier">
                    <img id="boutonPanier" src="app/public/image/bouton/panier.png" alt="Mon panier" title="Mon panier">
                </a>

                <a href="./front-<?= $this->nomPage;?>?action2=deconnecter">
                    <img id="boutonDisconnect" src="app/public/image/bouton/disconnect.png" alt="Se deconnecter" title="Se deconnecter">
                </a>
            </figure>
        <?php
        }
        else{
        ?>
            <div class="bloc_connexion">
                <a id="boutonCreerCompte" href="">
                    <img src="app/public/image/bouton/creer_compte.png" alt="Créer son compte" title="Créer son compte">
                </a>
                <a id="boutonSidentifier" href="">
                    <img src="app/public/image/bouton/login.png" alt="S'identifier" title="S'identifier">
                </a>
            </div>
        <?php
        }
        ?>
        

        

        <div class="boutonLoupe">
            <img src="app/public/image/bouton/loupe.png" alt="bouton de recherche" title="bouton de recherche">
        </div>
        <!----------------------Menu------------------------------>
        <div class="burger" id="boutonBurger">
            <img src="app/public/image/icon/burger.png" alt="image burger du menu" title="image burger du menu">
        </div>
        <div class="menu">
            <ul id="conteneurMenu" >
                <li class="nav-item">
                    <a href="./front-home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="./front-coupDeCoeurs">Coups de coeurs</a>
                </li>
                <li class="nav-item">
                    <a href="./front-nouveaute">Nouveautés</a>
                </li>
                <li class="nav-item">
                    <a href="./front-atelier">Ateliers</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navMenuBurger">
        <ul id="conteneurMenuBurger" >
            <li class="nav-item">
                <a href="./front-home"> Accueil </a>
            </li>
            <li class="nav-item">
                <a href="./front-coupDeCoeurs"> Coups de coeurs</a>
            </li>
            <li class="nav-item">
                <a href="./front-nouveaute"> Nouveautés</a>
            </li>
            <li class="nav-item">
                <a href="./front-atelier"> Ateliers</a>
            </li>
        </ul>
    </nav>
    
    <!--------------Barre de recherche, Search bar-------------------->
    <div id="barreDeRecherche">
        <form class="selectionLivres" name="formRecherche" method="post" action="./front-pageRecherche" onsubmit="return verificationRecherche()">
            <select id="selectCategorie" name="selectCategorie">
                <option value="0">
                    Catégorie...
                </option>
                <?php
                    foreach($this->listCategorie AS $uneCategorie)
                    {
                        echo "<option value='".$uneCategorie['idCategorie']."'>".$uneCategorie['nomCategorie']."</option>";
                    }
                ?>
            </select>
            <input id="champRecherche" type="text" name="champRecherche" placeholder="Nom du livre, auteur" >
            <img id="btnRechercher" src="app/public/image/bouton/search.png" class="boutonRechercher" alt="Rechercher">
        </form>
    </div>
</header>



<!-- BOITE MODAL:S'IDENTIFIER  -->
<div id="modalConnection" class="boiteModal">
    <img src="app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalConnection" class="boutonFermerModal" src="app/public/image/bouton/btnFermer1.png" alt="Bouton fermer" title="Bouton fermer">
            <h1>
                Veuillez vous d'identifier 
            </h1>
        </div>
        <div class="contenuModal">
            <form class="conteneurForm" method="POST" action="./front-<?= $this->nomPage;?>?action2=connecter">
                <div class="identifier">
                    <label class="labelAligne " for="emailIdentifier"> E-mail </label>
                    <div class="blocinput">
                        <?php
                            $emailClient = "";
                            
                            if(isset($_COOKIE['emailClient']))
                            {
                                $emailClient = $_COOKIE['emailClient'];
                            }
                        ?>
                        <input class="inputAligne" type="email" id="emailIdentifier" name="emailIdentifier" placeholder="E-mail" value="<?= $emailClient; ?>" required="required"><br /> 
                        <span id="erreurMailIdentifier"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasseIdentifier"> Mot de passe </label>
                    <div class="blocinput">
                        <input class="inputAligne" type="password" name="motDePasseIdentifier" id="motDePasseIdentifier" placeholder=" Mot de passe" required><br />
                        <span id="erreurMotDePasseIdentifier"></span>
                    </div>
                </div>
                <div id="erreurPostFormulaireConnexion" class="error"><?php if($this->erreurConnexionCompte == true){echo $this->libelleErreurConnexionCompte;} ?></div>
                <div class="conteneurIdentifiant" >
                <a href="./front-passOublier" class="monBoutton">
                    Mot de passe oublié ? 
                </a>
                <a id="boutonBesoinCompte" class="monBoutton" >
                    Besoin d'un compte ? 
                </a>
                </div>
                <input type="submit" id="boutonEnvoyerIdentifier" class="monBoutton" value="Me connecter">
            </form>
        </div>
    </div>
</div>
<!--FIN BOITE MODAL:S'IDENTIFIER  -->



<!-- BOITE MODAL:CREER VOTRE COMPTE  -->
<div id="modalCreerCompte" class="boiteModal">
    <img src="app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalCreerCompte" class="boutonFermerModal" src="app/public/image/bouton/btnFermer1.png" alt="Bouton fermer" title="Bouton fermer">
            <h1>
                Créez-votre compte
            </h1>
        </div>
        <div class="contenuModal">
            <form class="conteneurForm" method="POST" action="./front-<?= $this->nomPage;?>?action2=creerCompte">
                <div class="civilite">
                    <div>
                        <label for="civiliteMonsieur" class="petit">M</label>
                        <input type="radio" name="civilite" value="monsieur" id="civiliteMonsieur" <?php if($this->erreurCreationCompte == true){if($_POST['civilite'] == "monsieur"){echo "checked";}} ?>>
                        <label for="civiliteMadame" class="petit">Mme</label>
                        <input type="radio" name="civilite" value="madame" id="civiliteMadame" <?php if($this->erreurCreationCompte == true){if($_POST['civilite'] == "madame"){echo "checked";}} ?>>
                </div>
                    <span id="erreurCiviliteCreer"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="numeroAbonneCreer">Numéro d'abonnée</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="numeroAbonneCreer" id="numeroAbonneCreer"
                        placeholder="Entrer votre Numero abonne" value="<?php if($this->erreurCreationCompte == true){echo $_POST['numeroAbonne'];} ?>">
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="nomCreer">Nom</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="nomCreer" id="nomCreer"
                            placeholder="Entrer votre nom" required value="<?php if($this->erreurCreationCompte == true){echo $_POST['nom'];} ?>">
                        <span id="erreurNomCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="prenomCreer">Votre prénom</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="prenomCreer" id="prenomCreer"
                            placeholder="Entrer votre prénom" required value="<?php if($this->erreurCreationCompte == true){echo $_POST['prenom'];} ?>">
                        <span id="erreurPrenomCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="emailCreer">Votre email</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="email" name="emailCreer" id="emailCreer"
                            placeholder="Entrer votre email" required value="<?php if($this->erreurCreationCompte == true){echo $_POST['email'];} ?>">
                        <span id="erreurMailCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="mobileCreer">Votre Mobile</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="tel" name="mobileCreer" id="mobileCreer"
                            placeholder="Entrer votre numéro" required value="<?php if($this->erreurCreationCompte == true){echo $_POST['mobile'];} ?>">
                        <span id="erreurMobileCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="telephoneCreer">Votre Fixe</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="tel" name="telephoneCreer" id="telephoneCreer"
                            placeholder="Entrer votre numéro" value="<?php if($this->erreurCreationCompte == true){echo $_POST['telephone'];} ?>">
                        <span id="erreurTelephoneCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne "for="adresseCreer"> Votre adresse</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="adresseCreer" id="adresseCreer"  
                        placeholder="Entrer votre adresse" onkeyup="search()" required value="<?php if($this->erreurCreationCompte == true){echo $_POST['adresse'];} ?>">
                        <span id="erreurAdresseCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="dateCreer">Votre date de naissance</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="dateCreer" id="dateCreer" 
                        placeholder="Ex: 31/06/2019" required>
                        <span id="erreurDateCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasseCreer">Votre mot de passe</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="password" name="motDePasseCreer" id="motDePasseCreer"
                            placeholder="Mot de passe" required>
                        <span id="erreurMotDePasseCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasseCreerConfirm">Confirmer votre mot de passe</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="password" name="motDePasseCreerConfirm" id="motDePasseCreerConfirm"
                            placeholder=" Confirmation du mot de passe" required>
                        <span id="erreurMotDePasseCreerConfirm"></span>
                    </div>
                </div>
                <div class="identifier note">
                    Le mot de passe doit comporter au moins 8 caractère(s), au moins 1 chiffre(s), au moins 1 minuscule(s), au moins 1 majuscule(s), au moins 1 caractère(s) non-alphanumérique(s) tels que *, - ou #
                </div>
                <div class="identifier note">
                    Tous les champs du formulaire sont obligatoires sauf le numéro d'abonnée et le téléphone fixe.
                    
                </div>
                <div class="identifier conteneurCondUtil">
                    <div class="ctnCheckBox">
                        <input class=""  type="checkbox" name="conditionsUtilisation" id="conditionsUtilisation" required> 
                        <label for="conditionsUtilisation">
                            J'accepte les conditions d'utilisation et la politique de confidentialité
                        </label>
                    </div>
                    <span id="errorCheckbox"></span> 
                </div>
                <div id="erreurPostFormulaireCreer" class="error"><?php if($this->erreurCreationCompte == true){echo $this->libelleErreurCreationCompte;} ?></div>
                <div class="conteneurIdentifiant">
                        <!--bouton pour envoyer le formulaire ou annuler-->
                        <input type="submit" id="boutonEnvoyerCreez" value="envoyer" class="monBoutton">
                        <a href="./front-home" class="monBoutton" type="reset" >
                            Annuler
                        </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN BOITE MODAL:CREER VOTRE COMPTE  -->



<!-- BOITE MODAL: FAQ  -->
<div id="modalFaq" class="boiteModal">
    <img src="app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalFaq" src="app/public/image/bouton/btnFermer1.png"  alt="Bouton fermer" title="Bouton fermer">
            <h1>
                Question - Réponse
            </h1>
        </div>
        <div class="contenuModal">
            <div id="divListFAQ" class="conteneurFaq">
                <?php
                    foreach($this->listFAQ AS $uneQuestion)
                    {
                        //var_dump($uneQuestion);
                        echo "<h3>".$uneQuestion['question']."</h3>";
                        echo "<div class='faqReponse'><p>".$uneQuestion['reponse']."</p></div>";
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<!--FIN BOITE MODAL FAQ  -->



<!-- COOKIES  -->
<div id="barreCookie" class="cookies">
    <span>
        <!-- balise b : mets en gras -->
        <b>En continuant de défiler</b>, vous acceptez l'utilisation de services tiers pouvant installer des cookies
    </span>
    <a id="boutonAccepterCookie" class="accepter"> ✓ Ok, tout accepter</a>
    <a class="savoirPlus" href="https://www.cnil.fr/fr/site-web-cookies-et-autres-traceurs" target="_blank">En
        savoir plus</a>
</div>
<!-- COOKIES  -->



<!-- BTN RETOUR HAUT  -->
<a id="retourHaut" class="RetourHautPage"><img class="imgRetourHautPage"
    src="app/public/image/bouton/boutonHaut.png"  alt="Retour vers le haut" title="Retour vers le haut">
</a>
<!-- BTN RETOUR HAUT  -->
