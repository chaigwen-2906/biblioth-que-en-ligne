<?php

namespace Projet\Controllers;

class ControllerFront
{
    function homeFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

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
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        //on charge le ManagerFrontcoupDeCoeur
        $FrontCoupDeCoeurManager = new \Projet\Models\ManagerFrontCoupDeCoeur();
        $listCdCoeur = $FrontCoupDeCoeurManager-> getListCoupDeCoeur();

        require 'app/views/front/coupDeCoeurs.php';
    }

    function nouveauteFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        //on charge le ManagerFrontnouveaute
        $FrontNouveauteManager = new \Projet\Models\ManagerFrontNouveaute();
        $listNouveautes = $FrontNouveauteManager-> getListNouveautes();
       
        require 'app/views/front/nouveaute.php';
    }

    function atelierFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        //on charge le ManagerFrontAtelier
        $FrontAtelierManager = new \Projet\Models\ManagerFrontAtelier();
        $listAtelier = $FrontAtelierManager->getListAtelier();

        require 'app/views/front/atelier.php';
    }

    function pageRechercheFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();

        // FIN HEADER 

        //récuperer

        //on charge le ManagerFrontPageRecherche
        $FrontPageRechercheManager = new \Projet\Models\ManagerFrontPageRecherche();
        $resultPageRecherche = $FrontPageRechercheManager->getResultPageRecherche($_POST['selectCategorie'], $_POST['champRecherche']);

        
        require 'app/views/front/pageRecherche.php';
    }

    function panierFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

         //on charge le ManagerFrontPanier
         $FrontPanierManager = new \Projet\Models\ManagerFrontPanier();
         $resultPanier = $FrontPanierManager->getResultPanier();

        require 'app/views/front/panier.php';
    }

    function conditionsGeneralesFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        require 'app/views/front/conditionsGenerales.php';
    }

    function mentionsLegalesFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        require 'app/views/front/mentionsLegales.php';
    }
    
    function rgpdFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        require 'app/views/front/rgpd.php';
    }

    function planDuSiteFront()
    {
      //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 
        
        require 'app/views/front/planDuSite.php';
    }

    function detailLivreFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        $FrontManagerDetailLivre = new \Projet\Models\ManagerFrontDetailLivre();
        $DetailLivre = $FrontManagerDetailLivre->getDetailLivre($_GET['id']);

        require 'app/views/front/detailLivre.php';
    }

    function detailAtelierFront()
    {
        //DEBUT HEADER

        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        //On récupère la liste des catégorie
        $listCategorie = $FrontManager->getListCategorie();
        
        // FIN HEADER 

        // on récupère par id
        $FrontManagerDetailAtelier = new \Projet\Models\ManagerFrontDetailAtelier();
        $DetailAtelier = $FrontManagerDetailAtelier->getDetailAtelier($_GET['id']);

        require 'app/views/front/detailAtelier.php';
    }
     

}