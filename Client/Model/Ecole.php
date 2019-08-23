<?php

class Ecole{
    private $Id;
    private $table_name = "ecole";
    public $id;
    public $nom_ecole;
    public $domaine;
    public $categorie_id;
    public $tel;
    public $fax;
    public $addresse;
    public $wilaya;
    public $commune;
    public $id_cat;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



    public function readAll($categorie)
    {
        $query= "SELECT  * from ecole  where categorie_id = ".$categorie. ";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


    public function read($categorie)
    {
        $query= "SELECT id , nom_ecole from ecole  where categorie_id = ".$categorie. ";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}

?>