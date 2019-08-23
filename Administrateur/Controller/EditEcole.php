<?php


include_once '../Model/Ecole.php';
include_once '../Model/database.php';
 


if(isset($_POST["id_ecole"]))
{
$database = new Database();
$db = $database->getConnection();
$ecole= new Ecole($db);
$ecole->id_ecole= isset($_POST['id_ecole'])  ? $_POST['id_ecole'] : die();
$ecole->nom_ecole= isset($_POST['nom_ecole'])  ? $_POST['nom_ecole'] : die();
$ecole->domaine = isset($_POST['domaine']) ? $_POST['domaine'] : die();
$ecole->wilaya = isset($_POST['wilaya']) ? $_POST['wilaya'] : die();
$ecole->commune = isset($_POST['commune']) ? $_POST['commune'] : die();
$ecole->addresse = isset($_POST['addresse']) ? $_POST['addresse'] : die();
$ecole->tel = isset($_POST['tel']) ? $_POST['tel'] : die();
$ecole->fax = isset($_POST['fax']) ? $_POST['fax'] : die();
$ecole->update();

}

?>