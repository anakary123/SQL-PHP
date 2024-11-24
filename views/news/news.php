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

<!--El siguiente div define un contenedor preparado para albergar una barra de navegación, 
        esté div puede ser manipulado a través de php-->

    <div id="navbar" class="nav">
        <?php include_once __DIR__ . '/../../navbar.php' ?>
    </div>

    <div class="..."></div>
    
<!-- Contenedor de noticias -->
      <div class="container">
    <h2 class="text-center mt-5 mb-5">Noticias Agencia de Viajes</h2>
    <div class="row">

    <?php

        include_once __DIR__ . '/../../core/controller/NewsController.php';

        $noticias = index();
        foreach ($noticias as $noticia) {
            echo "
                <div class='col-md-6 col-lg-4 mb-4'>
                    <div class='card shadow-sm'>
                        <img src='../../public/img/cuzco1.jpg' class='card-img-top rounded-top' alt='Imagen de " . htmlspecialchars($noticia['titulo']) . "' style='height: 200px; object-fit: cover;'>
                        <div class='card-body'>
                            <h5 class='card-title text-dark mb-3'>" . htmlspecialchars($noticia['titulo']) . "</h5>
                            <p class='card-text text-muted'>" . htmlspecialchars(substr($noticia['texto'], 0, 80)) . "...</p>
                            <p class='text-muted mb-4'><small>Publicado el " . htmlspecialchars($noticia['fecha']) . " | Usuario " . htmlspecialchars($noticia['idUser']) . "</small></p>
                            <div class='d-flex justify-content-between align-items-center'>
                                <a href='create.php' class='btn btn-outline-primary btn-sm'>Mostrar</a>
                                <a href='update.php?id=" . htmlspecialchars($noticia['idNoticia']) . "' class='btn btn-outline-primary btn-sm'>Editar</a>
                                <form action='../../core/controller/NewsController.php' method='POST' style='display:inline;'>
                                    <input type='hidden' name='method' value='delete'>
                                    <input type='hidden' name='idNoticia' value='" . htmlspecialchars($noticia['idNoticia']) . "'>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        ?>

    </div>
</div>

 <!---Se define un div que alberga el footer, es manipulado a través de un archivo de php-->
        
 <div id="footer">
        <?php include_once __DIR__ . '/../../footer.php' ?>
    </div>

    <!-- Cargar JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../../public/javascript/navbarUtil.js"></script>
</body>
</html>