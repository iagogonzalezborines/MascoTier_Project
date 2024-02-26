<?php
session_start();

/**
 * This file is the login controller for the application.
 */

require_once '../DataBase/dataBase.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = dataBase::getInstance();
    $db->connectToDatabase();
    if (!empty($email) && !empty($password)) {

        $query = "SELECT * FROM users WHERE email = ?";
        $result = $db->executeQuery($query, array($email));
        $arrayResult = $db->transformResultSetIntoUserArray($result);

        if (count($arrayResult) === 0) {
            $db->disconnectFromDatabase();
        
        }
        $hashedPassword = $arrayResult[0]["pwd"];
        
        if (!password_verify($password, $hashedPassword) && $email == $arrayResult[0]["email"])  {
            $db->disconnectFromDatabase();
        echo " fail";
        }

        $_SESSION['email'] = $arrayResult[0]["email"];
        $db->disconnectFromDatabase();
        header('Location: ../Templates/carerList.php');
    }

}


