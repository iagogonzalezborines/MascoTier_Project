<?php
 session_start();
/**
 * This file is the login controller for the application.
 */

require_once '../DataBase/dataBase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "LOGIN FAILED: EMAIL NOT VALID";
        return;
    }

    $db = dataBase::getInstance();
    $dbh = $db->connectToDatabase();

    $query = "SELECT * FROM users WHERE email = ?";
    $result = $db->executeQuery($query, array($email));
    $arrayResult = $db->transformResultSetIntoUserArray($result);
   
    if (count($arrayResult) === 0) {
        echo "LOGIN FAILED: USER NOT FOUND";
        $db->disconnectFromDatabase();
        return;
    }

    $password = $_POST['password'];
    echo "<br>";

    $hashedPassword = $arrayResult[0]["pwd"];

    if (!password_verify($password, $hashedPassword)) {
        echo "LOGIN FAILED: PASSWORD INCORRECT";
        $db->disconnectFromDatabase();
        return;
    }

    // Start session
   
    $_SESSION['email'] = $arrayResult[0];
    echo "LOGIN SUCCESSFUL";

    $db->disconnectFromDatabase();
}
?>