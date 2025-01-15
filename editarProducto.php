<?php
include "php/versiones.php";

$idProducto = $_POST["IDProducto"];
$nombre = $_POST["Nombre"];
$descripcion = $_POST["Descripcion"];
$stock = $_POST["Stock"];
$imagenPrincipal = $_POST["ImagenPrincipal"];
$precio = $_POST["Precio"];
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

  <a href="productosAdmin.php" id="regresar">Cancelar edicion</a>

  <div class="form editarProducto">
    <form class="cardRegistro cardIngresarProducto" enctype="multipart/form-data" action="php/editarProducto.php" method="post">

      <h1>Editar producto</h1>

      <div class="contenedorCampos">

        <!-- Area para la agregacion de datos -->
        <div class="camposIzquierda">
          <input class="inputProductosAdmin" type="text" name="IDProducto" value="<?php echo $idProducto ?>"/>
          <input class="inputProductosAdmin" type="text" name="imagenAntigua" value="<?php echo $imagenPrincipal ?>"/>
          <div class="campos">
            <label for="" name="nombre" id="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" required />
          </div>
          <div class="campos">
            <label for="" name="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="<?php echo $precio ?>" required />
          </div>
          <div class="campos">
            <label for="" name="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" required><?php echo $descripcion ?></textarea>
          </div>
          <div class="campos">
            <label for="" name="stock">Stock:</label>
            <input type="number" name="stock" id="stock" value="<?php echo $stock ?>" required />
          </div>
        </div>

        <!-- Area de input de imagen -->
        <div class="camposDerecha">
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

  <script src="js/imagenFormulario.js"></script>
</body>

</html>