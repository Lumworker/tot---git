
<?php
require_once("libs/Medoo.php");
include_once("connect/configmedoo.php");
session_start();
$pageTitle = "Login";
$show = 2;
include_once "header.php";

$username = isset($_POST['username']) ?$_POST['username'] :"";
$password = isset($_POST['password']) ?$_POST['password'] :"";
//echo $username." ".$password." ";
if($username!=""&&$password!=""){
   $id= $database->select("userdata", [
        'user_id'
    ],[
        "username" => $username,
        "password" => $password,
    ]


   );
    $_SESSION['id'] =  $id[0];

    echo $_SESSION["id"];
    //    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.php\">";
}
elseif ($id="")
{
    echo "<script language=\"JavaScript\">";
    echo"alert('  ไม่พบ $username ในระบบ ลองกรอกข้อมูลใหม่ ')";
    echo"</script>";
}






include_once("_loginform.php");
?>



