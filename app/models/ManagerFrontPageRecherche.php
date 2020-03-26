<?php

namespace Projet\Models;

class ManagerFrontPageRecherche extends Manager
{
    public function getResultPageRecherche($valeurCategorie, $valeurTexte)
    {
        $bdd = $this->dbConnect();

        // On réalise la requete sur la base de données
        // On prépare la requete
        $sql = "SELECT * FROM livre LEFT JOIN categorie ON (livre.idCategorie = categorie.idCategorie) 
        LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur) WHERE";

        if($valeurCategorie == 0)
        {
            //Pour éviter l'erreur de syntaxe sql "WHERE AND"
            $sql = $sql." 1=1";
        }
        else{
            $sql = $sql." livre.idCategorie=".$valeurCategorie;
        }
        $sql = $sql." AND";
        if($valeurTexte == "")
        {
            $sql = $sql." 1=1";
        }
        else{
            // % : remplace n'importequel caractère devant et derrière la valeur
            $sql = $sql." (livre.nom LIKE '%".$valeurTexte."%' 
                OR auteur.nomAuteur LIKE '%".$valeurTexte."%' 
                OR auteur.prenomAuteur LIKE '%".$valeurTexte."%')";
        }

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
}