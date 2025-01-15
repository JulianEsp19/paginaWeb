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

    <div class="toggleContainer">
        <input type="checkbox" id="switch" class="toggle">
        <label for="switch" class="switch"></label>
    </div>


    <!-- tabla de informacion -->
    <div class="containerData bitacora">
        <?php
        $sql = mysqli_query($con, "SELECT * FROM bitacora")
        ?>

        <div class="table-container">
            <table id="tablaProductos">
                <thead>
                    <tr id="cabecera">
                        <th>Id</th>
                        <th>Accion</th>
                        <th>Fecha</th>
                        <th>Sentencia</th>
                        <th>Contra Sentencia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) { ?>
                        <tr class="diferencia-<?php echo $row["diferencia"] ?>">
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["accion"] ?></td>
                            <td><?php echo $row["fecha"] ?></td>
                            <td><?php echo $row["sentencia"] ?></td>
                            <td><?php echo $row["contraSentencia"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="js/cambioBitacora.js"></script>
</body>

</html>