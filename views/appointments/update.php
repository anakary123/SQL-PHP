<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a4b1bc17f3.js" crossorigin="anonymous"></script>
  </head>
  
  <body>
    
    <!-- Navbar -->
    <div id="navbar" class="nav">
      <?php include_once('../../navbar.php'); ?>
    </div>

    <?php
      include_once('../../core/controller/citascontroller.php');

      $usuarios = getUsers();

      $idCita = $_GET['id'];
      
      $cita = show($idCita);

    ?>
    
    <!-- Contenedor principal -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="card" style="width: 30rem;">
        <div class="card-body">    
          <form action="../../core/controller/citascontroller.php" method="POST">
            <!-- Campo para la fecha de la cita -->
            <div class="mb-3">
              <label for="fecha_cita" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required value="<?= $cita['fecha_cita'] ?>">
            </div>

             <!-- Campo para el id del usuario -->
             <div class="mb-3">
              <label for="idUser" class="form-label">Usuario</label>
              <select class="form-select" id="idUser" name="idUser">
                <?php foreach ($usuarios as $usuario): ?>
                  <option value="<?= $usuario['idUser'] ?>" <?= $usuario['idUser'] == $cita['idUser'] ? 'selected' : '' ?>><?= $usuario['nombre'] ?> <?= $usuario['apellido'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Campo para la descripción de la cita -->
            <div class="mb-3">
              <label for="motivo_cita" class="form-label">Motivo</label>
              <textarea class="form-control" id="motivo_cita" name="motivo_cita" rows="5"><?= $cita['motivo_cita'] ?></textarea>
            </div>

            <input type="hidden" name="id" value="<?= $cita['idCita'] ?>">

            <!-- Campo oculto para indicar la acción (crear/almacenar) -->
            <input type="hidden" name="method" value="update">

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Actualizar Cita</button>
          </form>
        </div>
      </div>
    </div>
    
    <!-- Footer -->
    <div id="footer">
      <?php include_once('../../footer.php'); ?>
    </div>
    
    <!-- Scripts de Bootstrap y validación -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  
  </body>
</html>
