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
        }
    }
}

//ESTA ES PARA LISTAR USUARIOS
function indexUsers() {
    $pdo = createConnection();

    $sql = "SELECT * FROM user_data JOIN user_login ON user_data.idUser = user_login.idUser";

    $stmt = $pdo->prepare($sql);
    
    $stmt->execute();

    return $stmt->fetchAll();
}

//ESTA ES PARA MOSTRAR UN USUARIO
function showUser(int $id) {
    $pdo = createConnection();

    $sql = "SELECT * FROM user_data JOIN user_login ON user_data.idUser = user_login.idUser WHERE user_data.idUser = :id";

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
    $lastname = $_POST['apellido'];
    $email = $_POST['email'];
    $address = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $birthdate = $_POST['fecha_nacimiento'];
    $gender = $_POST['sexo'];
    $role = $_POST['rol'];
    $username = $_POST['usuario'];
    $idUser = $_POST['idUser'];
    $password = '';

    if(! empty($_POST['password']) && password_verify($_POST['password'], $password)) {
        $password = $_POST['password'];
    }else{
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }

    $sql = "UPDATE user_data 
            JOIN user_login ON user_data.idUser = user_login.idUser 
            SET user_data.nombre = :nombre, 
                user_data.apellido = :apellido,
                user_data.email = :email,
                user_data.direccion = :direccion,
                user_data.telefono = :telefono,
                user_data.fecha_nacimiento = :fecha_nacimiento,
                user_data.sexo = :sexo,
                user_login.usuario = :usuario,
                user_login.rol = :rol" .
                ($password ? ", user_login.password = :password" : "") .
           " WHERE user_data.idUser = :id";

    

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nombre', $name);
    $stmt->bindParam(':apellido', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $address);
    $stmt->bindParam(':telefono', $phone);
    $stmt->bindParam(':fecha_nacimiento', $birthdate);
    $stmt->bindParam(':sexo', $gender);
    $stmt->bindParam(':rol', $role);
    $stmt->bindParam(':usuario', $username);
    $stmt->bindParam(':id', $idUser);

    if ($password) {
        $stmt->bindParam(':password', $password);
    }

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
