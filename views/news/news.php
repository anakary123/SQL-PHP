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

    <?php
    include_once __DIR__ . '/../../core/controller/NewsController.php';

    // Obtener la lista de noticias
    $noticiasList = index();

    // Asegurarse de que es un array
    if (!is_array($noticiasList)) {
        $noticiasList = [];
    }
    ?>


          
    <div class="EspacioDebajoDelNavbar"></div>

    <div class="container">
        <h2 class="text-center mt-5 mb-5">Noticias</h2>
        <div class="row">
            <div class="container my-5">
                <?php foreach ($noticiasList as $noticias): ?>
                    <div class="col">
                        <div class="card h-100">
                            <?php if (!empty($noticias['imagen'])): ?>
                                <img src="<?= htmlspecialchars($noticias['imagen']) ?>" class="card-img-top" alt="Imagen de la noticia">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title">#<?= htmlspecialchars($noticias['idNoticia']) ?> - <?= htmlspecialchars($noticias['titulo']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($noticias['texto']) ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Fecha: <?= htmlspecialchars($noticias['fecha_publicacion']) ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
            <div class="col-md-12 mb-3">
            <a href="../../views/news/create.php" class="btn btn-primary">Crear Noticia</a>
            </div>
        </div>

        <div id="footer">
            <?php include_once('../../footer.php') ?>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../public/js/utils.js"></script>
    </body>
</html>