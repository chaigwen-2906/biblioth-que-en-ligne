<?php

namespace Projet\Models\front;

class ManagerFront extends Manager
{
    public function getListMetas($nomPage)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM meta WHERE nomPage = ?";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$nomPage]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function getListFAQ()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM faq";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function getListCategorie()
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM categorie order by nomCategorie";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function seConnecter($adresseMail, $motDePasse)
    {
        $bdd = $this->dbConnect();

        // On réalise la requete sur la base de données
        // On prépare la requete
        $sql = "SELECT * FROM client WHERE email LIKE ?";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$adresseMail]);

        //On récupère le résultat de la requete dans la variable client
        $client = $requete->fetch();

        //on compare le mot de passe réçu en paramètre et le mot de passe en base de données
        if(password_verify($motDePasse, $client["motDePasse"])){
            return $client["idClient"];
        }
        else{
            return false;
        }

        //On ferme la requete
        $requete->closeCursor();
    }

    public function creerCompte($numeroAbonne, $civilite, $nom, $prenom, $email, $mobile, $telephone, $adresse, $dateDeNaissance, $motDePasse)
    {
        $bdd = $this->dbConnect();

        //test: on vérifie que l'adresse mail n'est pas déjà utilisé et que le numéro d'abonné n'existe pas déjà
        $sql="SELECT idClient FROM client WHERE email LIKE '$email' OR numeroAbonne LIKE '$numeroAbonne'";

        $requete = $bdd->prepare($sql);

        $requete->execute();

        $client = $requete->fetch();

        if(!empty($client)){
            return "L'adresse mail ou le numéro d'abonné existe déjà";
        }
        

        //On prépare les données addslashes : permet d'échapper les quotes s'il y en a
        $numeroAbonne = addslashes($numeroAbonne);
        $nom = addslashes($nom);
        $prenom = addslashes($prenom);
        $email = addslashes($email);
        $mobile = addslashes($mobile);
        $telephone = addslashes($telephone);
        $adresse = addslashes($adresse);

        //On passe la date de naissance dans un format sql
        $tabtemp = explode('/',$dateDeNaissance);
        $dateDeNaissanceSQL = $tabtemp[2]."-".$tabtemp[1]."-".$tabtemp[0];

        //On prépare le mot de passe(hash)
        $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);

        // On réalise la requete sur la base de données
        // On prépare la requete
        $sql = "INSERT INTO client(numeroAbonne,civilite,nom,prenom,email,telephoneMobile,telephoneFixe,adresse,dateDeNaissance,motDePasse) 
        VALUES ('$numeroAbonne','$civilite', '$nom', '$prenom', '$email', '$mobile', '$telephone', '$adresse', '$dateDeNaissanceSQL', '$motDePasse')";
        
        // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        // echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        // echo $sql;
        $requete = $bdd->prepare($sql);

        $testRequete = $requete->execute();

        if($testRequete == false)
        {
            //Un problème dans la requete
            return "Une erreur est survenue au moment de l'enregistrement du compte";
        }
        else
        {
            //On récupère l'id de la ligne insérée
            $idClient = $bdd->lastInsertId();

            //On retourne l'idClient
            return $idClient;
        }
        

        //On ferme la requete
        $requete->closeCursor();
        


    }

    public function getMonCompte($idClient)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM client where idClient = ?";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idClient]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //on tranforme la date dans un format fr 
        $tabtemp = explode('-',$resultat['dateDeNaissance']);
        $resultat['dateDeNaissance'] = $tabtemp[2]."/".$tabtemp[1]."/".$tabtemp[0];

        //On retourne les résultats
        return $resultat;
    }

    public function misAJourInfoPersClient($idClient, $civilite, $nom, $prenom, $email, $mobile, $fixe, $adresse, $dateNaissance)
    {  
        $bdd = $this->dbConnect();

        //On passe la date de naissance dans un format sql
        $tabtemp = explode('/',$dateNaissance);
        $dateNaissanceSQL = $tabtemp[2]."-".$tabtemp[1]."-".$tabtemp[0];

        $sql = "UPDATE client
            SET civilite ='$civilite', nom = '$nom', prenom ='$prenom', email ='$email', telephoneMobile ='$mobile', 
		        telephoneFixe ='$fixe', adresse ='$adresse ', dateDeNaissance ='$dateNaissanceSQL'
            WHERE idClient = ?";
            
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idClient]);

        //On ferme la requete
        $requete->closeCursor();
    }

    public function motDePasseOublier($adresseMail,$nouveauMotPass)
    {
        $bdd = $this->dbConnect();
       
        //On prépare le mot de passe(hash)
        $nouveauMotPass = password_hash($nouveauMotPass, PASSWORD_DEFAULT);

        $sql = "UPDATE client  SET motDePasse ='$nouveauMotPass' WHERE email = ?";    
        $requete = $bdd->prepare($sql);
       

        //Execution de la requete
        $requete->execute([$adresseMail]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

    }

    public function enregistrerPassword($idClient, $nouveauMotPasse)
    {
        $bdd = $this->dbConnect();

        //On prépare le mot de passe(hash)
        $nouveauMotPasse = password_hash($nouveauMotPasse, PASSWORD_DEFAULT);
        
        $sql = "UPDATE client  SET motDePasse ='$nouveauMotPasse' WHERE idClient = ?";    
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idClient]);

        //On ferme la requete
        $requete->closeCursor();
    }


    public function getListDemandeEnAttente($idClient)
    {
        
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM reservation LEFT JOIN (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ON (reservation.idLivre = livre.idLivre)  WHERE idClient = $idClient AND statut LIKE 'En attente de validation'  ORDER BY reservation.dateDeDebut DESC  ";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }


    public function getListDemandeValider($idClient)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM reservation LEFT JOIN (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ON (reservation.idLivre = livre.idLivre)  WHERE idClient = $idClient AND statut LIKE 'Validée'  ORDER BY reservation.dateDeDebut DESC  ";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function ajoutReservation($idLivre,$idClient)
    {
        $bdd = $this->dbConnect();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = " INSERT INTO reservation(idClient,idLivre,dateDeDebut,statut) VALUES (?,?,NOW(),'En attente de validation') ";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idClient,$idLivre]);

        //On ferme la requete
        $requete->closeCursor();

    }
    
}
