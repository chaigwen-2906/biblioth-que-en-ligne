<?php

namespace Projet\Models\front;

class ManagerFrontLivre extends Manager
{
    //LIVRE
    public function lireDetailLivre($idLivre)
    {
        $bdd = $this->bddConnection();

        // echo "idLivre:".$_GET['id'];

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        WHERE idLivre=".$idLivre;
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function lireInfoLivre($unIdLivre)
    {
        $bdd = $this->bddConnection();

        // On réalise la requete sur la base de données
        // On prépare la requete
        $sql = "SELECT nom, nomAuteur FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) WHERE idLivre=".$unIdLivre;
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute();

        //On récupère le résultat de la requete
        $resultat = $requete->fetch();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function lireListeMangasLimit4()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) LEFT JOIN categorie ON (livre.idCategorie = categorie.idCategorie)
        WHERE categorie.idCategorie = 25 limit 4";
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

    public function lireListeBandesDessineesLimit4()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) LEFT JOIN categorie ON (livre.idCategorie = categorie.idCategorie)
        WHERE categorie.idCategorie = 3 limit 4";
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

    public function lireListeCuisineLimit4()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) LEFT JOIN categorie ON (livre.idCategorie = categorie.idCategorie)
        WHERE categorie.idCategorie = 4 limit 4";
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


    //RECHERCHE
    public function rechercherLivre($valeurCategorie, $valeurTexte)
    {
        $bdd = $this->bddConnection();

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


    //COMMENTAIRE
    public function lireCommentaire($idLivre)
    {
        $bdd = $this->bddConnection();

        // echo "idLivre:".$_GET['id'];

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM commentaire left join client on (commentaire.idClient = client.idClient) 
        where commentaire.idLivre=? ORDER BY commentaire.date DESC ";
        
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre]);

        //On récupère le résultat de la requete
        $resultat = $requete->fetchAll();

        //On ferme la requete
        $requete->closeCursor();

        //On retourne les résultats
        return $resultat;
    }

    public function ecrireCommentaire($idLivre,$idClient,$note,$description)
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "INSERT INTO commentaire(idLivre,idClient,date,note,description) VALUES (?,?,NOW(),?,?)";
        $requete = $bdd->prepare($sql);

        //Execution de la requete
        $requete->execute([$idLivre,$idClient,$note,$description]);

        //On ferme la requete
        $requete->closeCursor();
    }


    //NOUVEAUTE
    public function lireListeNouveautesLimit16()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ORDER BY dateDePublication desc limit 16";
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

    public function lireListeNouveautesLimit4()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) 
        ORDER BY dateDePublication desc limit 4 ";
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


    //COUP DE COEUR
    public function lireListeCoupDeCoeur()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM coupdecoeur LEFT JOIN (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) ON 
        (coupdecoeur.idLivre = livre.idLivre) ORDER BY coupdecoeur.dateDePublication DESC ";
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

    public function lireListeCoupDeCoeurLimit4()
    {
        $bdd = $this->bddConnection();

        //On réalise la requete sur la base de données
        //On prépare la requete
        $sql = "SELECT * FROM coupdecoeur LEFT JOIN (livre LEFT JOIN auteur ON (livre.idAuteur = auteur.idAuteur)) ON 
        (coupdecoeur.idLivre = livre.idLivre) ORDER BY coupdecoeur.dateDePublication DESC LIMIT 4";
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
