<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./../connexionBDD.php";

//On inclue le fichier de class
include "./../ClasseObjet/classFaq.php";

//Test de création
/*$objetdetest = new faq ($connectbdd, "", "oui", "non");
var_dump($objetdetest);
$objetdetest->Create();*/


//Test de lecture
/*$objetdetest = new faq($connectbdd, 1, "", "");
$objetdetest->Read();
echo $objetdetest->getQuestion();*/


//Test de modification
/*$objetdetest = new faq($connectbdd, 1, "", "");
$objetdetest->Read();
$objetdetest->setQuestion('oui');
var_dump($objetdetest);
$objetdetest->Update();*/


//Test de suppression
$objetdetest = new faq($connectbdd, 2, "", "");
$objetdetest->Delete();


?>