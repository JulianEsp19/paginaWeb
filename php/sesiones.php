<?php

function iniciarSesion($result) {
    
    session_start();

    $datos = pg_fetch_row($result);

    $_SESSION["datosSesion"]["IDUsuario"] = $datos[0];
    $_SESSION["datosSesion"]["Nombre"] = $datos[1];
    $_SESSION["datosSesion"]["Correo"] = $datos[2];
    $_SESSION["datosSesion"]["Contrasena"] = $datos[3];
    $_SESSION["datosSesion"]["Permiso"] = $datos[4];
}

function iniciarSesionRegistro(string $nombre, string $correo, string $contrasena){

    session_start();

    $_SESSION["datosSesion"]["IDUsuario"] = getIdUsuario($nombre, $correo, $contrasena);
    $_SESSION["datosSesion"]["Nombre"] = $nombre;
    $_SESSION["datosSesion"]["Correo"] = $correo;
    $_SESSION["datosSesion"]["Contrasena"] = $contrasena;
    $_SESSION["datosSesion"]["Permiso"] = 0;
}

function getIdUsuario(string $nombre, string $correo, string $contrasena){
    include "conexion.php";

    $consultaUsuario = mysqli_query($con, "SELECT IdUsuario FROM usuarios 
    WHERE Correo='$correo' AND Contrasena='$contrasena' AND Nombre='$nombre'");

    $resultados = mysqli_fetch_row($consultaUsuario);

    return $resultados[0];
}