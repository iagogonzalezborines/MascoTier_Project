<?php
session_start();
/**
 * This file is the login controller for the application.
 */

require_once '../DataBase/dataBase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('LOGIN FAILED: EMAIL NOT VALID'); </script>";
        return;
    }

    $db = dataBase::getInstance();
    $dbh = $db->connectToDatabase();

    $query = "SELECT * FROM users WHERE email = ?";
    $result = $db->executeQuery($query, array($email));
    $arrayResult = $db->transformResultSetIntoUserArray($result);

    if (count($arrayResult) === 0) {
        echo "<script>alert('LOGIN FAILED: USER NOT FOUND');';</script>";
        $db->disconnectFromDatabase();
        
    }

    $password = $_POST['password'];

    $hashedPassword = $arrayResult[0]["pwd"];

    if (!password_verify($password, $hashedPassword)) {
        echo "<script>alert('LOGIN FAILED: PASSWORD INCORRECT'); ';</script>";
        $db->disconnectFromDatabase();
        return;
    }

    // Start session

    $_SESSION['email'] = $arrayResult[0];
    echo "<script>alert('LOGIN SUCCESSFUL'); window.location.href = '../Templates/login.html';</script>";

    $db->disconnectFromDatabase();
}
?>