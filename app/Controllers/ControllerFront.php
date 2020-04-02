<?php

namespace Projet\Controllers;

class ControllerFront
{
    private $listFAQ;
    private $listCategorie;
    private $FrontManager;

    function gestionHeader()
    {
        //On récupère la liste des FAQs
        $this->listFAQ = $this->FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $this->listCategorie = $this->FrontManager->getListCategorie();
    }

    function gestionModeConnecte()
    {
        //On test si l'utilisateur à cliquer sur "Me connecter"
        if(isset($_POST["email"]) && isset($_POST["motDePasse"]))
        {
            //L'utilisateur essaie de se connecter
            //on test le couple @/mot de passe
            $testConnexion = $this->FrontManager->seConnecter($_POST["email"], $_POST["motDePasse"]);

            if($testConnexion != false)
            {
                //On stocke dans une variable de session javascript l'idClient
                echo "<script type='text/javascript'>sessionStorage.setItem('idClient', '$testConnexion');</script>"; 
            }
        }

        //On test si l'utilisateur a cliqué sur "se déconnecter"
        if(isset($_POST['action2']))
        {
            if($_POST['action2'] == "deconnecter")
            {
                //On déconnecte l'utilisateur
                echo "<script type='text/javascript'>sessionStorage.removeItem('idClient');</script>";
            }
        }
    }

    function homeFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontHome
        $FrontHomeManager = new \Projet\Models\ManagerFrontHome();
        $listCdCoeur = $FrontHomeManager-> getListCoupDeCoeur();
        $listNouveautes = $FrontHomeManager-> getListNouveautes();
        $listAtelier = $FrontHomeManager-> getListAtelier();
        $listMangas = $FrontHomeManager-> getListMangas();
        $listBandesDessinees = $FrontHomeManager-> getListBandesDessinees();
        $listCuisine = $FrontHomeManager-> getListCuisine();
       

        //Appel à la vue : affichage
        require 'app/views/front/home.php';
    }

    function coupDeCoeursFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontcoupDeCoeur
        $FrontCoupDeCoeurManager = new \Projet\Models\ManagerFrontCoupDeCoeur();
        $listCdCoeur = $FrontCoupDeCoeurManager-> getListCoupDeCoeur();

        require 'app/views/front/coupDeCoeurs.php';
    }

    function nouveauteFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontnouveaute
        $FrontNouveauteManager = new \Projet\Models\ManagerFrontNouveaute();
        $listNouveautes = $FrontNouveauteManager-> getListNouveautes();
       
        require 'app/views/front/nouveaute.php';
    }

    function atelierFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        //on charge le ManagerFrontAtelier
        $FrontAtelierManager = new \Projet\Models\ManagerFrontAtelier();
        $listAtelier = $FrontAtelierManager->getListAtelier();

        require 'app/views/front/atelier.php';
    }

    function pageRechercheFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        //on charge le ManagerFrontPageRecherche
        $FrontPageRechercheManager = new \Projet\Models\ManagerFrontPageRecherche();
        //Test si la page est appelée en tapant directement l'url (sans variable POST)
        if(isset($_POST['selectCategorie']) && isset($_POST['champRecherche']))
        {
            $resultPageRecherche = $FrontPageRechercheManager->getResultPageRecherche($_POST['selectCategorie'], $_POST['champRecherche']);
        }
        else{
            $resultPageRecherche = array();
        }
        

        
        require 'app/views/front/pageRecherche.php';
    }

    function panierFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

         //on charge le ManagerFrontPanier
         $FrontPanierManager = new \Projet\Models\ManagerFrontPanier();
         $resultPanier = $FrontPanierManager->getResultPanier();

        require 'app/views/front/panier.php';
    }

    function conditionsGeneralesFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/conditionsGenerales.php';
    }

    function mentionsLegalesFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/mentionsLegales.php';
    }
    
    function rgpdFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        require 'app/views/front/rgpd.php';
    }

    function planDuSiteFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();
        
        require 'app/views/front/planDuSite.php';
    }

    function detailLivreFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        $FrontManagerDetailLivre = new \Projet\Models\ManagerFrontDetailLivre();
        $DetailLivre = $FrontManagerDetailLivre->getDetailLivre($_GET['id']);

        //On ajoute le commentaire si on est en situation de post du formulaire
        if(isset($_POST["idClient"]) && isset($_POST["note"]) && isset($_POST["description"]))
        {
            //on enregistre le commentaire posté par utilisateur
            $FrontManagerDetailLivre->postCommentaire($_GET['id'],$_POST["idClient"],$_POST["note"],$_POST["description"]);
        }
        
        //On récupère la liste des derniers commentaires
        $listCommentaire = $FrontManagerDetailLivre->getCommentaire($_GET['id']);

        require 'app/views/front/detailLivre.php';
    } 

    function detailAtelierFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        // on récupère par id
        $FrontManagerDetailAtelier = new \Projet\Models\ManagerFrontDetailAtelier();
        $DetailAtelier = $FrontManagerDetailAtelier->getDetailAtelier($_GET['id']);

        require 'app/views/front/detailAtelier.php';
    }

    function monCompteFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        if(isset($_POST['idClient']))
        {
            // on récupère le compte
            $FrontManagerMonCompte = new \Projet\Models\ManagerFrontMonCompte();
            $monCompte = $FrontManagerMonCompte->getMonCompte($_POST['idClient']);

            // if ($_POST['action2']=="modifier")
            // {
            //     $monCompteModifier =$FrontManagerMonCompte->modifierClient($_POST['idClient']);
            // }

            require 'app/views/front/monCompte.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
        
    }


    function pageErreurFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/pageErreur.php';
        
    }

    function passOublierFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();
        
        require 'app/views/front/passOublier.php';
    }

     

}