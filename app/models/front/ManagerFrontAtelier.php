<?php

namespace Projet\Models\front;

class ManagerFrontAtelier extends Manager
{
    public function lireListeAtelier()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM atelier WHERE DATE>NOW() ORDER BY DATE";
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

    public function lireListeAtelierLimit4()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM atelier WHERE DATE>NOW() ORDER BY DATE LIMIT 4";
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

    public function lireDetailAtelier($idAtelier)
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM atelier WHERE idAtelier = ?";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idAtelier]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

}