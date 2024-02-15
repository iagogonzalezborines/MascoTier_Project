<?php
include_once '../DataBase/dataBase.php';

$pdo = dataBase::getInstance();
$db = $pdo->connectToDatabase();

$statement = $db->prepare("SELECT * FROM `users` where user_id=1 "); //this number is the owner id so it has to be changed every time we use this file

$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $row) {
    // Access the data fields using the column names
    $username = $row['username'];

    // Display the data
    echo "username: $username, \n";
}
