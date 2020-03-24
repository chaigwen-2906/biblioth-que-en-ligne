<header>
    <!------Bandeau (logo, titre, renseignement), Banner (logo, title, information)------->
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
            <a href="#" id="boutonFaq">
                <img class="retouchePointIntero" src="./../app/public/image/logo-flavicon/pointIntero1.png">
            </a>
        </div>
    </div>
    <!-------------------Menu principal, Main Menu--------------------------->
    <nav class="menu_principal">
            <div class="bloc_connexion">
            <a id="boutonCreerCompte" class="creerCompte" href="#">
                Créez-votre compte
            </a>
            <a id="boutonSidentifier" class="identifier" href="#">
                S'identifier
            </a>
        </div>
            
        <!-- Bloc déconnexion - s'affiche en mode connecté -->
        <figure class="bloc_deconnexion">
            <a href="#">
                <img id="boutonCompte" src="./../app/public/image/bouton/compte.png" alt="Mon compte" title="Mon compte">
            </a>
            <a href="index.php?action=panier">
                <img id="boutonPanier" src="./../app/public/image/bouton/panier.png" alt="Mon panier" title="Mon panier">
            </a>
            <a href="index.php?action=home">
                <img id="boutonDisconnect" src="./../app/public/image/bouton/disconnect.png" alt="Se deconnecter" title="Se deconnecter">   
            </a>
        </figure>
        <div class="btnloupe">
            <img src="./../app/public/image/bouton/loupe.png">
        </div>
        <!----------------------Menu------------------------------>
        <div class="burger" id="btnBurger">
            <img src="./../app/public/image/icon/burger.png" alt="image burger menu">
            Menu
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="./home">Accueil</a>
                </li>
                <li>
                    <a href="./coupDeCoeurs">Coups de coeurs</a>
                </li>
                <li>
                    <a href="./nouveaute">Nouveautés</a>
                </li>
                <li>
                    <a href="./atelier">Ateliers</a>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navMenuBurger">
        <ul>
            <li>
                <a href="index.php?action=home"> Accueil </a>
            </li>
            <li>
                <a href="index.php?action=coupDeCoeurs"> Coups de coeurs</a>
            </li>
            <li>
                <a href="index.php?action=nouveaute"> Nouveautés</a>
            </li>
            <li>
                <a href="index.php?action=atelier"> Ateliers</a>
            </li>
        </ul>
    </nav>
    
    <!--------------Barre de recherche, Search bar-------------------->
    <div id="barreDeRecherche">
        <form class="selectionLivres">
            <label>Thèmes</label>
            <select>
                <option>
                    Selectionner...
                </option>
                <option> Coup de coeurs </option>
                <option> Nouveautés </option>
                <option> Art </option>
                <option> Auteurs </option>
                <option>BD</option>
                <option> Culture </option>
                <option> Fiction </option>
                <option> Genres </option>
                <option> jeunesse </option>
                <option> Littérature </option>
                <option> Nature </option>
                <option> loisir </option>
                <option> Roman </option>
                <option> Savoirs </option>
                <option> Societé </option>
                <option> Scolaire </option>
                <option> Université </option>  
            </select>
            <div class="btnRecherche">
                <input type="text" name="search" placeholder="Je cherche...">
                <button type="submit">
                    Rechercher
                </button>
            </div>
        </form>
    </div>
