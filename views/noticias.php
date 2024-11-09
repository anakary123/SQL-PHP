<!DOCTYPE html>
<html lang="es">
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Galeria</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/css/style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0./css/all.min.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a4b1bc17f3.js" crossorigin="anonymous"></script>
    </head>
<body>

<div id="navbar" class="nav">
            <?php
                include_once('../navbar.php')
            ?>
</div>

    <h1 class="text-center mb-4">Noticias</h1>

    <?php
        include_once('../core/news/NewsController.php');
        $noticias = index();

        foreach ($noticias as $noticia) {
            echo "
            <div class='primera'>
                <div class='container'>
                    <div class='row' id='galeriaContainer'>
                        <div class='col'>
                            <div class='card'>
                                <img src='../public/img/cancun1.jpg'  class='galeria-img' alt='...' width='300' height='200'> 
                            <div class='card-body'>
                                    <h5 class='card-title'>" . $noticia['titulo'] . "</h5>
                                    <p class='card-text'>" . $noticia['texto'] . "</p>
                                    <p class='card-text'><small class='text-muted'>Publicado el " . $noticia['fecha'] . " por " . $noticia['idUser'] . "</small></p>
                                    
                                    <form action='../core/news/NewsController.php' method='POST'>
                                        <input type='hidden' name='method' value='delete'>
                                        <input type='hidden' name='idNoticia' value='" . $noticia['idNoticia'] . "'>
                                        <button type='submit' class='btn btn-danger'>Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            ";
        }
    ?>
</div>

<div id="footer">
    <?php
        include_once('../footer.php');
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
