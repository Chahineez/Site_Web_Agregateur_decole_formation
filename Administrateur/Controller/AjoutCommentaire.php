
<?php


include_once '../Model/Comment.php';
include_once '../Model/database.php';
 


if(isset($_POST["id_ecole"]))
{


$database = new Database();
$db = $database->getConnection();
 

$comment= new Comment($db);
$comment->text= isset($_POST['textComment']) ? $_POST['textComment'] : die();
$comment->id_ecole = isset($_POST['id_ecole']) ? $_POST['id_ecole'] : die();
$comment->userName = isset($_POST['userName']) ? $_POST['userName'] : die();
$comment->date= date('Y-m-d'); 

$comment->create();

$array_types= array();
        $type_item=array(
            "text" => $comment->text,
            "date" =>$comment->date,
            "userName" =>$comment->userName
        );
  array_push($array_types, $type_item);
  echo json_encode($array_types);


}

?>