<?php
require_once("libs/Medoo.php");
include_once("connect/configmedoo.php");
session_start();
$pageTitle = "Login";
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
}

?>
<html>
<head>
<title> <?php $pageTitle ?> | TOT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .lity-iframe-container {
            border-radius: 20px;
        }
    </style>
</head>
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
            <a class="btn btn-link btn-md" href="register.php" role="button" data-lity>register</a>
</form>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js"></script>
</html>





