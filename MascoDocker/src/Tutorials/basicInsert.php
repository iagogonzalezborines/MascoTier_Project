<?php
include_once '../DataBase/dataBase.php';

$pdo= dataBase::getInstance();
$db = $pdo->connectToDatabase();

$statement = $db->prepare("INSERT INTO owner(user_id) VALUES (14)");//this number is the owner id so it has to be changed every time we use this file

try {
    $statement->execute();
    echo "Owner added";
} catch (PDOException $e) {
    echo "Owner not added <br>";
    echo "<h1>ERROR: </h1> ";
    echo $e->getMessage();
}finally{
    $pdo->disconnectFromDatabase();
}

