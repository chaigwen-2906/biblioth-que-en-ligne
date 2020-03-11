<?php

namespace Projet\Models;

class FrontManager extends Manager
{
    public function viewFrontHome()
    {
        $bdd = $this->dbConnect();

        // Je teste mes classes
        
        //test read
        // $req = $bdd->prepare("SELECT idClient FROM client");
        // //Execution de la requete
        // $req->execute(array());
        // //On récupère les données
        // $result = $req->fetchAll()[5]["idClient"];
        // $unClient = new client($bdd, $result, '', "", "", "", "","");
        // $unClient->Read();
        // $retour = $unClient->getTelephone();
        // return $retour;


        //test create
        // $unClient = new client($bdd, "", 'test', "titi", "chai@hotmail.fr", "0618433249", "gwen","gweno");
        // $unClient->Create();
        // $retour = "";


        //test update
        // $unClient = new client($bdd, 7,"","","","","","");
        // $unClient->Read();
        // $unClient->setTelephone("0618433250");
        // $unClient->update();

        
        // test delete 
        // $unClient = new client($bdd, 1,"","","","","","");
        // $unClient->delete();
        
    }
}
