<?php

/**
 * This file is the register controller for the application.
 */

require_once '../DataBase/dataBase.php';
require_once '../Classes/User.php';
require_once '../Methods/formFilters.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    // Retrieve register information from register.html
    $username = test_text($_POST['name']) ;
    $password = $_POST["pwd"];
    $repassword=$_POST["repeat_pwd"];
    $phone = test_text($_POST['phone']);
   
    $area = test_text($_POST['area']);
    $email = $_POST['email'];
    $birthDate = $_POST["birth-date"];
    $verified = 0;
    $userType = $_POST["userType"];
    if (test_email($email) ==false) {
     
        echo "email no valido";
    }
    if (test_dni($_POST["idDocument"])) {
       $idDocument= $_POST["idDocument"];
    }else{
        echo "dni no valido";
    }
    // this is the controller that checks if exists or not the email in the database
    $checkEmail = "Select count(email) as total from users where email = ?";
    $db = dataBase::getInstance();
    $db->connectToDatabase();
    $result= $db->executeQuery($checkEmail,[$email]);
    $row = $result->fetch();
    // Throw an error message, then dynamically include the template for carer or owner.
    if ($row["total"]>0) {
        $msg_error= "este correo ya existe";
        switch ($userType) {
            case 'carer':  
                require_once "../Templates/signup_carer.php";
                break;
            case "owner":
            require_once "../Templates/signup_owner.php";
            default:
                break;
        }
    }else{
        if ($password == $repassword && calculateAge($birthDate)>18 ) {
        

            $password=password_hash($password,PASSWORD_DEFAULT);
            echo $password;
       
            // this is the controller of the user create 
            switch ($userType) {
                case 'carer':
                    $type = "carer";
                    $hasPlace = $_POST['hasPlace'];
                    $user = new User($email, $password, $type,$birthDate,$username, $phone,$area,  $verified,$hasPlace, $idDocument);
        
                   $user->saveUserToDb($user);
                 
        
                   if ($user) {
                       echo "REGISTER SUCCESSFUL"; //Hacer popup   con los echos de comprobacion
                   } else {
                       echo "REGISTER FAILED";
                       header('Location: ../Templates/login.html');
                   }
                    break;
                case 'owner':
                    $type = "owner";
                    $user = new User($email, $password, $type,$birthDate,$username, $phone,$area,  $verified,null, $idDocument,null,null);
        
                   $user->saveUserToDb($user);
                 
                 //  
                   if ($user) {
                       echo "REGISTER SUCCESSFUL"; //Hacer popup   con los echos de comprobacion
                   } else {
                       echo "REGISTER FAILED";
                       header('Location: ../Templates/login.html');
                   }
                default:
                  
                    break;
            }
               
           }
    }
    
   
    }else{
      echo  "errores";
    }

   
    
