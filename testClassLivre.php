<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./connexionBDD.php";

//On inclue le fichier de class
include "./ClasseObjet/classLivre.php";

//Test de création
/*$objetdetest = new livre($connectbdd,"",12,2,"nom","image","enSavoirPlus","2020-03-12","description","disponible","editeur",120,"dimension","langue","ean","isbn");
var_dump($objetdetest);
$objetdetest->Create();*/

//Test de lecture
/*$objetdetest = new livre($connectbdd,50,"","","","","","","","","","","","","","");
$objetdetest->Read();
var_dump($objetdetest);*/


//Test de modification
/*$objetdetest = new livre($connectbdd,51,"","","","","","","","","","","","","","");
$objetdetest->Read();
$objetdetest->setNom('test modif nom');
var_dump($objetdetest);
$objetdetest->Update();*/


//Test de suppression
/*$objetdetest = new livre($connectbdd,51,"","","","","","","","","","","","","","");
$objetdetest->Delete();*/


?>