<?php 
include_once 'ViewGlobale.php' ;
      session_start ();
      $id= isset($_GET['id_categorie']) ? $_GET['id_categorie'] : die();
      $nom= isset($_GET['nom_categorie']) ? $_GET['nom_categorie'] : die();
      $view = new ViewGlobale($id, $nom);
      $view->head();
      $view->pageCommune($nom , $id);
  ?>


