<?php

// ON DECLARE LA CLASSE reservation
class reservation{
    private $connectBdd;
    private $idReservation;
    private $idClient;
    private $idLivre;
    private $dateDeDebut;
    private $statut;


    //////////////DECLARATION DES ASSESSEURS///////////


    ////////////////////$idReservation//////////
    //get : return la valeur de l'attribut
    public function getIdReservation(){
         return $this->idReservation;
    }
    //set : modifie la valeur de l'attribut
    public function setIdReservation($valeur){
        $this->idReservation = $valeur;
    } 

    /////////////////////$idClient//////////////////////
    public function getIdClient(){
        return $this->idClient;
    }
    public function setIdClient($valeur){
        $this-> idClient = $valeur;
    }

    /////////////////////$idLivre//////////////////////
    public function getIdLivre(){
        return $this->idLivre;
    }
    public function setIdLivre($valeur){
        $this->idLivre = $valeur;
    }

    //////////////////$idDateDeDebut///////////////////
    public function getDateDeDebut(){
        return $this->dateDeDebut;
    }
    public function setDateDeDebut($valeur){
        $this->dateDeDebut = $valeur;
    }

    ///////////////////$idStatut///////////////////////
    public function getStatut(){
        return $this->statut;
    }
    public function setStatut($valeur){
        $this->statut = $valeur;
    }


    /////////////DECLARATION DES CONSTRUCTEURS///////////


    public function __construct($connectBdd,$idReservation,$idClient,$idLivre,$dateDeDebut,$statut){

        //On stocke la connexion à la base de données
        $this->connectBdd = $connectBdd;

        //on modifie l'attribut idcoupDeCoeur de l'objet
        $this->setIdReservation($idReservation);

        //on modifie l'attribut idClient de l'objet
        $this->setIdClient($idClient);

        //on modifie l'attribut idLivre de l'objet
        $this->setIdLIvre($idLivre);

        //on modifie l'attribut idDateDeDebut de l'objet
        $this->setdateDeDebut($dateDeDebut);

        //on modifie l'attribut idStatut de l'objet
        $this->setstatut($statut);

    }


        
   /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table Reservation
    public function Create(){
        $sql= "INSERT INTO reservation(idClient,idLivre,dateDeDebut,statut) VALUES (?,?,?,?)";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdClient(), $this->getIdLivre(), $this->getDateDeDebut(), $this->getStatut()]);

        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idCoupDeCoeur de notre objet
        $this->setIdReservation($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }

    // Read : Lit une ligne dans la table CoupDeCoeur
    public function Read(){
        //Préparation de la requête
        $sql = "SELECT * FROM reservation WHERE idReservation = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdReservation()]);

         //On récupère les données
         while($resultat = $requete->fetch())
         {
            //On modifie l'attibut idClient, idLivre, dateDeDebut, Statut de notre objet
            $this->setIdClient($resultat['idClient']);
            $this->setIdLIvre($resultat['idLivre']);
            $this->setDateDeDebut($resultat['dateDeDebut']);
            $this->setStatut($resultat['statut']);
         }
        
         //Fermeture de la requete
        $requete->closeCursor();
        
      }


      // Update : Modifie les données d'une ligne dans la table Categorie
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE reservation SET IdClient = ?, idLivre = ?, dateDeDebut = ?, statut = ? WHERE idReservation = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdClient(), $this->getIdLivre(),  $this->getDateDeDebut(), $this->getStatut(), $this->getIdReservation()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // delete : supprime une ligne dans la table Categorie
    public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM reservation WHERE idReservation = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdReservation()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }
}

?>
