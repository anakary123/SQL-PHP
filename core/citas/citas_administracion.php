<?php
session_start(); 

if (!file_exists('../citas/citas_administracion.php')) {
    require_once('../core/citas/citas_administracion.php');
} else {
    require_once('../citas/citas_administracion.php');
}


// Verifica si la variable de sesión 'user_id' está definida antes de acceder a ella

if (isset($_SESSION['user_id'])) {
    echo "Usuario con ID: " . $_SESSION['user_id'];
} else {
    echo "El usuario no ha iniciado sesión.";
}

$host = 'localhost';
$dbname = 'basededatos';
$username = 'tu_usuario';
$password = 'tu_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

// Crear un nuevo usuario
if (isset($_POST['crear'])) {
    $nombre = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['role'];

    $stmt = $pdo->prepare("INSERT INTO usuarios (username, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $pass, $rol]);
    echo "Usuario creado exitosamente.";
}

// Modificar un usuario existente
if (isset($_POST['modificar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['username'];
    $rol = $_POST['role'];

    $query = "UPDATE usuarios SET username = ?, role = ? WHERE id = ?";
    $params = [$nombre, $rol, $id];

    // Si se proporciona una nueva contraseña, la actualizamos
    if (!empty($_POST['password'])) {
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "UPDATE usuarios SET username = ?, password = ?, role = ? WHERE id = ?";
        $params = [$nombre, $pass, $rol, $id];
    }

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    echo "Usuario modificado exitosamente.";
}

// Eliminar un usuario existente
if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    echo "Usuario eliminado exitosamente.";
}

// Obtener todos los usuarios para mostrarlos
$usuarios = $pdo->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
?>