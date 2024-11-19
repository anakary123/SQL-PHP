<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Cargar CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>

<!-- Navbar -->
<div id="navbar" class="nav">
    <?php include_once('../../navbar.php') ?>
</div>

<div class="EspacioDebajoDelNavbar"></div>

<!-- Contenedor de Usuarios -->
<div class="container">
    <h2 class="text-center mt-5 mb-5">Usuarios</h2>
    <div class="row">
        <?php
        include_once('../../core/news/UsuariosController.php');

        $usuarios = obtenerUsuarios(); // Función para obtener usuarios desde el controlador
        foreach ($usuarios as $usuario) {
            echo "
            <div class='col-md-6 col-lg-4 mb-4'>
                <div class='card shadow-sm'>
                    <div class='card-body'>
                        <h5 class='card-title text-dark mb-3'>" . htmlspecialchars($usuario['name']) . "</h5>
                        <p class='card-text text-muted'>Correo: " . htmlspecialchars($usuario['email']) . "</p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <a href='verUsuario.php?id=" . htmlspecialchars($usuario['id']) . "' class='btn btn-outline-primary btn-sm'>Ver</a>
                            <a href='editarUsuario.php?id=" . htmlspecialchars($usuario['id']) . "' class='btn btn-outline-warning btn-sm'>Editar</a>
                            <form action='../../core/controllers/UsersController.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='method' value='delete'>
                                <input type='hidden' name='id' value='" . htmlspecialchars($usuario['id']) . "'>
                                <button type='submit' class='btn btn-outline-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este usuario?\")'>Eliminar</button>
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
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>
