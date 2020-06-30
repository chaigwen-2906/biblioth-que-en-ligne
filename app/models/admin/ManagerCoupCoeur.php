<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerCoupCoeur extends Manager{

    function lireListeCoupCoeurParIdLivre($idLivre)
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT idCoupDeCoeur FROM coupdecoeur where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();
       
        return $resultat;
    }


    function lireListeCoupDeCoeur()
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT idCoupDeCoeur,coupdecoeur.auteur AS auteurCC, coupdecoeur.dateDePublication AS dateCC, livre.nom AS nomLivre FROM coupdecoeur LEFT JOIN livre ON (coupdecoeur.idLivre = livre.idLivre)";  
        

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