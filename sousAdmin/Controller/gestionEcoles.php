<?php

include_once '../Model/Ecole.php';
include_once '../Model/database.php';

class GestionEcoles{

public function getEcole($id_ecole)
{
    $database = new Database();
    $db= $database->getConnection();
    $ecole = new ecole($db);
    $stmt= $ecole->readById($id_ecole);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
            $type_item=array(
                "id_ecole" => $id,
                "nom_ecole"=>$nom_ecole,
                "domaine" =>$domaine,
                "wilaya" =>$wilaya,
                "commune" =>$commune,
                "addresse" =>$addresse,
                "tel" =>$tel,
                "fax" =>$fax,
                
            );
            return $type_item;
    }

}

}


?>