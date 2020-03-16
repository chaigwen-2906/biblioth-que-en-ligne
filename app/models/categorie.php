<?php

namespace Projet\Models;

//On déclare la classe Categorie
class Categorie extends Manager{

    
    /////////////// DECLARATION DES ATTRIBUTS ///////////////////////
    private $connectBdd;
    private $idCategorie;
    private $nom;



    /////////////// DECLARATION DES ASSESSEURS ///////////////////////
    //get : return la valeur de l'attribut
    //set : modifie la valeur de l'attribut
    public function getIdCategorie(){
        return $this->idCategorie;
    }
    public function setIdCategorie($valeur){
        $this->idCategorie = $valeur;
    }
    //nom
    public function getNom(){
        return $this->nom;
    }
    public function setNom($valeur){
        $this->nom = $valeur;
    }



    /////////////// DECLARATION DES CONSTRUCTEURS ///////////////////////
    public function __construct($idCategorie, $nom){
        //On stocke la connexion à la base de données
        $this->connectBdd = $this->dbConnect();

        //on modifie l'attribut IdCategorie de l'objet
        $this->setIdCategorie($idCategorie);

        //on modifie l'attribut $nom de l'objet
        $this->setNom($nom);
    }

    
    
    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////


    // Create : crée une ligne dans la table Categorie
    public function Create(){
        //Préparation de la requête
        $sql = "INSERT INTO categorie(nom) VALUES (?)";
        $requete = $this->connectBdd->prepare($sql);
        
        //Execution de la requete
        $requete->execute([$this->getNom()]);

        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idCategorie de notre objet      
        $this->setIdCategorie($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Read : Lit une ligne dans la table Categorie
    public function Read(){

        //Préparation de la requête
        $sql = "SELECT * FROM categorie WHERE idCategorie = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdCategorie()]);

        //On récupère les données
        while ($resultat = $requete->fetch())
        {
            //On modifie l'attibut nom de notre objet
            $this->setNom($resultat['nom']);
        }

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Update : Modifie les données d'une ligne dans la table Categorie
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE categorie SET nom = ? WHERE idCategorie = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNom(),$this->getIdCategorie()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // delete : supprime une ligne dans la table Categorie
    public function Delete(){
        //Préparation de la requête
        $sql = "DELETE FROM categorie WHERE idCategorie = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdCategorie()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }
    
}

?>