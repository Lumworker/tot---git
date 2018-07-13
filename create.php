<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");
$pageTitle = "Create";
$show = 2;
include_once "header.php";
$number = isset($_POST['number']) ?$_POST['number'] :"";
//if(isset($_POST['name'])){
//    $name = $_POST['name'];
//}
//else{
//    $name = "";
//}
$number = isset($_POST['number']) ?$_POST['number'] :"";
$name = isset($_POST['name']) ?$_POST['name'] :"";
$location = isset($_POST['location']) ?$_POST['location'] :"";
$promotion = isset($_POST['promotion']) ?$_POST['promotion'] :"";

//$x = 100;
//echo $x==10?"10":"not10";

if($number!=""&&$promotion!=""){
    $database->insert("data_tot", [
        "number" => $number,
        "name" => $name,
        "location" => $location,
        "promotion" => $promotion,
    ]);
    header("Location: index.php");
}

$action = "create";
include_once "_form.php";


