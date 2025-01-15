<?php
include "../fpdf/fpdf.php";
include "conexion.php";
session_start();

$nombre = $_SESSION["datosSesion"]["Nombre"];
$correo = $_SESSION["datosSesion"]["Correo"];
$idUsuario = $_SESSION["datosSesion"]["IDUsuario"];
$total = 0;

$contadorProductos = 0;
$contadorEspacio = 3;

//contador de pixeles para imagenes
$sumaTextoY = 175;
$sumaImagenesY = 160;

ob_start();

$consulta = mysqli_query(
    $con,
    "SELECT productos.ImagenPrincipal, productos.Nombre, productos.Descripcion, productos.Precio, carrito.cantidad, carrito.IDProducto        FROM carrito 
INNER JOIN productos 
ON productos.IDProducto = carrito.IDProducto 
WHERE carrito.IdUsuario = $idUsuario"
);


$pdf = new FPDF();


$pdf->AddPage();
$pdf->AcceptPageBreak();

//Logo de la empresa
$pdf->Image('../src/icon/icono.png', 80, 0, 50);

//Area de gracias por la compra y detalles sobre la compra
$pdf->SetFont('Arial', '', 15);
$pdf->Ln(50);
$pdf->Cell(0, 10, "Muchas gracias por su compra!!!", 0, 0, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(20);
$pdf->Write(5, "Ahora su pedido sera procesado para su entrega, favor de mantenerse atento a su correo electronico, ya que, por este medio se le hara llegar la informacion.");
$pdf->Ln(20);
//Datos del comprador
$pdf->SetFont('Arial', 'B', 12);
$pdf->Write(5, "Nombre: ");
$pdf->SetFont('Arial', '', 12);
$pdf->Write(5, $nombre);

$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Write(5, "Correo electronico: ");
$pdf->SetFont('Arial', '', 12);
$pdf->Write(5, $correo);

//Productos comprados
$pdf->SetFont('Arial', 'B', 12);
$pdf->Ln(20);
$pdf->Cell(130, 10,"Producto", 1, 0, 'C');
$pdf->Cell(50, 10,"Precio", 1, 1, 'C');

$pdf->SetFont('Arial', '', 12);
while($row = mysqli_fetch_array($consulta)){

    $contadorProductos += 1;
    if($contadorProductos % $contadorEspacio == 0){
        $sumaTextoY = 45;
        $sumaImagenesY = 20;
        $contadorEspacio = 5;
    }

    if(strlen($row[1])>20){
        $pdf->Cell(130, 60,substr($row[1], 0, 20), 1, 0, 'R');
        $pdf->Text(93, $sumaTextoY, substr($row[1], -21, 20));
    }else{
        $pdf->Cell(130, 60, $row[1], 1, 0, 'R');
    }
    $pdf->Image('../src/productos/'.$row[0], 20, $sumaImagenesY, 50);
    $pdf->Cell(50, 60,$row[4].' x '.$row[3], 1, 1, 'C');

    $total += $row[3] * $row[4];
    $sumaTextoY += 62;
    $sumaImagenesY += 62;
}
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(130, 10, "Total", 1, 0, 'R');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10,$total, 1, 1, 'C');

function obtenerArchivo(){
    return $GLOBALS["pdf"]->Output('S');
}

ob_end_flush();