<?php
require_once 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index testing </title>
</head>

<body>
    <h1>Example of user carer register</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> " method="post">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="email" placeholder="jondoe@example.com">
        <input type="password" name="password" placeholder="password">
        <input type="phone" name="phone_number" placeholder="">
        <input type="submit" value="Register">
    </form>
</body>

</html>
<?php
require_once '../DataBase/dataBase.php';
require_once '../Classes/User.php';
var_dump($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Assigning the values from the form to the variables
    $email = $_POST["email"];
    $password = $_POST["password"];
    $username = $_POST["username"];
    $phone = "1234567";
    echo "this is a test";
    $hasPlace = false;
    $area = "none";
    $verified = false;
    //Creating a new user and saving it to the database
    $user = new User($email, $password, $userId, $username, $phone, $hasPlace, $area, $verified);
    $db->get::getInstance();
    $db->connectToDatabase();
    $user->saveUserToDb($user); //Will echo if user was saved to the data base 
    $db->disconnectFromDatabase();
}
?>
