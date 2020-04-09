<?php

namespace Projet\Models;

class ManagerFrontPanier extends Manager
{
    public function getInfoLivre($unIdLivre)
    {
        $bdd = $this->dbConnect();

        // On réalise la requete sur la base de données
        // On prépare la requete
        $sql = "SELECT nom, nomAuteur FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) WHERE idLivre=".$unIdLivre;
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function getListDemandeEnAttente($idClient)
    {
        
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM reservation LEFT JOIN (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ON (reservation.idLivre = livre.idLivre)  WHERE idClient = $idClient AND statut LIKE 'En attente de validation'  ORDER BY reservation.dateDeDebut DESC  ";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }


    public function getListDemandeValider($idClient)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM reservation LEFT JOIN (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ON (reservation.idLivre = livre.idLivre)  WHERE idClient = $idClient AND statut LIKE 'Validée'  ORDER BY reservation.dateDeDebut DESC  ";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function ajoutReservation($idLivre,$idClient)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = " INSERT INTO reservation(idClient,idLivre,dateDeDebut,statut) VALUES (?,?,NOW(),'En attente de validation') ";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idClient,$idLivre]);

        //On ferme la requete
        $requete->closeCursor();

    }
}