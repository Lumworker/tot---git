
<?php
require_once("libs/Medoo.php");
include_once("connect/configmedoo.php");
$pageTitle = "Register";
$show = 2;
include_once "header.php";

$con_password = isset($_POST['con_password']) ?$_POST['con_password'] :"";
$Email = isset($_POST['Email']) ?$_POST['Email'] :"";
$username = isset($_POST['username']) ?$_POST['username'] :"";
$password = isset($_POST['password']) ?$_POST['password'] :"";
$password==$con_password?$password:"";
$pic = isset($_POST['pic']) ?$_POST['pic'] :"";
$status ="user";
echo $username." ".$password." ".$con_password." ".$Email." ".$pic." ";
if($username!=""&&$password!=""&&$Email!=""&&$pic!=""){
    $database->insert("userdata", [
        "username" => $username,
        "password" => $password,
        "Email" => $Email,
        "img_path" => $pic,
        "status" => $status

    ]);
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.php\">";
}


include_once("_formuser.php");
?>


