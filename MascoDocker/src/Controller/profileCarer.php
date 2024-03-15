<?php
session_start();
require_once '../Methods/formFilters.php';
require_once "../DataBase/dataBase.php";
if (!isset($_SESSION["email"])) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = '../Templates/index.html';
    header("Location: http://$host$uri/$extra");
    exit;
}
$email = $_SESSION["email"];
if (!empty($_POST)) {

    if (test_email($_POST["email"])) {
        $newEmail = $_POST["email"];
        $username = test_text($_POST["name"]);
        $phone = $_POST["phone"];
        $area = test_text($_POST["area"]);
        $_SESSION["email"] = $email;
        switch ($_POST["place"]) {
            case "yes":
                $hasPlace = 1;
                break;
            case "no":
                $hasPlace = 0;
                break;
        }
        $query = "update users set email = ? , username = ?, phone = ? , hasPlace = ? ,area= ? where email = ?";
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $result = $db->executeQuery($query, [$newEmail, $username, $phone, $hasPlace, $area, $email]);
    }
}

if (isset($_SESSION["email"])) {

    $db = dataBase::getInstance();
    $sql = "Select username,email,phone,area from Users where email = ?";
    $db->connectToDatabase();
    $result = $db->executeQuery($sql, [$email]);
    $row = $result->fetch(PDO::FETCH_ASSOC);
}

require_once "../Templates/profile_carer.php";
