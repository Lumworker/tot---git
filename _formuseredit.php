<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");
$pageTitle = "edit";
$show = 2;
include_once "header.php";

$datas = $database->select("userdata",[
    "username",
    "img_path",
    "status",
    "Email",
    "password"
], [
    "user_id" => $_SESSION['uid']
]);
$name=$datas[0]['username'];
$img_path=$datas[0]['img_path'];
$status=$datas[0]['status'];
$Email=$datas[0]['Email'];
$password=$datas[0]['password'];

?>
<div id="register" style="overflow:auto;background:#FDFDF6;padding:20px;width:1000px;max-width:100%;border-radius:6px">
<form method="post" target="_parent">
    <fieldset style="border:0;">
        <ul style="list-style:none">
            <h1>Profile: <?php echo $name ?></h1>
            <hr class="my-">

<div class="row">
    <div class="col-md-3">
        <div class="form-check">
            <img src="assets/images/01.svg"><br>
            <p class="text-center" style="padding-top: 10px;">
                <input class="form-check-input" type="radio" name="npic" value="assets/images/01.svg"  >
                <label class="form-check-label" for="inlineRadio1">Profile 1</label>
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-check">
            <img src="assets/images/02.svg"><br>
            <p class="text-center" style="padding-top: 10px;">
                <input class="form-check-input" type="radio" name="npic" value="assets/images/02.svg" >
                <label class="form-check-label" for="inlineRadio1">Profile 2</label>
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-check">
            <img src="assets/images/03.svg"><br>
            <p class="text-center" style="padding-top: 10px;">
                <input class="form-check-input" type="radio" name="npic" value="assets/images/03.svg" >
                <label class="form-check-label" for="inlineRadio1">Profile 3</label>
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-check">
            <img src="assets/images/04.svg"><br>
            <p class="text-center" style="padding-top: 10px;">
                <input class="form-check-input" type="radio" name="npic" value="assets/images/04.svg" >
                <label class="form-check-label" for="inlineRadio1">Profile 4</label>
            </p>
        </div>
    </div>
</div>
            <label for="name"> <h1>User Name : <?php echo $name ?>  </h1> </label> <br>
            <label for="Email"> <h3>  Email :  <?php echo $Email ?>  <h3> </label><Hr>
            <h3>  Change password  </h3>    
            <label for="Password"> Password : <input type="password" name="OldPass" placeholder="Oldpasswotd" class="form-control"></label><br>
            <label for="Password"> Newpassword : <input type="password" name="P1" placeholder="Oldpasswotd" class="form-control"></label>
            <label for="Password"> Confirm-password : <input type="password" name="P2" placeholder="Oldpasswotd" class="form-control"></label> <br>
            <input class="btn btn-primary" type='submit' name='submit' value='Submit'  >
</form>
</div>

<?php

$OldPass = isset($_POST['OldPass']) ?$_POST['OldPass'] :"";
$P1 = isset($_POST['P1']) ?$_POST['P1'] :"";
$P2 = isset($_POST['P2']) ?$_POST['P2'] :"";
$newpic = isset($_POST['npic']) ?$_POST['npic'] :"";
$result = $P1==$P2?$P1 :"";
if($password==$OldPass&&$result!=""){
     $database->update("userdata",[
        "password" => $result
    ], [
        "user_id" => $_SESSION['uid']
    ]);
    
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.php\">";
}
if($newpic!=""){
    $database->update("userdata",[
        "img_path" => $newpic
    ], [
        "user_id" => $_SESSION['uid']
    ]);

}
elseif($P1!=$P2){
    echo "<script language=\"JavaScript\">";
    echo"alert(' กรุณากรอก passwordใหม่ ')";
    echo"</script>";
}


?>
