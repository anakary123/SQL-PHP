<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $name = trim($_POST['name']);
    $lastname = trim($_POST['lastname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $birthdate = trim($_POST['birthdate']);
    $address = trim($_POST['address']);
    $sex = trim($_POST['sex']);
    $countryCode = trim($_POST['country-code']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);

    // Array para almacenar mensajes de error
    $errors = [];

    // Validación de Nombre (solo letras)
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $name)) {
        $errors[] = "El nombre solo debe contener letras.";
    }

    // Validación de Apellido (solo letras)
    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $lastname)) {
        $errors[] = "El apellido solo debe contener letras.";
    }

    // Validación de Correo (solo dominios @gmail.com)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, "@gmail.com")) {
        $errors[] = "El correo debe ser una dirección válida de Gmail (terminar en @gmail.com).";
    }

    // Validación de Fecha de Nacimiento (formato YYYY-MM-DD)
    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $birthdate)) {
        $errors[] = "La fecha de nacimiento debe tener el formato YYYY-MM-DD.";
    }

    // Validación de Dirección (solo letras y números)
    if (!preg_match("/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s]+$/", $address)) {
        $errors[] = "La dirección solo debe contener letras y números.";
    }

    // Validación de Sexo (solo masculino o femenino)
    if ($sex !== "m" && $sex !== "f") {
        $errors[] = "Seleccione un sexo válido (masculino o femenino).";
    }

    // Validación de Teléfono (solo números)
    if (!preg_match("/^\d+$/", $phone)) {
        $errors[] = "El teléfono solo debe contener números.";
    }

    // Validación de Código del País (no vacío)
    if (empty($countryCode)) {
        $errors[] = "Seleccione un código de país.";
    }

    // Validación de Contraseña (agregar criterios adicionales si es necesario)
    if (empty($password)) {
        $errors[] = "La contraseña es obligatoria.";
    }

    // Comprobación de errores
    if (count($errors) > 0) {
        // Si hay errores, redirigir y mostrar mensajes
        $_SESSION['errors'] = $errors;
        header("Location: ../../core/auth/singup.php");
        exit();
    } else {
        // Procesar el registro si no hay errores (por ejemplo, guardar en la base de datos)
        echo "Registro exitoso. Redirigiendo...";
        // Aquí podrías redirigir a una página de éxito o iniciar sesión.
        header("Location: ../../core/auth/success.php");
        exit();
    }
}
?>
