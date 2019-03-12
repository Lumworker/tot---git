<?php
    
    require("libs/Medoo.php");
    include("connect/configmedoo.php");
    
    $pageTitle = "Search";
    $show = 1;
    
    include_once "header.php";
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
        "OR" => [
            "number[~]"  => $q,
            "promotion[~]"  => $q
        ]
    ]);
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <div id="app">
        <input type="text" v-model="value">
        <div v-for="i in x" v-if="value == i.number">
            {{i.number}}{{i.name}}
            <hr>
        </div>
    </div>
    <script>
        var app = new Vue({
            el: '#app',
            data:{
                value:109,
                x:<?php echo json_encode($datas)?>
            }
        })
    </script>