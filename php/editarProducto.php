<?php

include "conexion.php";
include "imagenModificaciones.php";

$idProducto = $_POST["IDProducto"];
$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"];
$stock = $_POST["stock"];
$precio = $_POST["precio"];

$imagenAntigua = $_POST["imagenAntigua"];

$nombreArchivo = null;

if (isset($_FILES["file-upload"]["name"])) {
    if (comprobarImagen($_FILES['file-upload']['type'])) {
        $nombreArchivo = subirImagen($_FILES['file-upload']['tmp_name'], $_FILES['file-upload']['name']);
        try {
            $sql = mysqli_query($con, "UPDATE productos
            SET ImagenPrincipal = '$nombreArchivo'
            WHERE IDProducto = $idProducto");
            eliminarArchivo($imagenAntigua);
        } catch (Exception $e) {
            eliminarArchivo($nombreArchivo);
        }
    }
    echo "el archivo existe";
}

$sql = mysqli_query(
    $con,
    "UPDATE productos
SET Nombre = '$nombre', Descripcion = '$descripcion', Stock = $stock,
Precio = $precio, FechaUltimoCambio = NOW()
WHERE IDProducto = $idProducto"
);

header("Location:../productosAdmin.php");
die();