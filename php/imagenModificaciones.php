<?php
//Comprueba si la extension de la imagen es la correcta
function comprobarImagen($type)
{
    $extensiones = array(0 => 'image/jpg', 1 => 'image/jpeg', 2 => 'image/png');
    if (in_array($type, $extensiones)) {
        return true;
    }
    return false;
}

//Sube la imagen al directorio de productos 
function subirImagen($tmp_name, $name)
{
    $ruta_indexphp = dirname(realpath(__FILE__));
    $rutaDestino = $ruta_indexphp . '\\..\\src\\productos\\';

    $nuevoNombre = archivoExiste($rutaDestino, $name, 0);
    echo $nuevoNombre;

    if (move_uploaded_file($tmp_name, $rutaDestino . $nuevoNombre)) {
        echo 'Fichero guardado con éxito';
        return $nuevoNombre;
    } else {
        echo 'La imagen no se guardo';
    }
    return null;
}

//Funcion para eliminar el archivo en el directorio de productos
function eliminarArchivo($name){
    $ruta_indexphp = dirname(realpath(__FILE__));
    $rutaDestino = $ruta_indexphp . '\\..\\src\\productos\\';

    unlink($rutaDestino. $name);
}

//Verifica si el archivo con el nombre dado inicial ya existe y devuelve
//un nuevo nombre con un numero de control y asi no tener nombres duplicados
function archivoExiste($ruta, $name, $numeroControl)
{
    $nombreNuevo = $numeroControl . $name;

    if (file_exists($ruta . $numeroControl . $name)) {
        $nombreNuevo = archivoExiste($ruta, $name, $numeroControl + 1);
    }
    return $nombreNuevo;
}
