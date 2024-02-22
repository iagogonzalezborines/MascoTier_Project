<?php
session_start();
/**
 * This file is the login controller for the application.
 */

require_once '../DataBase/dataBase.php';

function logIn(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(!empty($email) && !empty($password)){
            $db = dataBase::getInstance();
            $dbh = $db->connectToDatabase();
        
            $query = "SELECT * FROM users WHERE email = ?";
            $result = $db->executeQuery($query, array($email));
            $arrayResult = $db->transformResultSetIntoUserArray($result);
        
            if (count($arrayResult) === 0) {
                $db->disconnectFromDatabase();
                return false;
            }
            
            $hashedPassword = $arrayResult[0]["pwd"];
            if (!password_verify($password, $hashedPassword)) {
                $db->disconnectFromDatabase();
                return false;
            }
            
            $_SESSION['email'] = $arrayResult[0];
            $db->disconnectFromDatabase();
            session_start();
            $_SESSION['email'] = $arrayResult[0];
            
            return true;
        }
    }
    
    return false;
}

$validLogin = logIn();
