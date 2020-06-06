<header>
    <!------Bandeau (logo, titre, renseignement(FAQ)), Banner (logo, title, information)------->
    <div class="bandeau">
        <figure class="headerLogo">
            <a href="./home">
                <img class="retoucheLogo" src="./../app/public/image/logo-flavicon/toutUnivere1.png" alt="Tout l'univers"
                    title="Tout l'univers">
            </a>
        </figure>
        <h1>
            Ma bibliothèque en ligne
        </h1>
        <div class="logo">
            <a href="" id="boutonFaq">
                <img class="retouchePointIntero" src="./../app/public/image/logo-flavicon/pointIntero1.png">
            </a>
        </div>
    </div>
    
    <!-------------------Menu principal, Main Menu--------------------------->
    <nav class="menu_principal">

        <div class="bloc_connexion">
            <a id="boutonCreerCompte" href="">
                <img src="./../app/public/image/bouton/creer_compte.png" alt="Créer son compte" title="Créer son compte">
            </a>
            <a id="boutonSidentifier" href="">
                <img src="./../app/public/image/bouton/login.png" alt="S'identifier" title="S'identifier">
            </a>
        </div>

        <!-- Bloc déconnexion - s'affiche en mode connecté -->
        <figure class="bloc_deconnexion">
            <a href="./monCompte">
                <img id="boutonCompte" src="./../app/public/image/bouton/compte.png" alt="Mon compte" title="Mon compte">
            </a>

            <a href="./panier">
                <img id="boutonPanier" src="./../app/public/image/bouton/panier.png" alt="Mon panier" title="Mon panier">
            </a>

            <a href="./<?= $this->nomPage;?>?action2=deconnecter">
                <img id="boutonDisconnect" src="./../app/public/image/bouton/disconnect.png" alt="Se deconnecter" title="Se deconnecter">
            </a>
        </figure>

        <div class="boutonLoupe">
            <img src="./../app/public/image/bouton/loupe.png">
        </div>
        <!----------------------Menu------------------------------>
        <div class="burger" id="boutonBurger">
            <img src="./../app/public/image/icon/burger.png" alt="image burger menu">
        </div>
        <div class="menu">
            <ul id="conteneurMenu" >
                <li class="nav-item">
                    <a href="./home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a href="./coupDeCoeurs">Coups de coeurs</a>
                </li>
                <li class="nav-item">
                    <a href="./nouveaute">Nouveautés</a>
                </li>
                <li class="nav-item">
                    <a href="./atelier">Ateliers</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navMenuBurger">
        <ul id="conteneurMenuBurger" >
            <li class="nav-item">
                <a href="./home"> Accueil </a>
            </li>
            <li class="nav-item">
                <a href="./coupDeCoeurs"> Coups de coeurs</a>
            </li>
            <li class="nav-item">
                <a href="./nouveaute"> Nouveautés</a>
            </li>
            <li class="nav-item">
                <a href="./atelier"> Ateliers</a>
            </li>
        </ul>
    </nav>
    
    <!--------------Barre de recherche, Search bar-------------------->
    <div id="barreDeRecherche">
        <form class="selectionLivres" name="formRecherche" method="post" action="./pageRecherche" onsubmit="return verificationRecherche()">
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
            <img src="./../app/public/image/bouton/search.png" class="boutonRechercher" alt="Rechercher" onclick="verificationRecherche();">
        </form>
    </div>
</header>



