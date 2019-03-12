<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");
$pageTitle = "Welcome";
$show = 2;
include_once "header.php";
echo "<meta charset=\"utf-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no\">
      <link rel=\"stylesheet\" media=\"screen\" href=\"assets/css/style.css\">";

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
    <div id="particles-js">
      <div id="login">
        <img src="assets/images/tot-blue.png" alt="logoToT">
        <form method="post">
            <input type="text" class="username" name='username' placeholder="username" require><br>
            <input type="password" class="password" name='password' placeholder="password" require><br>
          <input type="submit" name="submit" value="Login" class="btnLogin">
        </form>
        <button href="register.php" class="regis" data-lity>REGISTER</button>
      </div>
    </div>

    <script src="particles.js"></script>
    <script src="assets/js/app.js"></script>

    <script>
      particlesJS.load('particles-js',
      'particles.json', function() {
      console.log('particles.json loaded...');
    });
    </script>
  </body>
