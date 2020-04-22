<?php
namespace Projet\Models\admin\objets;
class Manager
{
    protected function dbConnect()
    {

        try {
            $bdd = new \PDO('mysql:host=localhost;dbname=projet_biblio;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }
    }
}