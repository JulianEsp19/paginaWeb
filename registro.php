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
  <?php 
  barraPredeterminada();
  ?>

  <div class="form">
    <form class="cardRegistro" action="php/registro.php" method="post">
      <h1>Registrarse</h1>
      <div class="campos">
        <label for="" name="nombre" id="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required/>
      </div>
      <div class="campos">
        <label for="" name="correo" id="correo">Correo:</label>
        <input type="text" name="correo" id="correo" required/>
      </div>
      <div class="campos">
        <label for="" name="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" required/>
      </div>
      <div class="campos">
        <label for="" name="repetirContrasena">Repetir Contraseña:</label>
        <input type="password" name="repetirContrasena" id="repetirContrasena" required/>
        <p id="advertenciasJS"></p>
      </div>
      <button id="enviarJS" type="submit" disabled>ENVIAR</button>
    </form>
  </div>

  <script src="js/passwordSame.js"></script>
</body>

</html>