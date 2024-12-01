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
        <?php include_once('../../navbar.php') ?>
    </div>

    <div class="container mt-5">

    <?php
    include_once __DIR__ . '/../../core/controller/NewsController.php';
    
    $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
            
    $queryParams = explode('&', $parsedUrl['query'] ?? '');
    
    $parts = explode('=', $queryParams[0]);
    
    $noticia = $parts[1];
?>

<?php
    $noticia = showNoticia($noticia);
?>

        <h1 class="text-center mb-4">Modificar Noticia</h1>
        <form action="../../core/controller/NewsController.php" method="POST" enctype="multipart/form-data">
            <!-- Campo oculto para enviar el ID de la noticia (si es necesario) -->
            <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">

            <!-- Título de la noticia -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($noticias['titulo']) ?>" required>
            </div>

            <!-- Fecha de publicación -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de Publicación</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?= htmlspecialchars($noticias['fecha']) ?>" required>
            </div>

            <!-- Contenido de la noticia -->
            <div class="mb-3">
                <label for="texto" class="form-label">Texto</label>
                <textarea class="form-control" id="texto" name="texto" rows="6" required><?= htmlspecialchars($noticias['texto']) ?></textarea>
            </div>

            <!-- Imagen actual -->
            <div class="mb-3">
                <label for="imagen_actual" class="form-label">Imagen Actual</label>
                <div>
                    <img src="<?= htmlspecialchars($noticias['imagen']) ?>" alt="Imagen de la noticia" class="img-thumbnail" style="max-height: 150px;">
                </div>
            </div>

            <!-- Subir nueva imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Nueva Imagen (opcional)</label>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            </div>

            <!-- Botón de envío -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <a href="#" class="btn btn-secondary">Cancelar</a>
            </div>

            <input type="hidden" name="method" value="update">
        </form>
    </div>

    <div id="navbar" class="nav">
        <?php include_once('../../footer.php') ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="../../public/js/utils.js"></script>
</body>
</html>

