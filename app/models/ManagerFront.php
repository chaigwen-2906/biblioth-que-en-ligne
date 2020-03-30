<?php

namespace Projet\Models;

class ManagerFront extends Manager
{
    public function getListFAQ()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM faq";
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

    public function getListCategorie()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM categorie order by nomCategorie";
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

    public function seConnecter($adresseMail, $motDePasse)
    {
        $bdd = $this->dbConnect();

        // On réalise la requete sur la base de données
        // On prépare la requete
        $sql = "SELECT * FROM client WHERE email LIKE ? AND motDePasse LIKE ?";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$adresseMail, $motDePasse]);

        //On regarde si on obtient un résultat
        $resultat = $requete->fetch();

        //Si resultat = false alors mauvais couple @/mot de passe
        //Sinon c'est ok
        if($resultat == false)
        {
            return false;
        }
        else{
            return $resultat["idClient"];
        }

    }
}
