<?php


include_once '../Model/User.php';
include_once '../Model/database.php';
 



if(isset($_POST["userName"]))
{

// instantiate database and  device object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user= new User($db);

// get id of product to be edited
$user->userName = isset($_POST['userName']) ? $_POST['userName'] : die();
$user->password = isset($_POST['password']) ? $_POST['password'] : die();
 
// read the details of device to be edited
$user->read();
if ($user->id!='')
{
    session_start ();
    $_SESSION['userName'] = $user->userName;
    $_SESSION['mail'] = $user->mail;
    $_SESSION['pwd'] = md5($user->password);
    $_SESSION['admin'] = $user->admin;
    echo $user->id;
}
else
{
    echo "";
}

}

?>