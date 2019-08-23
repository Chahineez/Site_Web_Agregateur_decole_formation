<?php

class Comment{
    private $Id;
    private $table_name = "comment";
    public $id;
    public $text;
    public $userName;
    public $id_ecole;
    public $date;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }


    public function read($id_ecole)
    {
        $this->id_ecole=$id_ecole;
        $query= "SELECT * from comment where id_ecole= ". $this->id_ecole. ";";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create()
    {
            $query= "INSERT INTO ".$this->table_name. " 
             SET
             userName= '".$this->userName. "' , date= '".$this->date. "' ,  text= '".$this->text. "' , id_ecole = ".$this->id_ecole." ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }

   
   


}

?>