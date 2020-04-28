<?php

namespace Projet\Controllers;

class ControllerAdmin
{
    function connectionAdministrateurAdmin()
    {
        $adminManager = new \Projet\Models\admin\ManagerAdmin();

        if (isset($_GET['action2'])){
            
            if ($_GET['action2'] == "connectionAdministrateur"){
                    
                //on appelle la function qui vérifier si le nom utilisateur et mot de passe existent dans la table admin 
                $retourConnectionAdmin = $adminManager->getConnectionAdministrateur($_POST['nom'], $_POST['motPasse']);

                if($retourConnectionAdmin != false)
                {
                    //On stocke dans une variable de session PHP l'idClient
                    $_SESSION['idAdmin'] = $retourConnectionAdmin;
                    // on renvoie vers la page d'accueil
                    header('Location: ./accueil');
                    exit();
                }
                else{
                    echo "<script>";
                        //On affiche l'erreur
                        echo "alert('L\'e-mail ou le mot de passe est incorrecte');";
                    echo "</script>";
                }
            }

        }
        //Appel à la vue : affichage
        require 'app/views/admin/connectionAdministrateur.php';
    }



    function accueilAdmin()
    {

        if(isset($_SESSION['idAdmin'])){
            if(isset($_GET['action2'])){

                if($_GET['action2'] == "seDeconnecter"){

                    unset($_SESSION['idAdmin'] );
                    header('Location: ./home');
                    exit();
                }
                
            }

            //Appel à la vue : affichage
            require 'app/views/admin/accueil.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }



    function gestionLivreAdmin()
    {
        
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('Le livre a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('Le livre a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('Le livre a été supprimé en base de données');</script>";
                }
            }

            $ManagerLivres = new \Projet\Models\admin\ManagerLivres();
            $listeLivres = $ManagerLivres->getListeLivres();
            
            //Appel à la vue : affichage
            require 'app/views/admin/gestionLivres.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }

//----GESTION LIVRE : AJOUTER---MODIFIER---SUPPRIMER

    function ajouterUnLivre()
    {
        if(isset($_SESSION['idAdmin'])){

            //on envoie les données a la bdd 
            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "ajoutLivre")
                {
                    //$_FILES : variable superglobal qui permet de récupérer les input type file
                    $contenuImage = "";
                    if(isset($_FILES['image']) && ($_FILES['image']['tmp_name'] != ""))
                    {
                        $contenuImage = file_get_contents($_FILES['image']['tmp_name']);
                    }
                    

                    //On crée un objet de type livre
                    $unLivre = new \Projet\Models\admin\objets\Livre('',$_POST['selectCategorie'],$_POST['selectAuteurs'],$_POST['nom'],$contenuImage,'',$_POST['date'],
                    $_POST['description'],$_POST['selectDispo'],$_POST['selectEditeurs'],$_POST['nbPage'],$_POST['dimension'],$_POST['langue'],$_POST['ean'],$_POST['isbn']);

                    //On appelle la fonction Create de l'objet livre pour enregistrer en bdd
                    $unLivre->Create();

                    header('Location: ./listeLivres?action2=confirmAjout');
                }
                
            }

            $ManagerCategorie = new  \Projet\Models\admin\ManagerCategories();
            //récupères dans un select toutes les catégories
            $listCategorie = $ManagerCategorie->getListeCategorie();

            $ManagerAuteurs = new  \Projet\Models\admin\ManagerAuteurs();
            //récupères dans un select toutes les auteurs
            $listAuteurs = $ManagerAuteurs-> getListeAuteurs();

            $ManagerEditeurs = new  \Projet\Models\admin\ManagerEditeurs();
            //récupères dans un select toutes les éditeurs
            $listEditeurs = $ManagerEditeurs->getlisteEditeurs();

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutLivre.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function modifierLivre()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idLivre']))
            {   
                //on récupère la var idLivre 
                $idLivre = $_GET['idLivre'];

                //on récupère les données du livre
                $unLivre = new \Projet\Models\admin\objets\Livre($idLivre,'','','','','','','','','','','','','','');
                $unLivre->Read();

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "modifieLivre")
                    {
                        $unLivre->setIdCategorie($_POST['selectCategorie']);
                        $unLivre->setIdAuteur($_POST['selectAuteurs']);
                        $unLivre->setNom($_POST['nom']);

                        //$_FILES : variable superglobal qui permet de récupérer les input type file
                        $contenuImage = "";
                        if(isset($_FILES['image']) && ($_FILES['image']['tmp_name'] != ""))
                        {
                            $contenuImage = file_get_contents($_FILES['image']['tmp_name']);
                            $unLivre->setImage($contenuImage);
                        }

                        $unLivre->setDateDePublication($_POST['date']);
                        $unLivre->setDescription($_POST['description']);
                        $unLivre->setDisponible($_POST['selectDispo']); 
                        $unLivre->setIdEditeur($_POST['selectEditeurs']);
                        $unLivre->setNbDePage($_POST['nbPage']);
                        $unLivre->setDimension($_POST['dimension']);
                        $unLivre->setLangue($_POST['langue']);
                        $unLivre->setEan($_POST['ean']);
                        $unLivre->setIsbn($_POST['isbn']);

                        //enregistrer en base bdd
                        $unLivre->Update();
                        //on renvoie vers la page listeLivre
                        header('Location: ./listeLivres?action2=confirmModif');
                    }
                }

                

                $ManagerCategorie = new  \Projet\Models\admin\ManagerCategories();
                //récupères dans un select toutes les catégories
                $listCategorie = $ManagerCategorie->getListeCategorie();

                $ManagerAuteurs = new  \Projet\Models\admin\ManagerAuteurs();
                //récupères dans un select toutes les auteurs
                $listAuteurs = $ManagerAuteurs-> getListeAuteurs();

                $ManagerEditeurs = new  \Projet\Models\admin\ManagerEditeurs();
                //récupères dans un select toutes les éditeurs
                $listEditeurs = $ManagerEditeurs->getlisteEditeurs();


                //Appel à la vue : affichage
                require 'app/views/admin/modifierLivre.php';
            }
            else{
                header('location: ./listeLivres');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }

    }



    function getSupprimerLivre()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idLivre']))
            {
                 //on récupère la var idLivre 
                 $idLivre = $_GET['idLivre'];

                 if (isset($_GET['action2']))
                 {
                    if($_GET['action2'] == "supprimerLivre")
                    {
                        //on récupère les commentaires qui sont associés au livre
                        $ManagerCommentaires = new  \Projet\Models\admin\ManagerCommentaires();
                        $ManagerCommentaires->deleteCommentairesByIdLivre($idLivre);

                        //on récupère les coup de coeur qui sont associés au livre
                        $ManagerCoupDeCoeur = new \Projet\Models\admin\ManagerCoupCoeur();
                        $listeCoupCoeur = $ManagerCoupDeCoeur->getListeCoupCoeurByIdLivre($idLivre);
                        //on supprime coup de coeur
                        foreach($listeCoupCoeur as $uncoupCoeur )
                        {
                            $unCoupDeCoeur = new \Projet\Models\admin\objets\CoupDeCoeur($uncoupCoeur['idCoupDeCoeur'], '', '', '', '');
                            $unCoupDeCoeur->delete();
                        }

                        //on récupère les reservations 
                        $ManagerReservations = new \Projet\Models\admin\ManagerReservations();
                        $listeReservations = $ManagerReservations->getListeReservationsByIdLivre($idLivre);
                        // on supprime reservations
                        foreach($listeReservations as $uneReservation)
                        {
                            $supUneReservation = new \Projet\Models\admin\objets\reservation($uneReservation['idReservation'],'','','','');
                            $supUneReservation->delete();  
                        }

                        // on supprime le livre
                        $unLivre = new \Projet\Models\admin\objets\livre($idLivre,'','','','','','','','','','','','','','');
                        $unLivre->delete();


                        // on renvoie vers la page gestion livre 
                        header('location: ./listeLivres?action2=confirmSupp');

                    }
                 }
                 
                 //Appel à la vue : affichage
                require 'app/views/admin/supprimerLivre.php';
            }
            else{
                header('location: ./listeLivres');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


//----GESTION AUTEUR : AJOUTER---MODIFIER---SUPPRIMER

    function gestionAuteurs()
    {
        if(isset($_SESSION['idAdmin'])){

            
            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('L\'auteur a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('L\'auteur a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('L\'auteur a été supprimé en base de données');</script>";
                }
            }

            $ManagerAuteurs = new \Projet\Models\admin\ManagerAuteurs();
            $listeAuteur = $ManagerAuteurs->getListeAuteurs();


            //Appel à la vue : affichage
            require 'app/views/admin/listeAuteur.php';
        }
        else{
            header('Location: ./home');
            exit();
        }

    }



    function ajouterUnAuteur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutAuteur")
                {
                    //On crée un objet de type auteur
                    $unAuteur = new \Projet\Models\admin\objets\Auteur('',$_POST['nom'],$_POST['prenom']);

                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $unAuteur->Create();

                    header('Location: ./listeAuteur?action2=confirmAjout');

                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutAuteur.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }



    function modifierAuteur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idAuteur']))
            {
                 //on récupère la var idLivre 
                 $idAuteur = $_GET['idAuteur'];

                 //on récupère les données de l'auteur
                 $unAuteur = new \Projet\Models\admin\objets\Auteur($idAuteur,'','');
                 $unAuteur->Read();

                 if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifieAuteur")
                    {
                        $unAuteur->setNomAuteur($_POST['nom']);
                        $unAuteur->setPrenomAuteur($_POST['prenom']);

                        //enregistrer en base bdd
                        $unAuteur->Update();

                        //on renvoie vers la page listeAuteur
                        header('Location: ./listeAuteur?action2=confirmModif');
                    }

                }
                //Appel à la vue : affichage
                require 'app/views/admin/modifierAuteur.php';
            }
            else{
                header('location: ./listeAuteur');
                exit();
            }
                 
        }
        else{
            header('Location: ./home');
            exit();
        }

    }



    function getSupprimerAuteur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idAuteur']))
            {
                //on récupère la var idLivre 
                $idAuteur = $_GET['idAuteur'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerAuteur")
                    {
                         // on supprime le auteur
                         $unAuteur = new \Projet\Models\admin\objets\Auteur($idAuteur,'','');
                         $unAuteur->delete();
 
 
                         // on renvoie vers la page liste auteur
                         header('location: ./listeAuteur?action2=confirmSupp');
                    }
                }

                // CONTRAINTE:: TEST AVANT SUPPRESSION V2RIFIER QUE AUTEUR N4EST PAS RATACHER A UN LIVRE !!!!!!!!!!!

                 //Appel à la vue : affichage
                 require 'app/views/admin/supprimerAuteur.php';
            }
            else{
                header('location: ./listeAuteur');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


//----GESTION ATELIER : AJOUTER---MODIFIER---SUPPRIMER

    function gestionAtelier()
    {
        if(isset($_SESSION['idAdmin'])){

            
            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('L\'atelier a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('L\'atelier a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('L\'atelier a été supprimé en base de données');</script>";
                }
            }

            $ManagerAtelier = new \Projet\Models\admin\ManagerAtelier();
            $listeAtelier = $ManagerAtelier->getListeAtelier();


            //Appel à la vue : affichage
            require 'app/views/admin/listeAtelier.php';
        }
        else{
            header('Location: ./home');
            exit();
        }

    }


    function ajouterUnAtelier()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutAtelier")
                {
                    //On crée un objet de type atelier 
                    $unAtelier = new \Projet\Models\admin\objets\Atelier('',$_POST['nom'],$_POST['date'],$_POST['description'],$_POST['horaire'],
                    $_POST['age'],$_POST['capacite']);
                    
                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $unAtelier->Create();

                    
                    header('Location: ./listeAtelier?action2=confirmAjout');
                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutAtelier.php';
        }
        else{
            header('Location: ./home');
            exit();
        }

    }


    function modifierAtelier()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idAtelier'])){

                $idAtelier = $_GET['idAtelier'];

                //On crée un objet de type Atelier avec l'id et on le lit
                //on récupère les données de l'atelier 
                $unAtelier = new \Projet\Models\admin\objets\Atelier($idAtelier,'','','','','','');
                $unAtelier->Read();


                if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierAtelier")
                    {
                        $unAtelier->setNom($_POST['nom']);
                        $unAtelier->setDate($_POST['date']);
                        $unAtelier->setDescription($_POST['description']);
                        $unAtelier->setHeure($_POST['horaire']);
                        $unAtelier->setAge($_POST['age']);
                        $unAtelier->setCapacite($_POST['capacite']);

                        //enregistrer en base bdd
                        $unAtelier->Update();

                        //on renvoie vers la page listeAuteur
                        header('Location: ./listeAtelier?action2=confirmModif');
                    }
                }

                //Appel à la vue : affichage
                require 'app/views/admin/modifierAtelier.php';
            }
            else{
                header('location: ./listeAtelier');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
           
    }


    function supprimerAtelier()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idAtelier']))
            {
                //on récupère la var idLivre 
                $idAtelier = $_GET['idAtelier'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerAtelier")
                    {
                        // on supprime le auteur
                        $unAtelier = new \Projet\Models\admin\objets\Atelier($idAtelier,'','','','','','');
                        $unAtelier->delete();


                        // on renvoie vers la page liste auteur
                        header('location: ./listeAtelier?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerAtelier.php';
            }
            else{
                header('location: ./listeAtelier');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    //----GESTION CATEGORIE : AJOUTER---MODIFIER---SUPPRIMER

    function gestionCategorie()
    {
        if(isset($_SESSION['idAdmin'])){

            
            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('La catégorie a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('La catégorie a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('La catégorie a été supprimé en base de données');</script>";
                }
            }

            $ManagerCategorie = new \Projet\Models\admin\ManagerCategories();
            $listeCategorie = $ManagerCategorie->getListeCategorie();


            //Appel à la vue : affichage
            require 'app/views/admin/listeCategorie.php';
        }
        else{
            header('Location: ./home');
            exit();
        }

    }


    function ajouterUneCategorie()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutCategorie")
                {
                    //On crée un objet de type atelier 
                    $uneCategorie = new \Projet\Models\admin\objets\Categorie('',$_POST['nomCategorie']);
                    
                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $uneCategorie->Create();

                    
                    header('Location: ./listeCategorie?action2=confirmAjout');
                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutCategorie.php';
        }
        else{
            header('Location: ./home');
            exit();
        }

    }


    function modifierCategorie()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idCategorie'])){

                $idCategorie = $_GET['idCategorie'];

                //On crée un objet de type Atelier avec l'id et on le lit
                //on récupère les données de l'atelier 
                $uneCategorie = new \Projet\Models\admin\objets\Categorie($idCategorie,'');
                $uneCategorie->Read();


                if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierCategorie")
                    {
                        $uneCategorie->setNomCategorie($_POST['nomCategorie']);

                        //enregistrer en base bdd
                        $uneCategorie->Update();

                        //on renvoie vers la page listeAuteur
                        header('Location: ./listeCategorie?action2=confirmModif');
                    }
                }

                //Appel à la vue : affichage
                require 'app/views/admin/modifierCategorie.php';
            }
            else{
                header('location: ./listeCategorie');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
           
    }


    function supprimerCategorie()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idCategorie']))
            {
                //on récupère la var idLivre 
                $idCategorie = $_GET['idCategorie'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerCategorie")
                    {
                        // on supprime le auteur
                        $unCategorie = new \Projet\Models\admin\objets\Categorie($idCategorie,'');
                        $unCategorie->delete();


                        // on renvoie vers la page liste auteur
                        header('location: ./listeCategorie?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerCategorie.php';
            }
            else{
                header('location: ./listeCategorie');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    //----GESTION CLIENTS : AJOUTER---MODIFIER---SUPPRIMER

    function gestionClients()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('Un client a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('Un client a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('Un client a été supprimé en base de données');</script>";
                }
            }
                
                $ManagerClient = new \Projet\Models\admin\ManagerClients();
                $listeClient = $ManagerClient->getListeClients();


                //Appel à la vue : affichage
                require 'app/views/admin/listeClient.php';

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function ajouterUnClient()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutClient")
                {
                    //On crée un objet de type Client
                    $unClient = new \Projet\Models\admin\objets\Client('',$_POST['numeroAbonne'],$_POST['civilite'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['telephoneMobile']
                    ,$_POST['telephoneFixe'],$_POST['adresse'],$_POST['dateDeNaissance'],$_POST['motDePasse']);
                    
                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $unClient->Create();

                    
                    header('Location: ./listeClient?action2=confirmAjout');
                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutClient.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function modifierClient()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idClient'])){

                $idClient = $_GET['idClient'];

                //On crée un objet de type Atelier avec l'id et on le lit
                //on récupère les données du client
                $unClient = new \Projet\Models\admin\objets\Client($idClient, "","", "", "", "", "", "", "", "", "");
                $unClient->Read();


                if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierClient")
                    {
                        $unClient->setNumeroAbonne($_POST['numeroAbonne']);
                        $unClient->setCivilite($_POST['civilite']);
                        $unClient->setNom($_POST['nom']);
                        $unClient->setPrenom($_POST['prenom']);
                        $unClient->setEmail($_POST['email']);
                        $unClient->setTelephoneMobile($_POST['telephoneMobile']);
                        $unClient->setTelephoneFixe($_POST['telephoneFixe']);
                        $unClient->setAdresse($_POST['adresse']);
                        $unClient->setDateDeNaissance($_POST['dateDeNaissance']);
                        $unClient->setMotDePasse($_POST['motDePasse']);

                        //enregistrer en base bdd
                        $unClient->Update();

                        //on renvoie vers la page listeClient
                        header('Location: ./listeClient?action2=confirmModif');
                    }
                }

                //Appel à la vue : affichage
                require 'app/views/admin/modifierClient.php';
            }
            else{
                header('location: ./listeClient');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function supprimerClient()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idClient']))
            {
                //on récupère la var idLivre 
                $idClient = $_GET['idClient'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerClient")
                    {

                        //on récupère les commentaires qui sont associés au livre
                        $ManagerCommentaires = new  \Projet\Models\admin\ManagerCommentaires();
                        $ManagerCommentaires->deleteCommentairesByIdClient($idClient);


                        //on récupère les reservations 
                        $ManagerReservations = new \Projet\Models\admin\ManagerReservations();
                        $listeReservations = $ManagerReservations->getListeReservationsByIdClient($idClient);
                        // on supprime reservations
                        foreach($listeReservations as $uneReservation)
                        {
                            $supUneReservation = new \Projet\Models\admin\objets\reservation($uneReservation['idReservation'],'','','','');
                            $supUneReservation->delete();  
                        }


                        // on supprime le client
                        $unClient = new \Projet\Models\admin\objets\Client($idClient,"","", "", "", "", "", "", "", "", "");
                        $unClient->delete();


                        // on renvoie vers la page liste client
                        header('location: ./listeClient?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerClient.php';
            }
            else{
                header('location: ./listeClient');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    //----GESTION COUP DE COEUR : AJOUTER---MODIFIER---SUPPRIMER

    function gestionCoupDeCoeur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('Un coup de coeur a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('Un coup de coeur a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('Un coup de coeur a été supprimé en base de données');</script>";
                }
            }
                
                $ManagerCoupDeCoeur = new \Projet\Models\admin\ManagerCoupCoeur();
                $listeCoupDeCoeur = $ManagerCoupDeCoeur->getListeCoupDeCoeur();


                //Appel à la vue : affichage
                require 'app/views/admin/listeCoupDeCoeur.php';

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function ajoutUnCoupDeCoeur()
    {

        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutCoupDeCoeur")
                {
                    //On crée un objet de type Coup de coeur
                    $unCoupDeCoeur = new \Projet\Models\admin\objets\CoupDeCoeur('',$_POST['selectLivre'],$_POST['auteur'],$_POST['commentaire'],$_POST['dateDePublication']);

                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $unCoupDeCoeur->Create();

                    
                    header('Location: ./listeCoupDeCoeur?action2=confirmAjout');
                }
            }

            
            $ManagerLivre = new  \Projet\Models\admin\ManagerLivres();
            //récupères dans un select toutes les catégories
            $listLivre = $ManagerLivre->getListeLivres();
            

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutCoupDeCoeur.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function modifierCoupDeCoeur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idCoupDeCoeur'])){

                $idCoupDeCoeur = $_GET['idCoupDeCoeur'];

                //On crée un objet de type Atelier avec l'id et on le lit
                //on récupère les données du client  
                $unCoupDeCoeur = new \Projet\Models\admin\objets\CoupDeCoeur($idCoupDeCoeur, "","", "", "");
                $unCoupDeCoeur->Read();


                if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierCoupDeCoeur")
                    {
                        $unCoupDeCoeur->setIdLIvre($_POST['selectLivre']);
                        $unCoupDeCoeur->setAuteur($_POST['auteur']);
                        $unCoupDeCoeur->setCommentaire($_POST['commentaire']);
                        $unCoupDeCoeur->setDateDePublication($_POST['dateDePublication']);
                        
                        //enregistrer en base bdd
                        $unCoupDeCoeur->Update();

                        //on renvoie vers la page listeCoupDeCoeur
                        header('Location: ./listeCoupDeCoeur?action2=confirmModif');
                    }
                }

                $ManagerLivre = new  \Projet\Models\admin\ManagerLivres();
                //récupères dans un select toutes les catégories
                $listLivre = $ManagerLivre->getListeLivres();

                //Appel à la vue : affichage
                require 'app/views/admin/modifierCoupDeCoeur.php';
            }
            else{
                header('location: ./listeCoupDeCoeur');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function supprimerCoupDeCoeur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idCoupDeCoeur']))
            {
                //on récupère la var idLivre 
                $idCoupDeCoeur = $_GET['idCoupDeCoeur'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerCoupDeCoeur")
                    {

                        // on supprime le client
                        $unCoupDeCoeur = new \Projet\Models\admin\objets\CoupDeCoeur($idCoupDeCoeur,"","","","");
                        $unCoupDeCoeur->delete();


                        // on renvoie vers la page liste client
                        header('location: ./listeCoupDeCoeur?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerCoupDeCoeur.php';
            }
            else{
                header('location: ./listeCoupDeCoeur');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    //----GESTION EDITEUR : AJOUTER---MODIFIER---SUPPRIMER

    function gestionEditeur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('Un éditeur a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('Un éditeur a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('Un éditeur a été supprimé en base de données');</script>";
                }
            }
                
                $ManagerEditeur= new \Projet\Models\admin\ManagerEditeurs();
                $listeEditeur = $ManagerEditeur->getlisteEditeurs();


                //Appel à la vue : affichage
                require 'app/views/admin/listeEditeur.php';

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function ajoutUnEditeur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutEditeur")
                {
                    //On crée un objet de type Coup de coeur
                    $unEditeur = new \Projet\Models\admin\objets\Editeur('',$_POST['code'],$_POST['nom']);

                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $unEditeur->Create();

                    
                    // header('Location: ./listeEditeur?action2=confirmAjout');
                }
            }



            //Appel à la vue : affichage
            require 'app/views/admin/ajoutEditeur.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function modifierEditeur()
    {
        if(isset($_SESSION['idAdmin'])){


            if(isset($_GET['idEditeur'])){

    
                $idEditeur = $_GET['idEditeur'];

                //On crée un objet de type Atelier avec l'id et on le lit
                //on récupère les données du client  
                $unEditeur = new \Projet\Models\admin\objets\Editeur($idEditeur, "","");
                $unEditeur->Read();


                if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierEditeur")
                    {
                        $unEditeur->setCode($_POST['code']);
                        $unEditeur->setNom($_POST['nom']);
                 
                        
                        //enregistrer en base bdd
                        $unEditeur->Update();

                        //on renvoie vers la page listeCoupDeCoeur
                        header('Location: ./listeEditeur?action2=confirmModif');
                    }
                }


                //Appel à la vue : affichage
                require 'app/views/admin/modifierEditeur.php';
            }
            else{
                header('location: ./listeEditeur');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function supprimerEditeur()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idEditeur']))
            {
                //on récupère la var idLivre 
                $idEditeur = $_GET['idEditeur'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerEditeur")
                    {

                        // on supprime le client
                        $unEditeur = new \Projet\Models\admin\objets\Editeur($idEditeur,"","");
                        $unEditeur->delete();


                        // on renvoie vers la page liste client
                        header('location: ./listeEditeur?action2=confirmSupp');
                    }
                }

                // CONTRAINTE:: TEST AVANT SUPPRESSION V2RIFIER QUE AUTEUR N4EST PAS RATACHER A UN LIVRE !!!!!!!!!!!

                //Appel à la vue : affichage
                require 'app/views/admin/supprimerEditeur.php';
            }
            else{
                header('location: ./listeEditeur');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    //----GESTION EDITEUR : AJOUTER---MODIFIER---SUPPRIMER

    function gestionFAQ()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('Une FAQ a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('Une FAQ  a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('Une FAQ  a été supprimé en base de données');</script>";
                }
            }
                
                $ManagerFAQ = new \Projet\Models\admin\ManagerFAQ();
                $listeFAQ = $ManagerFAQ->getListeFAQ();


                //Appel à la vue : affichage
                require 'app/views/admin/listeFAQ.php';

        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function ajouterUneFAQ()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutFAQ")
                {
                    //On crée un objet de type Coup de coeur
                    $uneFAQ = new \Projet\Models\admin\objets\Faq('',$_POST['question'],$_POST['reponse']);

                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $uneFAQ->Create();

                    
                    header('Location: ./listeFAQr?action2=confirmAjout');
                }
            }



            //Appel à la vue : affichage
            require 'app/views/admin/ajoutFAQ.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function modifierFAQ()
    {
        
        if(isset($_SESSION['idAdmin'])){


            if(isset($_GET['idFaq'])){

    
                $idFaq = $_GET['idFaq'];

                //On crée un objet de type Atelier avec l'id et on le lit
                //on récupère les données du client  
                $uneFAQ = new \Projet\Models\admin\objets\Faq($idFaq, "","");
                $uneFAQ->Read();


                if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierFAQ")
                    {
                        $uneFAQ->setQuestion($_POST['question']);
                        $uneFAQ->setReponse($_POST['reponse']);
                 
                        
                        //enregistrer en base bdd
                        $uneFAQ->Update();

                        //on renvoie vers la page listeCoupDeCoeur
                        header('Location: ./listeFAQ?action2=confirmModif');
                    }
                }


                //Appel à la vue : affichage
                require 'app/views/admin/modifierFAQ.php';
            }
            else{
                header('location: ./listeFAQ');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }


    function supprimerFAQ()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idFaq']))
            {
                //on récupère la var idFaq 
                $idFaq = $_GET['idFaq'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerFAQ")
                    {

                        // on supprime le Faq
                        $uneFAQ = new \Projet\Models\admin\objets\Faq($idFaq,"","");
                        $uneFAQ->delete();


                        // on renvoie vers la page liste client
                        header('location: ./listeFAQ?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerFAQ.php';
            }
            else{
                header('location: ./listeFAQ');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }

  //----GESTION META : AJOUTER---MODIFIER---SUPPRIMER

    function gestionMeta()
    {
        
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['action2']))
            {
                if($_GET['action2'] == "confirmAjout")
                {
                    echo "<script>alert('Un meta a été enregistré en base de données');</script>";
                }

                if($_GET['action2'] == "confirmModif")
                {
                    echo "<script>alert('Un meta a été modifié en base de données');</script>";
                }

                if($_GET['action2'] == "confirmSupp")
                {
                    echo "<script>alert('Un meta a été supprimé en base de données');</script>";
                }
            }
                
                $ManagerMeta= new \Projet\Models\admin\ManagerMeta();
                $listeMeta = $ManagerMeta->getlisteMeta();


                //Appel à la vue : affichage
                require 'app/views/admin/listeMeta.php';

        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function ajoutMeta()
    {
        
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET["action2"]))
            {
                if($_GET["action2"] == "ajoutMeta")
                {
                    //On crée un objet de type Coup de coeur
                    $unMeta = new \Projet\Models\admin\objets\Meta('',$_POST['nomPage'],$_POST['keywords'],$_POST['description'],$_POST['title']);

                    //On appelle la fonction Create de l'objet auteur pour enregistrer en bdd
                    $unMeta->Create();

                    
                    header('Location: ./listeMeta?action2=confirmAjout');
                }
            }



            //Appel à la vue : affichage
            require 'app/views/admin/ajoutMeta.php';
        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function ModifierMeta()
    {
        if(isset($_SESSION['idAdmin'])){


            if(isset($_GET['idMeta'])){

    
                $idMeta = $_GET['idMeta'];

                //On crée un objet de type Atelier avec l'id et on le lit
                //on récupère les données du client  
                $unMeta = new \Projet\Models\admin\objets\Meta($idMeta, "","","","");
                $unMeta->Read();

                if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierMeta")
                    {
                        $unMeta->setNomPage($_POST['nomPage']);
                        $unMeta->setKeywords($_POST['keywords']);
                        $unMeta->setDescription($_POST['description']);
                        $unMeta->setTitle($_POST['title']);
                 
                        
                        //enregistrer en base bdd
                        $unMeta->Update();

                        //on renvoie vers la page listeCoupDeCoeur
                        // header('Location: ./listeMeta?action2=confirmModif');
                    }
                }


                //Appel à la vue : affichage
                require 'app/views/admin/modifierMeta.php';
            }
            else{
                header('location: ./listeMeta');
                exit();
            }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    function supprimerMeta()
    {
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['idMeta']))
            {
                //on récupère la var idFaq 
                $idMeta = $_GET['idMeta'];

                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerMeta")
                    {

                        // on supprime le Faq
                        $unMeta = new \Projet\Models\admin\objets\Meta($idMeta,"","","","");
                        $unMeta->delete();


                        // on renvoie vers la page liste client
                        header('location: ./listeMeta?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerMeta.php';
            }
            else{
                header('location: ./listeMeta');
                exit();
                }

        }
        else{
            header('Location: ./home');
            exit();
        }
    }

    //----GESTION RESERVATION : AJOUTER---MODIFIER---SUPPRIMER
    function gestionReservation()
    {
        
    }

}