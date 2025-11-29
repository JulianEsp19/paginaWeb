<?php
include 'conexion.php';
include 'sesiones.php';

$correo = $_POST['correo'];
$contrasena =  $_POST['contrasena'];

$sql = pg_query($con, "SELECT * FROM usuarios WHERE correo='$correo' AND contrasena='$contrasena'");

if (pg_affected_rows($sql) != 0) {
    iniciarSesion($sql);
    header("Location:../index.php");
} else {
    echo ("sesion no iniciada");
    header("Location:../index.php");
}

die();

