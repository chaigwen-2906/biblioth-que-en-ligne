<?php

// ON DECLARE LA CLASSE COUPDECOEUR
class coupDeCoeur{


    ///////////////DECLARE DES ATTRIBUTS//////////////
    private $connectBdd;
    private $idCoupDeCoeur;
    private $idLivre;
    private $nom;
    private $commentaire;
    private $dateDePublication;


    //////////////DECLARATION DES ASSESSEURS///////////

    ////////////////////$idCoupDeCoeur//////////
    //get : return la valeur de l'attribut
    public function getIdCoupDeCoeur(){
        return $this->idCoupDeCoeur;
    }
    //set : modifie la valeur de l'attribut
    public function setIdCoupDeCoeur($valeur){
        $this->idCoupDeCoeur = $valeur;
    }

    //////////////////////IdLivre///////////////
    public function getIdLivre(){
        return $this->idLivre;
    }
    public function setIdLIvre($valeur){
        $this->idLivre = $valeur;
    }
    //////////////////////$nom//////////////////

    public function getNom(){
        return $this->nom;
    }
    public function setNom($valeur){
        $this->nom = $valeur;
    }
    ////////////////////$commentaire/////////////
    public function getCommentaire(){
        return $this->commentaire;
    }
    public function setCommentaire($valeur){
        $this->commentaire = $valeur;
    }
    ///////////////////$dateDePublication/////////

    public function getDateDePublication(){
        return $this->dateDePublication;
    }
    public function setDateDePublication($valeur){
        $this->dateDePublication = $valeur;
    }




    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($connectBdd, $idCoupDeCoeur, $IdLivre, $nom, $commentaire, $dateDePublication){
        //On stocke la connexion à la base de données
        $this->connectBdd = $connectBdd;

        //on modifie l'attribut idcoupDeCoeur de l'objet
        $this->setIdCoupDeCoeur($idCoupDeCoeur);

        //on modifie l'attribut IdLivre de l'objet
        $this->setIdLIvre($idLivre);

        //on modifie l'attribut nom de l'objet
        $this->setNom($nom);

        //on modifie l'attribut commentaire de l'objet
        $this->setCommentaire($commentaire);

        //on modifie l'attribut dateDePublication de l'objet
        $this->setDateDePublication($dateDePublication);
    }



   /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la toupDeCoeur
    public function Create(){

         //Préparation de la requête
         //dans la bdd INSERT la ligne dans la table coupDeCoeur et je passe les valeur des colonne = 
         //(idlivre,nom,commentaire,dateDePublication)
        $sql= "INSERT INTO coupDeCoeur(idLivre,nom,commentaire,dateDePublication) VALUES (?,?,?,?)";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdLivre(), $this->getNom(), $this->getCommentaire(), $this->getDateDePublication()]);

        //on recupère l'id de la ligne insérée 
        //et on le stocke dans l'attribut idCoupDeCoeur de notre objet
        $this->setidCoupDeCoeur($this->connectBdd->lastInsertId());

        //Fermeture de la requete
        $requete->closeCursor();
    }


    // Read : Lit une ligne dans la table CoupDeCoeur
    public function Read(){
        //Préparation de la requête
        $sql = "SELECT * FROM coupDeCoeur WHERE idCoupDECoeur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdCoupDeCoeur()]);

         //On récupère les données
         while($resultat = $requete->fetch())
         {
            //On modifie l'attibut idLivre, nom, commentaire; de notre objet
            $this->setIdLIvre($resultat['idLivre']);
            $this->setNom($resultat['nom']);
            $this->setCommentaire($resultat['commentaire']);
            $this->setDateDePublication($resultat['dateDePublication']);
         }
        
         //Fermeture de la requete
        $requete->closeCursor();
        
      }
    
    

    // Update : Modifie les données d'une ligne dans la table Categorie
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE coupDeCoeur SET idLivre = ?, nom = ?, commentaire = ?, dateDePublication = ? WHERE idCoupDeCoeur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdLivre(), $this->getNom(), $this->getCommentaire(), $this->getDateDePublication(), $this->getIdCoupDeCoeur()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }
 



    // delete : supprime une ligne dans la table Categorie
    public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM coupDeCoeur WHERE idCoupDeCoeur = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdCoupDeCoeur()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }

}

?>