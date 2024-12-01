<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Cita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <script src="https://kit.fontawesome.com/a4b1bc17f3.js" crossorigin="anonymous"></script>
  </head>
  
  <body>
    <div id="navbar" class="nav">
        <?php include_once('../../navbar.php') ?>
    </div>

    <div class="container mt-5">

            <?php
            include_once __DIR__ . '/../../core/controller/citascontroller.php';
            
            // Obtener los parámetros de la URL
            $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
            $queryParams = explode('&', $parsedUrl['query'] ?? '');
            $parts = explode('=', $queryParams[0]);
            $idCita = $parts[1] ?? '';

            // Obtener los detalles de la cita
            $cita = showCita($idCita);
            ?>

        <h1 class="text-center mb-4">Modificar Cita</h1>
                <form action="../../core/controller/citascontroller.php" method="POST" enctype="multipart/form-data">
                    <!-- Campo oculto para enviar el ID de la cita -->
                    <input type="hidden" name="id" value="<?= htmlspecialchars($idCita) ?>">

                    <!-- Motivo de la cita -->
                    <div class="mb-3">
                        <label for="motivo_cita" class="form-label">Motivo de la Cita</label>
                        <textarea class="form-control" id="motivo_cita" name="motivo_cita" rows="4" required><?= htmlspecialchars($cita['motivo_cita']) ?></textarea>
                    </div>

                    <!-- Fecha de la cita -->
                    <div class="mb-3">
                        <label for="fecha_cita" class="form-label">Fecha de la Cita</label>
                        <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" value="<?= htmlspecialchars($cita['fecha_cita']) ?>" required>
                    </div>

                    <!-- Usuario asociado -->
                    <div class="mb-3">
                        <label for="idUser" class="form-label">Usuario Asociado</label>
                        <input type="text" class="form-control" id="idUser" name="idUser" value="<?= htmlspecialchars($cita['idUser']) ?>" readonly>
                    </div>

                    <!-- Botón de envío -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        <a href="#" class="btn btn-secondary">Cancelar</a>
                    </div>

                    <input type="hidden" name="method" value="update">
                </form>
    </div>

        <div id="footer">
            <?php include_once __DIR__ .('../../footer.php') ?>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="../../public/js/utils.js"></script>
  </body>
</html>
