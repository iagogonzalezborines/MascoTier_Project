<?php
/**
 *Description: This file is the controller for the application. 
 *It will handle the requests from the user and call the appropriate function to handle the request.
 *No frontend(html)
*/

//We should consider doing multiple controllers for multiple functions

require_once '../DataBase/dataBase.php';
require_once '../Classes/User.php';




//Login 

/**
 * HOWS
 * How do we get only the information we are looking for, meaning how do we get a sing up or a login
 * How do we create a user instance if its only a login since we need 8 parameters (Ask to db for the rest of the parameters? dangerous?)
 * How do we start that exact profile session
 * Should we do a different set of files for login and signup or we should use one controller?
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve login information from login.html
    $username = $_POST['username'];
    $password = $_POST['password'];
    
   
}

// Register





?>