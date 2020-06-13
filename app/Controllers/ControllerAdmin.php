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
                $retourConnectionAdmin = $adminManager->connectionAdministrateur($_POST['nom'], $_POST['motPasse']);

                if($retourConnectionAdmin != false)
                {
                    //On stocke dans une variable de session PHP l'idClient
                    $_SESSION['idAdmin'] = $retourConnectionAdmin;
                    // on renvoie vers la page d'accueil
                    header('Location: ./admin-accueil');
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
                    header('Location: ./admin-home');
                    exit();
                }
                
            }

            //Appel à la vue : affichage
            require 'app/views/admin/accueil.php';
        }
        else{
            header('Location: ./admin-home');
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
            $listeLivres = $ManagerLivres->lireListeLivres();
            
            //Appel à la vue : affichage
            require 'app/views/admin/gestionLivres.php';
        }
        else{
            header('Location: ./admin-home');
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

                    header('Location: ./admin-listeLivres?action2=confirmAjout');
                }
                
            }

            $ManagerCategorie = new  \Projet\Models\admin\ManagerCategories();
            //récupères dans un select toutes les catégories
            $listCategorie = $ManagerCategorie->lireListeCategorie();

            $ManagerAuteurs = new  \Projet\Models\admin\ManagerAuteurs();
            //récupères dans un select toutes les auteurs
            $listAuteurs = $ManagerAuteurs-> lireListeAuteurs();

            $ManagerEditeurs = new  \Projet\Models\admin\ManagerEditeurs();
            //récupères dans un select toutes les éditeurs
            $listEditeurs = $ManagerEditeurs->lireListeEditeurs();

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutLivre.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function modifierLivre($idLivre)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idLivre != "")
            {   
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
                        header('Location: ./admin-listeLivres?action2=confirmModif');
                    }
                }

                

                $ManagerCategorie = new  \Projet\Models\admin\ManagerCategories();
                //récupères dans un select toutes les catégories
                $listCategorie = $ManagerCategorie->lireListeCategorie();

                $ManagerAuteurs = new  \Projet\Models\admin\ManagerAuteurs();
                //récupères dans un select toutes les auteurs
                $listAuteurs = $ManagerAuteurs-> lireListeAuteurs();

                $ManagerEditeurs = new  \Projet\Models\admin\ManagerEditeurs();
                //récupères dans un select toutes les éditeurs
                $listEditeurs = $ManagerEditeurs->lireListeEditeurs();


                //Appel à la vue : affichage
                require 'app/views/admin/modifierLivre.php';
            }
            else{
                header('Location: ./admin-listeLivres');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }

    }



    function getSupprimerLivre($idLivre)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idLivre != "")
            {
                 if (isset($_GET['action2']))
                 {
                    if($_GET['action2'] == "supprimerLivre")
                    {
                        //on récupère les commentaires qui sont associés au livre
                        $ManagerCommentaires = new  \Projet\Models\admin\ManagerCommentaires();
                        $ManagerCommentaires->supprimeCommentairesParIdLivre($idLivre);

                        //on récupère les coup de coeur qui sont associés au livre
                        $ManagerCoupDeCoeur = new \Projet\Models\admin\ManagerCoupCoeur();
                        $listeCoupCoeur = $ManagerCoupDeCoeur->lireListeCoupCoeurParIdLivre($idLivre);
                        //on supprime coup de coeur
                        foreach($listeCoupCoeur as $uncoupCoeur )
                        {
                            $unCoupDeCoeur = new \Projet\Models\admin\objets\CoupDeCoeur($uncoupCoeur['idCoupDeCoeur'], '', '', '', '');
                            $unCoupDeCoeur->delete();
                        }

                        //on récupère les reservations 
                        $ManagerReservations = new \Projet\Models\admin\ManagerReservations();
                        $listeReservations = $ManagerReservations->lireListeReservationsParIdLivre($idLivre);
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
                        header('Location: ./admin-listeLivres?action2=confirmSupp');

                    }
                 }
                 
                 //Appel à la vue : affichage
                require 'app/views/admin/supprimerLivre.php';
            }
            else{
                header('Location: ./admin-listeLivres');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
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

                if($_GET['action2'] == "errorSupp")
                {
                    echo "<script>alert('L\'auteur n\'a pas été supprimé en base de données car il est rattaché à un livre');</script>";
                }
            }

            $ManagerAuteurs = new \Projet\Models\admin\ManagerAuteurs();
            $listeAuteur = $ManagerAuteurs->lireListeAuteurs();


            //Appel à la vue : affichage
            require 'app/views/admin/listeAuteur.php';
        }
        else{
            header('Location: ./admin-home');
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

                    header('Location: ./admin-listeAuteur?action2=confirmAjout');

                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutAuteur.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }



    function modifierAuteur($idAuteur)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idAuteur != "")
            {
                //on récupère les données de l'auteur
                 $unAuteur = new \Projet\Models\admin\objets\Auteur($idAuteur,'','');
                 $unAuteur->Read();

                 if(isset($_GET['action2'])){

                    if($_GET['action2'] == "modifierAuteur")
                    {
                        $unAuteur->setNomAuteur($_POST['nom']);
                        $unAuteur->setPrenomAuteur($_POST['prenom']);

                        //enregistrer en base bdd
                        $unAuteur->Update();

                        //on renvoie vers la page listeAuteur
                        header('Location: ./admin-listeAuteur?action2=confirmModif');
                    }

                }
                //Appel à la vue : affichage
                require 'app/views/admin/modifierAuteur.php';
            }
            else{
                header('Location: ./admin-listeAuteur');
                exit();
            }
                 
        }
        else{
            header('Location: ./admin-home');
            exit();
        }

    }



    function getSupprimerAuteur($idAuteur)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idAuteur != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerAuteur")
                    {
                        $ManagerLivres= new \Projet\Models\admin\ManagerLivres();
                        $listeLivres = $ManagerLivres->lireListeLivreParIdAuteur($idAuteur);

                        if($listeLivres == null)
                        {
                            // on supprime le auteur
                            $unAuteur = new \Projet\Models\admin\objets\Auteur($idAuteur,'','');
                            $unAuteur->delete();

                            // on renvoie vers la page liste auteur
                            header('Location: ./admin-listeAuteur?action2=confirmSupp');
                        }
                        else{

                            // on renvoie vers la page liste auteur
                            header('Location: ./admin-listeAuteur?action2=errorSupp');
                        }

                         
                    }
                }

                

                 //Appel à la vue : affichage
                 require 'app/views/admin/supprimerAuteur.php';
            }
            else{
                header('Location: ./admin-listeAuteur');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
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
            $listeAtelier = $ManagerAtelier->lireListeAtelier();


            //Appel à la vue : affichage
            require 'app/views/admin/listeAtelier.php';
        }
        else{
            header('Location: ./admin-home');
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

                    
                    header('Location: ./admin-listeAtelier?action2=confirmAjout');
                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutAtelier.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }

    }


    function modifierAtelier($idAtelier)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idAtelier != ""){

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
                        header('Location: ./admin-listeAtelier?action2=confirmModif');
                    }
                }

                //Appel à la vue : affichage
                require 'app/views/admin/modifierAtelier.php';
            }
            else{
                header('Location: ./admin-listeAtelier');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
           
    }


    function supprimerAtelier($idAtelier)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idAtelier != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerAtelier")
                    {
                        // on supprime le auteur
                        $unAtelier = new \Projet\Models\admin\objets\Atelier($idAtelier,'','','','','','');
                        $unAtelier->delete();


                        // on renvoie vers la page liste auteur
                        header('Location: ./admin-listeAtelier?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerAtelier.php';
            }
            else{
                header('Location: ./admin-listeAtelier');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
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
            $listeCategorie = $ManagerCategorie->lireListeCategorie();


            //Appel à la vue : affichage
            require 'app/views/admin/listeCategorie.php';
        }
        else{
            header('Location: ./admin-home');
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

                    
                    header('Location: ./admin-listeCategorie?action2=confirmAjout');
                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutCategorie.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }

    }


    function modifierCategorie($idCategorie)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idCategorie != ""){
                
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
                        header('Location: ./admin-listeCategorie?action2=confirmModif');
                    }
                }

                //Appel à la vue : affichage
                require 'app/views/admin/modifierCategorie.php';
            }
            else{
                header('Location: ./admin-listeCategorie');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
           
    }


    function supprimerCategorie($idCategorie)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idCategorie != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerCategorie")
                    {
                        // on supprime le auteur
                        $unCategorie = new \Projet\Models\admin\objets\Categorie($idCategorie,'');
                        $unCategorie->delete();


                        // on renvoie vers la page liste auteur
                        header('Location: ./admin-listeCategorie?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerCategorie.php';
            }
            else{
                header('Location: ./admin-listeCategorie');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
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
                $listeClient = $ManagerClient->lireListeClients();


                //Appel à la vue : affichage
                require 'app/views/admin/listeClient.php';

        }
        else{
            header('Location: ./admin-home');
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

                    
                    header('Location: ./admin-listeClient?action2=confirmAjout');
                }
            }

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutClient.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function modifierClient($idClient)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idClient != ""){

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
                        header('Location: ./admin-listeClient?action2=confirmModif');
                    }
                }

                //Appel à la vue : affichage
                require 'app/views/admin/modifierClient.php';
            }
            else{
                header('Location: ./admin-listeClient');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function supprimerClient($idClient)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idClient != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerClient")
                    {

                        //on récupère les commentaires qui sont associés au livre
                        $ManagerCommentaires = new  \Projet\Models\admin\ManagerCommentaires();
                        $ManagerCommentaires->supprimeCommentairesParIdClient($idClient);


                        //on récupère les reservations 
                        $ManagerReservations = new \Projet\Models\admin\ManagerReservations();
                        $listeReservations = $ManagerReservations->lireListeReservationsParIdClient($idClient);
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
                        header('Location: ./admin-listeClient?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerClient.php';
            }
            else{
                header('Location: ./admin-listeClient');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
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
                $listeCoupDeCoeur = $ManagerCoupDeCoeur->lireListeCoupDeCoeur();


                //Appel à la vue : affichage
                require 'app/views/admin/listeCoupDeCoeur.php';

        }
        else{
            header('Location: ./admin-home');
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

                    
                    header('Location: ./admin-listeCoupDeCoeur?action2=confirmAjout');
                }
            }

            
            $ManagerLivre = new  \Projet\Models\admin\ManagerLivres();
            //récupères dans un select toutes les catégories
            $listLivre = $ManagerLivre->lireListeLivres();
            

            //Appel à la vue : affichage
            require 'app/views/admin/ajoutCoupDeCoeur.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function modifierCoupDeCoeur($idCoupDeCoeur)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idCoupDeCoeur != ""){

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
                        header('Location: ./admin-listeCoupDeCoeur?action2=confirmModif');
                    }
                }

                $ManagerLivre = new  \Projet\Models\admin\ManagerLivres();
                //récupères dans un select toutes les catégories
                $listLivre = $ManagerLivre->lireListeLivres();

                //Appel à la vue : affichage
                require 'app/views/admin/modifierCoupDeCoeur.php';
            }
            else{
                header('Location: ./admin-listeCoupDeCoeur');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function supprimerCoupDeCoeur($idCoupDeCoeur)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idCoupDeCoeur != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerCoupDeCoeur")
                    {

                        // on supprime le client
                        $unCoupDeCoeur = new \Projet\Models\admin\objets\CoupDeCoeur($idCoupDeCoeur,"","","","");
                        $unCoupDeCoeur->delete();


                        // on renvoie vers la page liste client
                        header('Location: ./admin-listeCoupDeCoeur?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerCoupDeCoeur.php';
            }
            else{
                header('Location: ./admin-listeCoupDeCoeur');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
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

                if($_GET['action2'] == "errorSupp")
                {
                    echo "<script>alert('L\' éditeur n\'a pas été supprimé en base de données car il est rattaché à un éditeur');</script>";
                }

            }
                
                $ManagerEditeur= new \Projet\Models\admin\ManagerEditeurs();
                $listeEditeur = $ManagerEditeur->lireListeEditeurs();


                //Appel à la vue : affichage
                require 'app/views/admin/listeEditeur.php';

        }
        else{
            header('Location: ./admin-home');
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

                    
                    header('Location: ./admin-listeEditeur?action2=confirmAjout');
                }
            }



            //Appel à la vue : affichage
            require 'app/views/admin/ajoutEditeur.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function modifierEditeur($idEditeur)
    {
        if(isset($_SESSION['idAdmin'])){


            if($idEditeur != ""){
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
                        header('Location: ./admin-listeEditeur?action2=confirmModif');
                    }
                }


                //Appel à la vue : affichage
                require 'app/views/admin/modifierEditeur.php';
            }
            else{
                header('Location: ./admin-listeEditeur');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function supprimerEditeur($idEditeur)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idEditeur != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerEditeur")
                    {

                        $ManagerEditeurs= new \Projet\Models\admin\ManagerEditeurs();
                        $listeEditeur = $ManagerEditeurs->lireListeLivreParIdEditeur($idEditeur);

                        if($listeEditeur == null)
                        {
                            // on supprime le client
                            $unEditeur = new \Projet\Models\admin\objets\Editeur($idEditeur,"","");
                            $unEditeur->delete();

                            // on renvoie vers la page liste client
                            header('Location: ./admin-listeEditeur?action2=confirmSupp');
                        }
                        else{
                            // on renvoie vers la page liste client
                            header('Location: ./admin-listeEditeur?action2=errorSupp');
                        }
                        
                    }
                }

                // CONTRAINTE:: TEST AVANT SUPPRESSION V2RIFIER QUE AUTEUR N4EST PAS RATACHER A UN LIVRE !!!!!!!!!!!

                //Appel à la vue : affichage
                require 'app/views/admin/supprimerEditeur.php';
            }
            else{
                header('Location: ./admin-listeEditeur');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
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
                $listeFAQ = $ManagerFAQ->lireListeFAQ();


                //Appel à la vue : affichage
                require 'app/views/admin/listeFAQ.php';

        }
        else{
            header('Location: ./admin-home');
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

                    
                    header('Location: ./admin-listeFAQ?action2=confirmAjout');
                }
            }



            //Appel à la vue : affichage
            require 'app/views/admin/ajoutFAQ.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }

    function modifierFAQ($idFaq)
    {
        
        if(isset($_SESSION['idAdmin'])){


            if($idFaq != ""){

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
                        header('Location: ./admin-listeFAQ?action2=confirmModif');
                    }
                }


                //Appel à la vue : affichage
                require 'app/views/admin/modifierFAQ.php';
            }
            else{
                header('Location: ./admin-listeFAQ');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }


    function supprimerFAQ($idFaq)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idFaq != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerFAQ")
                    {

                        // on supprime le Faq
                        $uneFAQ = new \Projet\Models\admin\objets\Faq($idFaq,"","");
                        $uneFAQ->delete();


                        // on renvoie vers la page liste client
                        header('Location: ./admin-listeFAQ?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerFAQ.php';
            }
            else{
                header('Location: ./admin-listeFAQ');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
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
                $listeMeta = $ManagerMeta->lireListeMeta();


                //Appel à la vue : affichage
                require 'app/views/admin/listeMeta.php';

        }
        else{
            header('Location: ./admin-home');
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

                    
                    header('Location: ./admin-listeMeta?action2=confirmAjout');
                }
            }



            //Appel à la vue : affichage
            require 'app/views/admin/ajoutMeta.php';
        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }

    function ModifierMeta($idMeta)
    {
        if(isset($_SESSION['idAdmin'])){


            if($idMeta != ""){

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
                        header('Location: ./admin-listeMeta?action2=confirmModif');
                    }
                }


                //Appel à la vue : affichage
                require 'app/views/admin/modifierMeta.php';
            }
            else{
                header('Location: ./admin-listeMeta');
                exit();
            }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }

    function supprimerMeta($idMeta)
    {
        if(isset($_SESSION['idAdmin'])){

            if($idMeta != "")
            {
                if(isset($_GET['action2']))
                {
                    if($_GET['action2'] == "supprimerMeta")
                    {

                        // on supprime le Faq
                        $unMeta = new \Projet\Models\admin\objets\Meta($idMeta,"","","","");
                        $unMeta->delete();


                        // on renvoie vers la page liste client
                        header('Location: ./admin-listeMeta?action2=confirmSupp');
                    }
                }
                //Appel à la vue : affichage
                require 'app/views/admin/supprimerMeta.php';
            }
            else{
                header('Location: ./admin-listeMeta');
                exit();
                }

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }



    //----GESTION RESERVATION A VALIDEE, RESERVATION VALIDEE, RESERVATION TERMINEE:
    function gestionReservation()
    {
        
        if(isset($_SESSION['idAdmin'])){

            if(isset($_GET['action2']))
            {
                if(isset($_GET["action2"]))
                {
                    if($_GET["action2"] == "validerReservation")
                    {
                        $idReservation = $_GET['idReservation'];

                        //On crée un objet de type Reservation
                        $uneReservation = new \Projet\Models\admin\objets\Reservation($idReservation,"","","","");

                        //On appelle la fonction Read de l'objet reservation pour enregistrer en bdd
                        $uneReservation->Read();

                        // on set le statut et date de debut 
                        $uneReservation->setStatut('validée');
                        //date du jour
                        $uneReservation->setDateDeDebut(date("Y-m-d H:i:s"));

                        $uneReservation->Update();

                        // ----------------------------------------------------------------- 

                        //on récupére idlivre  de l'object réservation
                        $idLivre = $uneReservation->getIdLivre();
                                                
                        $unLivreReserver = new \Projet\Models\admin\objets\Livre($idLivre,"","","","","","","","","","","","","","");

                        //On appelle la fonction Read de l'objet reservation pour enregistrer en bdd
                        $unLivreReserver->Read();

                        // on set le statut et date de debut 
                        $unLivreReserver->setDisponible('non');

                        //on appel la fonction
                        $unLivreReserver->Update();


                        echo "<script>alert('La réservation a été validée en base de données');</script>";
                    }

                    if($_GET["action2"] == "supprimerReservation")
                    {
                        $idReservation = $_GET['idReservation'];

                        //On crée un objet de type Reservation
                        $uneReservation = new \Projet\Models\admin\objets\Reservation($idReservation,"","","","");

                        //on appel la fonction
                        $uneReservation->delete();

                    }


                    if($_GET["action2"] == "stopperReservation")
                    {
                        {
                            $idReservation = $_GET['idReservation'];
    
                            //On crée un objet de type Reservation
                            $uneReservation = new \Projet\Models\admin\objets\Reservation($idReservation,"","","","");
    
                            //On appelle la fonction Read de l'objet reservation pour enregistrer en bdd
                            $uneReservation->Read();
    
                            // on set le statut et date de debut 
                            $uneReservation->setStatut('Terminée');
                            
                            $uneReservation->Update();
    
                            // ----------------------------------------------------------------- 
    
                            //on récupére idlivre  de l'object réservation
                            $idLivre = $uneReservation->getIdLivre();
                                                    
                            $unLivreReserver = new \Projet\Models\admin\objets\Livre($idLivre,"","","","","","","","","","","","","","");
    
                            //On appelle la fonction Read de l'objet reservation pour enregistrer en bdd
                            $unLivreReserver->Read();
    
                            // on set le statut et date de debut 
                            $unLivreReserver->setDisponible('oui');
    
                            //on appel la fonction
                            $unLivreReserver->Update();
    
    
                            echo "<script>alert('La réservation a été stopper en base de données');</script>";
                        }
                    }


                }
            }
                
            $ManagerReservation= new \Projet\Models\admin\ManagerReservations();
            $listeReservationAValider = $ManagerReservation->lireListeReservationsParStatut("En attente de validation");
            $listeReservationValidee = $ManagerReservation->lireListeReservationsParStatut("Validée");
            $listeReservationTerminee = $ManagerReservation->lireListeReservationsParStatut("Terminée");


            //Appel à la vue : affichage
            require 'app/views/admin/listeReservation.php';

        }
        else{
            header('Location: ./admin-home');
            exit();
        }
    }

    //----PAGE D'ERREUR:
    function pageErreurAdmin()
    {
       

        require 'app/views/admin/pageErreurAdmin.php';
    }



}