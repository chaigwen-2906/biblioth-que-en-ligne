<?php

// important pour la sécurité de vos scripts : les sessions
// Démarre une session
session_start();

// autoload.php genere avec composer
require_once __DIR__ . '/vendor/autoload.php';

try {
    $controllerFront = new \Projet\Controllers\ControllerFront(); //objet controler

    if (isset($_GET['action'])) {

        if($_GET['action'] == 'home'){
            $controllerFront->homeFront();
        }

        elseif($_GET['action'] == 'header'){
            $controllerFront->headerFront();
        }
        elseif($_GET['action'] == 'footer'){
            $controllerFront->footerFront();
        }
        elseif($_GET['action'] == 'coupDeCoeurs'){
            $controllerFront->coupDeCoeursFront();
        }
        elseif($_GET['action'] == 'nouveaute'){
            $controllerFront->nouveauteFront();
        }
        elseif($_GET['action'] == 'atelier'){
            $controllerFront->atelierFront();
        }
        elseif($_GET['action'] == 'panier'){
            $controllerFront->panierFront();
        }
        elseif($_GET['action'] == 'conditionsGenerales'){
            $controllerFront->conditionsGeneralesFront();
        }
        elseif($_GET['action'] == 'mentionsLegales'){
            $controllerFront->mentionsLegalesFront();
        }
        elseif($_GET['action'] == 'rgpd'){
            $controllerFront->rgpdFront();
        }
        elseif($_GET['action'] == 'planDuSite'){
            $controllerFront->planDuSiteFront();
        }
        
        else{
            $controllerFront->homeFront();
            }
    }   


} catch (Exception $e) {
   // require 'app/views/frontend/errorLoading.php';
}
