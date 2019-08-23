
<?php


include_once '../Model/User.php';
include_once '../Model/database.php';
 


if(isset($_POST["mail"]))
{

// instantiate database and  device object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user= new User($db);
// get id of product to be edited
$user->mail = isset($_POST['mail']) ? $_POST['mail'] : die();
$user->userName = isset($_POST['userName']) ? $_POST['userName'] : die();
$user->password = isset($_POST['password']) ? $_POST['password'] : die();
 
// read the details of device to be edited
$user->create();
session_start ();
$_SESSION['mail'] = $user->mail;
$_SESSION['pwd'] = md5($user->password);
$_SESSION['userName'] = $user->userName;
echo "";

}

?>