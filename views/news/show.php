<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inspirate y Viaja</title>
        <!-- Cargar CSS de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/css/estilos.css">
    </head>
    <body>
            
    <div class="container mt-5">
        <h1 class="text-center mb-4">Últimas Noticias</h1>
        <div class="row">
            <?php foreach ($noticias as $noticia): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card">

        </body>
    </div>
</html>


<?php
    // Archivo: mostrarNoticias.php

    // Conexión a la base de datos
    function conectarBaseDatos() {
        $host = 'localhost'; // Cambiar según el entorno
        $dbname = 'sitioweb';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }

    // Obtener noticias de la base de datos
        function obtenerNoticias() {
            $pdo = conectarBaseDatos();

            $sql = "SELECT id, titulo, contenido, fecha_publicacion, autor FROM noticias ORDER BY fecha_publicacion DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        $noticias = obtenerNoticias();
?>