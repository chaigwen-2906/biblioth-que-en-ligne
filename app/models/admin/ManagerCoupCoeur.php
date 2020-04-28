<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerCoupCoeur extends Manager{

    function getListeCoupCoeurByIdLivre($idLivre)
    {
        $bdd = $this->dbConnect();
      
        $sql = "SELECT idCoupDeCoeur FROM coupDeCoeur where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();
       
    }



    function getListeCoupDeCoeur()
    {
        $bdd = $this->dbConnect();
      
        $sql = "SELECT * FROM coupDeCoeur ";  
        

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