<?php

include_once '../Model/Comment.php';
include_once '../Model/database.php';

class GestionCommentaire{

public function readComments($id_ecole)
{

    $database = new Database();
    $db= $database->getConnection();
    $comment = new Comment($db);
    $stmt= $comment->read($id_ecole);
    $num= $stmt->rowCount();
    if($num >0)
    {
        $array_types= array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);
            $type_item=array(
                "id" => $id,
                "userName"=>$userName,
                "text" =>$text,
                "date" =>$date
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

}


?>