<?php



include_once '../Model/database.php';
include_once '../Model/Ecole.php';

if(isset($_POST['id_categorie']))
{
$database = new Database();
$db= $database->getConnection();
$ecole= new Ecole($db);
$id1 = isset($_POST['id_categorie']) ? $_POST['id_categorie'] : die();
$stmt= $ecole->read($id1);
$num= $stmt->rowCount();
if($num >0)
{

    $array_types= array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $type_item=array(
            "id" => $id,
            "nom" =>$nom_ecole
        );
        array_push($array_types, $type_item);
  }
  echo json_encode($array_types);

}

else
{
    echo "";
}

}


?>