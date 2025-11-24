<?php
$server = "postgresql://dpg-d4iak9re5dus7385ktpg-a.oregon-postgres.render.com";
$user = "web_data_base_23110304_user";
$port = "5432";
$db = "web_data_base_23110304";
$passwd = "DLesf9WDIIwhw9Lan77mJBt0drjjw76h";

$con = pg_connect("host=$server port=$port dbname=$db user=$user password=$passwd sslmode=require");

if($con){
    // echo("Conexion exitosa");
}else{
    // echo("Conexion fallida");
}
