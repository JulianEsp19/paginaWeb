<!DOCTYPE html>
<?php include "php/elementosPredeterminados.php";
include "php/versiones.php";?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/registro.css?v=<?php echo $versionRegistro ?>" />
  <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
  <title>Document</title>
</head>

<body class="body">

  <!-- Barra de navegacion -->
  <?php barraPredeterminada();?>

  <div class="form">
    <form class="cardRegistro cardIngresarProducto" enctype="multipart/form-data" action="php/ingresarProducto.php" method="post">

      <h1>Ingresar nuevo producto</h1>

      <div class="contenedorCampos">

        <!-- Area para la agregacion de datos -->
        <div class="camposIzquierda">
          <div class="campos">
            <label for="" name="nombre" id="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required />
          </div>
          <div class="campos">
            <label for="" name="precio">Precio:</label>
            <input type="number" name="precio" id="precio" required />
          </div>
          <div class="campos">
            <label for="" name="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" required></textarea>
          </div>
          <div class="campos">
            <label for="" name="stock">Stock:</label>
            <input type="number" name="stock" id="stock" required />
          </div>
        </div>

        <!-- Area de input de imagen -->
        <div class="camposDerecha">
          <div class="campos">
            <label for="" name="imagen" id="imagen">Imagen:</label>
            <label for="file-upload" class="custom-file-upload">
              subir imagen
            </label>
            <input id="file-upload" name="file-upload" type="file" accept=".png, .jpg, .jpeg" onchange="previewImage(event, '#previsualizacionImagen')" required />
            <img src="" alt="" id="previsualizacionImagen">
          </div>
        </div>

      </div>

      <button id="enviarJS" type="submit">ENVIAR</button>
    </form>
  </div>

  <script src="js/imagenFormulario.js"></script>
</body>

</html>