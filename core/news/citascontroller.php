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
            case 'update':
                update($_POST['id']);
                break;
            case 'show':
                show($_POST['id']);
                break;
        }
    }
}

function index() {
    $pdo = createConnection();

    $sql = "SELECT * FROM citas";

    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();

    return $stmt->fetchAll();
}

function show(int $id) {
    $pdo = createConnection();

    $sql = "SELECT * FROM citas WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    return $stmt->fetch();
}

function store() {
    $pdo = createConnection();

    // Assign values from the request
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $idUser = 4; // Usuario por defecto (ajustar según el sistema)

    $sql = "INSERT INTO citas (titulo, descripcion, fecha, hora, idUser) 
            VALUES (:titulo, :descripcion, :fecha, :hora, :idUser)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':idUser', $idUser);

    // Ejecutar la consulta
    if ($stmt->execute()) {    
        header('Location: ../../views/citas.php');
        exit();
    } else {
        header('Location: ../../views/citas.php');
        exit();
    }
}

function update(int $id) {
    $pdo = createConnection();

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $idUser = $_POST['idUser'];

    $sql = "UPDATE citas SET titulo = :titulo, 
                            descripcion = :descripcion, 
                            fecha = :fecha, 
                            hora = :hora, 
                            idUser = :idUser 
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':fecha', $fecha);
    $stmt->bindParam(':hora', $hora);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../../views/citas.php');
        exit();
    } else {
        header('Location: ../../views/citas.php');
        exit();
    }
}

function delete() {
    $id = $_POST['idCita'];

    $pdo = createConnection();

    $sql = "DELETE FROM citas WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    if ($stmt->execute()) {
        header('Location: ../../views/citas.php');
        exit();
    } else {
        header('Location: ../../views/citas.php');
        exit();
    }
}

handleRequest();
