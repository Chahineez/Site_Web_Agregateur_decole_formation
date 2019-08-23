<?php

include_once '../Model/Formation.php';
include_once '../Model/database.php';
include_once '../Model/TypeFormation.php';


if(isset($_POST["type"]))
{
$database = new Database();
$db= $database->getConnection();
$nom= isset($_POST['type']) ? $_POST['type'] : die();
$volume= isset($_POST['volume']) ? $_POST['volume'] : die();
$ht= isset($_POST['ht']) ? $_POST['ht'] : die();
$taux= isset($_POST['taux']) ? $_POST['taux'] : die();
$id = isset($_POST['id']) ? $_POST['id'] : die();
$form= new Formation($db);
$type = new TypeFormation($db);
$form->id=$id;
$form->readType();
$type->id=$form->type;
$type->nom=$nom;
$type->volume_heure=$volume;
$type->prix_ht=$ht;
$type->taux=$taux;
$type->update();
echo "".$type->nom."";

}
?>




