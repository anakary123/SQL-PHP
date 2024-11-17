<?php
function crearConexion() {
    $host = 'localhost';
    $db = 'webpage';
    $user = 'root';
    $pass = '';

    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;

    } catch (PDOException $e) {
        echo 'Conexión fallida: ' . $e->getMessage();
        return false;
    }
}