</header>
<!-- BOITE MODAL:S'IDENTIFIER  -->
<div id="modalConnection" class="boiteModal">
    <img src="./../app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalConnection" src="./../app/public/image/bouton/btnFermer1.png">
            <h1>
                Veuillez vous d'identifier 
            </h1>
        </div>
        <div class="contenuModal">
            <form class="conteurForm">
                <div class="identifier">
                    <label class="labelAligne "  for="email"> E-mail </label>
                    <input class="inputAligne"  type="email" name="email" id="" placeholder=" Mot de passe" ><br />
                    <span id=""></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasse"> Mot de passe </label>
                    <input class="inputAligne" type="password" name="motDePasse" id="" placeholder=" Mot de passe"><br />
                    <span id=""></span>
                </div>
                <div class="conteneurIdentifiant" >
                <a href="#" class="monBoutton motPasseOublier" type="submit" >
                    Mot de passe oublié ? 
                </a>
                <a href="#" class="monBoutton motPasseOublier" type="submit" >
                Besoins d'un compte ? 
                </a>
                </div>
                <a href="#" class="monBoutton">
                    Connectez-vous
                </a>
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
            <img id="fermerModalCreerCompte" src="./../app/public/image/bouton/btnFermer1.png">
            <h1>
                Connectez-vous à votre compte
            </h1>
        </div>
        <div class="contenuModal">
            <form class="conteurForm">
                <div class="civilite">
                    <label for="monsieur" class="petit">M</label>
                    <input type="radio" name="Civilite" value="monsieur" id="monsieur">
                    <label for="madame" class="petit">Mme</label>
                    <input type="radio" name="Civilite" value="madame" id="madame">
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="nom">Nom*</label>
                    <input class="inputAligne" type="text" name="nom" id="nomCreez"
                        placeholder="Entrer votre nom *" >
                    <span id="errorNomCreez"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="prenom">Votre prénom*</label>
                    <input class="inputAligne" type="text" name="prenom" id="prenomCreez"
                        placeholder="Entrer votre prénom*">
                    <span id="errorPrenomCreez"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="email">Votre email*</label>
                    <input class="inputAligne" type="email" name="email" id="emailCreez"
                        placeholder="Entrer votre email*">
                    <span id="errorMailCreez"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="mobile">Votre téléphone</label>
                    <input class="inputAligne" type="tel" name="mobile" id="mobileCreez"
                        placeholder="Entrer votre numéro"/>
                    <span id="errorMobileCreez"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasse">Votre mot de passe</label>
                    <input class="inputAligne" type="password" name="motDePasse" id="motDePasseCreez"
                        placeholder="Mot de passe"/>
                    <span id="errorMotDePasseCreez"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="motDePasseConfirm">Confirmer votre mot de passe</label>
                    <input class="inputAligne" type="password" name="motDePasseConfirm" id="motDePasseConfirm"
                        placeholder=" Confirmation du mot de passe" />
                    <span id="errorMotDePasseConfirm"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne "for="adresse"> Votre adresse</label>
                    <input class="inputAligne" type="text" name="adresse" id="adresse"  placeholder="Entrer votre adresse"  />
                    <span id="errorAdresse"></span>
                </div>
                <div class="identifier">
                    <label class="labelAligne " for="date">Votre date de naissance</label>
                    <input class="inputAligne" type="date" name="date" id="dateCreez" class="form-control" placeholder="Ex: 31/06/2019"/>
                    <span id="errorDateCreez"></span>
                </div>
                <div class="identifier ">
                    <input class="" type="checkbox" name="offres" id="offres">
                    <label class="labelAligneRight " for="offres">
                        Les offres de nos partenaires
                    </label>
                </div>
                <div class="identifier ">
                    <input class=""  type="checkbox" name=" newsletter" id=" newsletter">
                    <label class="labelAligneRight " for=" newsletter">
                        Recevoir notre newsletter
                        Vous pouvez vous désinscrire à tout moment
                        par simple demande par mail à chaigwen@hotmail.fr.
                    </label>
                </div>
                <div class="identifier ">
                    <input class=""  type="checkbox" name="conditionsUtilisation" id="conditionsUtilisation"> 
                    <label class="labelAligneRight " for="conditionsUtilisation">
                            J'accepte les conditions d'utilisation et la politique de confidentialité
                    </label>
                    
                </div>
                <div class="conteneurIdentifiant">
                        <!--bouton pour envoyer le formulaire ou annuler-->
                        <a href="#" class="monBoutton" type="submit" >
                            Envoyer
                        </a>
                        <a href="#" class="monBoutton" type="reset" >
                            Annuler
                        </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--FIN BOITE MODAL:CREER VOTRE COMPTE  -->

<!-- BOITE MODAL FAQ  -->
<div id="modalFaq" class="boiteModal">
    <img src="./../app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="conteneurModal">
        <div class="enteteModal">
            <img id="fermerModalFaq" src="./../app/public/image/bouton/btnFermer1.png">
            <h1>
                Question - Réponse
            </h1>
        </div>
        <div class="contenuModal">
            <div id="divListFAQ" class="conteurForm">
            <?php
                foreach($listFAQ AS $uneQuestion)
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
