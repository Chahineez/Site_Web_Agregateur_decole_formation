<?php

include_once '../Model/Theme.php';
include_once '../Model/database.php';



if(isset($_POST["color"]))
{
$database = new Database();
$db= $database->getConnection();
$theme= new Theme($db);
$nom= isset($_POST['nom']) ? $_POST['nom'] : die();
$color= isset($_POST['color']) ? $_POST['color'] : die();
$titre= isset($_POST['titre']) ? $_POST['titre'] : die();
$theme->nom=$nom;
$theme->color=$color;
$theme->titre=$titre;
$theme->create();
echo "jj";
}
?>