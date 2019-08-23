<?php

class Theme{
    private $Id;
    private $table_name = "theme";
    public $id;
    public $nom;
    public $titre;
    public $color;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function readAll()
    {
        $query= "SELECT id , nom , color ,titre from " .$this->table_name ." ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
            $query= "INSERT INTO ".$this->table_name. " 
            SET
                nom = '".$this->nom. "' , color = '".$this->color."' , titre = '" .$this->titre. "' ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

   

}

?>