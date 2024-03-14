<?php
require_once "./Utils.php";

$plantilla = file_get_contents("./email.html");
$destinatario = "hixikod440@hdrlog.com";
$camposPlantilla = [
    "{email}" =>"hixikod440@hdrlog.com",
    "{url}" => "http://" . $_SERVER["HTTP_HOST"] . "/index.html"];

enviarCorreo("Confirmación de conta", $plantilla, $destinatario, $camposPlantilla);