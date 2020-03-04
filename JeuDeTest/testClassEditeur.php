<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./../connexionBDD.php";

//On inclue le fichier de class
include "./../ClasseObjet/classEditeur.php";

//Test de création/**/
$objetdetest = new editeur($connectBdd, 63, "MC", "Marie-Claire");
var_dump($objetdetest);
$objetdetest->Create();


//Test de lecture
/*$objetdetest = new editeur($connectBdd, $idEditeur, $code, $nom);
$objetdetest->Read();
echo $objetdetest->getNom();*/


//Test de modification
/*$objetdetest = new editeur($connectBdd, $idEditeur, $code, $nom);
$objetdetest->Read();
$objetdetest->setNom('adulte');
var_dump($objetdetest);
$objetdetest->Update();*/


//Test de suppression
/*$objetdetest = new editeur($connectBdd, $idEditeur, $code, $nom);
$objetdetest->Delete();*/


?>