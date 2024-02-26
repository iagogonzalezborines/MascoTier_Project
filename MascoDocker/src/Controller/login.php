<?php
session_start();

/**
 * This file is the login controller for the application.
 */
session_start();
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
        var_dump($arrayResult);
        $hashedPassword = $arrayResult[0]["pwd"];
        
        if (!password_verify($password, $hashedPassword) && $email == $arrayResult[0]["email"])  {
            $db->disconnectFromDatabase();
        echo " fail";
        }
        $_SESSION['email'] = $arrayResult[0]["email"];
        echo "login sucessfull";
        $db->disconnectFromDatabase();
    }

    //   $validLogin = $db -> logIn($email, $password, $db);
}

//Temporal alerts
/*
if ($validLogin) {
    echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">';
    echo '<span class="font-medium">Success alert!</span> You have successfully logged in.';
    echo '</div>';
} else {
    echo '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">';
    echo '<span class="font-medium">Error alert!</span> Change a few things up and try submitting again.';
    echo '</div>';
}*/
