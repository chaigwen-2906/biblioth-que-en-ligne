<?php

namespace Projet\Models;

class ManagerFrontDetailLivre extends Manager
{
    public function getDetailLivre($idLivre)
    {
        $bdd = $this->dbConnect();

        // echo "idLivre:".$_GET['id'];

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        WHERE idLivre=".$idLivre;
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

    
    public function getCommentaire($idLivre)
    {
        $bdd = $this->dbConnect();

        // echo "idLivre:".$_GET['id'];

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM commentaire left join client on (commentaire.idClient = client.idClient) 
        where commentaire.idLivre=? ORDER BY commentaire.date DESC ";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function postCommentaire($idLivre,$idClient,$note,$description)
    {
        $bdd = $this->dbConnect();

        // echo "idLivre:".$_GET['id'];

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "INSERT INTO commentaire(idLivre,idClient,date,note,description) VALUES (?,?,NOW(),?,?)";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre,$idClient,$note,$description]);

        //On ferme la requete
        $requete->closeCursor();
    }
}