<?php

namespace Projet\Controllers;

class ControllerAdmin
{
    function connectionAdministrateurAdmin()
    {
        $this->AdminManager = new \Projet\Models\admin\ManagerAdmin();


        // if ($_GET['action2'] == "connectionAdministrateur"){
                    
        //     //on appelle la function qui met à jour les informations dans la basse de donnée
        //     //récuperer les variables post
        //     $FrontManagerMonCompte->connectionAdministrateur($_SESSION['idClient'],$_POST['nouveauMotPasse'], $_POST['confirNouveauMotPasse']);
        // }

        //Appel à la vue : affichage
        require 'app/views/admin/connectionAdministrateur.php';
    }
}

