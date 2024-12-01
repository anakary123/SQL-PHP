<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Citas</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/css/style.css">
        <script src="https://kit.fontawesome.com/a4b1bc17f3.js" crossorigin="anonymous"></script>
    </head>
    <body>

        <div id="navbar" class="nav">
            <?php include_once('../../navbar.php') ?>
        </div>

        <?php
        include_once __DIR__ . '/../../core/controller/citascontroller.php';

            // Obtener la lista de citas
            $citasList = index();

            // Asegurarse de que es un array
            if (!is_array($citasList)) {
                $citasList = [];
            }
        ?>
  

        <div class="EspacioDebajoDelNavbar"></div>

        <div class="container">
            <h2 class="text-center mt-5 mb-5">Citas</h2>
            <div class="row">
                <div class="container my-5">
                    <?php foreach ($citasList as $cita): ?>
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">#<?= htmlspecialchars($cita['idCita']) ?> - Usuario: <?= htmlspecialchars($cita['idUser']) ?></h5>
                                    <p class="card-text"><strong>Motivo:</strong> <?= htmlspecialchars($cita['motivo_cita']) ?></p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Fecha: <?= htmlspecialchars($cita['fecha_cita']) ?></small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md-12 mb-3">
            <a href="../../views/appointments/create.php" class="btn btn-primary">Crear Usuario</a>
     </div>
        </div>

        <?php include_once __DIR__ . '/../../footer.php' ?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../public/js/utils.js"></script>
        <script src="../../public/javascript/navbarUtil.js"></script>
    </body>
</html>
