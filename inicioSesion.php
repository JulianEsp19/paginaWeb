<?php include "php/elementosPredeterminados.php";
include "php/versiones.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
  <link rel="stylesheet" href="style/registro.css?v=<?php echo $versionRegistro ?>" />
  <title>Document</title>
</head>

<body class="body">
  <!-- Barra de navegacion -->
  <?php
  barraPredeterminada();
  ?>


  <div class="form">
    <form class="cardRegistro" action="php/inicioSesion.php" method="post">
      <h1>Iniciar sesion</h1>
      <div class="campos camposInicio">
        <label for="" name="correo">Correo:</label>
        <input type="text" name="correo" id="correo" required />
      </div>
      <div class="campos camposInicio">
        <label for="" name="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required />
      </div>
      <button type="submit">ENVIAR</button>
    </form>
  </div>
</body>

</html>