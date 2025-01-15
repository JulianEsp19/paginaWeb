<!DOCTYPE html>
<?php include "php/elementosPredeterminados.php";
include "php/versiones.php";
include "php/conexion.php"; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css?v=<?php echo $versionStyle ?>" />
    <title>Document</title>
</head>

<body>
    <!-- Barra de navegacion -->
    <?php barraPredeterminada(); ?>
    <div class="containerData">
        <?php
        $sql = mysqli_query($con, "SELECT * FROM productos")
        ?>

        <div class="table-container">
            <table id="tablaProductos">
                <thead>
                    <tr id="cabecera">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Stock</th>
                        <th>Imagen Principal</th>
                        <th>Fecha Ultimo Cambio</th>
                        <th>Precio</th>
                        <th>Cambios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) { ?>
                        <tr>
                            <td><?php echo $row["IDProducto"] ?></td>
                            <td><?php echo $row["Nombre"] ?></td>
                            <td><?php echo $row["Descripcion"] ?></td>
                            <td><?php echo $row["Stock"] ?></td>
                            <td><?php echo $row["ImagenPrincipal"] ?></td>
                            <td><?php echo $row["FechaUltimoCambio"] ?></td>
                            <td><?php echo $row["Precio"] ?></td>
                            <td>
                                <form action="editarProducto.php" method="post">
                                    <input class="inputProductosAdmin" type="text" name="IDProducto" value="<?php echo $row["IDProducto"] ?>">
                                    <input class="inputProductosAdmin" type="text" name="Nombre" value="<?php echo $row["Nombre"] ?>">
                                    <input class="inputProductosAdmin" type="text" name="Descripcion" value="<?php echo $row["Descripcion"] ?>">
                                    <input class="inputProductosAdmin" type="text" name="Stock" value="<?php echo $row["Stock"] ?>">
                                    <input class="inputProductosAdmin" type="text" name="ImagenPrincipal" value="<?php echo $row["ImagenPrincipal"] ?>">
                                    <input class="inputProductosAdmin" type="text" name="Precio" value="<?php echo $row["Precio"] ?>">
                                    <button class="botonesProductosAdmin" id="editar" type="submit">Editar</button>
                                </form>
                                <form action="php/eliminarProducto.php" method="post">
                                    <input class="inputProductosAdmin" type="text" name="indiceProducto" value="<?php echo $row["IDProducto"] ?>">
                                    <input class="inputProductosAdmin" type="text" name="ruta" value="<?php echo $row["ImagenPrincipal"] ?>">
                                    <button class="botonesProductosAdmin" id="eliminar" type="submit">Eliminar</button>
                                </form>
                                <form action="ingresarImagenProducto.php" method="post">
                                    <input class="inputProductosAdmin" type="text" name="indiceProducto" value="<?php echo $row["IDProducto"] ?>">
                                    <button class="botonesProductosAdmin" id="anadir" type="submit">Editar Imagenes</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>