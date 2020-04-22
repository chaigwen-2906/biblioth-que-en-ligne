<?php

namespace Projet\Models\front;

class ManagerFrontNouveaute extends Manager
{
    public function getListNouveautes()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ORDER BY dateDePublication desc limit 16";
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
}