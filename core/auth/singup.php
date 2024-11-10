<?php

require('../connection/connection.php');

/* todo
*  1) hacer login
*  2) terminar el CRUD (Crear listo, editar, eliminar, vizualizar)
*  3) Refactorizar un poco el codigo para tenerlo más ordenado
*/

function signupUser() {
    // Obtener los datos del formulario por medio de $_POST
   
    //GUARDAR EN user_data
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $sex = $_POST['sex'];
    $address = $_POST['address'];
    $phone = $_POST['country-code'].'-'.$_POST['phone'];
-
    //DEBE GUARDARSE EN LA TABLA user_login
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = 'user';
    

    // Crear conexión a la base de datos
    $pdo = createConnection();

    // Preparar la consulta SQL
    $sql = "INSERT INTO user_data (nombre,apellido,email,fecha_nacimiento,direccion,sexo,telefono) 
            VALUES (:name, :lastname, :email, :birthdate, :address, :sex, :phone)";
    
    $stmt = $pdo->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':birthdate', $birthdate);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':phone', $phone);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        
        $loginData = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'rol' => $rol,
        ];

        storeUserLoginData($pdo, $loginData);
        
        header('Location: ../../views/auth/login.php');
        exit();
    } else {
        header('Location: ../../views/auth/singup.php');
        exit();
    }
}

function storeUserLoginData($pdo, $loginData) {
    $userId = $pdo->lastInsertId();

    // Preparar la consulta SQL
    $sql = "INSERT INTO user_login (idUser,usuario,password,rol) 
            VALUES (:userId, :username, :password, :rol)";
    
    $stmt = $pdo->prepare($sql);

    // Vincular parámetros
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':username', $loginData['username']);
    $stmt->bindParam(':password', $loginData['password']);
    $stmt->bindParam(':rol', $loginData['rol']);

    $response = $stmt->execute();

    if($response) {
        return true;
    }

    return false;
}

signupUser();


