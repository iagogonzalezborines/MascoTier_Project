<?php
session_start();
/**
 * This file is the login controller for the application.
 */

require_once '../DataBase/dataBase.php';
$validLogin = false;
function logIn(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        if($_POST['email'] != "" || $_POST['password'] != "" || $_POST['email'] != null || $_POST['password'] != null){
           $email = $_POST['email'];
           $email = test_text($email);
           $password = $_POST['password'];
           if(!test_email($email)){
            $validLogin = false;
            }
        }else{
            $db = dataBase::getInstance();
            $dbh = $db->connectToDatabase();
        
            $query = "SELECT * FROM users WHERE email = ?";
            $result = $db->executeQuery($query, array($email));
            $arrayResult = $db->transformResultSetIntoUserArray($result);
        
            if (count($arrayResult) === 0) {
                $db->disconnectFromDatabase();
                $validLogin = false;
            }
            else{
                $password = $_POST['password'];
                $hashedPassword = $arrayResult[0]["pwd"];
                if (!password_verify($password, $hashedPassword)) {
                    $db->disconnectFromDatabase();
                    $validLogin = false;
                }
                $_SESSION['email'] = $arrayResult[0];
                $validLogin = true;
                $db->disconnectFromDatabase();
                session_start();
                $_SESSION['email'] = $arrayResult[0];
            }
        }
        }
        return $validLogin;
    
}

logIn();
   



   

    

?>