<?php

namespace Projet\Models;

class ManagerFrontPanier extends Manager
{
    public function getResultPanier()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        // $sql = "SELECT * FROM atelier WHERE DATE>NOW() ORDER BY DATE ";
        // $requete = $bdd->prepare($sql);

        // //Execution de la requete
        // $requete->execute();

        // //On récupère le résultat de la requete
        // $resultat = $requete->fetchAll();

        // //On ferme la requete
        // $requete->closeCursor();

        // //On retourne les résultats
        // return $resultat;
    }
}