<?php

$host = 'localhost';
$port = '3306';
$dbname = 'CerealsOdyssey_DB';
$username = 'root';
$password = 'Cereals2024!@#';


$dsn = "mysql:host=$host;port=$port;dbname=$dbname";
$pdo = new PDO($dsn, $username, $password);


try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa!";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
