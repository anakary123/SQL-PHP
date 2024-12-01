<?php

require_once __DIR__ . '/../connection/connection.php';

function handleRequest() {
    if (isset($_POST['method'])) {
        switch ($_POST['method']) {
            case 'store':
                create();
                break;
            case 'delete':
                delete();
                break;
            case 'show':
                show();
                break;
            case 'update':
                update();
                break;
        }
    }
}

// Lista todas las citas en la base de datos
function index() {
    $pdo = createConnection();

    $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $citas = $stmt->fetchAll();

    if (empty($citas)) {
        echo "No se encontraron citas en la base de datos.";
        exit;
    }

    return $citas;
}

// Crea una nueva cita en la base de datos
function create(): void {
    $pdo = createConnection(); 

    $motivo_cita = $_POST['motivo_cita'];
    $fecha_cita = $_POST['fecha_cita'];
    $idUser = $_POST['idUser'];

    $sql = "INSERT INTO citas (motivo_cita, fecha_cita, idUser)
            VALUES (:motivo_cita, :fecha_cita, :idUser)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':motivo_cita', $motivo_cita);
    $stmt->bindParam(':fecha_cita', $fecha_cita);
    $stmt->bindParam(':idUser', $idUser);

    if ($stmt->execute()) {
        header('Location: ../../views/appointments/appointments.php');
        exit();
    } else {
        header('Location: ../../views/appointments/create.php');
        exit();
    }
}

// Muestra una cita específica
function show(int $id) {
    $pdo = createConnection();

    $sql = "SELECT * FROM citas JOIN users_data ON citas.idUser = users_data.idUser WHERE citas.idCita = :idCita";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':idCita', $id);

    $stmt->execute();
    
    return $stmt->fetch();
}

// Edita una cita existente en la base de datos
function update(): void {
    $pdo = createConnection();

    $idCita = $_POST['id'];
    $motivo_cita = $_POST['motivo_cita'];
    $fecha_cita = $_POST['fecha_cita'];
    $idUser = $_POST['idUser'];

    $sql = "UPDATE citas SET 
            motivo_cita = :motivo_cita, 
            fecha_cita = :fecha_cita, 
            idUser = :idUser 
            WHERE idCita = :idCita";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':motivo_cita', $motivo_cita);
    $stmt->bindParam(':fecha_cita', $fecha_cita);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->bindParam(':idCita', $idCita);

    if ($stmt->execute()) {
        header('Location: ../../views/appointments/appointments.php');
        exit();
    } else {
        header('Location: ../../views/appointments/update.php');
        exit();
    }
}

// Elimina una cita de la base de datos
function delete() {
    $pdo = createConnection();

    $idCita = $_POST['id'];

    $sql = "DELETE FROM citas WHERE idCita = :idCita";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':idCita', $idCita);

    if ($stmt->execute()) {
        header('Location: ../../views/appointments/appointments.php');
        exit();
    } else {
        header('Location: ../../views/appointments/appointments.php');
        exit();
    }
}

function getUsers() {
    $pdo = createConnection();

    $sql = "SELECT * FROM users_data";

    return $pdo->query($sql)->fetchAll();
}

handleRequest();
