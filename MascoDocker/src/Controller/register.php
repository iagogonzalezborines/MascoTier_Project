<?php

/**
 * This file is the register controller for the application.
 */

require_once '../DataBase/dataBase.php';
require_once '../Classes/User.php';
require_once '../Methods/formFilters.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   var_dump($_POST);
    // Retrieve register information from register.html
    $username = test_text($_POST['name']) ;
    $password = password_hash($_POST["pwd"],PASSWORD_DEFAULT);
    $phone = test_text($_POST['phone']);
    $hasPlace = $_POST['hasPlace'];
    $area = test_text($_POST['area']);
    $email = test_email($_POST['email']);
    $verified = 0;
    if (is_bool($email)) {
        echo "email no valido";
    }
    if (test_dni($_POST["dni"])) {
       $idDocument= $_POST["idDocument"];
    }else{
        echo "dni no valido";
    }

    if($phone != null){ 
     $type = "carer";
     $user = new User($type, $username, $email, $password, $phone, $hasPlace, $area, $verified, $idDocument, $place, $rating);
    $user->saveUserToDb($user);
    if ($result) {
        echo "REGISTER SUCCESSFUL"; //Hacer popup   con los echos de comprobacion
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
