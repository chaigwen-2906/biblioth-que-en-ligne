<?php

namespace Projet\Models;

 // JE DECLARE LA CLASS LIVRE
 class livre{

    ///////////////DECLARE DES ATTRIBUTS//////////////
    private $connectBdd;
    private $idLivre;
    private $idCategorie;
    private $idAuteur;
    private $nom;
    private $image;
    private $enSavoirPlus;
    private $dateDePublication;
    private $description;
    private $disponible;
    private $editeur;
    private $nbDePage;
    private $dimension;
    private $langue;
    private $ean;
    private $isbn;


    //////////////DECLARATION DES ASSESSEURS///////////

    
    //get : return la valeur de l'attribut
    //$idLivre
    public function getIdLivre(){
        return $this->idLivre;
    }
    //set : modifie la valeur de l'attribut
    public function setIdLivre($valeur){
        $this->idLivre = $valeur;
    }

    //idCategorie
    public function getIdCategorie(){
        return $this->idCategorie;
    }
    public function setIdCategorie($valeur){
        $this->idCategorie = $valeur;
    }

    //idAuteur
    public function getIdAuteur(){
        return $this->idAuteur;
    }
    public function setIdAuteur($valeur){
        $this->idAuteur = $valeur;
    }

    //nom
    public function getNom(){
        return $this->nom;
    }
    public function setNom($valeur){
        $this->nom = $valeur;
    }

    //image
    public function getImage(){
        return $this->image;
    }
    public function setImage($valeur){
        $this->image = $valeur;
    }

    //enSavoirPlus
    public function getEnSavoirPlus(){
        return $this->enSavoirPlus;
    }
    public function setEnSavoirPlus($valeur){
        $this->enSavoirPlus = $valeur;
    }

    //dateDePublication
    public function getDateDePublication(){
        return $this->dateDePublication;
    }
    public function setDateDePublication($valeur){
        $this->dateDePublication = $valeur;
    }

    //description
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($valeur){
        $this->description = $valeur;
    }

    //disponible
    public function getDisponible(){
        return $this->disponible;
    }
    public function setDisponible($valeur){
        $this->disponible = $valeur;
    }
   
    //editeur
    public function getEditeur(){
        return $this->editeur;
    }
    public function setEditeur($valeur){
        $this->editeur = $valeur;
    }

    //nbDePage
    public function getNbDePage(){
        return $this->nbDePage;
    }
    public function setNbDePage($valeur){
        $this->nbDePage = $valeur;
    }

    //dimension 
    public function getDimension(){
        return $this->dimension;
    }
    public function setDimension($valeur){
        $this->dimension = $valeur;
    }

    //langue
    public function getLangue(){
        return $this->langue;
    }
    public function setLangue($valeur){
        $this->langue = $valeur;
    }

    //ean
    public function getEan(){
        return $this->ean;
    }
    public function setEan($valeur){
        $this->ean = $valeur;
    }

    //isbn
    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($valeur){
        $this->isbn = $valeur;
    }


    /////////////DECLARATION DES CONSTRUCTEURS///////////
    public function __construct($connectBdd,$idLivre,$idCategorie,$idAuteur,$nom,$image,$enSavoirPlus,$dateDePublication,
    $description,$disponible,$editeur,$nbDePage,$dimension,$langue,$ean,$isbn){
    
        //On stocke la connexion à la base de données
        $this->connectBdd = $connectBdd;

        //on modifie l'attribut idLivre de l'objet
        $this->setIdLivre($idLivre);

        //on modifie idCategorie
        $this->setIdCategorie($idCategorie);

        //on modifie idAuteur
        $this->setIdAuteur($idAuteur);

        //on modifie idCategorie
        $this->setNom($nom);

        //on modifie image 
        $this->setImage($image);

        //on modifie enSavoirPlus
        $this->setEnSavoirPlus($enSavoirPlus);

        //on modifie dateDePublication
        $this->setDateDePublication($dateDePublication);

        //on modifie description 
        $this->setDescription($description);

        //on modifie disponible 
        $this->setDisponible($disponible);

        //on modifie editeur
        $this->setEditeur($editeur);

        //on modifie nbDePage
        $this->setNbDePage($nbDePage);

        //on modifie dimension
        $this->setDimension($dimension);

        //on modifie langue
        $this->setLangue($langue);

        //on modifie ean
        $this->setEan($ean);

        //on modifie isbn
        $this->setIsbn($isbn);

    }


    /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la toupDeCoeur
    public function Create(){

        //Préparation de la requête
        //dans la bdd INSERT la ligne dans la table coupDeCoeur et je passe les valeur des colonne = 
        //(idlivre,nom,commentaire,dateDePublication)
       $sql= "INSERT INTO livre(idCategorie,idAuteur,nom,image,enSavoirPlus,dateDePublication,
       description,disponible,editeur,nbDePage,
       dimension,langue,ean,isbn) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
       $requete = $this->connectBdd->prepare($sql);
    
       //Execution de la requete
       $requete->execute([$this->getIdCategorie(), $this->getIdAuteur(), $this->getNom(), $this->getImage(), $this->getEnSavoirPlus(),
       $this->getDateDePublication(),$this->getDescription(),$this->getDisponible(), $this->getEditeur(),
       $this->getNbDePage(),$this->getDimension(),$this->getLangue(),$this->getEan(), $this->getIsbn()]);
      
       //on recupère l'id de la ligne insérée 
       //et on le stocke dans l'attribut idCoupDeCoeur de notre objet
       $this->setIdLivre($this->connectBdd->lastInsertId());

       //Fermeture de la requete
       $requete->closeCursor();
   }



    // Read : Lit une ligne dans la table CoupDeCoeur
    public function Read(){
        //Préparation de la requête
        $sql = "SELECT * FROM livre WHERE idLivre = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdLivre()]);

        //On récupère les données
        while($resultat = $requete->fetch())
        {
            //On modifie l'attibut idLivre, nom, commentaire; de notre objet
            $this->setIdCategorie($resultat['idCategorie']);
            $this->setIdAuteur($resultat['idAuteur']);
            $this->setNom($resultat['nom']);
            $this->setImage($resultat['image']);
            $this->setEnSavoirPlus($resultat['enSavoirPlus']);
            $this->setDateDePublication($resultat['dateDePublication']);
            $this->setDescription($resultat['description']);
            $this->setDisponible($resultat['disponible']);
            $this->setEditeur($resultat['editeur']);
            $this->setNbDePage($resultat['nbDePage']);
            $this->setDimension($resultat['dimension']);
            $this->setLangue($resultat['langue']);
            $this->setEan($resultat['ean']);
            $this->setIsbn($resultat['isbn']);
        }
            //Fermeture de la requete
            $requete->closeCursor();

    }



    // Update : Modifie les données d'une ligne dans la table Categorie
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE livre SET idCategorie = ?, idAuteur = ?, nom = ?, image = ?, enSavoirPlus = ?, dateDePublication = ?,
        description = ?, disponible = ?, editeur = ?, nbDePage = ?, dimension = ?, 
        langue = ?, ean = ?, isbn = ? WHERE idLivre = ?";
        
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdCategorie(), $this->getIdAuteur(), $this->getNom(), $this->getImage(),
         $this->getEnSavoirPlus(),$this->getDateDePublication(),$this->getDescription(),
        $this->getDisponible(),$this->getEditeur(), $this->getNbDePage(),$this->getDimension(),$this->getLangue(),
        $this->getEan(), $this->getIsbn(),$this->getIdLivre()]);
       
        //Fermeture de la requete
        $requete->closeCursor();
    }


    
    // delete : supprime une ligne dans la table Categorie
    public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM livre WHERE idLivre = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdLivre()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }
  
 }

?>