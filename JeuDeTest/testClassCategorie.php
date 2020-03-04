<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./../connexionBDD.php";

//On inclue le fichier de class
include "./../ClasseObjet/classCategorie.php";

//Test de création
$objetdetest = new categorie($connectbdd, '', 'Mangas');
var_dump($objetdetest);
$objetdetest->Create();


//Test de lecture
/*$objetdetest = new categorie($connectbdd, 27, '');
$objetdetest->Read();
echo $objetdetest->getNom();*/


//Test de modification
/*$objetdetest = new categorie($connectbdd, 27, '');
$objetdetest->setNom('Bandes dessinées');
$objetdetest->Update();*/


//Test de suppression
/*$objetdetest = new categorie($connectbdd, 29, '');
$objetdetest->Delete();*/


?>