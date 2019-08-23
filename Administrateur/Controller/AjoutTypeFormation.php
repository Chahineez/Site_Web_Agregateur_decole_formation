
<?php

include_once '../Model/TypeFormation.php';
include_once '../Model/database.php';
include_once '../Model/Formation.php';



if(isset($_POST["formation"]))
{
$database = new Database();
$db= $database->getConnection();
$type = new TypeFormation($db);
$nom= isset($_POST['type']) ? $_POST['type'] : die();
$volume= isset($_POST['volume']) ? $_POST['volume'] : die();
$ht= isset($_POST['ht']) ? $_POST['ht'] : die();
$taux= isset($_POST['taux']) ? $_POST['taux'] : die();
$formation= isset($_POST['formation']) ? $_POST['formation'] : die();
$id_ecole= isset($_POST['id_ecole']) ? $_POST['id_ecole'] : die();
$id= isset($_POST['id']) ? $_POST['id'] : die();

$type->nom=$nom;
$type->volume_heure=$volume;
$type->prix_ht=$ht;
$type->taux=$taux;
$type->id_ecole=$id_ecole;
$type->create();
$type->readId();
$form= new Formation($db);
$form->nom= $formation;
$form->type=$type->id;
$form->create();
$form->readByName();
echo "".$form->id."";

}
?>




