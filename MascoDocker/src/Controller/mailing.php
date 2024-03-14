<?php
declare(strict_types=1);
require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


/**
 * remplaza en un texto el array de campos que se le pasa
 */
function substituir(string $mensaje, array $campos): string
{
    // Reemplazamos los campos que queremos de la plantilla
    // $mensaje = str_replace('{phpmailer}', $user, $plantilla);
    foreach ($campos as $key => $campo) {
        $mensaje = str_replace($key, $campo, $mensaje);
    }
    return $mensaje;
}

/**
 * envia el mail en la plantilla es el cuerpo del correo si se quiere usar texto personalizado debes de usar el parametro $campos que tiene que tener la siguiente estructura.
 * [
 *  "campo a cambiar" => valor del campo que quieres cambiar,
 *  "{url}" => www.google.com
 * ]
 * este array busca en el parametro plantilla el valor {url} y lo sustituye por www.google.com tantas veces como {url} aparezca
 */

 function enviarCorreo($asunto, $plantilla, $destinatario, $campos = []) {

    try {
        $config=parse_ini_file("./configMailer.ini",true)["mailer"];
        $port= $config["port"];
        $host=$config["host"];
        $username=$config["username"];
        $password=$config["password"];

        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->IsSMTP();
        // cambiar a 0 para no ver mensajes de error
        $mail->SMTPDebug = 0;
        //	Establece la autentificación SMTP. Por defecto a False
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "TLS";
        //	Establece el servidor SMTP. Pueden ser varios separados por ;
        $mail->Host = $host;
        $mail->Port = $port;

        // Introducir usuario de correo completo
        $mail->Username = $username;
        // Introducir clave

        $mail->Password = $password;
        $mail->SetFrom($username, 'CONFIRMACION MASCOTIER');

        /*
         * Para especificar el asunto. Utilizamos la función mb_convert_encoding para que muestre
         * correctamente los acentos.
         */
        $mail->Subject = mb_convert_encoding($asunto, 'UTF-8');

        $mensaje = substituir($plantilla, $campos);
        $mail->MsgHTML($mensaje);
        $mail->AddAddress($destinatario);
        $resul = $mail->Send();

        return $resul;
    } catch (Exception $e) {
        
    }
}


/**
 * configura una variable de session y redirige a la pagina que se le pasa como parametro en la pagina muestras el mensaje como quieras
 */
function setErrorMsg(string $msg, string $page): void
{
    $_SESSION["msg"] = $msg;
    header("Location: $page");
}


/**
 * se le pasa una cadena de texto que deberia ser el usuario y te dice si es un phpmailer o el nombre del usuario creado
 */
function userOrphpmailer(string $user): string
{
    $campo = "nombre";
    if (filter_var($user, FILTER_VALIDATE_EMAIL) !== false) {
        $campo = "phpmailer";
    }
    return $campo;
}


/**
 * encripta de forma reversible el valor
 */
function encriptar(string $mensaje)
{
    return base64_encode(str_rot13($mensaje));
}

/**
 * desencripta el valor que se encripto utilizando la funcion encriptar
 */
function desencriptar(string $mensaje)
{
    return str_rot13(base64_decode($mensaje));
}
