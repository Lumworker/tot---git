<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");

$numberexport = isset($_REQUEST['numberexport']) ?$_REQUEST['numberexport'] :"";


if($numberexport){
    
 $datas = $database->select("data_tot", [
    "number",
    "name",
    "location",
    "promotion",
], [
    "number" => $numberexport,
    ]);
}
print_r($datas);

?>