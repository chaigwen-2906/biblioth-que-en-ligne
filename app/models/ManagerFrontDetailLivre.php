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
}