<?php
include_once '../DataBase/dataBase.php';

$pdo= dataBase::getInstance();
$db = $pdo->connectToDatabase();

$statement = $db->prepare("SELECT * FROM 'user' ");//this number is the owner id so it has to be changed every time we use this file

$statement->execute();
$data = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $row) {
    // Access the data fields using the column names
    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];

    // Display the data
    echo "ID: $id, Name: $name, Email: $email\n";
}

