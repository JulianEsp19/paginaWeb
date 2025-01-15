<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include "pdf.php";
include "bodyCorreo.php";

$correoServer = "jesusjulianesparzarosas@gmail.com";
$nombreCorreoServer = "Grove Lab";
$contrasenaCorreoServer = "xrmg uxfh seob xzne";

$archivo = obtenerArchivo();

$urlArchivo = "../pdf's/".$correo.".pdf";

file_put_contents($urlArchivo, $archivo);

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;
    $mail->Username   = $correoServer; 
    $mail->Password   = $contrasenaCorreoServer; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
    $mail->Port       = 465; 

    // Configuración del remitente y destinatario
    $mail->setFrom($correoServer, $nombreCorreoServer);
    $mail->addAddress($correo); 

    // Configuración del contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Pedido de Grove Lab';
    $mail->Body    = obtenerBody();
    $mail->AltBody = 'Gracias por su pedido en GroveLab

¡Gracias por elegirnos para llenar tu vida de música! 🎵✨

Tu compra es más que un simple instrumento; es el comienzo de una melodía única que solo tú puedes crear. En GroveLab, nos apasiona ser parte de tu viaje musical, y estamos aquí para apoyarte en cada acorde, ritmo y canción que quieras interpretar.

🎸 Prepárate para hacer vibrar el mundo con tu talento.
Si tienes alguna pregunta o necesitas ayuda, ¡no dudes en contactarnos!

🎶 Tu pasión, nuestra inspiración.';

    // Adjuntar el archivo PDF
    $mail->addAttachment($urlArchivo, 'pedido.pdf');

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado con éxito';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
} finally {
    // Eliminar el archivo PDF temporal
    if (file_exists($urlArchivo)) {
        unlink($urlArchivo);
    }
}

include "pedido.php";