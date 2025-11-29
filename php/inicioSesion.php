<?php
include 'conexion.php';
include 'sesiones.php';

$correo = $_POST['correo'];
$contrasena =  $_POST['contrasena'];

$sql = pg_query($con, "SELECT * FROM usuarios WHERE Correo='$correo' AND Contrasena='$contrasena'");

if (pg_affected_rows($sql) != 0) {
    echo ("sesion iniciada");
    iniciarSesion($sql);
    header("Location:../index.php");
} else {
    echo ("sesion no iniciada");
    header("Location:inicioSesionAdministrador.php");
}

die();

