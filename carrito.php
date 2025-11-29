<?php include "php/elementosPredeterminados.php";
include "php/versiones.php";
include "php/conexion.php";
session_start(); 
sleep(1)
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
    <link rel="stylesheet" href="style/carrito.css?v=<?php echo $versionCarrito ?>">

    <script src="https://www.paypal.com/sdk/js?client-id=AYMRuReZsg7DOxNRN3coP-ML8T7K_-RDX04X3U1f3MwQ5NTHeXYUGmL41l_sA78xY0xJQDypcISCMVLA&currency=MXN"></script>
</head>

<body>

    <!-- Barra de navegacion -->
    <?php
    barraPredeterminada();
    ?>

    <!-- Contenedor de carrito -->
    <div class="contenedorCarrito">
        <?php
        $idUsuario = $_SESSION["datosSesion"]["IDUsuario"];
        $total = 0;
        $auxProductos = 0; //variable para la cuenta de los productos en carrito

        $consulta = pg_query(
            $con,
            "SELECT productos.ImagenPrincipal, productos.Nombre, productos.Descripcion, productos.Precio, carrito.cantidad, carrito.IDProducto        FROM carrito 
        INNER JOIN productos 
        ON productos.IDProducto = carrito.IDProducto 
        WHERE carrito.IdUsuario = $idUsuario"
        );

        while ($row = pg_fetch_assoc($consulta)) { ?>
            <div class="itemCarrito">
                <img src="src/productos/<?php echo $row[0] ?>" alt="">
                <div class="informacionCarrito">
                    <p class="tituloCarrito"><?php echo $row[1] ?></p>
                    <p class="infoProductoCarrito"><?php echo $row[2] ?></p>
                    <p class="precioProductoCarrito"><?php echo $row[3] ?></p>
                </div>
                <div class="cantidadCarrito">
                    <p id="cantidadParrafo<?php echo $auxProductos ?>"><?php echo $row[4] ?></p>
                    <input type="number" class="cantidadInput" id="cantidadInput<?php echo $auxProductos ?>" style="display:none;" value="<?php echo $row[4] ?>">
                    <button class="agregarCarrito" id="agregarCarrito<?php echo $auxProductos ?>">agregar</button>

                    <form id="formCambiarCantidad<?php echo $auxProductos ?>" action="php/carrito.php" style="display: none;" method="post">

                        <input style="display: none;" type="text" name="idProducto" value="<?php echo $row["idproducto"] ?>">
                        <input id="cantidadForm<?php echo $auxProductos ?>" style="display: none;" type="number" name="cantidad">

                        <button class="boton submitCambiarCantidad" id="submitCambiarCantidad<?php echo $auxProductos ?>" type="submit">Aceptar</button>
                    </form>

                    <form id="formEliminarProducto<?php echo $auxProductos ?>" action="php/eliminarProductoCarrito.php" method="post">
                        <input style="display: none;" type="text" name="idProducto" value="<?php echo $row["idproducto"] ?>">
                        <button id="eliminarCarrito<?php echo $auxProductos ?>" class="eliminarCarrito boton" id="submitEliminarCantidad" type="submit">Eliminar</button>
                    </form>

                    <button style="display: none;" class="cancelarModificacion boton" id="cancelarModificacion<?php echo $auxProductos ?>">Cancelar</button>
                </div>
            </div>
            <hr>
            <?php
            $total += $row[3] * $row[4];
            $auxProductos++;
            ?>
        <?php } ?>
    </div>


    <?php
    if ($auxProductos != 0) {
    ?>
        <div class="areaPedido">
            <h2>Total $<?php echo $total ?></h2>
            <form action="php/pedidoCorreo.php" method="post">
                <button class="boton" id="hacerPedido">Hacer Pedido</button>
            </form>
        </div>

        <div id="paypal">
            <div class="separador"></div> o <div class="separador"></div>

            <div id="paypalRender"></div>
        </div>
    <?php } else { ?>
        <div class="carritoVacio">
            <h1>Ingresa productos al carrito</h1>
            <script src="https://unpkg.com/@lottiefiles/lottie-player@2.0.8/dist/lottie-player.js"></script>
            <lottie-player src="https://lottie.host/798219b7-c6af-40b1-8134-57392b2a2ffd/zoBekKnv6H.json" background="##FFFFFF" speed="1" style="width: 100%; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
            <p>Los productos agregados podran ser vizualizados aqui</p>
        </div>
    <?php } ?>


    <!-- footer -->
    <?php
    footerPredeterminada();
    ?>
    <script>
        paypal.Buttons({

            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay',
                height: 40,
            },

            // Call your server to set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: <?php echo $total ?>
                        }
                    }]
                });
            },

            // Call your server to finalize the transaction
            onApprove: function(data, actions) {
                window.location.href = '/paginaWeb/php/pedido.php'
            },

            onCancel: function(data) {
                alert("pago cancelado")
            }

        }).render('#paypalRender');
    </script>

    <script src="js/cambiarCantidadCarrito.js"></script>
    <script src="js/recortarTextoCarrito.js"></script>
</body>

</html>