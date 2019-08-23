<?php

include_once '../Model/TypeFormation.php';
include_once '../Model/database.php';
include_once '../Model/Formation.php';


if(isset($_POST["nomFormation"]))
{
	$database = new Database();
$db= $database->getConnection();
$formation= isset($_POST['nomFormation']) ? $_POST['nomFormation'] : die();
$i2= isset($_POST['id_ecole']) ? $_POST['id_ecole'] : die();
$i3= isset($_POST['typeFormation']) ? $_POST['typeFormation'] : die();
$id = isset($_POST['id']) ? $_POST['id'] : die();
$form= new Formation($db);
$form->id=$id;
$form->nom= $formation;
$form->update();
echo "".$form->id."";

}
?>




