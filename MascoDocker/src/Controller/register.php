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

    if ($password == $repassword && calculateAge($birthDate)>18 ) {
        

        $password=password_hash($password,PASSWORD_DEFAULT);
        echo $password;
   

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
    
               if ($user) {
                   echo "REGISTER SUCCESSFUL"; //Hacer popup   con los echos de comprobacion
               } else {
                   echo "REGISTER FAILED";
                   header('Location: ../Templates/login.html');
               }
            default:
              
                break;
        }
           
           $db->disconnectFromDatabase();
       }
    }else{
      echo  "errores";
    }

   
    
