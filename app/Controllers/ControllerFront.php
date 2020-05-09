<?php

namespace Projet\Controllers;

class ControllerFront
{
    private $listMetas;
    private $listFAQ;
    private $listCategorie;
    private $FrontManager;
    public $nomPage;
    private $erreurCreationCompte = false;
    private $libelleErreurCreationCompte;
    private $erreurConnexionCompte = false;
    private $libelleErreurConnexionCompte;

    private function gestionHeader()
    {
        //On récupère la liste des métas
        $this->listMetas = $this->FrontManager->getListMetas($this->nomPage);
        //On récupère la liste des FAQs
        $this->listFAQ = $this->FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $this->listCategorie = $this->FrontManager->getListCategorie();
    }

    private function gestionModeConnecte()
    {
        
        if(isset($_GET['action2']))
        {
            //On test si l'utilisateur à cliquer sur "Me connecter"
            if($_GET['action2'] == "connecter")
            {
                //L'utilisateur essaie de se connecter
                //on test le couple @/mot de passe
                //si ok, on récupère l'idClient dans la variable testConnexion
                $testConnexion = $this->FrontManager->seConnecter($_POST["email"], $_POST["motDePasse"]);

                if($testConnexion != false)
                {
                    //On stocke dans une variable de session PHP l'idClient
                    $_SESSION['idClient'] = $testConnexion;
                    $_SESSION['panier'] = array();
                }
                else{
                    $this->erreurConnexionCompte = true;
                    $this->libelleErreurConnexionCompte = "L'e-mail ou le mot de passe est incorrecte";
                }
            }

            //On test si l'utilisateur a cliqué sur "se déconnecter"
            if($_GET['action2'] == "deconnecter")
            {
                //On détruit la variable de session
                unset($_SESSION['idClient']);
                unset($_SESSION['panier']);
            }

            if($_GET['action2'] == "creerCompte")
            {
                //L'utilisateur essaie de creer son compte
                //on test les champs 
                //si ok, on récupère l'idClient dans la variable testCreerCompte
                $testCreerCompte = $this->FrontManager->creerCompte($_POST["numeroAbonne"],$_POST["civilite"], $_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["mobile"],
                $_POST["telephone"], $_POST["adresse"], $_POST["date"], $_POST["motDePasse"]);
                
                if(is_int($testCreerCompte))
                {   
                    //On stocke dans une variable de session PHP l'idClient
                    $_SESSION['idClient'] = $testCreerCompte;
                    $_SESSION['panier'] = array();
                }
                else
                {
                    $this->erreurCreationCompte = true;
                    $this->libelleErreurCreationCompte = $testCreerCompte;
                }
            }
        }
    }

    private function affichageBlocConnexion()
    {
        if(isset($_SESSION['idClient'])){
            echo "<script>";
                echo "$('.bloc_connexion').hide();";
                echo "$('.bloc_deconnexion').show();";
            echo "</script>";
        }
        else{
            echo "<script>";
                echo "$('.bloc_connexion').show();";
                echo "$('.bloc_deconnexion').hide();";
            echo "</script>";
        }
    }

    private function gestionErreurCreerCompte()
    {
        if($this->erreurCreationCompte == true)
        {
            //on ré-ouvre le modal dialog créer compte et on remplie les champs avec les précédentes données
            echo "<script>";
                if($_POST['civilite'] == "monsieur")
                {
                    echo "$('#civiliteMRCreez').attr('checked', true);";
                }
                else{
                    echo "$('#civiliteMMECreez').attr('checked', true);";
                }
                echo "$('#numeroAbonneCreez').val('".$_POST['numeroAbonne']."');";
                echo "$('#nomCreez').val('".$_POST['nom']."');";
                echo "$('#prenomCreez').val('".$_POST['prenom']."');";
                echo "$('#emailCreez').val('".$_POST['email']."');";
                echo "$('#mobileCreez').val('".$_POST['mobile']."');";
                echo "$('#telephoneCreez').val('".$_POST['telephone']."');";
                echo "$('#adresseCreez').val('".$_POST['adresse']."');";
               
                
                //On affiche l'erreur
                echo "$('#erreurPostFormulaireCreer').html('".addslashes($this->libelleErreurCreationCompte)."');";
            echo "</script>";
            

            //on ouvre la boite modal creer votre compte 
            echo "<script>$('#modalCreerCompte').show('slow');</script>";
        }
    }

