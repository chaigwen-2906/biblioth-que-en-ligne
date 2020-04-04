<?php

namespace Projet\Controllers;

class ControllerFront
{
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
                }
                else
                {
                    $this->erreurCreationCompte = true;
                    $this->libelleErreurCreationCompte = $testCreerCompte;
                }
            }
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
                //echo "$('#dateCreez').val('".$_POST['date']."');";
                //echo "$( '#dateCreez' ).datepicker( 'setDate', '".$_POST['date']."' );";
                
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

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
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

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
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

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
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

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
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

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function panierFront()
    {
        if(isset($_SESSION['idClient']))
        {
            $this->FrontManager = new \Projet\Models\ManagerFront();
            $this->gestionHeader();
            $this->gestionModeConnecte();

            //on charge le ManagerFrontPanier
            $FrontPanierManager = new \Projet\Models\ManagerFrontPanier();
            $resultPanier = $FrontPanierManager->getResultPanier();

            require 'app/views/front/panier.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function conditionsGeneralesFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/conditionsGenerales.php';

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function mentionsLegalesFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();

        require 'app/views/front/mentionsLegales.php';

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }
    
    function rgpdFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte(); 

        require 'app/views/front/rgpd.php';

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function planDuSiteFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();
        
        require 'app/views/front/planDuSite.php';

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

    function detailLivreFront()
    {
        if(isset($_GET['id']))
        {
            $this->FrontManager = new \Projet\Models\ManagerFront();
            $this->gestionHeader();
            $this->gestionModeConnecte(); 

            $FrontManagerDetailLivre = new \Projet\Models\ManagerFrontDetailLivre();
            $DetailLivre = $FrontManagerDetailLivre->getDetailLivre($_GET['id']);

            //On ajoute le commentaire si on est en situation de post du formulaire
            if(isset($_SESSION["idClient"]) && isset($_POST["note"]) && isset($_POST["description"]))
            {
                //on enregistre le commentaire posté par utilisateur
                $FrontManagerDetailLivre->postCommentaire($_GET['id'],$_SESSION["idClient"],$_POST["note"],$_POST["description"]);
            }
            
            //On récupère la liste des derniers commentaires
            $listCommentaire = $FrontManagerDetailLivre->getCommentaire($_GET['id']);

            require 'app/views/front/detailLivre.php';

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
        if(isset($_GET['id']))
        {
            $this->FrontManager = new \Projet\Models\ManagerFront();
            $this->gestionHeader();
            $this->gestionModeConnecte(); 

            // on récupère par id
            $FrontManagerDetailAtelier = new \Projet\Models\ManagerFrontDetailAtelier();
            $DetailAtelier = $FrontManagerDetailAtelier->getDetailAtelier($_GET['id']);

            require 'app/views/front/detailAtelier.php';

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
        if(isset($_SESSION['idClient']))
        {
            $this->FrontManager = new \Projet\Models\ManagerFront();
            $this->gestionHeader();
            $this->gestionModeConnecte(); 

            // on récupère le compte
            $FrontManagerMonCompte = new \Projet\Models\ManagerFrontMonCompte();
            $monCompte = $FrontManagerMonCompte->getMonCompte($_SESSION['idClient']);

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

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
        
    }

    function passOublierFront()
    {
        $this->FrontManager = new \Projet\Models\ManagerFront();
        $this->gestionHeader();
        $this->gestionModeConnecte();
        
        require 'app/views/front/passOublier.php';

        //On gère le cas d'erreur sur une création de compte
        $this->gestionErreurCreerCompte();
        //On gère le cas d'erreur sur la connexion au compte
        $this->gestionErreurConnexionCompte();
    }

     

}