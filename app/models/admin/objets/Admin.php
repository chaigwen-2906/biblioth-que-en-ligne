<?php 

namespace Projet\Models\admin\objets;

// ON DECLARE LA CLASSE auteur

class Admin extends Manager{

    ///////////////DECLARE DES ATTRIBUTS//////////////
    PRIVATE $connectBdd;
    PRIVATE $idAdmin;
    PRIVATE $nomUtilisateur;
    PRIVATE $passUtilisateur;
    

    //////////////DECLARATION DES ASSESSEURS///////////

    ////////////////////$IdAdmin//////////
    //get : return la valeur de l'attribut
    public function getIdAdmin(){
        return $this->idAdmin;
    }
    //set : modifie la valeur de l'attribut
    public function setIdAuteur($valeur){
        $this->idAdmin = $valeur;
    }

    //NomUtilisateur
    public function getNomUtilisateur(){
        return $this->nomUtilisateur;
    }
    public function setNomUtilisateur($valeur){
        $this->nomUtilisateur = $valeur;
    }

    //PassUtilisateur
    public function getPassUtilisateur(){
        return $this->passUtilisateur;
    }
    public function setPassUtilisateur($valeur){
        $this->passUtilisateur = $valeur;
    }


    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($idAdmin, $nomUtilisateur, $passUtilisateur){
        //On stocke la connexion à la base de données
        $this->connectBdd = $this->dbConnect();

        //on modifie l'attribut idAdmin de l'objet
        $this->setIdAdmin($idAdmin);

        //on modifie l'attribut nomUtilisateur de l'objet
        $this->setNomUtilisateur($nomUtilisateur);

        //on modifie l'attribut passUtilisateur de l'objet
        $this->setPassUtilisateur($passUtilisateur);
    }



    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table admin
    public function Create(){
        $sql= "INSERT INTO admin(nomUtilisateur,passUtilisateur) VALUES(?,?)";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNomUtilisateur(), $this->getPassUtilisateur()]);
        
        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idAdmin de notre objet
        $this->setIdAdmin($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Read : Lit une ligne dans la table admin
    public function Read(){
        $sql = "SELECT * FROM auteur WHERE IdAdmin = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdAdmin()]);

        //On récupère les données
        while($resultat = $requete->fetch())
        {
        //On modifie l'attibut idAuteur, nomAuteur, prenomAuteur; de notre objet
        $this->setIdAdmin($resultat['idAdmin']);
        $this->setNomUtilisateur($resultat['nomUtilisateur']);
        $this->setPassUtilisateur($resultat['passUtilisateur']);
        }  
    
        //Fermeture de la requete
            $requete->closeCursor();
    }



    // Update : Modifie les données d'une ligne dans la table admin
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE admin SET nomUtilisateur = ?, passUtilisateur = ? WHERE idAdmin = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNomUtilisateurr(), $this->getPassUtilisateurr(), $this->getIdAdmin()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }



    // Delete : supprime une ligne dans la table admin
    public function Delete(){
        //Préparation de la requête
        $sql = "DELETE FROM admin WHERE idAdmin = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdAdmin()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }
}

?>