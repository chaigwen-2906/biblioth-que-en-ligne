<?php

namespace Projet\Models\admin;

// ManagerAdmin est étendue à la basse de données-> Manager
class ManagerAdmin extends Manager
{

    public function connectionAdministrateur()
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