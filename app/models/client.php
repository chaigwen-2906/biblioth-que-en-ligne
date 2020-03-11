<?php 

namespace Projet\Models;

//Je declare la classe client
class client{

    ///////////// DECLARATION DES ATTRIBUTS //////////////
    private $connectBdd;
    private $idClient;
    private $nom;
    private $prenom;
    private $email;
    private $telephone;
    private $identifiant;
    private $motDePasse;


    //////Déclaration des ascesseurs////////////////////

    //idClient
    public function getIdClient(){
      return $this->idClient;
    }
    public function setIdClient($valeur){
      $this->idClient = $valeur;
    }

    //nom
    public function getNom(){
      return $this->nom;
    }
    public function setNom($valeur){
      $this->nom = $valeur;
    }

    //prenom
    public function getPrenom(){
      return $this->prenom;
    }
    public function setPrenom($valeur){
      $this->prenom = $valeur;
    }

    //email
    public function getEmail(){
      return $this->email;
    }
    public function setEmail($valeur){
      $this->email = $valeur;
    }

    //telephone
    public function getTelephone(){
      return $this->telephone;
    }
    public function setTelephone($valeur){
      $this->telephone = $valeur;
    }

    //identifiant
    public function getIdentifiant(){
      return $this->identifiant;
    }
    public function setIdentifiant($valeur){
      $this->identifiant = $valeur;
    }

    //motDePasse
    public function getMotDePasse(){
      return $this->motDePasse;
    }
    public function setMotDePasse($valeur){
      $this->motDePasse = $valeur;
    }


    ////////////DECLARATION DU CONSTRUCTEURS////////////

    public function __construct($connectbdd, $idClient, $nom, $prenom, $email, $telephone, $identifiant, $motDePasse){

      //On stocke la connexion à la base de données
      $this->connectBdd = $connectbdd;

      //on modifie l'attribut IdClient de l'objet
      // j'appel la function setidclient je lui passe en parametre idclient reçu en entrée
      $this->setIdClient($idClient);

      //on modifie l'attribut $nom de l'objet
      $this->setNom($nom);

      //prenom
      $this->setPrenom($prenom);

      //email
      $this->setEmail($email);

      //telephone
      $this->setTelephone($telephone);

      //identifiant
      $this->setIdentifiant($identifiant);

      //motDePasse
      $this->setMotDePasse($motDePasse);
    }

    ////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////


      // Create : crée une ligne dans la table Client
      public function Create(){
        //Préparation de la requête
        $sql = "INSERT INTO client(nom,prenom,email,telephone,identifiant,motDePasse) 
        VALUES (?,?,?,?,?,?)";

        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNom(), $this->getPrenom(), $this->getEmail(), $this->getTelephone(), $this->getIdentifiant(), $this->getMotDePasse()]);

        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idClient de notre objet      
        $this->setIdClient($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();

      }

      // Read : Lit une ligne dans la table client
      public function Read(){
        
        //Préparation de la requête
        $sql = "SELECT * FROM client WHERE idClient = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdClient()]);

        //On récupère les données
        while ($resultat = $requete->fetch())
        {
            //On modifie l'attibut nom,prenom etc... de notre objet
            $this->setNom($resultat['nom']);
            $this->setPrenom($resultat['prenom']);
            $this->setEmail($resultat['email']);
            $this->setTelephone($resultat['telephone']);
            $this->setIdentifiant($resultat['identifiant']);
            $this->setMotDePasse($resultat['motDePasse']);
        }

        //Fermeture de la requete
        $requete->closeCursor();
      }



      // Update : Modifie les données d'une ligne dans la table Client
      public function Update(){
        //Préparation de la requête
        $sql = "UPDATE client SET nom = ?, prenom = ?, email = ?, telephone = ?, identifiant = ?, motDePasse = ? WHERE idClient = ? ";

        $requete = $this->connectBdd->prepare($sql);

        ///Execution de la requete
        $requete->execute([$this->getNom(), $this->getPrenom(), $this->getEmail(), $this->getTelephone(), $this->getIdentifiant(),
        $this->getMotDePasse(), $this->getIdClient()]);

        //Fermeture de la requete
        $requete->closeCursor();
      }



      // delete : supprime une ligne dans la table client
      public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM client WHERE idClient = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdClient()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete
      }

}

?>