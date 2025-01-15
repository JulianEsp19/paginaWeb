<?php
include "conexion.php";
session_start();

$idProducto = $_POST["idProducto"];

$cantidad = 1;

if(isset($_POST["cantidad"])){
    $cantidad = $_POST["cantidad"];
}

if(isset($_SESSION["datosSesion"]["IDUsuario"])){
    $idUsuario = $_SESSION["datosSesion"]["IDUsuario"];
}else{
    echo '<script text="text/javascript">
        alert("Inicie sesion para poder hacer compras")
        window.location.href="../inicioSesion.php";
        </script>';
    die();
}



$sql = mysqli_query($con, 
"SELECT * FROM carrito 
    WHERE IdUsuario = $idUsuario 
    AND IDProducto = $idProducto");

if(mysqli_num_rows($sql) == 0){
    $agregarProducto = mysqli_query($con, 
    "INSERT INTO carrito(IdUsuario, IDProducto, cantidad)
    VALUES ($idUsuario, $idProducto, 1)");
}else if(isset($cantidad)){
    $cambiaProductoConCantidad = mysqli_query($con,
    "UPDATE carrito
    SET cantidad = $cantidad
    WHERE IdUsuario = $idUsuario 
    AND IDProducto = $idProducto");
}else{
    $cambiaProducto = mysqli_query($con,
    "UPDATE carrito
    SET cantidad = cantidad+1
    WHERE IdUsuario = $idUsuario 
    AND IDProducto = $idProducto");
}

header('Location:' . getenv('HTTP_REFERER'));
die();