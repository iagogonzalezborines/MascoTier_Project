<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
echo $smtpVersion = SMTP::VERSION;

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'servidor_smtp';
    $mail->SMTPAuth = true;
    $mail->Username = 'tu_usuario_smtp';
    $mail->Password = 'tu_contrasena_smtp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuración del remitente y destinatario
    $mail->setFrom('tu_correo@gmail.com', 'Tu Nombre');
    $mail->addAddress('correo_destino@example.com', 'Nombre Destinatario');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    $mail->Body = 'Contenido del correo en formato HTML';

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado con éxito';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
