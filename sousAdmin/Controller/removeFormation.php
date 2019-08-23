<?php

include_once '../Model/database.php';
include_once '../Model/Formation.php';


if(isset($_POST['id']))
{
$database = new Database();
$db= $database->getConnection();
$formation = new Formation($db);
$id= isset($_POST['id']) ? $_POST['id'] : die();
$formation->id=$id;
$formation->remove();

}
?>

