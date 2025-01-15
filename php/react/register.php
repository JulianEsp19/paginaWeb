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
    $nombre = $data['name'] ?? 'none';
    $password = $data['password'] ?? 'password';

    $consulta = mysqli_query($con, "INSERT INTO usuarios (Nombre,Correo,Contrasena) VALUES ('$nombre', '$email', '$password')");

    echo json_encode($data);
} else {
    echo json_encode(["status" => "error", "message" => "Método no permitido"]);
}
