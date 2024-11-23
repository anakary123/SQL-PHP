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
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once('../../core/controller/UsuariosController.php');
                    $usuarios = indexUsers(); // Función para obtener usuarios desde el controlador
                    foreach ($usuarios as $usuario) {
                        echo '    
                            <tr>
                                <th scope="row">'.$usuario['idUser'].'</th>
                                <td>'.$usuario['nombre'].'</td>
                                <td>'.$usuario['apellido'].'</td>
                                <td>'.$usuario['fecha_nacimiento'].'</td>
                                <td>'.$usuario['direccion'].'</td>
                                <td>'.($usuario['sexo'] == 'm' ? 'Masculino' : 'Femenino').'</td>
                                <td>'.$usuario['telefono'].'</td>
                                <td>'.$usuario['email'].'</td>
                                <td>
                                    <a href="#" class="btn btn-primary"><i class="bi bi-0-circle"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>';
                        }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 mb-3">
            <a href="../../views/users/create.php" class="btn btn-primary">Crear Usuario</a>
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
