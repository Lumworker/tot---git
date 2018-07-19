<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");

$pageTitle = "Return Data form Bin";
$show = 1;

include_once "header.php";
$q = isset($_GET['q']) ?$_GET['q'] :"";
$sort = isset($_GET['']) ?$_GET['q'] :"";


$datas = $database->select("data_tot", [
    "number",
    "name",
    "location",
    "promotion",
], [
    "deleated_at[!]" => NULL,
    "ORDER" => "number",
    "OR" => [
        "number[~]"  => $q,
        "promotion[~]"  => $q
    ]
    ]);

    $count = $database->count("data_tot", [
        "deleated_at[!]" => NULL,
        "OR" => [
            "number[~]"  => $q,
            "promotion[~]"  => $q
        ]
    ]);
?>

<body xmlns="http://www.w3.org/1999/html" id="show">
<div class="container" style="padding-bottom: 60px;" id="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">ข้อมูลที่ถูกลบ <?php echo $q; ?></h1>
            <p class="lead">มีท้งสิ้น  <?php echo $count; ?> รายการ</p>
        </div>
    </div>
    

<!-- <button id="button" type="button">button</button> -->

    <input type="button" id="submit" class="btn btn-warning btn-lg"  value="GetBack"/>
<div>
    <table id="employee_table" class="table table-hover">
        <tr>
            <th>number</th>
            <th>name</th>
            <th>location</th>
            <th>promotion</th>
            <th>Getback</th>
        </tr>
       
    <?php foreach($datas as $data)
        {?>
        <tr>
            <td> <?php echo $data["number"]?></td>
            <td> <?php echo $data["name"]?></td>
            <td> <?php echo $data["location"]?></td>
            <td> <?php echo $data["promotion"]?></td>
            <td><input type="checkbox" name="value" value=<?php echo $data["number"]?>></td>
        </tr>
        <?php }
        ?>
         </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // <input type="button" id="submit" class="btn btn-warning btn-lg"  value="GetBack"/>
var tmp = [];
$("input").click(function() {
  if ($(this).is(':checked')) {
    var checked = ($(this).val());
    tmp.push(checked);
  } else {
    tmp.splice($.inArray(checked, tmp),0);
  }
});

    $("#submit").click(function(){

    if(tmp !=""){
        console.log(tmp);
        $.post("del.php",{
            "numberBack[]":tmp
        },
            function(data, status){
                // alert("Data: " + data + "\nStatus: " + status);
                alert('complete');
                $("#show").load("del_his.php");
               
            });
        
    }
    else{
        alert('กรุณาเลือกอย่างน้อย1รายการ');
    }
      
    });

});
</script>
<?php


// $getback = isset($_POST['getback']) ?$_POST['getback'] :"";
// if($getback!==""){
//     $datas = $database->update("data_tot", [
//     "deleated_at" =>NULL,
//         ], [
//         "number" => $getback
//         ]);
//         echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.php\">"
//         ;}
 ?>


 
<?php include_once "footer.php";
?>
</body>