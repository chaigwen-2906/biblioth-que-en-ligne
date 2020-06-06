<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerCommentaires extends Manager{

    function supprimeCommentairesParIdLivre($idLivre)
    {
        $bdd = $this->bddConnection();
      
        $sql = "DELETE FROM commentaire where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        //On ferme la requete
        $requete->closeCursor();
    }


    function supprimeCommentairesParIdClient($idClient)
    {
        $bdd = $this->bddConnection();
      
        $sql = "DELETE FROM commentaire where idClient =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idClient]);

        //On ferme la requete
        $requete->closeCursor();
    }
}