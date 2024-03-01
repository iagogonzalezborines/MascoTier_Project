<?php 
session_start();
require_once "../DataBase/dataBase.php";
if (isset($_SESSION["email"])) {
$email =$_SESSION["email"];
   
$db = dataBase::getInstance();
$sql = "Select username,email,phone,area from Users where email = ?";
 $db->connectToDatabase();
$result = $db->executeQuery($sql,[$email]);
$row = $result->fetch(PDO::FETCH_ASSOC);
var_dump($row);
}

if (isset($_POST)) {
    $email = $_POST["email"];
    $username= $_POST["name"];
    $phone = $_POST["phone"];
    $area=$_POST["area"];

    switch ($_POST["Place"]) {
        case"yes":
            $hasPlace=true;
            break;
        case "no":
            $hasPlace=false;
            break;
    }
}

require_once "../Templates/profile_carer.php";
?>