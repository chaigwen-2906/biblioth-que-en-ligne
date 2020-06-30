<?php 

namespace Projet\Models\admin\objets;

// ON DECLARE LA CLASSE auteur

class Auteur extends Manager{

    ///////////////DECLARE DES ATTRIBUTS//////////////
    PRIVATE $connectBdd;
    PRIVATE $idAuteur;
    PRIVATE $nomAuteur;
    PRIVATE $prenomAuteur;

    //////////////DECLARATION DES ASSESSEURS///////////

    ////////////////////$idAuteur//////////
    //get : return la valeur de l'attribut
    public function getIdAuteur(){
        return $this->idAuteur;
    }
    //set : modifie la valeur de l'attribut
    public function setIdAuteur($valeur){
        $this->idAuteur = $valeur;
    }

    //NomAuteur
    public function getNomAuteur(){
        return $this->nomAuteur;
    }
    public function setNomAuteur($valeur){
        $this->nomAuteur = $valeur;
    }

    //Prenom
    public function getPrenomAuteur(){
        return $this->prenomAuteur;
    }
    public function setPrenomAuteur($valeur){
        $this->prenomAuteur = $valeur;
    }


    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($idAuteur, $nomAuteur, $prenomAuteur){
        //On stocke la connexion à la base de données
        $this->connectBdd = $this->bddConnection();

        //on modifie l'attribut idAuteur de l'objet
        $this->setIdAuteur($idAuteur);

        //on modifie l'attribut nomAuteur de l'objet
        $this->setNomAuteur($nomAuteur);

        //on modifie l'attribut prenomAuteur de l'objet
        $this->setPrenomAuteur($prenomAuteur);
    }



    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table auteur
    public function Create(){
        $sql= "INSERT INTO auteur(nomAuteur,prenomAuteur) VALUES(?,?)";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([addslashes($this->getNomAuteur()), addslashes($this->getPrenomAuteur())]);
        
        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idCoupDeCoeur de notre objet
        $this->setIdAuteur($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Read : Lit une ligne dans la table auteur
    public function Read(){
        $sql = "SELECT * FROM auteur WHERE IdAuteur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdAuteur()]);

        //On récupère les données
        while($resultat = $requete->fetch())
        {
        //On modifie l'attibut idAuteur, nomAuteur, prenomAuteur; de notre objet
        $this->setIdAuteur($resultat['idAuteur']);
        $this->setNomAuteur($resultat['nomAuteur']);
        $this->setPrenomAuteur($resultat['prenomAuteur']);
        }  
    
        //Fermeture de la requete
            $requete->closeCursor();
    }



    // Update : Modifie les données d'une ligne dans la table auteur
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE auteur SET nomAuteur = ?, prenomAuteur = ? WHERE idAuteur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([addslashes($this->getNomAuteur()), addslashes($this->getPrenomAuteur()), $this->getIdAuteur()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }



    // Delete : supprime une ligne dans la table auteur
    public function Delete(){
        //Préparation de la requête
        $sql = "DELETE FROM auteur WHERE idAuteur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdAuteur()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }
}

?>