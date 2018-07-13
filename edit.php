<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");
$pageTitle = "edit";
$show = 2;
include_once "header.php";

/// load data
$number = isset($_GET['number']) ?$_GET['number'] :"";
if($number!="") {
    $datas = $database->select("data_tot", [
        "number",
        "name",
        "location",
        "promotion"
    ], [
        "number" => $number
    ]);
}   

/// run update
$number = isset($_POST['number']) ?$_POST['number'] :"";
$name = isset($_POST['name']) ?$_POST['name'] :"";
$location = isset($_POST['location']) ?$_POST['location'] :"";
$promotion = isset($_POST['promotion']) ?$_POST['promotion'] :"";

if($number!=""&&$name!=""&&$promotion!=""&&$location!=""){
    $database->update("data_tot", [
        "number" => $number,
        "name" => $name,
        "location" => $location,
        "promotion" => $promotion,
    ],
        ["number" => $number]
);
    header("Location: index.php");
}

$action = "edit";
$data = $datas[0];

include_once "_form.php";

