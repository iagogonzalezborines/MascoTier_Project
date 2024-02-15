<?php
/**
 * This file is the register controller for the application.
 */

require_once '../DataBase/dataBase.php';
require_once '../Classes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve register information from register.html
    $type = $_POST['type'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $hasPlace = $_POST['hasPlace'];
    $area = $_POST['area'];
    $verified = $_POST['verified'];

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

    $user = new User($type, $username, $email, $password, $phone, $hasPlace, $area, $verified);
    $db = dataBase::getInstance();
    $dbh = $db->connectToDatabase();
    $query = "INSERT INTO users (type, username, email, password, phone, hasPlace, area, verified) VALUES (:type, :username, :email, :password, :phone, :hasPlace, :area, :verified)";
    $result = $db->executeQuery($query, array(':type' => $user->getType(), ':username' => $user->getUsername(), ':email' => $user->getEmail(), ':password' => $user->hashPassword(), ':phone' => $user->getPhone(), ':hasPlace' => $user->getHasPlace(), ':area' => $user->getArea(), ':verified' => $user->getVerified()));
    if ($result) {
        echo "REGISTER SUCCESSFUL";
    } else {
        echo "REGISTER FAILED";
    }
    $db->disconnectFromDatabase();
    header('../Templates/login.html');
}

?>