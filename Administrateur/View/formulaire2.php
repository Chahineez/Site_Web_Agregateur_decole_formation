<?php

session_start ();
require 'ViewForm.php' ;
$id= isset($_GET['id']) ? $_GET['id'] : die();

      $view = new ViewForm();

      $view->id_categorie = $id;
      $view-> head();
      $view->ajouterEcole();
      
  ?>
