<?php

require_once __DIR__ . '/../connection/connection.php';

function handleRequest() {
    if (isset($_POST['method'])) {
        switch ($_POST['method']) {
            case 'store':
                storeUser();
                break;
            case 'delete':
                deleteUser();
                break;
            case 'update':
                updateUser($_POST['id']);
                break;
            case 'show':
                showUser($_POST['id']);
                break;
        }
    }
}

function indexUsers() {
    $pdo = createConnection();

    $sql = "SELECT * FROM user_data";

    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();

    return $stmt->fetchAll();
}

function showUser(int $id) {
    $pdo = createConnection();

    $sql = "SELECT * FROM users WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    $stmt->execute();

    return $stmt->fetch();
}

function storeUser() {
    $pdo = createConnection();

    // Assign values from the request
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password) 
            VALUES (:name, :email, :password)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    // Ejecutar la consulta
    if ($stmt->execute()) {    
        header('Location: ../../views/users.php');
        exit();
    } else {
        header('Location: ../../views/users.php');
        exit();
    }
}

function updateUser(int $id) {
    $pdo = createConnection();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;

    $sql = "UPDATE users SET name = :name, 
                              email = :email" .
                              ($password ? ", password = :password" : "") .
           " WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    if ($password) {
        $stmt->bindParam(':password', $password);
    }
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../../views/users.php');
        exit();
    } else {
        header('Location: ../../views/users.php');
        exit();
    }
}

function deleteUser() {
    $id = $_POST['idUser'];

    $pdo = createConnection();

    $sql = "DELETE FROM users WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../../views/users.php');
        exit();
    } else {
        header('Location: ../../views/users.php');
        exit();
    }
}

handleRequest();
