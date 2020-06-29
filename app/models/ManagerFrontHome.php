<?php

namespace Projet\Models;

class ManagerFrontHome extends Manager
{
    public function viewFrontHome()
    {
        //$bdd = $this->dbConnect();

        // Je teste mes classes
        
        //test read
        // $unClient = new Client(9, '', "", "", "", "","");
        // $unClient->Read();
        // $retour = $unClient->getNom()." -- ".$unClient->getPrenom();
        // return $retour;


        //test create
        // $unClient = new client($bdd, "", 'test', "titi", "chai@hotmail.fr", "0618433249", "gwen","gweno");
        // $unClient->Create();
        // $retour = "";


        //test update
        // $unClient = new client($bdd, 7,"","","","","","");
        // $unClient->Read();
        // $unClient->setTelephone("0618433250");
        // $unClient->update();

        
        // test delete 
        // $unClient = new client($bdd, 1,"","","","","","");
        // $unClient->delete();
        
    }

    public function getListCoupDeCoeur()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM coupdecoeur LEFT JOIN (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) ON 
        (coupdecoeur.idLivre = livre.idLivre) ORDER BY coupdecoeur.dateDePublication DESC LIMIT 4";
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

    public function getListNouveautes()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ORDER BY dateDePublication desc limit 4 ";
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

    public function getListAtelier()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM atelier WHERE DATE>NOW() ORDER BY DATE LIMIT 4 ";
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

    public function getListMangas()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) LEFT JOIN categorie ON (livre.idCategorie = categorie.idCategorie)
        WHERE categorie.idCategorie = 25 limit 4";
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

    public function getListBandesDessinees()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) LEFT JOIN categorie ON (livre.idCategorie = categorie.idCategorie)
        WHERE categorie.idCategorie = 3 limit 4";
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

    public function getListCuisine()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) LEFT JOIN categorie ON (livre.idCategorie = categorie.idCategorie)
        WHERE categorie.idCategorie = 4 limit 4";
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