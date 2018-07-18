<?php

require("libs/Medoo.php");
include("connect/configmedoo.php");

$pageTitle = "Search";
$show = 1;

include_once "header.php";
$q = isset($_GET['q']) ?$_GET['q'] :"";
//$sort = isset($_GET['']) ?$_GET['q'] :"";


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
        "OR" => [
            "number[~]"  => $q,
            "promotion[~]"  => $q
        ]
    ]);
?>

<body>
<div class="container" style="padding-bottom: 60px;">
    <?php if($q==""){ ?>
        <div class="jumbotron">
        <h1 class="display-4">ยินดีต้อนรับสู่ระบบค้นหาข้อมูล โปรโมชั่น</h1>
        <!-- <p class="lead"></p> -->
        <hr class="my-4">
        <p>ข้อมูลลูกค้าปัจจุบันทั้งสิ้น <?php echo $count; ?> รายการ</p>
        
        <a class="btn btn-success btn-lg" href="create.php" role="button" data-lity>+ Create</a>
        |
        <a class="btn btn-danger btn-lg" href="del_his.php"role="button">Recycle Bin</a>

            <a class="btn btn-warning btn-lg" href="register.php" role="button" data-lity>+ register</a>
            <a class="btn btn-info btn-lg" href="login.php" role="button" data-lity>+ login</a>
    </div>
    <?php }else{ ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">ผลการค้นหา <?php echo $q; ?></h1>
            <p class="lead">จำนวนทั้งหมด  <?php echo $count; ?> รายการ</p>
            <a class="btn btn-success btn-lg" href="create.php" role="button" data-lity>+ Create</a>
            |
            <a class="btn btn-danger btn-lg" href="del_his.php"role="button">Recycle Bin</a>
            |

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
            <th>edit</th>
            <th>delete</th>
        </tr>
    <?php foreach($datas as $data)
        {?>
        <tr>
            <td> <?php echo $data["number"]?></td>
            <td> <?php echo $data["name"]?></td>
            <td> <?php echo $data["location"]?></td>
            <td> <?php echo $data["promotion"]?></td>
            <td>  <a href="edit.php?number=<?php echo $data["number"]?>"data-lity>edit</a></td>
            <td>  <a href="del.php?number=<?php echo $data["number"]?>">delete</a></td>
            <td><input type="checkbox" name="value" value=<?php echo $data["number"]?>></td>
        </tr>
        <?php }
        ?>
         </table>
        </div>
    </div>
</div>

<?php include_once "footer.php";
?>
</body>
