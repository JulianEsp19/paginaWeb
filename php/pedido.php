<?php
include "conexion.php";
session_start();

$id = $_SESSION["datosSesion"]["IDUsuario"];

$consulta = mysqli_query($con, "DELETE FROM carrito WHERE IdUsuario = $id");

if ($consulta) {
    echo "carrito eliminado";
} else {
    echo "productos carrito no eliminados";
}

header("Location:../carrito.php");