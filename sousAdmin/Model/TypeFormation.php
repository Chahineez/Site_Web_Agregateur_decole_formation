<?php

class TypeFormation{
    private $Id;
    public $id;
    private $table_name = "type_formation";
    public $nom ;
    public $volume_heure;
    public $prix_ht;
    public $taux;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    //lire les types formations
    public function read($id_ecole)
    {
        
    	$query= "SELECT id ,nom , volume_heure , prix_ht, taux  from " .$this->table_name ." where id_ecole=" . $id_ecole ." ;";
    	$stmt= $this->conn->prepare($query);
    	$stmt->execute();
    	return $stmt;
    }

    public function readId()
    {
        $query= "SELECT id from " .$this->table_name ." where nom = '".$this->nom. "' and volume_heure = ".$this->volume_heure." and prix_ht= ". $this->prix_ht ." and taux= ".$this->taux. ";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
    }

    public function readIdByName()
    {
        $query= "SELECT id from " .$this->table_name ." where nom = '".$this->nom. "' and  id_ecole=" . $this->id_ecole .";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id = $row['id'];
    }

     public function readById()
    {
        $query= "SELECT nom , volume_heure , prix_ht, taux from " .$this->table_name ." where id = ".$this->id. " ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->nom = $row['nom'];
        $this->volume_heure = $row['volume_heure'];
        $this->ht = $row['prix_ht'];
        $this->taux = $row['taux'];

    }
    //Créer un type de formation

    public function create()
    {
            $query= "INSERT INTO ".$this->table_name . " 
            SET
                nom= '".$this->nom. "' , volume_heure = ".$this->volume_heure." ,prix_ht= ". $this->prix_ht ." , taux= ".$this->taux. " , id_ecole= ".$this->id_ecole. ";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

    public function remove()
    {

        $query= "Delete FROM ".$this->table_name . " 
            where 
                id= '".$this->id. "' ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }


    public function update()
    {

        $query= "Update ".$this->table_name. " SET nom = '".$this->nom."' , volume_heure = ".$this->volume_heure." , prix_ht= ". $this->prix_ht ." , taux= ".$this->taux. "  where id = ".$this->id." ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }


}

?>