    private function gestionErreurConnexionCompte()
    {
        if($this->erreurConnexionCompte == true)
        {
            //on ré-ouvre le modal dialog connexion
            echo "<script>";
                //On affiche l'erreur
                echo "$('#erreurPostFormulaireConnexion').html('".addslashes($this->libelleErreurConnexionCompte)."');";
            echo "</script>";
            

            //on ouvre la boite modal creer votre compte 
            echo "<script>$('#modalConnection').show('slow');</script>";
        }
    }

    function homeFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        $listCdCoeur = $FrontManagerLivre-> getListCoupDeCoeurLimit4();
        $listNouveautes = $FrontManagerLivre-> getListNouveautesLimit4();
        $listMangas = $FrontManagerLivre-> getListMangasLimit4();
        $listBandesDessinees = $FrontManagerLivre-> getListBandesDessineesLimit4();
        $listCuisine = $FrontManagerLivre-> getListCuisineLimit4();

        $FrontManagerAtelier = new \Projet\Models\front\ManagerFrontAtelier();
        $listAtelier = $FrontManagerAtelier-> getListAtelierLimit4();
       

        //Appel à la vue : affichage
        require 'app/views/front/home.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function coupDeCoeursFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        $listCdCoeur = $FrontManagerLivre-> getListCoupDeCoeur();

        require 'app/views/front/coupDeCoeurs.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function nouveauteFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        $listNouveautes = $FrontManagerLivre-> getListNouveautesLimit16();
       
        require 'app/views/front/nouveaute.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function atelierFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        //on charge le ManagerFrontAtelier
        $FrontAtelierManager = new \Projet\Models\front\ManagerFrontAtelier();
        $listAtelier = $FrontAtelierManager->getListAtelier();

        require 'app/views/front/atelier.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function pageRechercheFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontLivre
        $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
        //Test si la page est appelée en tapant directement l'url (sans variable POST)
        if(isset($_POST['selectCategorie']) && isset($_POST['champRecherche']))
        {
            $resultPageRecherche = $FrontManagerLivre->getResultPageRecherche($_POST['selectCategorie'], $_POST['champRecherche']);
        }
        else{
            $resultPageRecherche = array();
        }
    
        require 'app/views/front/pageRecherche.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function panierFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        $donnees = array();
        if(isset($_SESSION['idClient']))
        {
            //on charge le ManagerFrontLivre
            $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();


            //on test si la variable action2 existe
            if(isset($_GET["action2"])){

                //je test quel soit bien égale a ajoute panier
                if($_GET["action2"] == "suppressionLivre")
                {
                    // on test si l' id est dans le tableau 
                    if(in_array($_GET['id'] , $_SESSION['panier']))
                    {
                        //on cherche l'index de l'idLivre dans le tableau $_SESSION panier  
                        $tablIndex = array_search($_GET['id'], $_SESSION['panier'] );
                        //supprime dans le tableau la valeur presente a index $tablIndex  
                        unset($_SESSION['panier'][$tablIndex]);


                        echo "<script>alert('Votre demande à bien été supprimer')</script>";
                    }
                    else{

                        echo "<script>alert('Ce livre est déjà supprimer')</script>";
                    }
                }
                //action de validation panier
                if($_GET["action2"] =="validerPanier")
                {   
                    // mon panier est un tableau d'idLivre 
                    foreach ($_SESSION['panier'] as $unIdLivre)
                    {
                        $FrontManager->ajoutReservation($unIdLivre, $_SESSION['idClient'] );
                    }
                    
                    //on remet le tableau  $_SESSION ['panier] à vide
                    $_SESSION['panier'] = array();
                }
            }

            // j'affiche le chargement de tt les donnée
            if(!empty($_SESSION['panier']))
            {
                foreach($_SESSION['panier'] as $unIdLivre)
                {
                    $retour = $FrontManagerLivre->getInfoLivre($unIdLivre);
                    $retour['idLivre'] = $unIdLivre;

                    array_push($donnees,$retour);
                }
            }

            $listDemandeEnAttente = $FrontManager-> getListDemandeEnAttente($_SESSION['idClient']);
            $listDemandeValider = $FrontManager-> getListDemandeValider($_SESSION['idClient']);

            require 'app/views/front/panier.php';

            //On gère l'affichage des blocs connexion / deconnexion
            $this->affichageBlocConnexion();
        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function conditionsGeneralesFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/conditionsGenerales.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function mentionsLegalesFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/mentionsLegales.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }
    
