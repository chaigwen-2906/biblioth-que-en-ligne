<?php

namespace Projet\Models\front;

class ManagerFrontMonCompte extends Manager
{
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
}