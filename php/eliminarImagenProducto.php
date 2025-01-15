<?php
include "conexion.php";
include "imagenModificaciones.php";

$ruta = $_POST["rutaImagen"];

$consulta = mysqli_query($con, "DELETE FROM imagenesProductos WHERE ruta = '$ruta'");

if($consulta){
    echo "se ha eliminado con exito";
    eliminarArchivo($ruta);
}else{
    echo "no se ha podido eliminar";
}

header("Location:../productosAdmin.php");
die();