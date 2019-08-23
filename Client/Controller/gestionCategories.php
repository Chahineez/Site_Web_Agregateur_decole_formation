<?php


require '../Model/database.php';
require '../Model/Categorie.php';
require '../Model/Ecole.php';


class GestionCategories{

public function readCategories()
{

        $database = new Database();
        $db= $database->getConnection();
        $cat = new Categorie($db);
        $stmt= $cat->readAll();
        $num= $stmt->rowCount();
        if($num >0)
        {
            $array_types= array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);
                $type_item=array(
                    "id"=>$id,
                    "nom_categorie" =>$nom_categorie,
                    "lien" =>$lien
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



public function readEcoles($categorie)
{

        $database = new Database();
        $db= $database->getConnection();
        $ecole= new Ecole($db);
        $cat= new Categorie($db);
        $id1= $cat->readByName($categorie);
        $stmt= $ecole->readAll($id1);
        $num= $stmt->rowCount();
        if($num >0)
        {
            $array_types= array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                extract($row);
                $type_item=array(
                    "id" => $id,
                    "domaine"=>$domaine,
                    "nom" =>$nom_ecole,
                    "wilaya" =>$wilaya,
                    "commune" =>$commune,
                    "addresse" =>$addresse,
                    "tel" =>$tel,
                    "fax" =>$fax,
                );
                array_push($array_types, $type_item);
            }
            return $array_types;

        }

        else
        {
            echo "jj";
        }
}





}

?>