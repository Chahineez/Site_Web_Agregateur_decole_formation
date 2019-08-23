<?php

include_once '../Model/TypeFormation.php';
include_once '../Model/database.php';
include_once '../Model/Formation.php';



if(isset($_POST["nomFormation"]))
{
	$database = new Database();
$db= $database->getConnection();
$formation= new Formation($db);
$nom= isset($_POST['nomFormation']) ? $_POST['nomFormation'] : die();
$typeForm= isset($_POST['typeFormation']) ? $_POST['typeFormation'] : die();
$id_ecole= isset($_POST['id_ecole']) ? $_POST['id_ecole'] : die();
$id1= isset($_POST['id']) ? $_POST['id'] : die();
$formation->nom=$nom;
$type = new TypeFormation($db);
$type->nom= $typeForm;
$type->id_ecole=$id_ecole;
$type->readIdByName();
$formation->type = $type->id;
$formation->create();
$formation->readByName();
$type->readById();
$array= array();
$type_item=array(
            "id"=>$formation->id,
            "nom" =>$formation->nom,
            "type"=>$type->nom,
            "heure" =>$type->volume_heure,
            "ht" =>$type->ht,
            "taux"=>$type->taux,
        );
        array_push($array, $type_item);
    }
    echo json_encode($array);
?>