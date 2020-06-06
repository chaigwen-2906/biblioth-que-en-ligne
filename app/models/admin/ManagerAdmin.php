<?php

namespace Projet\Models\admin;

// ManagerAdmin est étendue à la basse de données-> Manager
class ManagerAdmin extends Manager
{

    public function connectionAdministrateur($nom, $motPasse)
    {
        $bdd = $this->bddConnection();
      
        $sql = "SELECT * FROM admin  WHERE  nomUtilisateur = ?";    
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$nom]);

        //On récupère le résultat de la requete dans la variable admin
        $admin = $requete->fetch();


        //on compare le mot de passe réçu en paramètre et le mot de passe en base de données
        if(password_verify($motPasse, $admin["passUtilisateur"])){
            return $admin["idAdmin"];
        }
        else{
            return false;
        }

        //On ferme la requete
        $requete->closeCursor();
    }

    
}