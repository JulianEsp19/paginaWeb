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



$sql = pg_query($con, 
"SELECT * FROM carrito 
    WHERE idusuario = $idUsuario 
    AND idproducto = $idProducto");

if(pg_affected_rows($sql) == 0){
    $agregarProducto = pg_query($con, 
    "INSERT INTO carrito(idusuario, idproducto, cantidad)
    VALUES ($idUsuario, $idProducto, 1)");
}else if(isset($cantidad)){
    $cambiaProductoConCantidad = pg_query($con,
    "UPDATE carrito
    SET cantidad = $cantidad
    WHERE idusuario = $idUsuario 
    AND idproducto = $idProducto");
}else{
    $cambiaProducto = mysqli_query($con,
    "UPDATE carrito
    SET cantidad = cantidad+1
    WHERE idusuario = $idUsuario 
    AND idproducto = $idProducto");
}

header('Location:' . getenv('HTTP_REFERER'));
die();