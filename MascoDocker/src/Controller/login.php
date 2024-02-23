<?php

/**
 * This file is the login controller for the application.
 */

require_once '../DataBase/dataBase.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $db = dataBase::getInstance();
        $db->connectToDatabase();
        $validLogin = $db -> logIn($email, $password, $db);
    }
    if ($validLogin) {
        echo '<div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">';
        echo '<span class="font-medium">Success alert!</span> You have successfully logged in.';
        echo '</div>';
    }
    else {
        echo '<div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">';
        echo '<span class="font-medium">Error alert!</span> Change a few things up and try submitting again.';
        echo '</div>';
    }
    
