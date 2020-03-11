<?php

namespace Projet\Controllers;

class ControllerFront
{
    function homeFront()
    {
        var_dump("coucou");
        //traitement
        $homeFront = new \Projet\Models\FrontManager();
        $accueil = $homeFront->viewFrontHome();

        //Appel à la vue : affichage
        require 'app/views/home.php';
    }

    function coupDeCoeursFront()
    {
        require 'app/views/coupDeCoeurs.php';
    }

    function nouveauteFront()
    {
        require 'app/views/nouveaute.php';
    }

    function atelierFront()
    {
        require 'app/views/atelier.php';
    }

    function panierFront()
    {
        require 'app/views/panier.php';
    }

    function conditionsGeneralesFront()
    {
        require 'app/views/conditionsGenerales.php';
    }

    function mentionsLegalesFront()
    {
        require 'app/views/mentionsLegales.php';
    }
    
    function rgpdFront()
    {
        require 'app/views/rgpd.php';
    }

    function planDuSiteFront()
    {
        require 'app/views/planDuSite.php';
    }
     

}