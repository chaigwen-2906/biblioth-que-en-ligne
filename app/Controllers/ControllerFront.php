<?php

namespace Projet\Controllers;

class ControllerFront
{
    function homeFront()
    {
        //traitement
        $homeFront = new \Projet\Models\ManagerFrontHome();
        $vars = $homeFront->viewFrontHome();

        //Appel à la vue : affichage
        require 'app/views/front/home.php';
    }

    function coupDeCoeursFront()
    {
        require 'app/views/front/coupDeCoeurs.php';
    }

    function nouveauteFront()
    {
        require 'app/views/front/nouveaute.php';
    }

    function atelierFront()
    {
        require 'app/views/front/atelier.php';
    }

    function panierFront()
    {
        require 'app/views/front/panier.php';
    }

    function conditionsGeneralesFront()
    {
        require 'app/views/front/conditionsGenerales.php';
    }

    function mentionsLegalesFront()
    {
        require 'app/views/front/mentionsLegales.php';
    }
    
    function rgpdFront()
    {
        require 'app/views/front/rgpd.php';
    }

    function planDuSiteFront()
    {
        require 'app/views/front/planDuSite.php';
    }
     

}