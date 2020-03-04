<?php

// ON DECLARE LA CLASSE editeur
class editeur{

    ///////////////DECLARE DES ATTRIBUTS//////////////
    private $connectBdd;
    private $idEditeur;
    private $code;
    private $nom;

    //////////////DECLARATION DES ASSESSEURS///////////

    //////////////////// $idEditeur//////////
    //get : return la valeur de l'attribut
    public function getIdEditeur(){
        return $this->idEditeur;
    }
    //set : modifie la valeur de l'attribut
    public function setIdEditeur($valeur){
        $this->idEditeur = $valeur;
    }

    ////////////////////code/////////////////
    public function getCode(){
        return $this->code;
    }
    public function setCode($valeur){
        $this->code = $valeur;
    }

    ////////////////////nom/////////////////
    public function getNom(){
        return $this->nom;
    }
    public function setNom($valeur){
        $this->nom = $valeur;
    }


    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($connectBdd, $idEditeur, $code, $nom){

        //On stocke la connexion à la base de données
        $this->connectBdd = $connectBdd;

        //on modifie l'attribut idEditeur de l'objet
        $this->setIdEditeur($idEditeur);

        //on modifie l'attribut code de l'objet
        $this->setCode($code);

        //on modifie l'attribut nom de l'objet
        $this->setNom($nom);
    }



    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table editeur
        // Create : crée une ligne dans la table editeur
        public function Create(){

            //Préparation de la requête
            //dans la bdd INSERT la ligne dans la table editeur et je passe les valeur des colonne = 
            //(editeur,code,nom)
           $sql= "INSERT INTO editeur(code,nom) VALUES (?,?)";
           $requete = $this->connectBdd->prepare($sql);

           //Execution de la requete
           $requete->execute([$this->getCode(), $this->getNom()]);

            //on recupère l'id de la ligne insérée 
           //et on le stocke dans l'attribut idEditeur de notre objet
           $this->setIdEditeur($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
        }


         // Read : Lit une ligne dans la table editeur
         public function Read(){
            //Préparation de la requête
            $sql = "SELECT * FROM editeur WHERE idEditeur = ?";
            $requete = $this->connectBdd->prepare($sql);

            //Execution de la requete
            $requete->execute([$this->getIdEditeur()]);

            //On récupère les données
            while($resultat = $requete->fetch())
            {
                //On modifie l'attibut code, nom de notre objet
                $this->setCode($resultat['code']);
                $this->setNom($resultat['nom']); 
            }
            
        //Fermeture de la requete
        $requete->closeCursor();
      }

          // Update : Modifie les données d'une ligne dans la table editeur
          public function Update(){
            //Préparation de la requête
            $sql = "UPDATE editeur SET code = ?, nom = ? WHERE idEditeur = ?";
            $requete = $this->connectBdd->prepare($sql);

            //Execution de la requete
            $requete->execute([$this->getCode(), $this->getNom()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // delete : supprime une ligne dans la table editeur
    public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM editeur WHERE idEditeur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdEditeur()]);

    //Fermeture de la requete
    $requete->closeCursor();// requête delete 
    }
}
?>