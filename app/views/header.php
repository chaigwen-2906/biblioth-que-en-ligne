<header>
    <!------Bandeau (logo, titre, renseignement), Banner (logo, title, information)------->
    <div class="bandeau">
        <figure class="headerLogo">
            <a href="index.php?action=home">
                <img class="retoucheLogo" src="app/public/image/logo-flavicon/toutUnivere1.png" alt="Tout l'univers"
                    title="Tout l'univers">
            </a>
        </figure>
        <h1>
            Ma bibliothèque en ligne
        </h1>
        <div class="logo">
            <a href="#">
                <img class="retouchePointIntero" src="app/public/image/logo-flavicon/pointIntero1.png">
            </a>
        </div>
    </div>
    <!-------------------Menu principal, Main Menu--------------------------->
    <nav class="menu_principal">
            <div class="bloc_connexion">
            <a class="creerCompte" href="#">
                Créez-votre compte
            </a>
            <a id="boutonSidentifier" class="identifier" href="#">
                S'identifier
            </a>
        </div>
            
        <!-- Bloc déconnexion - s'affiche en mode connecté -->
        <figure class="bloc_deconnexion">
            <a href="#">
                <img id="boutonCompte" src="app/public/image/bouton/compte.png" alt="Mon compte" title="Mon compte">
            </a>
            <a href="index.php?action=panier">
                <img id="boutonPanier" src="app/public/image/bouton/panier.png" alt="Mon panier" title="Mon panier">
            </a>
            <a href="index.php?action=home">
                <img id="boutonDisconnect" src="app/public/image/bouton/disconnect.png" alt="Se deconnecter" title="Se deconnecter">   
            </a>
        </figure>
        <div class="btnloupe">
            <img src="app/public/image/bouton/loupe.png">
        </div>
        <!----------------------Menu------------------------------>
        <div class="burger" id="btnBurger">
            <img src="app/public/image/icon/burger.png" alt="image burger menu">
            Menu
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="index.php?action=home">Accueil</a>
                </li>
                <li>
                    <a href="index.php?action=coupDeCoeurs">Coups de coeurs</a>
                </li>
                <li>
                    <a href="index.php?action=nouveaute">Nouveautés</a>
                </li>
                <li>
                    <a href="index.php?action=atelier">Ateliers</a>
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

<div id="modalConnection" class="boiteModal">
    <img src="./app/public/image/imgFond/fond_modal.png" class="fondModalDialog">
    <div class="contenuModal">
        
    
    </div>
</div>