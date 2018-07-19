<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");
$pageTitle = "Welcome";
$show = 2;
include_once "header.php";
if(isset($_SESSION['uid'])){
    header("Location:index.php");
}
$username = isset($_POST['username']) ?$_POST['username'] :"";
$password = isset($_POST['password']) ?$_POST['password'] :"";
if($username!=""&&$password!=""){
   $id= $database->select("userdata",[
        'user_id'
    ],[
        "username" => $username,
        "password" => $password,
    ]
   );
    $_SESSION['uid'] = $id[0]['user_id'];
      echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.php\">";
      if(!$id)
      {
          
    echo "<script language=\"JavaScript\">";
    echo"alert('ไม่สามารถloginได้ กรุณาลองใหม่อีกครั้ง! ')";
    echo"</script>";
          
      }
}

?>
<body>
<form method="post" >
    <fieldset style="border:0;">
        <ul style="list-style:none">
            <h1>Login</h1>
            <hr class="my-">
            <label for="number">Username</label>
            <input class="form-control" type='text' name='username' placeholder='Username'  require><br>
            <label for="number">Password</label>
            <input class="form-control" type='password' name='password' placeholder='password'  require><br>
            <input class="btn btn-primary"  type='submit' name='submit' value='Login'>
            <a  href="register.php" data-lity>register</a>
</form>
</div>
</body>




