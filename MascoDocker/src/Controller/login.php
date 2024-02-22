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
    
