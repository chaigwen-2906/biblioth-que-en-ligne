<?php 

namespace Projet\Models\admin\objets;

// ON DECLARE LA CLASSE Faq
class Faq extends Manager{

     ///////////////DECLARE DES ATTRIBUTS//////////////
     PRIVATE $connectBdd;
     PRIVATE $idFaq;
     private $question;
     private $reponse;

    //////////////DECLARATION DES ASSESSEURS///////////

    
    //get : return la valeur de l'attribut
    // $idFaq
    public function getIdFaq(){
        return $this->idFaq;
    }
    //set : modifie la valeur de l'attribut
    public function setIdFaq($valeur){
        $this-> idFaq= $valeur;
    }

    //$question
    public function getQuestion(){
        return $this->question;
    }
    public function setQuestion($valeur){
        $this-> question= $valeur;
    }

    //$reponse
    public function getReponse(){
        return $this->reponse;
    }
    public function setReponse($valeur){
        $this->reponse= $valeur;
    }

    /////////////DECLARATION DES CONSTRUCTEURS///////////

    public function __construct($idFaq, $question, $reponse){
        //On stocke la connexion à la base de données
        $this->connectBdd = $this->dbConnect();

        //on modifie l'attribut idFaq de l'objet
        $this->setIdFaq($idFaq);

        //on modifie l'attribut question de l'objet
        $this->setQuestion($question);

        //on modifie l'attribut reponse de l'objet
        $this->setReponse($reponse);

    }

     /////////////// DECLARATION DES FONCTIONS CRUD ///////////////////////

    // Create : crée une ligne dans la table faq
    public function Create(){

        //Préparation de la requête
        //dans la bdd INSERT la ligne dans la table faq et je passe les valeur des colonne = 
        //(idlivre,nom,commentaire,dateDePublication)
       $sql= "INSERT INTO faq(question,reponse) VALUES (";

       $sql = $sql."'".addslashes($this->getQuestion())."',";
       $sql =$sql."'".addslashes($this->getReponse())."'";
       $sql =$sql.")";

       $requete = $this->connectBdd->prepare($sql);

       //Execution de la requete
       $requete->execute([$this->getQuestion(), $this->getReponse()]);

       //on recupère l'id de la ligne insérée 
       //et on le stocke dans l'attribut idFaq de notre objet
       $this->setidFaq($this->connectBdd->lastInsertId());

       //Fermeture de la requete
       $requete->closeCursor();
   }



    // Read : Lit une ligne dans la table faq
    public function Read(){
        //Préparation de la requête
        $sql = "SELECT * FROM faq WHERE idFaq = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdFaq()]);

        //On récupère les données
        while($resultat = $requete->fetch())
        {
            //On modifie l'attibut  question, reponse, de notre objet
            $this->setQuestion($resultat['question']);
            $this->setReponse($resultat['reponse']);
        }
        
        //Fermeture de la requete
        $requete->closeCursor();
    }



    // Update : Modifie les données d'une ligne dans la table faq
    public function Update(){
        //Préparation de la requête
        $sql = "UPDATE faq SET  question = ?, reponse = ? WHERE idFaq = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getQuestion(), $this->getReponse(), $this->getIdFaq()]);

        //Fermeture de la requete
        $requete->closeCursor();
    }

    

    // delete : supprime une ligne dans la table faq
    public function delete(){
        //Préparation de la requête
        $sql = "DELETE FROM faq WHERE idFaq = ?";
        $requete = $this->connectBdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$this->getIdFaq()]);

        //Fermeture de la requete
        $requete->closeCursor();// requête delete 
    }

}

?>