<?php

$ip=$_POST["ip"];
$usuario=$_POST["usuario"];
$pwd=$_POST["pwd"];
$bd=$_POST["bd"];

$link = mysqli_connect($ip, $usuario, $pwd);

if (empty($bd)){
    $database = mysqli_query($link, "show databases;");
    foreach ($database as $basededatos) {
        echo $basededatos["Database"];
    //var_dump($basededatos);
    echo "</br>";
    }
}else{
    $database = mysqli_query($link, "show tables from $bd;");
    foreach ($database as $table) {
        var_dump($table);
    // }
    // echo "<br>";
    // $database = mysqli_query($link, "use $bd describe dept;");
    // foreach ($database as $dept){
    //     var_dump($dept);
    }
}