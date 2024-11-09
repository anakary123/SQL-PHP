<?php
// Iniciar la sesión para manejar los datos del usuario si se necesita
session_start();

// Verificar si el formulario fue enviado con el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y sanitizar los datos ingresados
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    // Array para almacenar posibles errores
    $errors = [];

    // Validación del campo de correo electrónico
    if (empty($email)) {
        $errors[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El formato del correo electrónico no es válido.";
    }

    // Validación del campo de contraseña
    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria.";
    } elseif (strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Si no hay errores, procedemos a la autenticación (ejemplo)
    if (empty($errors)) {
        // En un caso real, aquí verificarías las credenciales en una base de datos
        // Ejemplo básico: email y password "admin@correo.com" y "123456" como prueba
        $fake_email = "admin@correo.com";
        $fake_password = "123456";

        if ($email === $fake_email && $password === $fake_password) {
            // Guardar el correo en la sesión y redirigir al usuario a un dashboard
            $_SESSION['user_email'] = $email;
            header("Location: ../../inicio.php"); // Redirige a una página de bienvenida o dashboard
            exit();
        } else {
            $errors[] = "Correo electrónico o contraseña incorrectos.";
        }
    }

    // Si hay errores, mostrarlos al usuario
    if (!empty($errors)) {
        echo "<div style='color: red;'><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul></div>";
    }
}
?>
