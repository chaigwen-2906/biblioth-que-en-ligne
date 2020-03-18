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
        $listCdCoeur = $FrontHomeManager->getListCoupDeCoeur();
        $listMangas = $FrontHomeManager->getListMangas();

        //Appel à la vue : affichage
        require 'app/views/front/home.php';
    }

    function coupDeCoeursFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        require 'app/views/front/coupDeCoeurs.php';
    }

    function nouveauteFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

        require 'app/views/front/nouveaute.php';
    }

    function atelierFront()
    {
        //On charge le ManagerFront
        $FrontManager = new \Projet\Models\ManagerFront();
        //On récupère la liste des FAQs
        $listFAQ = $FrontManager->getListFAQ();

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
     

}