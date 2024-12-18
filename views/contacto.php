<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/mapa.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css">
  </head>
  <body>

    <!--La combinación del id="navbar" y class="nav" sugiere que este div será estilizado 
    para funcionar como la Barra de navegación utilizando Javascript para darle funcionalidad y estructura-->

    <div id="navbar" class="nav">
        <?php
          include_once('../navbar.php')
        ?>
    </div>
    <section id="contacto">
      <h1 class="text-center" id="contacto1">Contacto</h1>
      <div class="container">
        <div class="row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
              
              <!--Este código define el cuerpo de una tarjeta (card-body) con información de contacto.-->
              <div class="card-body">
                <h5 class="card-title"><strong>Visitanos en :</strong></h5>
                <p class="card-text" id="direccion">Calle Mayor 3, 28021 Madrid</p>
                <p class="card-text">Correo electrónico: inspirateyviaja@empresa.com</p>
                <p class="card-text">WhatsApp: 612345879</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <!--Este contenedor está preparado para que un script de JavaScript lo llene con el contenido del mapa,
                permitiendo la visualización geográfica dentro de la página.-->
                <div id="map"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div id="mapa"></div>
    <!--Creamos un documento en javascript llamado "footer.js" por lo tanto en nuestro HTML 
    agregamos un div y creamos un id para el footer"-->

    <div id="footer">
        <?php
            include_once('../footer.php');
        ?>
      </div>

    <!--Enlaces de boostraap y de todos los documentos creados en javascript-->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
    crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="../public/js/mapa.js"></script>
    <script src="../public/js/navbar.js"></script>
    <script src="../public/js/rutas.js"></script>

  </body>
</html>