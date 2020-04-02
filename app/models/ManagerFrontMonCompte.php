<?php

namespace Projet\Models;

class ManagerFrontMonCompte extends Manager
{
    public function getMonCompte($idClient)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM client where idClient = ?";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idClient]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function modifierClient($compteModifier)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM client where idClient = ?";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$compteModifier]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }
}