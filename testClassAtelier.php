<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./connexionBDD.php";

//On inclue le fichier de class
include "./ClasseObjet/classAtelier.php";

//Test de création
/*$objetdetest = new atelier($connectbdd, "", "enfants", "2020-03-20", "blabla", "10:00:00", 12, 15);
var_dump($objetdetest);
$objetdetest->Create();*/


//Test de lecture
/*$objetdetest = new atelier($connectbdd, 1, "", "", "", "", "", "");
$objetdetest->Read();
echo $objetdetest->getNom();*/


//Test de modification
/*$objetdetest = new atelier($connectbdd, 2, "", "", "", "", "", "");
$objetdetest->Read();
$objetdetest->setNom('adulte');
var_dump($objetdetest);
$objetdetest->Update();*/


//Test de suppression
/*$objetdetest = new atelier($connectbdd, 2, "", "", "", "", "", "");
$objetdetest->Delete();*/


?>