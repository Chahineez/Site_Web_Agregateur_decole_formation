<?php

class Categorie{
    private $Id;
    private $table_name = "categorie";
    public $id;
    public $nom_categorie;
    public $lien;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    public function readAll()
    {
        $query= "SELECT id ,nom_categorie, lien  from " .$this->table_name ." ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readByName($categorie)
    {
        $query= "SELECT id  from " .$this->table_name ." where nom_categorie = '". $categorie ."' ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id'];

    }

   
   


}

?>