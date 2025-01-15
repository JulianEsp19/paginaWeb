<?php
include "conexion.php";
session_start();

if(isset($_SESSION["datosSesion"]["IDUsuario"])){
    $idUsuario = $_SESSION["datosSesion"]["IDUsuario"];
}else{
    echo '<script text="text/javascript">
        alert("Inicie sesion para poder hacer compras")
        window.location.href="../inicioSesion.php";
        </script>';
    die();
}

$indice = $_POST["idProducto"];

$sql = mysqli_query($con, 
"DELETE FROM carrito
    WHERE IDProducto = $indice 
    AND IdUsuario = $idUsuario");

if($sql) {
    echo "se elimino exitosamente";
}else {
    echo "no se ha borrado";
}

header('Location:' . getenv('HTTP_REFERER'));
die();