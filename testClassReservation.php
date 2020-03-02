<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./connexionBDD.php";

//On inclue le fichier de class
include "./ClasseObjet/classReservation.php";

//Test de création
/*$objetdetest = new reservation($connectbdd,"",1,1,"2020-03-20","adulte");
var_dump($objetdetest);
$objetdetest->Create();*/


//Test de lecture
/*$objetdetest = new reservation($connectbdd,"",1,1,"2020-03-20","adulte");
$objetdetest->Read();
echo $objetdetest->getDateDeDebut();*/


//Test de modification
/*$objetdetest = new reservation($connectbdd,3,1,1,"","");
$objetdetest->Read();
$objetdetest->setStatut('enfant');
var_dump($objetdetest);
$objetdetest->Update();*/


//Test de suppression
/*$objetdetest = new reservation($connectbdd,2,1,1,"","");
$objetdetest->Delete();*/


?>