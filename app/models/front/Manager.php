<?php
namespace Projet\Models\front;
class Manager
{
    protected function dbConnect()
    {

        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=projet_biblio;charset=utf8', 'root', '');
            //$bdd = new \PDO('mysql:host=mysql-chaigwen.alwaysdata.net;dbname=chaigwen_projet_biblio;charset=utf8', 'chaigwen', 'thibaud2901');
            return $bdd;
        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}