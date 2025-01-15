<?php
$server = "127.0.0.1:3307";
$user = "root";
$db = "webdatabase";
$passwd = "";

$con = mysqli_connect($server, $user, $passwd, $db);

if($con){
    // echo("Conexion exitosa");
}else{
    // echo("Conexion fallida");
}
