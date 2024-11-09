<?php

if (!file_exists('../connection/connection.php')) {
    require_once('../core/connection/connection.php');
} else {
    require_once('../connection/connection.php');
}

function handleRequest() {
    if (isset($_POST['method'])) {
        switch ($_POST['method']) {
            case 'store':
                store();
                break;
            case 'delete':
                delete();
                break;
        }
    }
}

function index() {
    $pdo = createConnection();

    $sql = "SELECT * FROM noticias";

    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();

    return $stmt->fetchAll();
}

function show(int $id) {
    $pdo = createConnection();

    $sql = "SELECT * FROM noticias WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    return $stmt->fetch();
}

function store() {
    $pdo = createConnection();

    // Assign values from the request
    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $texto = $_POST['texto'];
    $fecha = date('Y-m-d');
    $idUser = 4;

    $sql = "INSERT INTO noticias (titulo, imagen, texto, fecha, idUser) 
            VALUES (:titulo, :imagen, :texto, :fecha, :idUser)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':idUser', $idUser);

    // Ejecutar la consulta
    if ($stmt->execute()) {    
        header('Location: ../../views/noticias.php');
        exit();
    } else {
        header('Location: ../../views/noticias.php');
        exit();
    }
}

function update(int $id) {
    $pdo = createConnection();

    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $texto = $_POST['texto'];
    $fecha = $_POST['fecha'];
    $idUser = $_POST['idUser'];

    $sql = "UPDATE noticias SET titulo = :titulo, 
                                imagen = :imagen, 
                                texto = :texto, 
                                fecha = :fecha, 
                                idUser = :idUser 
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':texto', $texto);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../../views/noticias.php');
        exit();
    } else {
        header('Location: ../../views/noticias.php');
        exit();
    }
}

function delete() {
    $id = $_POST['idNoticia'];

    $pdo = createConnection();

    $sql = "DELETE FROM noticias WHERE idNoticia = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    if ($stmt->execute()) {
        header('Location: ../../views/noticias.php');
        exit();
    } else {
        header('Location: ../../views/noticias.php');
        exit();
    }
}

handleRequest();