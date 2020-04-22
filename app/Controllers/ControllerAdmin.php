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

            $ManagerLivres = new \Projet\Models\admin\ManagerLivres();
            $listeLivres = $ManagerLivres->getListeLivres();
            
            //Appel à la vue : affichage
            require 'app/views/admin/gestionLivres.php';
        }
        else{
            header('Location: ./accueil');
            exit();
        }
    }

    


}

