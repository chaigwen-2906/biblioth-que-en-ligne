<?php


namespace Projet\Models;

class ManagerFrontPassOublier extends Manager
{
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
}