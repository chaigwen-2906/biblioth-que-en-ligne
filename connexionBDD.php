<?php 

define ('DSN','mysql:dbname=projet_biblio;host=localhost;port=3306');
define ('USER','root');
define  ('PASSWD','');

function connectBdd()
{
    try{
        $connectbdd = new PDO(DSN,USER,PASSWD);
    }
    catch (PDOexception $e){
        die ("Connexion à la base impossible!");
    }
    return $connectbdd;
}

//Connexion à la base
$connectbdd = connectBdd();

?>