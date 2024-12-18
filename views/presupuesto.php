<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inspirate y Viaja</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/css/style.css">
    </head>
    <body>

       <!--La combinación del id="navbar" y class="nav" sugiere que este div será utilizado
       para funcionar como la Barra de navegación utilizando Javascript para darle funcionalidad y estructura-->
        <div id="navbar" class="nav">
            <?php
                include_once('../navbar.php')
            ?>
        </div>
        <div class="container mt-5">
            <h1 class="text-center mb-4" id="presupuesto1">Presupuesto</h1>
            <form id="presupuestoForm">
                
                <!--Primera Parte para obtener la información de nuestros clientes-->
                <div class="card espacioEntreElementosDelPresupuesto">
                    <div class="card-header">
                        <h2 class="parte1">Datos del contacto</h2>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="15" placeholder="Max. 15 caracteres">
                            <span id="errorNombre" class="error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos:</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="40" placeholder="Máx. 40 caracteres">
                            <span id="errorApellidos" class="error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono de Contacto: </label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" maxlength="9" placeholder="9 digitos">
                            <span id="errorTelefono" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Correo electrónico: </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ejemplo: usuario@dominio.com"> 
                                <span id="errorEmail" class="error"></span>
                            </div>
                        </div>
                    </div>
                    <!--Parte 2 del Presupuesto-->
                    <div class="card espacioEntreElementosDelPresupuesto">
                        <!--Este código crea una sección de encabezado dentro de una tarjeta (card-header)-->
                        <div class="card-header">
                            <h2 class="parte2">Presupuesto</h2>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="viajes" class="form-label">viajes</label>
                                <select class="form-select" id="viajes" name="viajes">
                                    <option value="0">Elige tu Destino</option>
                                    <option value="500">Paquete a cancun - 500€</option>
                                    <option value="1500">Tour por Europa 15 dias - 1500€</option>
                                    <option value="2000">Crucero por el caribe  - 2000€</option>
                                    <option value="1300">Aventura en Machu Picchu - 1300€</option>
                                    <option value="1500">Safari en Africa - 3500€</option>
                                    <option value="2500">Escapada a las Islas Maldivas - 2500€</option>
                                  
                                </select>
                                <span id="errorViajes" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label for="plazo" class="form-label"> Plazo (en meses):</label>
                                <input type="number" step="1" class="form-control" id="plazo" name="plazo" min="0" placeholder="Introduce un plazo">
                                <span id="errorPlazo" class="error"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Extras para agregar al carrito:</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extra1" value="50">
                                    <label class="form-label" for="extra1"> Cena romantica - 50€</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extra2" value="100">
                                    <label class="form-label" for="extra2"> Pedida de Mano - 100€</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extra3" value="20">
                                    <label class="form-label" for="extra3"> Ticket Estadio - 20€</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extra4" value="40">
                                    <label class="form-label" for="extra4"> Desayuno en Maldivas - 40€</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extra5" value="15">
                                    <label class="form-label" for="extra5"> Tren Machu Picchu - 15€</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Mostrar Presupuesto Final -->
                    <div class="mb-3">
                        <label for="presupuestoFinal" class="form-label">Presupuesto final:</label>
                        <input type="text" id="presupuestoFinal" class="presupuestoFinal" value="0€" readonly>
                    </div>
                    
                    <!-- Condiciones y Botones -->
                    <div class="mb-3 form-check">
                        <!-- Input de tipo checkbox con clase 'form-check-input' que aplica los estilos visuales de la casilla de verificación. 
                         El 'id' permite asociarlo a la etiqueta correspondiente. -->
                        <input type="checkbox" class="form-check-input" id="condiciones">
                        <!-- Etiqueta que muestra el texto junto al checkbox. El atributo 'for' asocia el label con el input usando su 'id', 
                         permitiendo activar el checkbox al hacer clic en el texto. -->
                        <label class="form-check-label" for="condiciones">Acepto las condiciones de privacidad</label>
                    </div>
                    <button type="submit" class="btn btn-primary" id="enviarFormulario"> Enviar Presupuesto </button>
                    <button type="reset" class="btn btn-secundary" id="limpiarFormulario"> Resetear </button> <br><br>
                </form>
        </div>
        <!--Creamos un documento en javascript llamado "footer.js" por lo tanto en nuestro HTML 
        agregamos un div y creamos un id para el footer"-->
        <div id="footer">
            <?php
                include_once('../footer.php');
            ?>
        </div>
        
        <!--Enlaces de boostraap y de todos los documentos creados en PHP-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="../public/js/navbar.js"></script>
        <script src="../public/js/presupuesto.js"></script>
    
    </body>
    
</html>

