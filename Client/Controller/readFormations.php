<?php


include_once '../Model/database.php';
include_once '../Model/Formation.php';
include_once '../Model/TypeFormation.php';

if(isset($_POST['id_ecole']))
{
$id1 = isset($_POST['id_ecole']) ? $_POST['id_ecole'] : die();
$database = new Database();
$db= $database->getConnection();
$type = new Formation($db);
$stmt= $type->readAll($id1);
$num= $stmt->rowCount();



if($num >0)
{
	$array_types= array();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $type_item=array(
            "id"=>$id_formation,
            "nom" =>$nom_formation,
            "type"=>$nom,
            "heure" =>$volume_heure,
            "ht" =>$prix_ht,
            "taux"=>$taux,
        );
        array_push($array_types, $type_item);
    }
    echo json_encode($array_types);

}

else
{
	echo null;
}

}

?>