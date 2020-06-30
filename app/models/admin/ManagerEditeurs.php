<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerEditeurs extends Manager{

    function lireListeEditeurs()
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT * FROM editeur";  

        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete dans la variable admin
        $resultats = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultats;

    }

    function lireListeLivreParIdEditeur($idEditeur)
    {
        $bdd = $this->bddConnection();
    
        $sql = "SELECT idLivre FROM livre where idEditeur=?";
            
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idEditeur]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultat;
    }

    
}