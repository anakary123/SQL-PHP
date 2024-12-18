<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspirate y Viaja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0./css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a4b1bc17f3.js" crossorigin="anonymous"></script>
  </head>
  
  <body>
    <!--La combinación del id="navbar" y class="nav" sugiere que este div será estilizado 
    para funcionar como la Barra de navegación utilizando Javascript para darle funcionalidad y estructura-->
    <div id="navbar" class="nav">
      <?php
        include_once('navbar.php')
      ?>
    </div>
    <!-- Sección de encabezado -->
     
    <header class="header">
      <div class="overlay"></div>
      <div class="header-content">
        <br>
        <h1>¡Bienvenidos a Inspirate y Viaja</h1>
        <p>Explora los mejores destinos y vive experiencias  inolvidables.¡Tu próxima aventura empieza aquí</p>
        <br>
        <a href="#destinos-container" class="btn btn-primary">Explora tus Momentos</a>
      </div>
    </header>
    <!-- Sección de destinos cargados dinámicamente -->
     
    <div class="destinos-section">
      <div class="destinos-container" id="destinos-container">
        <!-- Aquí se cargarán las tarjetas dinámicamente desde el archivo JSON -->
      </div>
    </div>
    <script src="public/js/app.js"></script>
    
    <section id="sobre-nosotros">
      <h2 class="text-center">Sobre Nosotros</h2>
      <br>
      <p class="Nosotros">
        En <strong>Inspirate y Viaja</strong> nuestra pasión por los viajes se traduce en experiencias inolvidables
        diseñadas para satisfacer los deseos y expectativas de cada cliente.
        Con más de una década de experiencia en el mercado, nos enorgullecemos de ofrecer una amplia
        variedad de paquetes turísticos personalizados que se adaptan a los gustos y preferencias de cada viajero.
        Desde escapadas relajantes en playas paradisíacas hasta emocionantes aventuras en destinos remotos,
        nos especializamos en crear itinerarios únicos y a medida.
    
      </p>
    </section>
    <section id="Reseñas" class="sectionPadding">
      <h2 class="text-center" id="reseñas1" >Reseñas</h2>
      <div>
        <div class="contenedor">
          <div class="row" id="reseñascontainer"></div>
        </div>
      </div>
    </section>
    <!--Creamos un documento en javascript llamado "footer.js" por lo tanto en nuestro HTML 
    agregamos un div y creamos un id para el footer"-->
    
    <div id="footer">
      <?php
        include_once('footer.php');
      ?>
    </div>
    
    <!--Enlaces de boostraap y de todos los documentos creados en PHP-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <script src="public/js/utils.js"></script>
    <script src="public/js/navbar.js"></script>
    
  </body>
</html>