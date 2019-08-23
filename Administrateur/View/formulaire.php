<?php

session_start ();
require 'ViewForm.php' ;
$id= isset($_GET['id_ecole']) ? $_GET['id_ecole'] : die();
$nom= isset($_GET['nom_ecole']) ? $_GET['id_ecole'] : die();

      $view = new ViewForm();
      $view->id_ecole = $id;
      $view->nom_ecole=$nom;
      $view-> head();
      $view->modifierEcole();
      
  ?>




