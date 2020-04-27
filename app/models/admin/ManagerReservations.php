<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerReservations extends Manager{

    function getListeReservationsByIdLivre($idLivre)
    {
        $bdd = $this->dbConnect();
      
        $sql = "SELECT idReservation FROM reservation where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

    }


     function getListeReservationsByIdClient($idClient)
     {
        $bdd = $this->dbConnect();
      
        $sql = "SELECT idReservation FROM reservation where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();
     }
}