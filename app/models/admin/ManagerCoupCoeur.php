<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerCoupCoeur extends Manager{

    function lireListeCoupCoeurParIdLivre($idLivre)
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT idCoupDeCoeur FROM coupDeCoeur where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();
       
    }



    function lireListeCoupDeCoeur()
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT *, livre.nom AS nomLivre FROM coupDeCoeur LEFT JOIN livre ON (coupDeCoeur.idLivre = livre.idLivre)";  
        

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