<?php
session_start();

?>
<html>
<head>
    <title><?php echo $pageTitle?> | TOT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        .lity-iframe-container {
            border-radius: 20px;
        }
    </style>
</head>
<body>
<?php

    if($show==1) {
        if(!$_SESSION['uid']){
            header("Location:_formlogin.php");}
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">TOT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Promotionlist
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?q=ฟรี">โทรฟรี</a>
                            <a class="dropdown-item" href="index.php?q=3 บาท/ครั้ง">3 บาท/ครั้ง</a>
                            <a class="dropdown-item" href="index.php?q=3 บาท/นาที">3 บาท/นาที</a>
                            <a class="dropdown-item" href="index.php?q=6 บาท/นาที">6 บาท/นาที</a>
                            <a class="dropdown-item" href="index.php?q=คิดตาม promotion">คิดตาม promotion</a>
                            <a class="dropdown-item" href="index.php?q=อื่นๆ">อื่นๆ</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php">โปรโมชั่นทั้งหมด</a>
                        </div>
                    </li>
                </ul>
            <?php
                $datas = $database->select("userdata",[
                    "username",
                    "img_path",
                    "status"
                ], [
                    "user_id" => $_SESSION['uid']
                ]);
                $name=$datas[0]['username'];
                $img_path=$datas[0]['img_path'];
                $status=$datas[0]['status'];


            ?>

            <span class="badge badge-pill badge-warning">welcome <?php echo $name; ?> </span>
            <div class="dropdown">

            <img  src="<?php echo $img_path?>"  width="55px" height="auto" alt="Card image cap"   data-toggle="dropdown" ><br>
                <span class="caret"></span></button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="_formuseredit.php" data-lity>Profile (<?= $datas[0]['status'] ?>)</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php" style="color:red;">logout</a>
            </div>
            </div>
                <form class="form-inline my-2 my-lg-0" action="index.php" METHOD="get">
                    <input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
        <hr>
                </ol>
            </nav>
        </div>
        <?php
    }
?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.3.1/lity.min.js"></script>
