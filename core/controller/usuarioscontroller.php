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
                updateUser($_POST['idUser']);
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

function getLastIdUser() {
    $pdo = createConnection();

    $sql = "SELECT idUser FROM user_data ORDER BY idUser DESC LIMIT 1";

    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    return $stmt->fetch();
}

function storeUser() {
    $pdo = createConnection();

    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];
    $email = $_POST['email'];
    $address = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $birthdate = $_POST['fecha_nacimiento'];
    $gender = $_POST['sexo'];
    $role = $_POST['rol'];
    $username = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO user_data (nombre, apellido, email, direccion, telefono, fecha_nacimiento, sexo) 
            VALUES (:nombre, :apellido, :email, :direccion, :telefono, :fecha_nacimiento, :sexo)";
            
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nombre', $name);
    $stmt->bindParam(':apellido', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':direccion', $address);
    $stmt->bindParam(':telefono', $phone);
    $stmt->bindParam(':fecha_nacimiento', $birthdate);
    $stmt->bindParam(':sexo', $gender);

    // Ejecutar la consulta
    if ($stmt->execute()) {            
        $idUser = getLastIdUser()['idUser'];

        $sql = "INSERT INTO user_login (idUser, usuario, rol, password) 
                VALUES (:idUser, :usuario, :rol, :password)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idUser', $idUser);
        $stmt->bindParam(':usuario', $username);
        $stmt->bindParam(':rol', $role);
        $stmt->bindParam(':password', $password);

        if ($stmt->execute()) {
            header('Location: ../../views/users/users.php');
            exit();
        } else {
            header('Location: ../../views/users/users.php');
            exit();
        }
    } else {
        header('Location: ../../views/users/users.php');
        exit();
    }
}

function updateUser(int $id) {
    $pdo = createConnection();

    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];
    $email = $_POST['email'];
    $address = $_POST['direccion'];
    $phone = $_POST['telefono'];
    $birthdate = $_POST['fecha_nacimiento'];
    $gender = $_POST['sexo'];
    $role = $_POST['rol'];
    $username = $_POST['usuario'];
    $idUser = $_POST['idUser'];
    $password = $_POST['password'];

    if(! empty($_POST['password']) && ! password_verify($_POST['password'], $password)) {
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
        header('Location: ../../views/users/users.php');
        exit();
    } else {
        header('Location: ../../views/users/users.php');
        exit();
    }
}

function deleteUser() {
    $id = $_POST['idUser'];

    $pdo = createConnection();

    $sql = "DELETE user_login, user_data FROM user_login INNER JOIN user_data ON user_login.idUser = user_data.idUser WHERE user_login.idUser = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: ../../views/users/users.php');
        exit();
    } else {
        header('Location: ../../views/users/users.php');
        exit();
    }
}

handleRequest();
