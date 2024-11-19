<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
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

<!-- Contenedor de Citas -->
<div class="container">
    <h2 class="text-center mt-5 mb-5"> Citas</h2>
    <div class="row">
        <?php
        include_once('../../core/controller/citascontroller.php');
        function storeCita() {
            // Código de la función
        
            echo "
            <div class='col-md-6 col-lg-4 mb-4'>
                <div class='card shadow-sm'>
                    <div class='card-body'>
                        <h5 class='card-title text-dark mb-3'>" . htmlspecialchars($cita['titulo']) . "</h5>
                        <p class='card-text text-muted'>Fecha: " . htmlspecialchars($cita['fecha']) . "</p>
                        <p class='card-text'>" . htmlspecialchars(substr($cita['descripcion'], 0, 80)) . "...</p>
                        <div class='d-flex justify-content-between align-items-center'>
                            <a href='show.php?id=" . htmlspecialchars($cita['id']) . "' class='btn btn-outline-primary btn-sm'>Ver</a>
                            <a href='update.php?id=" . htmlspecialchars($cita['id']) . "' class='btn btn-outline-warning btn-sm'>Editar</a>
                            <form action='../../core/controller/citascontroller.php' method='POST' style='display:inline;'>
                                <input type='hidden' name='method' value='delete'>
                                <input type='hidden' name='id' value='" . htmlspecialchars($cita['id']) . "'>
                                <button type='submit' class='btn btn-outline-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar esta cita?\")'>Eliminar</button>
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
