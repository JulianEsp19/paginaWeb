<?php
include "../conexion.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);


    $email = $data['email'] ?? 'Desconocido';
    $password = $data['password'] ?? 'password';

    $consulta = mysqli_query($con, "SELECT * FROM usuarios WHERE Correo='$email' AND Contrasena='$password'");

    if ($consulta) {

        while ($row = mysqli_fetch_array($consulta)) $arrayConsulta[] = $row;

        echo json_encode($arrayConsulta);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
