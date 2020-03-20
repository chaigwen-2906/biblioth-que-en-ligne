<?php

namespace Projet\Controllers;

class ControllerFront
{
    function homeFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

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
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        //on charge le ManagerFrontcoupDeCoeur
        $FrontCoupDeCoeurManager = new \Projet\Models\ManagerFrontCoupDeCoeur();
        $listCdCoeur = $FrontCoupDeCoeurManager-> getListCoupDeCoeur();

        require 'app/views/front/coupDeCoeurs.php';
    }

    function nouveauteFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        //on charge le ManagerFrontnouveaute
        $FrontNouveauteManager = new \Projet\Models\ManagerFrontNouveaute();
        $listNouveautes = $FrontNouveauteManager-> getListNouveautes();
       
        require 'app/views/front/nouveaute.php';
    }

    function atelierFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        //on charge le ManagerFrontAtelier
        $FrontAtelierManager = new \Projet\Models\ManagerFrontAtelier();
        $listAtelier = $FrontAtelierManager->getListAtelier();

        require 'app/views/front/atelier.php';
    }

    function panierFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        require 'app/views/front/panier.php';
    }

    function conditionsGeneralesFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        require 'app/views/front/conditionsGenerales.php';
    }

    function mentionsLegalesFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        require 'app/views/front/mentionsLegales.php';
    }
    
    function rgpdFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        require 'app/views/front/rgpd.php';
    }

    function planDuSiteFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();
        
        require 'app/views/front/planDuSite.php';
    }

    function detailLivre()
    {
        //on charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //on récupère la liste des FAQs
        $listFAQ = $FrontManager-> getListFAQ();

        $FrontManagerDetailLivre = new \Projet\Models\ManagerFrontDetailLivre();
        $DetailLivre = $FrontManagerDetailLivre->getDetailLivre($_GET['id']);

        require 'app/views/front/detailLivre.php';
    }

    function detailAtelier()
    {
        //on charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //on récupère la liste des FAQs
        $listFAQ = $FrontManager-> getListFAQ();

        require 'app/views/front/detailAtelier.php';
    }
     

}