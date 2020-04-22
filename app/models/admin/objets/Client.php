<?php 

namespace Projet\Models\admin;

//Je declare la classe client
class Client extends Manager{

    ///////////// DECLARATION DES ATTRIBUTS //////////////
    private $connectBdd;
    private $idClient;
    private $numeroAbonne;
    private $civilite;
    private $nom;
    private $prenom;
    private $email;
    private $telephoneMobile;
    private $telephoneFixe;
    private $adresse;
    private $dateDeNaissance;
    private $motDePasse;
  




    //////Déclaration des ascesseurs////////////////////

    //idClient
    public function getIdClient(){
      return $this->idClient;
    }
    public function setIdClient($valeur){
      $this->idClient = $valeur;
    }

    // numero d'abonnée 
    public function getNumeroAbonne(){
      return $this->numeroAbonne;
    }
    public function setNumeroAbonne($valeur){
      $this->$numeroAbonne = $valeur;
    }

    //civilite
    public function getCivilite(){
      return $this->civilite;
    }
    public function setCivilite($valeur){
      $this->$civilite = $valeur;
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

    //telephoneMobile
    public function getTelephoneMobile(){
      return $this->telephoneMobile;
    }
    public function setTelephoneMobile($valeur){
      $this->telephoneMobile = $valeur;
    }

    //telephone fixe
    public function getTelephoneFixe(){
      return $this->telephoneFixe;
    }
    public function setTelephoneFixe($valeur){
      $this->telephoneFixe = $valeur;
    }

    //adresse
    public function getAdresse(){
      return $this->adresse;
    }
    public function setAdresse($valeur){
      $this->adresse = $valeur;
    }

    //date de naissance
    public function getDateDeNaissance(){
      return $this->dateDeNaissance;
    }
    public function setDateDeNaissance($valeur){
      $this->dateDeNaissance = $valeur;
    }

    //ancien mot de passe
    public function getMotDePasse(){
      return $this->motDePasse;
    }
    public function setMotDePasse($valeur){
      $this->motDePasse = $valeur;
    }
    
  


    ////////////DECLARATION DU CONSTRUCTEURS////////////

    public function __construct($idClient, $numeroAbonne,$civilite, $nom, $prenom, $email, $telephoneMobile, $telephoneFixe, $adresse, $dateDeNaissance, $motDePasse){

      //On stocke la connexion à la base de données
      $this->connectBdd = $this->dbConnect();

      //on modifie l'attribut IdClient de l'objet
      // j'appel la function setidclient je lui passe en parametre idclient reçu en entrée
      $this->setIdClient($idClient);

      //numero abonne :on modifie l'attribut $nom de l'objet
      $this->setNumeroAbonne($numeroAbonne);

      //civilite
      $this->setCivilite($civilite);

      //nom
      $this->setNom($nom);

      //prenom
      $this->setPrenom($prenom);

      //email
      $this->setEmail($email);

      //telephone mobile
      $this->setTelephoneMobile($telephoneMobile);

      //telephone fixe
      $this->setTelephoneFixe($telephoneFixe);

      //adresse
      $this->setAdresse($adresse);

      //date de naissance
      $this->setDateDeNaissance($dateDeNaissance);

      //ancien mot passe
      $this->setMotDePasse($motDePasse);


    }

    ////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////


      // Create : crée une ligne dans la table Client
      public function Create(){
        //Préparation de la requête
        $sql = "INSERT INTO client(numeroAbonne,civilite,nom,prenom,email,telephoneMobile,telephoneFixe,adresse,dateDeNaissance,motDePasse) 
        VALUES (?,?,?,?,?,?,?,?,?,?)";

        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNumeroAbonne(),$this->getCivilite(), $this->getNom(), $this->getPrenom(), $this->getEmail(), $this->getTelephoneMobile(), $this->getTelephoneFixe(), $this->getAdresse(), $this->getMotDePasse()]);

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
            //On modifie l'attibut numeroAbone,nom,prenom etc... de notre objet
            $this->setNumeroAbonne($resultat['numeroAbonne']);
            $this->setCivilite($resultat['civilite']);
            $this->setNom($resultat['nom']);
            $this->setPrenom($resultat['prenom']);
            $this->setEmail($resultat['email']);
            $this->setTelephoneMobile($resultat['telephoneMobile']);
            $this->setTelephoneFixe($resultat['telephoneFixe']);
            $this->setAdresse($resultat['adresse']);
            $this->setDateDeNaissance($resultat['dateDeNaissance']);
            $this->setMotDePasse($resultat['motDePasse']);
           
        }

        //Fermeture de la requete
        $requete->closeCursor();
      }



      // Update : Modifie les données d'une ligne dans la table Client
      public function Update(){
        //Préparation de la requête
        $sql = "UPDATE client SET numeroAbonne = ?, civilite = ?, nom = ?, prenom = ?, email = ?, telephoneMobile = ?, telephoneFixe = ?, adresse = ?, dateDeNaissance = ?, motDePasse =? = ? WHERE idClient = ? ";

        $requete = $this->connectBdd->prepare($sql);

        ///Execution de la requete
        $requete->execute([$this->getNumeroAbonne(),$this->getCivilite(),$this->getNom(), $this->getPrenom(), $this->getEmail(), $this->getTelephoneMobile(), $this->getTelephoneFixe(), $this->getAdresse(), $this->getDateDeNaissance(), 
        $this->getMotDePasses(),$this->getIdClient()]);

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