<?php



include_once '../Model/database.php';
include_once '../Model/Comment.php';

if(isset($_POST['id_ecole']))
{
$database = new Database();
$db= $database->getConnection();
$cmt= new Comment($db);
$id1 = isset($_POST['id_ecole']) ? $_POST['id_ecole'] : die();
$stmt= $cmt->read($id1);
$num= $stmt->rowCount();
if($num >0)
{

    $array_types= array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $type_item=array(
            "id" => $id,
            "text" =>$text,
            "userName" =>$userName,
            "date" =>$date
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