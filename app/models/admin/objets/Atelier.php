<?php

namespace Projet\Models\admin\objets;

// ON DECLARE LA CLASSE atelier
class Atelier extends Manager{

    ///////////////DECLARE DES ATTRIBUTS//////////////
    private $connectBdd;
    private $idAtelier;
    private $nom;
    private $date;
    private $description;
    private $heure;
    private $age;
    private $capacite;

    
    //////////////DECLARATION DES ASSESSEURS///////////

    //////////////////// $idAtelier//////////
    //get : return la valeur de l'attribut
    public function getIdAtelier(){
        return $this->idAtelier;
    }
    //set : modifie la valeur de l'attribut
    public function setIdAtelier($valeur){
        $this->idAtelier = $valeur;
    }

    //nom
     public function getNom(){
        return $this->nom;
    }
    public function setNom($valeur){
        $this->nom = $valeur;
    }

    //date
    public function getDate(){
        return $this->date;
    }
    public function setDate($valeur){
        $this->date = $valeur;
    }

    //description
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($valeur){
        $this->description = $valeur;
    }

    //heure
    public function getHeure(){
        return $this->heure;
    }
    public function setHeure($valeur){
        $this->heure = $valeur;
    }

    //age
    public function getAge(){
        return $this->age;
    }
    public function setAge($valeur){
        $this->age = $valeur;
    }

    //capacite
    public function getCapacite(){
        return $this->capacite;
    }
    public function setCapacite($valeur){
        $this->capacite = $valeur;
    }


    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($idAtelier, $nom, $date, $description, $heure, $age, $capacite){

        //On stocke la connexion à la base de données
        $this->connectBdd = $this->dbConnect();

        //on modifie l'attribut idAtelier de l'objet
        $this->setIdAtelier($idAtelier);

        //on modifie l'attribut nom de l'objet
        $this->setNom($nom);

        //on modifie l'attribut date de l'objet
        $this->setDate($date);

        //on modifie l'attribut description de l'objet
        $this->setDescription($description);

        //on modifie l'attribut heure de l'objet
        $this->setHeure($heure);

        //on modifie l'attribut age de l'objet
        $this->setAge($age);

        //on modifie l'attribut capacite de l'objet
        $this->setCapacite($capacite);

    }

    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table atelier
    public function Create(){

        //Préparation de la requête
        //dans la bdd INSERT la ligne dans la table atelier et je passe les valeur des colonne = 
        //(nom,date,description,heure,age,capacite)
        $sql= "INSERT INTO atelier(nom,date,description,heure,age,capacite) VALUES (?,?,?,?,?,?)";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNom(), $this->getDate(), $this->getDescription(), $this->getHeure(), $this->getAge(), $this->getCapacite()]);

        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idAtelier de notre objet
        $this->setIdAtelier($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Read : Lit une ligne dans la table atelier
    public function Read(){
        //Préparation de la requête
        $sql = "SELECT * FROM atelier WHERE idAtelier = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdAtelier()]);

        //On récupère les données
        while($resultat = $requete->fetch())
        {
            //On modifie l'attibut idLivre, nom, commentaire; de notre objet
            $this->setNom($resultat['nom']);
            $this->setDate($resultat['date']);
            $this->setDescription($resultat['description']);
            $this->setHeure($resultat['heure']);
            $this->setAge($resultat['age']);
            $this->setCapacite($resultat['capacite']);
        }
        
        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Update : Modifie les données d'une ligne dans la table atelier
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE atelier SET nom = ?, date = ?, description = ?, heure = ?, age = ?, capacite = ? WHERE idAtelier = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNom(), $this->getDate(), $this->getDescription(), $this->getHeure(), $this->getAge(), $this->getCapacite(), $this->getidAtelier()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // delete : supprime une ligne dans la table atelier
    public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM atelier WHERE idAtelier = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdAtelier()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }
  
}

?>