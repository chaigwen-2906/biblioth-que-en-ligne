<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerAtelier extends Manager{

    function lireListeAtelier()
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT * FROM atelier";  
        

        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete dans la variable admin
        $resultats = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultats;

    }


    
}