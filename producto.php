<?php include "php/elementosPredeterminados.php";
include "php/versiones.php";
include "php/conexion.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
    <link rel="stylesheet" href="style/producto.css?v=<?php echo $versionProducto ?>">
    <script src="js/formatPrecio.js"></script>
</head>

<body>

    <?php
    $id = $_GET["id"];
    $nombre = $_GET["nombre"];

    $consultaProductos = mysqli_query($con, "SELECT * FROM productos WHERE IDProducto = $id");
    $consultaImagenes = mysqli_query($con, "SELECT ruta FROM imagenesProductos WHERE IDProducto = $id");

    $arregloConsulta = mysqli_fetch_array($consultaProductos);
    ?>

    <!-- Barra de navegacion -->
    <?php
    barraPredeterminada();
    ?>
    <div class="containerProducto">
        <div class="imagenesMuestra">
            <div class="imagenes" style="background-image: url('src/productos/<?php echo $arregloConsulta["ImagenPrincipal"]?>')"></div>
            <?php while($row = mysqli_fetch_array($consultaImagenes)){ ?>
                <div class="imagenes" style="background-image: url('src/productos/<?php echo $row['ruta'] ?>"></div>
            <?php } ?>
        </div>
        <div class="imagenPrincipal">
            <img id="imagenVista" src="src/productos/<?php echo $arregloConsulta["ImagenPrincipal"] ?>" alt="">
        </div>
        <div class="informacionPrincipal">
            <h1><?php echo $nombre ?></h1>
            <p id="precioInformacion"><?php echo $arregloConsulta['Precio'] ?></p>

            <form action="php/carrito.php" method="post">
                <input style="display: none;" type="text" name="idProducto" value="<?php echo $arregloConsulta["IDProducto"] ?>">
                <button class="boton botonAgregarCarrito" type="submit">Agregar al carrito</button>
            </form>

            <div class="containerInformacionPedido">
                <div class="informacionPedido">
                    <img src="src/icon/garantia.png" alt="">
                    <p>Calidad garantizada</p>
                </div>
                <div class="informacionPedido">
                    <img src="src/icon/entrega.png" alt="">
                    <p>Entrega gratis a partir $400.00</p>
                </div>
                <div class="informacionPedido">
                    <img src="src/icon/devolucion-de-dinero.png" alt="">
                    <p>Devolucion de dinero en los primeros 15 dias</p>
                </div>
            </div>
        </div>
    </div>

    <div class="descripcionProducto">
        <h2>Descripcion</h2>
        <p><?php echo $arregloConsulta["Descripcion"] ?></p>
    </div>

    <div class="descripcion"></div>
    <!-- footer -->
    <?php
    footerPredeterminada();
    ?>

    <script>
        formatearPrecio(document.querySelector("#precioInformacion"))
    </script>

    <script src="js/cambiarImagenProducto.js"></script>
</body>

</html>