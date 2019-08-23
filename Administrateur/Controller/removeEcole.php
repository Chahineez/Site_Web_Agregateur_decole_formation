<?php



include_once '../Model/database.php';
include_once '../Model/Ecole.php';

if(isset($_GET['id']))
{
$database = new Database();
$db= $database->getConnection();
$ecole= new Ecole($db);
$ecole->id = isset($_GET['id']) ? $_GET['id'] : die();
$ecole->remove();
echo "Ecole supprimée avec succès";
echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";


}


?>