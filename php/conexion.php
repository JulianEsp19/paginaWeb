<?php
$host = "dpg-d4iak9re5dus7385ktpg-a.oregon-postgres.render.com";
$db = "web_data_base_23110304";
$user = "web_data_base_23110304_user";
$passwd = "DLesf9WDIIwhw9Lan77mJBt0drjjw76h";
$port = "5432";

$connection_string = "host=$host port=$port dbname=$db user=$user password=$passwd sslmode=require";

$con = pg_connect($connection_string);

if (!$con) {
    echo "Conexion fallida";
} else {
    echo "Conexion exitosa";
}
