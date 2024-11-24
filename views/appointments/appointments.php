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
    <?php include_once __DIR__ . '/../../navbar.php' ?>
</div>

<div class="EspacioDebajoDelNavbar"></div>

<!-- Contenedor de Citas -->
<div class="container">
    <h2 class="text-center mt-5 mb-5"> Citas</h2>
    <div class="row">
        <?php
            include_once __DIR__ . '/../../core/controller/citascontroller.php';    
        ?>
    </div>
</div>

    <!-- Footer -->
    <div id="footer">
        <?php include_once __DIR__ . '/../../footer.php' ?>
    </div>

<!-- Cargar JS de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN6jIeHz" crossorigin="anonymous"></script>
<script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>
