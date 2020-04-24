<?php

// important pour la sécurité de vos scripts : les sessions
// Démarre une session
session_start();

// autoload.php genere avec composer
require_once __DIR__ . '/vendor/autoload.php';

try {

    if ($_GET['action'] != "") {

        $params = explode('/',$_GET['action']);
    
        //test du controller
        // echo "controller : ".$params[0];
        // echo "<br/>";
        // echo "page : ".$params[1];

        switch ($params[0]) {
            case "front":
                // on appel le controller front
                $controller = new \Projet\Controllers\ControllerFront();
                //On initialise la variable nomPage du controller front avec le nom de la page demandée
                $controller->nomPage = $params[1];

                switch($params[1])
                {
                    case "home":
                        $controller->homeFront();
                    break;

                    case "coupDeCoeurs":
                        $controller->coupDeCoeursFront();
                    break;

                    case "nouveaute": 
                        $controller->nouveauteFront();
                    break;

                    case "atelier":
                        $controller->atelierFront();
                    break;

                    case "conditionsGenerales": 
                        $controller->conditionsGeneralesFront();
                    break;

                    case "mentionsLegales": 
                        $controller->mentionsLegalesFront();
                    break;

                    case "rgpd": 
                        $controller->rgpdFront();
                    break;

                    case "planDuSite": 
                        $controller->planDuSiteFront();
                    break;

                    case "detailLivre":
                        $controller->detailLivreFront();
                    break;

                    case "detailAtelier":
                        $controller->detailAtelierFront();
                    break;

                    case "pageRecherche":
                        $controller->pageRechercheFront();
                    break;
                    
                    case "panier":
                        $controller->panierFront();
                    break;

                    case "monCompte":
                        $controller->monCompteFront();
                    break;

                    case "passOublier":
                        $controller->passOublierFront();
                    break;                    




                    default:
                        $controller->pageErreurFront();
                    break;
                }
            break;

            case "admin":
                // on appel le contoller admin
                $controller = new \Projet\Controllers\ControllerAdmin();
                //On initialise la variable nomPage du controller front avec le nom de la page demandée
                $controller->nomPage = $params[1];

                switch($params[1])
                {
                    case "home":
                        $controller->connectionAdministrateurAdmin();
                    break;
                    case "accueil":
                        $controller->accueilAdmin();
                    break;
                    //gestion livres
                    case "listeLivres":
                        $controller->gestionLivreAdmin();
                    break;
                    case "ajoutLivre":
                        $controller->ajouterUnLivre();
                    break;
                    case "modifierLivre":
                        $controller->modifierLivre();
                    break;
                    case "supprimerLivre":
                        $controller->getSupprimerLivre();
                    break;
                    //gestion auteurs
                    case "listeAuteur":
                        $controller->gestionAuteurs();
                    break;
                    case "ajoutAuteur":
                        $controller->ajouterUnAuteur();
                    break;
                    case "modifierAuteur":
                        $controller->modifierAuteur();
                    break;
                    case"supprimerAuteur":
                        $controller->getSupprimerAuteur();
                    break;
                    //gestion atelier
                    case"listeAtelier":
                        $controller->gestionAtelier();
                    break;
                    case"ajoutAtelier":
                        $controller->ajouterUnAtelier();
                    break;
                    case"modifierAtelier":
                        $controller->modifierAtelier();
                    break;
                    case"supprimerAtelier":
                        $controller->supprimerAtelier();
                    break;
                    //gestion categorie
                    case"listeCategorie":
                        $controller->gestionCategorie();
                    break;
                    case"ajoutCategorie":
                        $controller->ajouterUneCategorie();
                    break;
                    case"modifierCategorie":
                        $controller->modifierCategorie();
                    break;
                    case"supprimerCategorie":
                        $controller->supprimerCategorie();
                    break;



                    default:
                        $controller->pageErreurFront();
                    break;
                }
            break;

            default:
            break;
        }
    }
    else{
        //Si pas de varaiable action, on redirige vers la page home du front
        header('Location: front/home');
    }

    


} catch (Exception $e) {
    $controller = new \Projet\Controllers\ControllerFront();
    $controller->errorFront();
   // require 'app/views/frontend/errorLoading.php';
}
