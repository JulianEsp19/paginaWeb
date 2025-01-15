<?php
include "php/versiones.php";
include "php/conexion.php";

$idProducto = $_POST["indiceProducto"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/registro.css?v=<?php echo $versionRegistro ?>">
    <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
    <title>Document</title>
</head>

<body>

    <?php
    $consulta = mysqli_query($con, "SELECT * FROM imagenesProductos WHERE IDProducto = $idProducto");
    ?>

    <a href="productosAdmin.php" id="regresar">Cancelar edicion</a>

    <div class="form editarProducto">
        <form class="cardRegistro cardIngresarProducto" enctype="multipart/form-data" action="php/ingresarImagenProducto.php" method="post">

            <h1>Ingresar imagen</h1>

            <div class="contenedorCampos ingresarImagenProducto">

                <input type="number" style="display: none;" name="idProducto" value="<?php echo $idProducto ?>">

                <!-- Area de input de imagen -->
                <div class="camposDerecha ">
                    <div class="campos">
                        <label for="" name="imagen" id="imagen">Imagen:</label>
                        <label for="file-upload" class="custom-file-upload">
                            subir imagen
                        </label>
                        <input id="file-upload" name="file-upload" type="file" accept=".png, .jpg, .jpeg" onchange="previewImage(event, '#previsualizacionImagen')" />
                        <img src="src/productos/<?php echo $imagenPrincipal ?>" alt="" id="previsualizacionImagen">
                    </div>
                </div>

            </div>

            <button id="enviarJS" type="submit">ENVIAR</button>
        </form>
    </div>

    <div class="imagenesDeProducto">
        <?php while ($row = mysqli_fetch_array($consulta)) { ?>
            <div class="imagenProductoContainer">
                <img src="src/productos/<?php echo $row["ruta"] ?>" alt="">
                <div class="imagenFormsContainer">
                    <form action="php/eliminarImagenProducto.php" method="post">
                        <input class="inputProductosAdmin" type="text" name="rutaImagen" value="<?php echo $row["ruta"] ?>">
                        <button class="botonesProductosAdmin" id="eliminar" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>

    <script src="js/imagenFormulario.js"></script>
</body>

</html>