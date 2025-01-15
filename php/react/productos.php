<?php
include "../conexion.php";

header('Access-Control-Allow-Origin: *'); // Cambiar '*' por tu dominio en producción
header('Content-Type: application/json'); // Indicamos que la respuesta es JSON

$consulta = mysqli_query($con, "SELECT * FROM productos");
// $arrayConsulta[] = new ArrayObject();

while($row = mysqli_fetch_array($consulta)) $arrayConsulta[] = $row;

echo json_encode($arrayConsulta);