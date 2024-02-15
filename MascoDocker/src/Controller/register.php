<?php

/**
 * This file is the register controller for the application.
 */

require_once '../DataBase/dataBase.php';
require_once '../Classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve register information from register.html
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $hasPlace = $_POST['hasPlace'];
    $area = $_POST['area'];
    $verified = $_POST['verified'];

    if($phone != null){ 
     $type = "carer";
     $user = new User($type, $username, $email, $password, $phone, $hasPlace, $area, $verified, $idDocument, $place, $rating);
    $user->saveUserToDb($user);
    if ($result) {
        echo "REGISTER SUCCESSFUL";
    } else {
        echo "REGISTER FAILED";
    }
    $db->disconnectFromDatabase();
    header('../Templates/login.html');
    }
    else{
     $type = "owner";
     $user = new User($email, $password, $area, $type);
    $user->saveUserToDb($user);
    if ($result) {
        echo "REGISTER SUCCESSFUL";
    } else {
        echo "REGISTER FAILED";
    }
    $db->disconnectFromDatabase();
    header('../Templates/login.html');
    }


    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Validate phone number
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        echo "Invalid phone number";
        exit;
    }

    
}
