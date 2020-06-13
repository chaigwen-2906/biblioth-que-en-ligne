<?php

// important pour la sécurité de vos scripts : les sessions
// Démarre une session
session_start();

// autoload.php genere avec composer
require_once __DIR__ . '/vendor/autoload.php';

try {

    if ($_GET['action'] != "") {

        $params = explode('-',$_GET['action']);
        
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
                        $idLivre = "";
                        if(isset($params[2]))
                        {
                            $idLivre = $params[2];
                        }
                        $controller->detailLivreFront($idLivre);
                    break;

                    case "detailAtelier":
                        $idAtelier = "";
                        if(isset($params[2]))
                        {
                            $idAtelier = $params[2];
                        }
                        $controller->detailAtelierFront($idAtelier);
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

                    case "erreur404":
                        $controller->pageErreurFront();
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

                $id= "";
                if(isset($params[2]))
                {
                    $id = $params[2];
                }

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
                        $controller->modifierLivre($id);
                    break;
                    case "supprimerLivre":
                        $controller->getSupprimerLivre($id);
                    break;
                    //gestion auteurs
                    case "listeAuteur":
                        $controller->gestionAuteurs();
                    break;
                    case "ajoutAuteur":
                        $controller->ajouterUnAuteur();
                    break;
                    case "modifierAuteur":
                        $controller->modifierAuteur($id);
                    break;
                    case"supprimerAuteur":
                        $controller->getSupprimerAuteur($id);
                    break;
                    //gestion atelier
                    case"listeAtelier":
                        $controller->gestionAtelier();
                    break;
                    case"ajoutAtelier":
                        $controller->ajouterUnAtelier();
                    break;
                    case"modifierAtelier":
                        $controller->modifierAtelier($id);
                    break;
                    case"supprimerAtelier":
                        $controller->supprimerAtelier($id);
                    break;
                    //gestion categorie
                    case"listeCategorie":
                        $controller->gestionCategorie();
                    break;
                    case"ajoutCategorie":
                        $controller->ajouterUneCategorie();
                    break;
                    case"modifierCategorie":
                        $controller->modifierCategorie($id);
                    break;
                    case"supprimerCategorie":
                        $controller->supprimerCategorie($id);
                    break;
                    //gestion des clients(abonnés)
                    case"listeClient":
                        $controller->gestionClients();
                    break;
                    case"ajoutClient":
                        $controller->ajouterUnClient();
                    break;
                    case"modifierClient":
                        $controller->modifierClient($id);
                    break;
                    case"supprimerClient":
                        $controller->supprimerClient($id);
                    break;
                    //gestion des coups de coeur
                    case"listeCoupDeCoeur": 
                        $controller->gestionCoupDeCoeur();
                    break;
                    case"ajoutCoupDeCoeur":
                        $controller->ajoutUnCoupDeCoeur();
                    break;
                    case"modifierCoupDeCoeur":
                        $controller->modifierCoupDeCoeur($id);
                    break;
                    case"supprimerCoupDeCoeur":
                        $controller->supprimerCoupDeCoeur($id);
                    break;
                    //gestion des éditeurs
                    case"listeEditeur":
                        $controller->gestionEditeur();
                    break;
                    case"ajoutEditeur":
                        $controller->ajoutUnEditeur();
                    break;
                    case"modifierEditeur":
                        $controller->modifierEditeur($id);
                    break;
                    case"supprimerEditeur":
                        $controller->supprimerEditeur($id);
                    break;
                    //gestion des FAQ
                    case"listeFAQ":
                        $controller->gestionFAQ();
                    break;
                    case"ajoutFAQ":
                        $controller->ajouterUneFAQ();
                    break;
                    case"modifierFAQ":
                        $controller->modifierFAQ($id);
                    break;
                    case"supprimerFAQ":
                        $controller->supprimerFAQ($id);
                    break;
                    //gestion des META
                    case"listeMeta":
                        $controller->gestionMeta();
                    break;
                    case"ajoutMeta":
                        $controller->ajoutMeta();
                    break;
                    case"modifierMeta":
                        $controller->ModifierMeta($id);
                    break;
                    case"supprimerMeta":
                        $controller->supprimerMeta($id);
                    break;
                    //gestion des reservations
                    case"listeReservation":
                        $controller->gestionReservation();
                    break;
                   


                    default:
                        $controller->pageErreurAdmin();
                    break;
                }
            break;

            default:
            break;
        }
    }
    else{
        //Si pas de varaiable action, on redirige vers la page home du front
        header('Location: front-home');
    }

    


} catch (Exception $e) {
    $controller = new \Projet\Controllers\ControllerFront();
    $controller->pageErreurFront();
   // require 'app/views/frontend/errorLoading.php';
}
