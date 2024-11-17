<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/estilos.css">
</head>
<body>

<!-- Barra de navegación -->
<div id="navbar" class="nav">
    <?php include_once('../../navbar.php') ?>
</div>

<div class="EspacioDebajoDelNavbar"></div>

<!-- Contenedor de usuarios -->
<div class="container">
    <h2 class="text-center mt-5 mb-5">Gestión de Usuarios</h2>

    <!-- Formulario para crear un nuevo usuario -->
    <div class="mb-5">
        <h4>Crear Nuevo Usuario</h4>
        <form action="../../core/users/UserController.php" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-6">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <div class="col-12">
                <input type="hidden" name="method" value="create">
                <button type="submit" class="btn btn-primary">Crear Usuario</button>
            </div>
        </form>
    </div>

    <!-- Lista de usuarios -->
    <h4>Usuarios Registrados</h4>
    <div class="row">
    <?php
        require_once('../../core/news/usuarioscontroller.php'); // Ajusta esta ruta

        if (function_exists('index')) {
            echo "La función index() está disponible.";
        } else {
            echo "La función index() no está definida.";
        }
        exit();
       

        // Obtener la lista de usuarios desde el controlador
        $usuarios = index(); // Esta función debe obtener la lista de usuarios
        foreach ($usuarios as $usuario) {
            echo "
            <div class='col-md-6 col-lg-4 mb-4'>
                <div class='card shadow-sm'>
                    <div class='card-body'>
                        <h5 class='card-title text-dark mb-3'>" . htmlspecialchars($usuario['nombre']) . "</h5>
                        <p class='card-text text-muted'>Email: " . htmlspecialchars($usuario['email']) . "</p>
                        <p class='card-text text-muted'>Rol: " . htmlspecialchars($usuario['rol']) . "</p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <!-- Botón para editar -->
                            <a href='editarUsuario.php?id=" . htmlspecialchars($usuario['idUsuario']) . "' class='btn btn-outline-secondary btn-sm'>Editar</a>
                            <!-- Botón para eliminar -->
                            <form action='../../core/users/UserController.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='method' value='delete'>
                                <input type='hidden' name='idUsuario' value='" . htmlspecialchars($usuario['idUsuario']) . "'>
                                <button type='submit' class='btn btn-outline-danger btn-sm'>Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>";
        }
        ?>
    </div>
</div>

<!-- Footer -->
<div id="footer">
    <?php include_once('../../footer.php') ?>
</div>

<!-- Cargar JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>
