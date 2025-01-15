<?php
include 'conexion.php';
include 'sesiones.php';
include 'imagenModificaciones.php';

$nombre = $_POST['nombre'];
$precio =  $_POST['precio'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];

$nombreArchivo = null;

//Asigna el nombre al archivo cargado desde el formulario
if (comprobarImagen($_FILES['file-upload']['type'])) {
    $nombreArchivo = subirImagen($_FILES['file-upload']['tmp_name'], $_FILES['file-upload']['name']);
}

//Verifica si el archivo a sido cargado para empezar con la consulta
if ($nombreArchivo != null) {

    try {
        $sql = mysqli_query($con, "INSERT INTO productos (Nombre, Descripcion, Stock, ImagenPrincipal, FechaUltimoCambio, Precio) VALUES ('$nombre', '$descripcion', $stock, '$nombreArchivo', NOW(), $precio )");
    }catch(Exception $e) {
        eliminarArchivo($nombreArchivo);
    }

    if ($sql) {
        echo ("producto agregado");
    } else {
        echo ("producto no agregado");
        eliminarArchivo($nombreArchivo);
    }
}

header("Location:../ingresarProductos.php");
die();