    function rgpdFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        require 'app/views/front/rgpd.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function planDuSiteFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();
        
        require 'app/views/front/planDuSite.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function detailLivreFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        if(isset($_GET['id']))
        {
            $FrontManagerLivre = new \Projet\Models\front\ManagerFrontLivre();
            $DetailLivre = $FrontManagerLivre->getDetailLivre($_GET['id']);

            //on test si la variable action2 existe
            if(isset($_GET["action2"])){

                //je test quel soit bien égale a ajoute panier
                if($_GET["action2"] == "ajoutePanier")
                {
                    if(!in_array($_GET['id'], $_SESSION['panier']))
                    {
                        //on ajoute idLivre dans la variable $_SESSION panier 
                        array_push($_SESSION['panier'], $_GET['id'] );

                        echo "<script>alert('Votre demande de réservation a bien été ajoutée au panier')</script>";
                    }
                    else{

                        echo "<script>alert('Ce livre est déjà dans votre panier')</script>";
                    }
                }


                //On ajoute le commentaire si on est en situation de post du formulaire
                if($_GET["action2"] == "ajouteCommentaire")
                {
                    if(isset($_SESSION["idClient"]) && isset($_POST["note"]) && isset($_POST["description"]))
                    {
                        //on enregistre le commentaire posté par utilisateur
                        $FrontManagerLivre->postCommentaire($_GET['id'],$_SESSION["idClient"],$_POST["note"],$_POST["description"]);
                    }
                }

            }
            
            //On récupère la liste des derniers commentaires
            $listCommentaire = $FrontManagerLivre->getCommentaire($_GET['id']);

            require 'app/views/front/detailLivre.php';

            //On gère l'affichage des blocs connexion / deconnexion
            $this->affichageBlocConnexion();

            //On gère le cas d'erreur sur une création de compte
            $this->gestionErreurCreerCompte();
            //On gère le cas d'erreur sur la connexion au compte
            $this->gestionErreurConnexionCompte();
        }
        else{
            header('Location: ./home');
            exit();
        }
    } 

    function detailAtelierFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        if(isset($_GET['id']))
        {
            // on récupère par id
            $FrontManagerAtelier = new \Projet\Models\front\ManagerFrontAtelier();
            $DetailAtelier = $FrontManagerAtelier->getDetailAtelier($_GET['id']);

            require 'app/views/front/detailAtelier.php';

            //On gère l'affichage des blocs connexion / deconnexion
            $this->affichageBlocConnexion();

            //On gère le cas d'erreur sur une création de compte
            $this->gestionErreurCreerCompte();
            //On gère le cas d'erreur sur la connexion au compte
            $this->gestionErreurConnexionCompte();
        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function monCompteFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //TEST de sécurité : on s'assure que le client est connecté (qu'il existe une variable $_SESSION['idClient'])
        if(isset($_SESSION['idClient']))
        {
  
            //on enregistre avant de charger les informations
            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "enregistrerInfosPers"){
                    
                    //on appelle la function qui met à jour les informations dans la basse de donnée
                    //récuperer les variables post
                    $FrontManager->misAJourInfoPersClient($_SESSION['idClient'],$_POST['Civilite'],$_POST['nom'],$_POST['prenom'],$_POST['email'],
                    $_POST['mobile'],$_POST['fixe'],$_POST['adresse'],$_POST['dateNaissance']);
                }
                if ($_GET['action2'] == "enregistrerPassword"){
                    
                    //on appelle la function qui met à jour les informations dans la basse de donnée
                    //récuperer les variables post
                    $FrontManager->enregistrerPassword($_SESSION['idClient'],$_POST['nouveauMotPasse'], $_POST['confirNouveauMotPasse']);
                }
            }

            // on récupère le compte
            $monCompte = $FrontManager->getMonCompte($_SESSION['idClient']);

            require 'app/views/front/monCompte.php';

            //On gère l'affichage des blocs connexion / deconnexion
            $this->affichageBlocConnexion();

            if(isset($_GET['action2']))
            {
                //on test la valeur de action2
                if ($_GET['action2']=="modifier")
                {
                    echo "<script>";
                        echo "$('.conteneurMonCompte').hide();";
                        echo "$('.conteneurMonCompteModifier').show();";
                        echo "$('.conteneurCompteMotPass').show();";
                    echo "</script>";
                }
                else{
                    //si on tombe pas dans l'un cas au dessus on revient sur l'affichage de compte 
                    echo "<script>";
                        echo "$('.conteneurMonCompte').show();";
                        echo "$('.conteneurMonCompteModifier').hide();";
                        echo "$('.conteneurCompteMotPass').hide();";
                    echo "</script>";
                }
            }
            else{
                //Par défaut si pas d'action2 on revient sur la page mon compte
                echo "<script>";
                    echo "$('.conteneurMonCompte').show();";
                    echo "$('.conteneurMonCompteModifier').hide();";
                    echo "$('.conteneurCompteMotPass').hide();";
                echo "</script>";
            }
        }
        else{
            header('Location: ./home');
            exit();
        }
        
    }


    function pageErreurFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/pageErreur.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
        
    }

    function passOublierFront()
    {
        $this->FrontManager = new \Projet\Models\front\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();


        if(isset($_GET["action2"]))
        {
            //on test si elle est egale a motDePasseOublier
            if($_GET["action2"] == "motDePasseOublier"){

                //on génére un mot de passe aleatoire 
                $nouveuMotPass = "";
                    //1ere lettre en majuscule
                $ascii = rand(65,90);

                    // nombre aleatoire
                $nouveauMotPass = chr($ascii);

                    //2ere lettre &
                $nouveauMotPass = $nouveauMotPass."&";

                    //3ere lettre chiffre aleatoire
                $nouveauMotPass = $nouveauMotPass.rand(1,9);

                    //on ajoute 5 lettres minuscules
                for($i=0; $i<5; $i++){
                    
                    $ascii = rand(97,122);
                    //
                    $nouveauMotPass = $nouveauMotPass.chr($ascii);
                }
                
                //j'appel ma fonction pour enregistrer dans la base de données
                $FrontManager->motDePasseOublier($_POST["adresseMail"],$nouveauMotPass);

                //on envoie le mail au client 
                // Le message
                $message = "Bonjour, nous vous envoyons ce nouveau mot de passe que vous venez de générer sur notre site. \r\n";
                $message = $message."On vous invite à personnaliser ce mot de passe en ce rendant sur le site dans la rubrique: Mon compte \r\n";
                $message = $message."Si vous n'êtes pas à l'origine de cette manipulation, on vous invite à prendre contact avec la bibliothèquaire.\r\n";
                $message = $message."Nous vous remecions pour votre expérience sur notre site.";

                // Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
                $message = wordwrap($message, 70, "\r\n");

                // Envoi du mail
                mail('chaigwen@hotmail.fr', 'Nouveau mot de passe', $message);   
            }
        }
        
        require 'app/views/front/passOublier.php';

        //On gère l'affichage des blocs connexion / deconnexion
        $this->affichageBlocConnexion();

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

     

}