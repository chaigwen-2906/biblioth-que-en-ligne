<?php
try
{
    /* on définie les options de la connexion */
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

    try {
        $bdd = new \PDO('mysql:host=localhost;dbname=projet_biblio;charset=utf8', 'root', '');
        return $bdd;
    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }
    
    /* on prépare la requête avec des marqueurs */
    $reponse = $bdd->prepare('SELECT image FROM projet_biblio.livre WHERE idLivre =:id');
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