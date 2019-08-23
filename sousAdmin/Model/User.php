<?php

class User{
    private $Id;
    public $id;
    private $table_name = "admin";
    public $mail ;
    public $userName;
    public $password;
    public $admin;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    //lire les types formations
    public function read()
    {
    	$query= "SELECT * from " .$this->table_name ." where userName = '".$this->userName. "' and password = '".$this->password."' ;";
    	$stmt= $this->conn->prepare($query);
    	$stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC); 
        $this->id = $row['id'];
        $this->userName = $row['userName'];
        $this->admin=$row['admin'];

    }




}

?>