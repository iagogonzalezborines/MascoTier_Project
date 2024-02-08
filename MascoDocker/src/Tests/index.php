<?php
// Datos de conexión a la base de datos
$host = 'mysqlmascotier';
$dbname = 'mascotier';
$username = 'root';
$password = 'root';

try {
    // Crear una instancia de PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configurar el modo de error para que PDO lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Ahora puedes ejecutar consultas SQL usando $pdo
    // Por ejemplo:
    $stmt = $pdo->query('SELECT * FROM user');
    while ($row = $stmt->fetch()) {
        echo $row['username'] . "<br>";
    }
} catch (PDOException $e) {
    // Capturar y manejar cualquier error de conexión
    echo "Error de conexión: " . $e->getMessage();
}

