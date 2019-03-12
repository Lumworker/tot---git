<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");

$pageTitle = "Search";
$show = 1;

include_once "header.php";
// require_once 'Classes/PHPExcel.php';

$q = isset($_GET['q']) ?$_GET['q'] :"";


$datas = $database->select("data_tot", [
    "number",
    "name",
    "location",
    "promotion",
], [
    "deleated_at" => NULL,
    "ORDER" => "number",
    "OR" => [
        "number[~]"  => $q,
        "promotion[~]"  => $q
    ]
    ]);

    $count = $database->count("data_tot", [
        "deleated_at" => NULL,
        "OR" => [
            "number[~]"  => $q,
            "promotion[~]"  => $q
        ]
    ]);
?>

<body>
<div class="dataRender"></div>

<div class="container" style="padding-bottom: 60px;">
    <?php if($q==""){ ?>
        <div class="jumbotron">
        <h1 class="display-4">ยินดีต้อนรับสู่ระบบค้นหาข้อมูล โปรโมชั่น</h1>
        <hr class="my-4">
        <p>ข้อมูลลูกค้าปัจจุบันทั้งสิ้น <?php echo $count; ?> รายการ</p>

        <?php if($status=="admin") {?>
        <a class="btn btn-success btn-lg" href="create.php" role="button" data-lity>+ Create</a>
        |
        <a class="btn btn-danger btn-lg" href="del_his.php"role="button">Recycle Bin</a>

        <input type="button" id="Export" class="btn btn-warning btn-lg"  value="Export"/>
        <input type='button' class="btn btn-info btn-lg" value="Import" href="datafetch.php" data-lity>
        <?php
      }else{

        echo "
        <form class=\"\" action=\"export.php\" method=\"post\">
          <input type=\"hidden\" name=\"<?php $q ?>\" value=\"<?php $q ?>\">
          <input type=\"button\" id=\"Export\" class=\"btn btn-warning btn-lg\" value=\"Export\"/>
        </form>
        ";
      }

      ?>
    </div>
    <?php }else{ ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">ผลการค้นหา <?php echo $q; ?></h1>
        <p class="lead">จำนวนทั้งหมด  <?php echo $count; ?> รายการ</p>

        <?php if($status=="admin") {?>
        <a class="btn btn-success btn-lg" href="create.php" role="button" data-lity>+ Create</a>
        |
        <a class="btn btn-danger btn-lg" href="del_his.php"role="button">Recycle Bin</a>

        <input type="button" id="Export" class="btn btn-warning btn-lg"  value="Export"/>
        <input type='button' class="btn btn-info btn-lg" value="Import" href="datafetch.php">
        |
      <?php }else{
        echo "
        <form class=\"\" action=\"export.php\" method=\"post\">
          <input type=\"hidden\" name=\"<?php $q ?>\" value=\"<?php $q ?>\">
          <input type=\"button\" id=\"Export\" class=\"btn btn-warning btn-lg\" value=\"Export\"/>
        </form>
        ";
      }?>
    </div>
</div>
    <?php } ?>

<div  >
    <table id="employee_table" class="table table-hover">
        <tr>
            <th>number</th>
            <th>name</th>
            <th>location</th>
            <th>promotion</th>
            <?php if($status=="admin") {?>
            <th>edit</th>
            <th>delete</th>
            <?php }?>
            <th>select</th>
        </tr>
    <?php foreach($datas as $data) { ?>
        <tr>
            <td> <?php echo $data["number"]?></td>
            <td> <?php echo $data["name"]?></td>
            <td> <?php echo $data["location"]?></td>
            <td> <?php echo $data["promotion"]?></td>
            <?php if($status=="admin") { ?>
            <td>  <a href="edit.php?number=<?php echo $data["number"]?>"data-lity>edit</a></td>
            <td>  <a href="del.php?number=<?php echo $data["number"]?>">delete</a></td>
           <?php } ?>
            <td> <input type="checkbox" name="value" value=<?php echo $data["number"]?>> </td>
        </tr>
        <?php } ?>
         </table>
        </div>
    </div>
</div>


<?php include_once "footer.php";
?>
</body>
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

    $("#Export").click(function(){
    if(tmp){
        console.log(tmp);
        $.post("export.php",{
            "numberexport[]":tmp
        },
        function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
                $('.dataRender').html(data);


                // alert('complete!');
                // $("#Export").load("export.php");
                // window.location.href("export.php");
            });

    }


    });

});
</script>
