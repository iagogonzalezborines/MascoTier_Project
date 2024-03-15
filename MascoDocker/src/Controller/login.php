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
            $msg_error = "error en las creedenciales";

            $db->disconnectFromDatabase();
        } else {
            $hashedPassword = $arrayResult[0]["pwd"];

            if (!password_verify($password, $hashedPassword) && $email == $arrayResult[0]["email"]) {
                $db->disconnectFromDatabase();
                echo json_encode(['success' => false, 'message' => 'Credenciales incorrectas. Por favor, inténtalo de nuevo.']);
            }else{
                $_SESSION['email'] = $arrayResult[0]["email"];
                $db->disconnectFromDatabase();
//                header('Location: ../Templates/carerList.php');
                 echo json_encode(['success' => true]);
            }
        }  
    }else{
   //     $msg_error = "introduzca sus creedenciales por favor";
    }
}

// if exists an error throw a error menssage then include then template login
//require_once "../Templates/login.php";

