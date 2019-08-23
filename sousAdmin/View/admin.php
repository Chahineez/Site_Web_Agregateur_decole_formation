<?php 
include_once 'View.php' ;

if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
$id= isset($_GET['id']) ? $_GET['id'] : die();
$view = new View($id);
$view->getPage();

?>

      

