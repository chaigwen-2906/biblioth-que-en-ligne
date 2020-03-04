<?php
try
{
    //On inclue le fichier contenant les paramètres de connexion à la base de données
    include "./connexionBDD.php";

    /* on définie les options de la connexion */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    
    /* on prépare la requête avec des marqueurs */
    $reponse = $connectbdd->prepare('SELECT image FROM projet_biblio.livre WHERE idLivre =:id');
    $reponse->bindValue('id',$_GET['id'],PDO::PARAM_INT);
    $reponse->execute();
    $donnees = $reponse->fetch();
    /* on ferme la connexion */
    $reponse->closeCursor();
}
catch(EXCEPTION $e)
{  
    /* on affiche les erreur éventuelles en développement */
    die('Erreur : '.$e->getMessage());
}
header('Content-Type: image');
echo $donnees['image'];
?>