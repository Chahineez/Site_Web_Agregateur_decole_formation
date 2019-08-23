<?php

class Formation{
    private $Id;
    private $table_name = "formations";
    public $id;
    public $nom;
    public $type;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function read($type)
    {
    	$query= "SELECT id_formation as id ,nom_formation as nom from " .$this->table_name ." WHERE type = " .$type.";";
    	$stmt= $this->conn->prepare($query);
    	$stmt->execute();
    	return $stmt;
    }


    public function readAll($id_ecole)
    {
    	$query= "SELECT id_formation ,nom_formation, id ,nom,volume_heure,prix_ht,taux from " .$this->table_name ." JOIN type_formation ON type_formation.id= formations.type  where id_ecole= ".$id_ecole.";";
    	$stmt= $this->conn->prepare($query);
    	$stmt->execute();
    	return $stmt;
    }



   
    public function readByName()
    {
        $query= "SELECT id_formation as id from " .$this->table_name ." WHERE nom_formation = '" .$this->nom."';";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
    }


    public function create()
    {
            $query= "INSERT INTO ".$this->table_name. " 
            SET
                nom_formation= '".$this->nom. "' , type = ".$this->type." ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

    public function remove()
    {

        $query= "Delete FROM ".$this->table_name . " 
            where 
                id_formation= ".$this->id. " ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

     public function update()
    {

        $query= "Update ".$this->table_name . " 
             SET nom_formation = '".$this->nom."' where 
                id_formation= ".$this->id. " ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

    public function readType()
    {
        $query= "SELECT type from " .$this->table_name ." WHERE id_formation = " .$this->id.";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->type = $row['type'];
    }


    


}

?>