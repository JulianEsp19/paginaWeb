<?php
$server = "postgresql://web_data_base_23110304_user:DLesf9WDIIwhw9Lan77mJBt0drjjw76h@dpg-d4iak9re5dus7385ktpg-a/web_data_base_23110304";
$user = "web_data_base_23110304_user";
$db = "web_data_base_23110304";
$passwd = "DLesf9WDIIwhw9Lan77mJBt0drjjw76h";

$con = pg_connect("host=$server dbname=$db user=$user password=$passwd");

if($con){
    // echo("Conexion exitosa");
}else{
    // echo("Conexion fallida");
}
