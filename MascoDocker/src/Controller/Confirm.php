<?php
include_once "./mailing.php";
include_once "../DataBase/dataBase.php";
session_start();
if (!isset($_GET["email"])) {
  header("Location: index.php");
}
$email = filter_var(desencriptar($_GET["email"]), FILTER_VALIDATE_EMAIL);
if (!$email) {
  header("Location: error.php");
}
/*
$res = verificado($email);

if ($res) {
  header("Location: index.php");
}

$res = actualizarUsuario("verificado", '1', "email", $email);
*/
$instance = dataBase::getInstance();



 $instance->verifyUser($email);
/*
if (!$res) {
  header("Location: error.php");
}*/
$_SESSION["email"]=$email;
header("Location: ../Templates/carerList.php");