<!-- BOITE MODAL:S'IDENTIFIER  -->
<div id="modalConnection" class="boiteModal">
    <img src="./../app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalConnection" class="boutonFermerModal" src="./../app/public/image/bouton/btnFermer1.png" alt="Bouton fermer" title="Bouton fermer">
            <h1>
                Veuillez vous d'identifier 
            </h1>
        </div>
        <div class="contenuModal">
            <form class="conteneurForm" method="POST" action="./<?= $this->nomPage;?>?action2=connecter">
                <div class="identifier">
                    <label class="labelAligne "  for="email"> E-mail </label>
                    <div class="blocinput">
                        <?php
                            $emailClient = "";
                            
                            if(isset($_COOKIE['emailClient']))
                            {
                                $emailClient = $_COOKIE['emailClient'];
                            }
                        ?>
                        <input class="inputAligne" type="email" name="email" id="emailIdentifier" placeholder="E-mail" value="<?= $emailClient; ?>" required="required"><br /> 
                        <span id="erreurMailIdentifier"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasse"> Mot de passe </label>
                    <div class="blocinput">
                        <input class="inputAligne" type="password" name="motDePasse" id="motDePasseIdentifier" placeholder=" Mot de passe" required><br />
                        <span id="erreurMotDePasseIdentifier"></span>
                    </div>
                </div>
                <div id="erreurPostFormulaireConnexion" class="error"></div>
                <div class="conteneurIdentifiant" >
                <a href="./passOublier" class="monBoutton">
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
    <img src="./../app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalCreerCompte" class="boutonFermerModal" src="./../app/public/image/bouton/btnFermer1.png" alt="Bouton fermer" title="Bouton fermer">
            <h1>
                Créez-votre compte
            </h1>
        </div>
        <div class="contenuModal">
            <form class="conteneurForm" method="POST" action="./<?= $this->nomPage;?>?action2=creerCompte">
                <div class="civilite">
                    <div>
                        <label for="monsieur" class="petit">M</label>
                        <input type="radio" name="civilite" value="monsieur" id="civiliteMRCreer">
                        <label for="madame" class="petit">Mme</label>
                        <input type="radio" name="civilite" value="madame" id="civiliteMMECreer">
                </div>
                    <span id="erreurCiviliteCreer"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="numeroAbonne">Numéro d'abonnée</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="numeroAbonne" id="numeroAbonneCreer"
                        placeholder="Entrer votre Numero abonne">
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="nom">Nom</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="nom" id="nomCreer"
                            placeholder="Entrer votre nom" required>
                        <span id="erreurNomCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="prenom">Votre prénom</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="prenom" id="prenomCreer"
                            placeholder="Entrer votre prénom" required>
                        <span id="erreurPrenomCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="email">Votre email</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="email" name="email" id="emailCreer"
                            placeholder="Entrer votre email" required>
                        <span id="erreurMailCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="mobile">Votre Mobile</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="tel" name="mobile" id="mobileCreer"
                            placeholder="Entrer votre numéro" required>
                        <span id="erreurMobileCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="mobile">Votre Fixe</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="tel" name="telephone" id="telephoneCreer"
                            placeholder="Entrer votre numéro">
                        <span id="erreurTelephoneCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne "for="adresse"> Votre adresse</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="adresse" id="adresseCreer"  
                        placeholder="Entrer votre adresse" onkeyup="search()" required>
                        <span id="erreurAdresseCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="date">Votre date de naissance</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="text" name="date" id="dateCreer" 
                        placeholder="Ex: 31/06/2019" required>
                        <span id="erreurDateCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasse">Votre mot de passe</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="password" name="motDePasse" id="motDePasseCreer"
                            placeholder="Mot de passe" required>
                        <span id="erreurMotDePasseCreer"></span>
                    </div>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasseConfirm">Confirmer votre mot de passe</label>
                    <div class="blocinput">
                        <input class="inputAligne" type="password" name="motDePasseConfirm" id="motDePasseCreerConfirm"
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
                <div id="erreurPostFormulaireCreer" class="error"></div>
                <div class="conteneurIdentifiant">
                        <!--bouton pour envoyer le formulaire ou annuler-->
                        <input type="submit" id="boutonEnvoyerCreez" value="envoyer" class="monBoutton">
                        <a href="./home" class="monBoutton" type="reset" >
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
    <img src="./../app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalFaq" src="./../app/public/image/bouton/btnFermer1.png"  alt="Bouton fermer" title="Bouton fermer">
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
    src="./../app/public/image/bouton/boutonHaut.png"  alt="Retour vers le haut" title="Retour vers le haut">
</a>
<!-- BTN RETOUR HAUT  -->
