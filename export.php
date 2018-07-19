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
}else{
    $datas = $database->select("data_tot", [
        "number",
        "name",
        "location",
        "promotion",
    ]);
}
//print_r($datas);

?>

<?php foreach ($datas as $dat):?>
    <button class="btn btn-success">name:<?php echo $dat["number"]?>number<?php echo $dat["name"]?></button>

<?php endforeach;?>