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

                // if($_GET['action2'] == "confirmSupp")
                // {
                //     echo "<script>alert('L\'atelier a été supprimé en base de données');</script>";
                // }
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


    function supprimerAtelier(){

        if(isset($_SESSION['idAdmin']))
        {

        }

    }

        
}        





