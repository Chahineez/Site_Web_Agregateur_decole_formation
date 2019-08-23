<?php


include_once '../Model/database.php';
include_once '../Model/Formation.php';
include_once '../Model/TypeFormation.php';


class GestionFormations{

public function readTypesFormations($id_ecole)
{

$database = new Database();
$db= $database->getConnection();
$type = new TypeFormation($db);
$stmt= $type->read($id_ecole);
$num= $stmt->rowCount();
if($num >0)
{
	$array_types= array();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $type_item=array(
            "id"=>$id,
            "nom" =>$nom,
            "heure" =>$volume_heure,
            "ht" =>$prix_ht,
            "taux"=>$taux,
        );
        array_push($array_types, $type_item);
    }
    return $array_types;

}

else
{
	echo null;
}
}


public function readFormations($id)
{

$database = new Database();
$db= $database->getConnection();
$form = new Formation($db);
$stmt= $form->read($id);
$num= $stmt->rowCount();
if($num >0)
{
    $array_types= array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $type_item=array(
            "id" =>$id,
            "nom" =>$nom           
        );
        array_push($array_types, $type_item);
    }
    return $array_types;

}

else
{
    return  null;
}
}





public function addTypeFormation($nom , $volume , $ht , $taux)
{


$database = new Database();
$db= $database->getConnection();
$type = new TypeFormation($db);
$type->nom= $nom;
$type->volume= $volume;
$type->ht= $ht;
$type->taux= $taux;
$result = $type->create();

}

public function removeTypeFormation($nom , $volume , $ht , $taux)
{

$database = new Database();
$db= $database->getConnection();
$type = new TypeFormation($db);
$type->nom= $nom;
$type->volume= $volume;
$type->ht= $ht;
$type->taux= $taux;
$result = $type->remove();

}



}

?>