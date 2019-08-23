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

    public function readById($id)
    {
        $query= "SELECT * from ecole  where id = ".$id. ";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }


    public function update()
    {

        $query= "Update ".$this->table_name. " SET nom_ecole = '".$this->nom_ecole."' , domaine = '".$this->domaine."' ,wilaya= '". $this->wilaya ."' , commune= '".$this->commune. "' , addresse= '".$this->addresse. "' , tel= '".$this->tel. "' , fax= '".$this->fax. "'  where id = ".$this->id_ecole." ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

    public function create()
    {

        $query= "INSERT into ".$this->table_name. " SET nom_ecole = '".$this->nom_ecole."' , domaine = '".$this->domaine."' ,wilaya= '". $this->wilaya ."' , commune= '".$this->commune. "' , addresse= '".$this->addresse. "' , tel= '".$this->tel. "' , fax= '".$this->fax. "' , categorie_id= ".$this->categorie_id. "  ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

    public function remove()
    {

        $query= "Delete FROM ".$this->table_name . " 
            where 
                id= ".$this->id. " ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

}

?>