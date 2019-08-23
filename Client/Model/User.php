<?php

class User{
    private $Id;
    public $id;
    private $table_name = "user";
    public $mail ;
    public $userName;
    public $password;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    //lire les types formations
    public function read()
    {
    	$query= "SELECT id , userName from " .$this->table_name ." where mail = '".$this->mail. "' and password = '".$this->password."' ;";
    	$stmt= $this->conn->prepare($query);
    	$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        $this->id = $row['id'];
        $this->userName = $row['userName'];

    }

    public function create()
    {
            $query= "INSERT INTO ".$this->table_name. " 
             SET
                mail= '".$this->mail. "' , userName= '".$this->userName. "' , password = '".$this->password."' ;";
        $stmt= $this->conn->prepare($query);
        $stmt->execute();
    }
    



}

?>