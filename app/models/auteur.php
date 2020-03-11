<?php 

namespace Projet\Models;

// ON DECLARE LA CLASSE auteur

class auteur{

    ///////////////DECLARE DES ATTRIBUTS//////////////
    PRIVATE $connectBdd;
    PRIVATE $idAuteur;
    PRIVATE $nom;
    PRIVATE $prenom;

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

    //Nom
    public function getNom(){
        return $this->nom;
    }
    public function setNom($valeur){
        $this->nom = $valeur;
    }

    //Prenom
    public function getPrenom(){
        return $this->prenom;
    }
    public function setPrenom($valeur){
        $this->prenom = $valeur;
    }


    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($connectBdd, $idAuteur, $nom, $prenom){
         //On stocke la connexion à la base de données
         $this->connectBdd = $connectBdd;

         //on modifie l'attribut idAuteur de l'objet
         $this->setIdAuteur($idAuteur);

         //on modifie l'attribut nom de l'objet
        $this->setNom($nom);

        //on modifie l'attribut prenom de l'objet
        $this->setPrenom($prenom);
    }



    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table auteur
    public function Create(){
        $sql= "INSERT INTO auteur(nom,prenom) VALUES(?,?)";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNom(), $this->getPrenom()]);
        
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
        //On modifie l'attibut idAuteur, nom, prenom; de notre objet
        $this->setIdAuteur($resultat['idAuteur']);
        $this->setNom($resultat['nom']);
        $this->setPrenom($resultat['prenom']);
        }  
    
        //Fermeture de la requete
            $requete->closeCursor();
    }



    // Update : Modifie les données d'une ligne dans la table auteur
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE auteur SET nom = ?, prenom = ? WHERE idAuteur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNom(), $this->getPrenom(), $this->getIdAuteur()]);

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