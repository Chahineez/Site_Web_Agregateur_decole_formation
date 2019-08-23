<?php 
session_start ();
require 'ViewEcole.php' ;
$id= isset($_GET['id']) ? $_GET['id'] : die();
$nom= isset($_GET['nom']) ? $_GET['nom'] : die();

      $view = new ViewEcole($id , $nom);
      $view-> getPage();
      
  ?>
