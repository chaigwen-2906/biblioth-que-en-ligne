<?php

//On inclue le fichier contenant les paramètres de connexion à la base de données
include "./connexionBDD.php";

//On inclue le fichier de class
include "./ClasseObjet/classCoupDeCoeur.php";

//Test de création
/*$objetdetest = new coupDeCoeur($connectbdd, '', 2, 'gwen', 'blabla', '2020-02-20');
var_dump($objetdetest);
$objetdetest->Create();*/



//Test de lecture
/*$objetdetest = new coupDeCoeur($connectbdd, 2, '', '', '', '');
$objetdetest->Read();
var_dump($objetdetest);*/

//Test de modification           bdd,idcoup, idlivre, nom, commentaire, datepublication
/*$objetdetest = new coupDeCoeur($connectbdd, 2, '', '', '', '');
$objetdetest->Read();
$objetdetest->setCommentaire('bloblo');
$objetdetest->Update();*/


/*//Test de suppression
$objetdetest = new coupDeCoeur($connectbdd, 2, '','', '', '');//intanci la classe coudecoeur (je creer)
$objetdetest->Delete();*/


?>