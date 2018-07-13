<?php

$data = isset($data)?$data:"";
$name = isset($data["name"])?$data["name"]:"";
$number = isset($data["number"])?$data["number"]:"";
$location = isset($data["location"])?$data["location"]:"";
$promotion = isset($data["promotion"])?$data["promotion"]:"";

$pro = array("คิดตาม promotion","3 บาท/ครั้ง", "3 บาท/นาที", "6 บาท/นาที","ฟรี","อื่นๆ");
$prolength = count($pro)
?>
<div class="container" style="padding: 20px 0">
<form action="<?php echo $action?>.php" method="post" target="_parent">
    <h0 class="display-4"><?php echo $action?></h0>
    <hr class="my-">
    <label for="number">number</label>
    <input class="form-control" name="number" placeholder="number" type="number" value="<?php echo $number?>" required>
    <label for="name">name</label>
    <input class="form-control" name="name" placeholder="name" type="text" value="<?php echo $name?>" required>
    <label for="location">location</label>
    <input class="form-control" name="location" placeholder="location" type="textarea" value="<?php echo $location?>" required>
    <label for="promotion">promotion</label>
    <div  id="">
    <select id="target" name="promotion" class="form-control"  required>
    <?php
        for($x = 0; $x < $prolength; $x++){
    ?>
        <option value="<?php echo $pro[$x]?>" <?php echo $pro[$x]==$promotion?"selected":""; ?>><?php echo $pro[$x]?></option>
    
        <?php } ?>
    </select>
    </div>
    <!-- <input type="text" id="ot" name="promotion" >
    <input type="hidden" name="number"  value="</?php echo $number?>"> -->
    <br>
    <input class="btn btn-primary" type="submit" value="Submit">
</form>
</div>
<script>
$( document ).ready(function() {
    var target = $('#target').val();
    var ot = $('#ot');
    ot.hide();
    $( "#target" ).change(function() { 
        
            if(this.value=="อื่นๆ"){
                    this.ot.show();
            }else{
                this.ot.hide();
            }
        }
    });
     
     });
   

</script>