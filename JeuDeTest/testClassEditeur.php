<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./../connexionBDD.php";

//On inclue le fichier de class
include "./../ClasseObjet/classEditeur.php";

//Test de création/**/
/*$objetdetest = new editeur($connectbdd, "idEditeur", "MC", "Marie-Claire");
var_dump($objetdetest);
$objetdetest->Create();*/


//Test de lecture
/*$objetdetest = new editeur($connectbdd, 62, "", "");
$objetdetest->Read();
echo $objetdetest->getNom();
echo $objetdetest->getCode();*/


//Test de modification
$objetdetest = new editeur($connectbdd, 64, "", "");
$objetdetest->Read();
$objetdetest->setCode("leo");
var_dump($objetdetest);
$objetdetest->Update();


/*//Test de suppression
$objetdetest = new editeur($connectbdd, 63, "MC", "Marie-Claire");
$objetdetest->Delete();*/


?>