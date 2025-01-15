<?php
include 'conexion.php';
include 'sesiones.php';

$nombre = $_POST['nombre'];
$correo =  $_POST['correo'];
$contrasena = $_POST['contrasena'];

$sql = mysqli_query($con, "INSERT INTO usuarios (Nombre,Correo,Contrasena) VALUES ('$nombre', '$correo', '$contrasena')");

if ($sql) {
    echo ("Usuario agregado");
    iniciarSesionRegistro($nombre, $correo, $contrasena);
} else {
    echo ("Usuario no agregado");
}

header("Location:../index.php");
die();
