<?php include "php/elementosPredeterminados.php";
include "php/conexion.php";
include "php/versiones.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
  <title>Document</title>

  <script src="js/formatPrecio.js"></script>
</head>

<body>
  <!-- Barra de navegacion -->
  <?php
  barraPredeterminada();
  ?>

  <!-- Productos -->
  <div class="productosContainer">

    <?php
    $sql = pg_query($con, "SELECT * FROM productos");
    ?>
    <?php while ($row = pg_fetch_assoc($sql)) { ?>
      <article class="tarjeta">
        <input class="getProducto" style="display: none;" type="text" value="<?php echo "?id=" . $row["IDProducto"] . "&nombre=" . $row["Nombre"] ?>">
        <img src="src/productos/<?php echo $row["ImagenPrincipal"] ?>" alt="">
        <div class="contenedor">
          <h1 class="tituloProducto"><?php echo $row["Nombre"] ?></h1>
          <p id="precio"><?php echo $row["Precio"] ?></p>
          <p><?php echo $row["Descripcion"] ?></p>
          <form action="php/carrito.php" method="post">
            <input style="display: none;" type="text" name="idProducto" value="<?php echo $row["IDProducto"] ?>">
            <button type="submit">Agregar</button>
          </form>
        </div>
      </article>
    <?php } ?>
  </div>

  <?php footerPredeterminada(); ?>
  
  <script>
    precios = document.querySelectorAll("#precio")
    precios.forEach(element => {
      formatearPrecio(element)
    });
  </script>
  <script src="js/recortarTextoProductos.js"></script>
  <script src="js/GETproducto.js"></script>
</body>

</html>
