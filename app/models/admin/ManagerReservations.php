<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerReservations extends Manager{

    function getListeReservationsByStatut($statut)
    {
        $bdd = $this->dbConnect();
      
        $sql = "SELECT idReservation, livre.nom as nomLivre, client.nom AS nomClient, client.prenom AS prenomClient, disponible, dateDeDebut FROM reservation 
        LEFT JOIN client ON(reservation.idClient = client.idClient) 
        LEFT JOIN livre ON(reservation.idLivre = livre.idLivre) WHERE statut LIKE '$statut'"  ;  

        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete dans la variable admin
        $resultats = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        return $resultats;
    }

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