<?php
  // require("libs/Medoo.php");
  // include("connect/configmedoo.php");
  //
$show = 3;
$pageTitle = 'FETCH';
include_once "header.php";
echo "<link rel=\"stylesheet\" href=\"https://use.fontawesome.com/releases/v5.1.1/css/all.css\" integrity=\"sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ\" crossorigin=\"anonymous\">";

require_once 'Classes/PHPExcel.php';

  // we can combine this with file upload //
if (empty($_FILES)) {
  echo "
      <form method='post' enctype='multipart/form-data' action='datafetch.php' class='importdata'>
      <img src='assets/images/excellogo.png' alt='excellogo' width='50%' height='50%'><br>
      <input type='file' name='excel' class='fileExcel'>
      <br><br>
      <button type='submit' class='fetch' onclick='clickTime()'>:::::> GO <:::::</button>
      </form>
      <br><div id='time' class='fas'></div>
    ";

} else if (!empty($_FILES)) {
  $database = mysqli_connect("localhost", "root", "12345678", "tot");
  mysqli_set_charset($database, "utf8");
  $database->query("set name utf8");
  date_default_timezone_set("Asia/Bangkok");
  $date = date("Y-m-d H:i:s");

    // $checkdata = "SELECT * FROM data_tot";
    // $Qcheckdata = mysqli_query($database, $checkdata);
    // if (!empty($Qcheckdata)) {


  $queryCD = mysqli_query($database, "SELECT COUNT(DISTINCT `deleated_at`) FROM `data_tot`");

  $changedatedata = mysqli_query($database, "SELECT `deleated_at` FROM data_tot");
      // $dateDel = mysqli_query($database, "SELECT `deleated_at` FROM data_tot WHERE `deleated_at` IS NOT NULL");

  if ($queryCD == 1) {
    mysqli_query($database, "DELETE FROM `data_tot` WHERE `deleated_at` IS NOT NULL");
  }
  if (!empty($changedatedata)) {
    $deldata = "UPDATE `data_tot` SET `deleated_at`='$date' WHERE `deleated_at` IS NULL";
    mysqli_query($database, $deldata);
  }


    // load excel file using PHPExcel's IOFactory //
    // change filename to tmp_name of uploaded file //
  $excel = PHPExcel_IOFactory::load($_FILES['excel']['tmp_name']);

    // set active sheet to first sheet //
  $excel->setActiveSheetIndex(1);

    // first row of data series //
  $i = 4;

    // loop until the end of data series (cell contains empty string) //
  while ($excel->getActiveSheet()->getCell('A' . $i)->getValue() != "") {
      // get cell value
    $number = $excel->getActiveSheet()->getCell('A' . $i)->getValue();
    $name = $excel->getActiveSheet()->getCell('C' . $i)->getValue();
    $location = $excel->getActiveSheet()->getCell('D' . $i)->getValue();
    $promotion = $excel->getActiveSheet()->getCell('E' . $i)->getValue();
    $query = "INSERT INTO data_tot(number, name, location, promotion, deleated_at)
                VALUES('$number', '$name', '$location', '$promotion', Null)";
    mysqli_query($database, $query);
    $i++;
  }
  $queryChange = "UPDATE `data_tot` SET `promotion`='ฟรี' WHERE `promotion` LIKE '%Non Charge%'";
  mysqli_query($database, $queryChange);
  $queryChange = "UPDATE `data_tot` SET `promotion`='ฟรี' WHERE `promotion`='-'";
  mysqli_query($database, $queryChange);
  $queryChange = "UPDATE `data_tot` SET `promotion`='ฟรี' WHERE `promotion` LIKE '%ยกเว้นอัตราค่าบริการ%'";
  mysqli_query($database, $queryChange);
  $queryChange = "UPDATE `data_tot` SET `promotion`='1 บาท/นาที' WHERE `promotion` LIKE '%1 บาท%'";
  mysqli_query($database, $queryChange);
  $queryChange = "UPDATE `data_tot` SET `promotion`='3 บาท/ครั้ง' WHERE `promotion` LIKE '%3 บาทต่อครั้ง%'";
  mysqli_query($database, $queryChange);
  $queryChange = "UPDATE `data_tot` SET `promotion`='6 บาท/นาที' WHERE `promotion` LIKE '%6 บาท%'";
  mysqli_query($database, $queryChange);
  $queryChange = "UPDATE `data_tot` SET `promotion`='อื่นๆ' WHERE `promotion` LIKE '%บาท%' AND NOT `promotion`='1 บาท/นาที'
      AND NOT `promotion`='3 บาท/ครั้ง' AND NOT `promotion`='3 บาท/นาที' AND NOT `promotion`='6 บาท/นาที'";
  mysqli_query($database, $queryChange);

  $queryChange = "UPDATE `data_tot` SET `promotion`='คิดตามโปรโมชั่น' WHERE NOT `promotion`='ฟรี'
                      AND NOT `promotion`='1 บาท/นาที' AND NOT `promotion`='3 บาท/ครั้ง' AND NOT `promotion`='6 บาท/นาที'
                      AND NOT `promotion`='-' AND NOT `promotion`='3 บาท/นาที' AND NOT `promotion`='อื่นๆ'";
  mysqli_query($database, $queryChange);

  header("Location: index.php");
} else {
  echo "ERROR";
}
?>
<style media="screen">
  body{
    background: linear-gradient(#2E7D32, #4CAF50);
  }
  .importdata{
    /* width: 80%; */
    /* border: 1px #000 solid; */
    margin: auto;
    padding: 50px;
    text-align: center;
  }
  .fileExcel{
    font-size: 24px;
    padding: 10px;
    border: 1px #ccc solid;
    background-color: #fff;
  }
  .fetch{
    color: #FFEB3B;
    text-shadow: 0px 0px 1px #ccc;
    font-size: 24px;
    padding: 10px;
    border: 1px #004D40 solid;
    border-radius: 5px;
    background: linear-gradient(#1B5E20, #388E3C);
    box-shadow: 0px 0px 0px 1px #333;
  }
  .fetch:hover{
    color: #fff;
    border: 1px #000 solid;
    background: linear-gradient(#004D40, #1B5E20);
  }
  #time{
    color: #004D40;
    text-shadow: #004D40;
    font-size: 240px;
    text-align: center;
    background: linear-gradient(#00C853, #00E676);
    border: 5px #004D40 solid;
    border-radius: 10px;
    padding: 100px;
    display: none;
    position: absolute;
    left: 30%;
    top: 5%;
  }
</style>

<script type="text/javascript">
  function clickTime(){
    document.getElementById('time').style.display='block';
  }
  // Time Change Animation
  function timeChange(){
    let time = document.getElementById('time');
    setTimeout(function(){
      time.innerHTML = "&#xf251;";
    },1000);
    setTimeout(function(){
      time.innerHTML = "&#xf252;";
    },3000);
    setTimeout(function(){
      time.innerHTML = "&#xf253;";
    },5000);
  }
  // Call Animation
  timeChange();
  // Animate Every 2 Seconds
  setInterval(timeChange, 5000);
</script>
