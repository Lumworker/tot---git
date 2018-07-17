
    <?php

require("libs/Medoo.php");
include("connect/configmedoo.php");
date_default_timezone_set("Asia/Bankok");
/// load data
// REQUEST คือ เป็นได้ทั้งget และpost เมื่อรับค่ามา
$number = isset($_REQUEST['number']) ?$_REQUEST['number'] :"";
$numberBack = isset($_REQUEST['numberBack']) ?$_REQUEST['numberBack'] :"";

$date = date("Y-m-d H:i:s");

if($number){
    $database->update("data_tot", [
        deleated_at => $date
    ],
        ["number" => $number]
    );
    header("Location: index.php");
}
elseif ($numberBack){
    $database->update("data_tot", [
        deleated_at => NULL
    ],
        ["number" => $numberBack]
    );
    header("Location: index.php");
}

