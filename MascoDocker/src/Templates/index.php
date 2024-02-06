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
var_dump($_POST);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = $_POST["username"];
        $phone = "1234567";
require_once '../DataBase/dataBase.php';
require_once '../Classes/User.php';

echo "this is a test";


        $hasPlace = false;
        $area = "none";
        $verified = false;
        
        $user = new User($email, $password, $userId, $username, $phone, $hasPlace, $area, $verified);
        $user->saveUser();
    }

?>