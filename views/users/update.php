<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

<!-- Barra de navegación -->
<div id="navbar" class="nav">
    <?php include_once __DIR__ . '/../../navbar.php' ?>
</div>

<div class="EspacioDebajoDelNavbar"></div>

<!-- Contenedor de usuarios -->
<div class="container">
    <h2 class="text-center mt-5 mb-5">Gestión de Usuarios</h2>

    <!-- Formulario para crear un nuevo usuario -->
    <div class="mb-5">
        <?php
            include_once __DIR__ . '/../../core/controller/UsuariosController.php';

            $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
            
            $queryParams = explode('&', $parsedUrl['query'] ?? '');
            
            $parts = explode('=', $queryParams[0]);
            
            $userId = $parts[1];
        ?>

        <?php
            $user = showUser($userId);
        ?>

        <h4>Actualizar Usuario</h4>
        <form action="../../core/controller/UsuariosController.php" method="POST" class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= $user['nombre'] ?>">
            </div>
            <div class="col-md-6">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required value="<?= $user['apellido'] ?>">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= $user['email'] ?>">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required value="<?= empty($user['password']) ? '' : $user['password'] ?>">
            </div>
            <div class="col-md-6">
                <label for="nickname" class="form-label">Nickname</label>
                <input type="text" class="form-control" id="nickname" name="usuario" required value="<?= $user['usuario'] ?>">
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required value="<?= $user['direccion'] ?>">
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required value="<?= $user['telefono'] ?>">
            </div>
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required value="<?= $user['fecha_nacimiento'] ?>">
            </div>
            <div class="col-md-6">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol">
                    <option value="admin" <?= $user['rol'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
                    <option value="user" <?= $user['rol'] == 'user' ? 'selected' : '' ?>>Usuario</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo">
                    <option value="M" <?= $user['sexo'] == 'M' ? 'selected' : '' ?>>Masculino</option>
                    <option value="F" <?= $user['sexo'] == 'F' ? 'selected' : '' ?>>Femenino</option>
                </select>
            </div>
            <div class="col-12">
                <input type="hidden" name="method" value="update">
                <input type="hidden" name="idUser" value="<?= $userId ?>">
                <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<div id="footer">
    <?php include_once __DIR__ . '/../../footer.php' ?>
</div>

<!-- Cargar JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>
