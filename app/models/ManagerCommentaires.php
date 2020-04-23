<?php

namespace Projet\Models\admin;

// ManagerLivres est étendue à la basse de données-> Manager
class ManagerCommentaires extends Manager{

    function deleteCommentairesByIdLivre($idLivre)
    {
        $bdd = $this->dbConnect();
      
        $sql = "DELETE FROM commentaire where idLivre =?";
         
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        //On ferme la requete
        $requete->closeCursor();
    }
}