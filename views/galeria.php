<!DOCTYPE html>
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

        <!--La combinación del id="navbar" y class="nav" sugiere que este div será estilizado 
        para funcionar como la Barra de navegación utilizando Javascript para darle funcionalidad y estructura-->
        <div id="navbar" class="nav">
            <?php
                include_once('../navbar.php')
            ?>
        </div>
        
        <section id="galeria" class="sectionPadding">
            <h1 class="text-center" id="galeria1">Galeria</h1>
            
            <div class="primera">
                <div class="container">
                    <div class="row" id="galeriaContainer">
                        <div class="col">

                            <!--Este código crea una tarjeta (div con clase "card") de 18 rem de ancho que muestra una imagen 
                            (img) y un botón para ver esa imagen en un lightbox y los siguientes div realizan la misma función-->
                            <div class="card">
                                <img src="../public/img/cancun1.jpg"  class="galeria-img" alt="..." width="300" height="200"> 
                            <div class="card-body">
                                    <a data-fslightbox="first-lightbox" href="/public/img/cancun1.jpg"  class="btn-primary custom-btn">ver</a>
                                </div>
                            </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/cancun2.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/cancun2.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/europa1.jpg"  class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/europa1.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/europa2.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/europa2.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/caribe1.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/caribe1.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/caribe2.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/caribe2.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/cuzco1.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/cuzco1.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card" >
                                    <img src="../public/img/cuzco2.jpg"  class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/cuzco2.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/safari1.jpg"  class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/safari1.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/safari2.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/safari2.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/maldivas1.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/maldivas1.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <img src="../public/img/maldivas2.jpg" class="galeria-img" alt="" width="300" height="200">
                                    <div class="card-body">
                                        <a data-fslightbox="first-lightbox" href="/public/img/maldivas2.jpg" class="btn-primary custom-btn">ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--Creamos un documento en javascript llamado "footer.js" por lo tanto en nuestro HTML
            agregamos un div y creamos un id para el footer"-->
            <div id="footer">
                <?php
                    include_once('../footer.php');
                ?>
            </div>

            <!--Este código JavaScript define funciones que se ejecutan cuando se abren dos instancias de lightbox
             (ventanas emergentes de galería de imágenes).-->
            <script>
            fsLightboxInstances["first-lightbox"].props.onOpen = function () {
                console.log("The first lightbox has opened.");
            }
            fsLightboxInstances["second-lightbox"].props.onOpen = function () {
                console.log("The second lightbox has opened.");
            }
            </script>

            <!--Enlaces de boostraap y de todos los documentos creados en javascript-->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"></script>
            <script src="../public/js/fslightbox.js"></script>
            <script src="fslightbox.min.js"></script>
            <script src="../public/js/navbar.js"></script>
    </body>
</html>
