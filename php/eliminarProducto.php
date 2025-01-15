<?php
include "conexion.php";
include "imagenModificaciones.php";

$indice = $_POST["indiceProducto"];
$ruta = $_POST["ruta"];

$sql = mysqli_query($con, "DELETE FROM productos WHERE IDProducto = $indice");

if($sql) {
    echo "se elimino exitosamente";
    eliminarArchivo($ruta);
    header("Location:../productosAdmin.php");
}else {
    echo "no se ha borrado";
}

die();