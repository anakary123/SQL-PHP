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
        <div class="card" style="width: 18rem;">
        <img src="../../public/img/fondo.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Inicio de sesión</h5>
            
            <form action="../../core/auth/singup.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="lastname" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="birthdate" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="sex" class="form-label">Sexo</label>
                    <select class="form-select" id="sex" name="sex" required>
                        <option value="">Seleccione un sexo</option>
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <div class="d-flex">
                        <select class="form-select me-2" id="country-code" name="country-code" required>
                            <option value="">Código del país</option>
                            <option value="+1">+1 🇺🇸</option>
                            <option value="+34">+34 🇪🇸</option>
                            <option value="+44">+44 🇬🇧</option>
                            <option value="+55">+55 🇧🇷</option>
                            <!-- Add more country codes as needed -->
                        </select>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Registrar</button>
            </form>
        </div>
        <div class="card-body">
            <a href="#" class="card-link custom-link">Registrarse como Admin</a>
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

  </body>
</html>
