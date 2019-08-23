<?php

include_once '../Model/database.php';
include_once '../Model/TypeFormation.php';


if(isset($_POST['id']))
{
$database = new Database();
$db= $database->getConnection();
$type = new TypeFormation($db);
$id= isset($_POST['id']) ? $_POST['id'] : die();
$type->id=$id;
$type->readById();
$array= array();
$array[0]=$type->nom;
$array[1]=$type->volume_heure;
$array[2]=$type->ht;
$array[3]=$type->taux;
echo $type->nom;

}
?>