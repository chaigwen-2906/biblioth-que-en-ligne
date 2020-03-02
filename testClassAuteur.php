<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./connexionBDD.php";

//On inclue le fichier de class
include "./ClasseObjet/classAuteur.php";

//Test de création
/*$objetdetest = new auteur($connectbdd, "", "lemoine", "gwenola");
var_dump($objetdetest);
$objetdetest->Create();*/


//Test de lecture
/*$objetdetest = new auteur($connectbdd, 22, "", "");
$objetdetest->Read();
echo $objetdetest->getNom();*/


//Test de modification
/*$objetdetest = new auteur($connectbdd, 24, "", "");
$objetdetest->Read();
$objetdetest->setNom('roussel');
var_dump($objetdetest);
$objetdetest->Update();*/


//Test de suppression
/*$objetdetest = new auteur($connectbdd, "24", "", "");
$objetdetest->Delete();*/


?>