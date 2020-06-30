<?php

namespace Projet\Models\admin\objets;

// ON DECLARE LA CLASSE COUPDECOEUR
class CoupDeCoeur extends Manager{


    ///////////////DECLARE DES ATTRIBUTS//////////////
    private $connectBdd;
    private $idCoupDeCoeur;
    private $idLivre;
    private $auteur;
    private $commentaire;
    private $dateDePublication;


    //////////////DECLARATION DES ASSESSEURS///////////

    
    //get : return la valeur de l'attribut
    //$idCoupDeCoeur
    public function getIdCoupDeCoeur(){
        return $this->idCoupDeCoeur;
    }
    //set : modifie la valeur de l'attribut
    public function setIdCoupDeCoeur($valeur){
        $this->idCoupDeCoeur = $valeur;
    }

    //IdLivre
    public function getIdLivre(){
        return $this->idLivre;
    }
    public function setIdLIvre($valeur){
        $this->idLivre = $valeur;
    }

    //$auteur
    public function getAuteur(){
        return $this->auteur;
    }
    public function setAuteur($valeur){
        $this->auteur = $valeur;
    }

    //$commentaire
    public function getCommentaire(){
        return $this->commentaire;
    }
    public function setCommentaire($valeur){
        $this->commentaire = $valeur;
    }

    //$dateDePublication
    public function getDateDePublication(){
        return $this->dateDePublication;
    }
    public function setDateDePublication($valeur){
        $this->dateDePublication = $valeur;
    }




    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($idCoupDeCoeur, $idLivre, $auteur, $commentaire, $dateDePublication){
        //On stocke la connexion à la base de données
        $this->connectBdd = $this->bddConnection();

        //on modifie idcoupDeCoeur
        $this->setIdCoupDeCoeur($idCoupDeCoeur);

        //on modifie IdLivre 
        $this->setIdLIvre($idLivre);

        //on modifie auteur 
        $this->setAuteur($auteur);

        //on modifie commentaire 
        $this->setCommentaire($commentaire);

        //on modifie dateDePublication 
        $this->setDateDePublication($dateDePublication);
    }



   /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la toupDeCoeur
    public function Create(){

         //Préparation de la requête
         //dans la bdd INSERT la ligne dans la table coupDeCoeur et je passe les valeur des colonne = 
         //(idlivre,auteur,commentaire,dateDePublication)
        $sql= "INSERT INTO coupdecoeur(idLivre,auteur,commentaire,dateDePublication) VALUES (?,?,?,?)";
        $requete = $this->connectBdd->prepare($sql);

        if($this->getIdLivre() == ''){
            $idLivre = "NULL";
        }
        else{
            $idLivre = $this->getIdLivre();
        }

        //Execution de la requete
        $requete->execute([$idLivre, addslashes($this->getAuteur()), addslashes($this->getCommentaire()), addslashes($this->getDateDePublication())]);

        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idCoupDeCoeur de notre objet
        $this->setidCoupDeCoeur($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }



    // Read : Lit une ligne dans la table CoupDeCoeur
    public function Read(){
        //Préparation de la requête
        $sql = "SELECT * FROM coupdecoeur WHERE idCoupDECoeur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdCoupDeCoeur()]);

         //On récupère les données
         while($resultat = $requete->fetch())
         {
            //On modifie l'attibut idLivre, auteur, commentaire; de notre objet
            $this->setIdLIvre($resultat['idLivre']);
            $this->setAuteur($resultat['auteur']);
            $this->setCommentaire($resultat['commentaire']);
            $this->setDateDePublication($resultat['dateDePublication']);
         }
        
         //Fermeture de la requete
        $requete->closeCursor();
        
      }
    

      
    

    // Update : Modifie les données d'une ligne dans la table Categorie
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE coupdecoeur SET idLivre = ?, auteur = ?, commentaire = ?, dateDePublication = ? WHERE idCoupDeCoeur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdLivre(), addslashes($this->getAuteur()), addslashes($this->getCommentaire()), addslashes($this->getDateDePublication()), $this->getIdCoupDeCoeur()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }
 



    // delete : supprime une ligne dans la table Categorie
    public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM coupdecoeur WHERE idCoupDeCoeur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdCoupDeCoeur()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }

}

?>