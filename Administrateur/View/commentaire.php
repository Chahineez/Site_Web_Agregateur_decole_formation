<?php

require 'ViewCommentaire.php' ;
if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
$id= isset($_GET['id_ecole']) ? $_GET['id_ecole'] : die();
$nom= isset($_GET['nom_ecole']) ? $_GET['nom_ecole'] : die();
$view = new ViewCommentaire($id, $nom);
if (isset($_SESSION['mail']) && isset($_SESSION['pwd']) || isset($_SESSION['admin']))
  {
        $view-> header();
        echo '<body>     
        <div class="container">';
        $view->title();
        $view->lastComments();
        $view-> setTextArea();   
        echo '</div> </body>';
  }
  else
  {
    $view-> header();
    echo "<body><br><br><br><center>";
    echo "<h2>Veuillez vous connecter avec votre compte pour pouvoir commenter</h2>";
    $view->signIn();
    echo "</body><center>";

  }

?>