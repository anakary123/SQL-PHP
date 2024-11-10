<?php

function createConnection() {
    $host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
    $db = 'sitioweb'; // Nombre de tu base de datos
    $user = 'root'; // Tu usuario de base de datos
    $pass = ''; // Tu contraseña de base de datos

    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo 'Conexión fallida: ' . $e->getMessage();
    }
}
