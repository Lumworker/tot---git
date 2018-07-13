<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");
date_default_timezone_set("Asia/Bankok");
/// load data
$number = isset($_GET['number']) ?$_GET['number'] :"";
$date = date("Y-m-d H:i:s");
    $database->update("data_tot", [
        deleated_at => $date
    ],
        ["number" => $number]
    );
    header("Location: index.php");
