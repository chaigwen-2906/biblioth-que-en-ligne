<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerLivres extends Manager{

    function lireListeLivres()
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT idLivre, livre.nom, nomAuteur, editeur.nom AS 'nomEditeur' 
        FROM livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur) LEFT JOIN editeur ON (livre.idEditeur = editeur.idEditeur) ORDER BY livre.nom";  

        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete dans la variable admin
        $resultats = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultats;

    }

    function lireListeLivreParIdAuteur($idAuteur)
    {
        $bdd = $this->bddConnection();
    
        $sql = "SELECT idLivre FROM livre where idAuteur=?";
            
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idAuteur]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultat;
    }
    

    
}