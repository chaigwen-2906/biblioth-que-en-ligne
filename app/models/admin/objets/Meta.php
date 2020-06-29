<?php 

namespace Projet\Models\admin\objets;

// ON DECLARE LA CLASSE auteur

class Meta extends Manager{

    ///////////////DECLARE DES ATTRIBUTS//////////////
    PRIVATE $connectBdd;
    PRIVATE $idMeta;
    PRIVATE $nomPage;
    PRIVATE $keywords;
    PRIVATE $description;
    PRIVATE $title;

    //////////////DECLARATION DES ASSESSEURS///////////

    ////////////////////$IdMeta//////////
    //get : return la valeur de l'attribut
    public function getIdMeta(){
        return $this->idMeta;
    }
    //set : modifie la valeur de l'attribut
    public function setIdMeta($valeur){
        $this->idMeta = $valeur;
    }

    //NomPage
    public function getNomPage(){
        return $this->nomPage;
    }
    public function setNomPage($valeur){
        $this->nomPage = $valeur;
    }

    //Keywords
    public function getKeywords(){
        return $this->keywords;
    }
    public function setKeywords($valeur){
        $this->keywords = $valeur;
    }

    //Description
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($valeur){
        $this->description = $valeur;
    }

    //Title
    public function getTitle(){
        return $this->Title;
    }
    public function setTitle($valeur){
        $this->Title = $valeur;
    }

    
    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($idMeta,$nomPage, $keywords, $description, $title){
        //On stocke la connexion à la base de données
        $this->connectBdd = $this->bddConnection();

        //on modifie l'attribut idMeta de l'objet
        $this->setIdMeta($idMeta);

        //on modifie l'attribut nomPage de l'objet
        $this->setNomPage($nomPage);

        //on modifie l'attribut keywords de l'objet
        $this->setKeywords($keywords);

        //on modifie l'attribut description de l'objet
        $this->setDescription($description);

         //on modifie l'attribut title de l'objet
         $this->setTitle($title);
    }


    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table auteur
    public function Create(){
        $sql= "INSERT INTO meta(nomPage,keywords,description,title) VALUES(";

      
        $sql = $sql."'".addslashes($this->getNomPage())."',";

        $sql = $sql."'".addslashes($this->getKeywords())."',";

        $sql = $sql."'".addslashes($this->getDescription())."',";

        $sql = $sql."'".addslashes($this->getTitle())."'";

        $sql = $sql.")";


        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNomPage(), $this->getKeywords(), $this->getDescription(), $this->getTitle()]);
        
        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idCoupDeCoeur de notre objet
        $this->setIdMeta($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Read : Lit une ligne dans la table auteur
    public function Read(){
        $sql = "SELECT * FROM meta WHERE idMeta = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdMeta()]);

        //On récupère les données
        while($resultat = $requete->fetch())
        {
        //On modifie l'attibut IdMeta, nomAuteur, prenomAuteur; de notre objet
        $this->setIdMeta($resultat['idMeta']);
        $this->setNomPage($resultat['nomPage']);
        $this->setKeywords($resultat['keywords']);
        $this->setDescription($resultat['description']);
        $this->setTitle($resultat['title']);
        }  
    
        //Fermeture de la requete
            $requete->closeCursor();
    }



    // Update : Modifie les données d'une ligne dans la table auteur
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE meta SET nomPage = ?, keywords = ?, description = ?, title = ?  WHERE idMeta = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getNomPage(), $this->getKeywords(), $this->getDescription(), $this->getTitle(), $this->getidMeta()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }



    // Delete : supprime une ligne dans la table auteur
    public function Delete(){
        //Préparation de la requête
        $sql = "DELETE FROM meta WHERE idMeta = ?";
        echo $sql;
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdMeta()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }
}

?>