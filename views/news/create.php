<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspirate y Viaja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0./css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a4b1bc17f3.js" crossorigin="anonymous"></script>
  </head>
  
  <body>
    
    <div id="navbar" class="nav">
      <?php
        include_once('../../navbar.php')
      ?>
    </div>
    
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="card" style="width: 30rem;">
        <div class="card-body">    
          <form action="../../core/news/NewsController.php" method="POST">
            <div class="mb-3">
              <label for="titulo" class="form-label">Titulo</label>
              <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>

            <div class="mb-3">
              <label for="texto" class="form-label">Texto</label>
              <textarea class="form-control" id="texto" name="texto"></textarea>
            </div>

            <div>
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>

            <input type="hidden" name="method" value="store">
            
            <br>

            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
      </div>
    </div>
    
    <div id="footer">
      <?php
        include_once('../../footer.php');
      ?>
    </div>
    
    <!--Enlaces de boostraap y de todos los documentos creados en javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <?php include_once('validar_login.php'); ?>

  </body>
</html>
