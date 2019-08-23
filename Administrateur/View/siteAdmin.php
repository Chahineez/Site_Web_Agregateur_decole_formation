<?php 
include_once 'ViewSite.php' ;

if(session_status() == PHP_SESSION_NONE){
    //session has not started
    session_start();
}
$id= isset($_GET['id']) ? $_GET['id'] : die();
$view = new ViewSite($id);
$view->getPage();

?>

      

