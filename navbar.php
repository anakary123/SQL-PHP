<?php 

function ObtenerRutas() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', trim($url, '/')); // Elimina posibles '/' al inicio o al final.

    // Determinamos si estamos en views o más profundo
    if (in_array('views', $route)) {
        $depth = count($route) - array_search('views', $route) - 1;
    } else {
        $depth = 0;
    }

    // Calculamos el prefijo para rutas relativas según la profundidad
    $prefix = str_repeat('../', $depth);

    // Definimos las rutas
    $definedRoutes = [
        $prefix . 'index.php',
        $prefix . 'views/galeria.php',
        $prefix . 'views/presupuesto.php',
        $prefix . 'views/contacto.php',
        $prefix . 'views/news/news.php',           // Página principal de Noticias
        $prefix . 'views/appointments/appointments.php', // Página principal de Citas
        $prefix . 'views/users/users.php',         // Página principal de Usuarios
        $prefix . 'views/auth/login.php',

        // Rutas adicionales para los archivos dentro de cada sección
        // Noticias (3 archivos adicionales)
        $prefix . 'views/news/create.php',
        $prefix . 'views/news/show.php',
        $prefix . 'views/news/update.php',

        // Citas (3 archivos adicionales)
        $prefix . 'views/appointments/create.php',
        $prefix . 'views/appointments/show.php',
        $prefix . 'views/appointments/update.php',

        // Usuarios (3 archivos adicionales)
        $prefix . 'views/users/create.php',
        $prefix . 'views/users/show.php',
        $prefix . 'views/users/update.php'
    ];

    return $definedRoutes;
}

function ObtenerLogo() {
    $url = $_SERVER['REQUEST_URI'];
    $route = explode('/', trim($url, '/'));
    
    // Determinamos si estamos en views o más profundo
    if (in_array('views', $route)) {
        $depth = count($route) - array_search('views', $route) - 1;
    } else {
        $depth = 0;
    }

    // Calculamos la ruta relativa para el logo
    $prefix = str_repeat('../', $depth);
    return $prefix . 'public/img/logo1.png';
}

function renderNavbar() { 
    $routes = ObtenerRutas();
    $logo = ObtenerLogo();

    return "<nav class='navbar navbar-expand-lg bg-light navbar-fixed'>
                <div class='container-fluid'>
                    <a class='navbar-brand' href='#'>
                        <img src='$logo' alt='Logo' width='100' height='100'>
                    </a>
                    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                        <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                            <li class='nav-item'>
                                <a class='nav-link' id='nav-inicio' href='$routes[0]'>Inicio</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' id='nav-galeria' href='$routes[1]'>Galería</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' id='nav-presupuesto' href='$routes[2]'>Presupuesto</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' id='nav-contacto' href='$routes[3]'>Contacto</a>
                            </li>
                            <li class='nav-item dropdown'>
                                 <a class='nav-link' id='nav-news' href='$routes[4]'>Noticias</a>
                                <ul class='dropdown-menu' aria-labelledby='nav-news'>
                                    <li><a class='dropdown-item' href='$routes[8]'>Crear</a></li>
                                    <li><a class='dropdown-item' href='$routes[9]'>Ver</a></li>
                                    <li><a class='dropdown-item' href='$routes[10]'>Modificar</a></li>
                                </ul>
                            </li>
                            <li class='nav-item dropdown'>
                                <a class='nav-link' id='nav-contacto' href='$routes[5]'>Citas</a>
                                

                                <ul class='dropdown-menu' aria-labelledby='nav-appointments'>
                                 a class='nav-link dropdown-toggle' href='#' id='nav-appointments' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Citas</a>

                                    <li><a class='dropdown-item' href='$routes[11]'>Crear </a></li>
                                    <li><a class='dropdown-item' href='$routes[12]'>Ver </a></li>
                                    <li><a class='dropdown-item' href='$routes[13]'>Archivo </a></li>
                                </ul>
                            </li>
                           <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' id='nav-users' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Usuarios</a>
                                <ul class='dropdown-menu' aria-labelledby='nav-users'>
                                    <li><a class='dropdown-item' href='$routes[14]'>Archivo 1</a></li>
                                    <li><a class='dropdown-item' href='$routes[15]'>Archivo 2</a></li>
                                    <li><a class='dropdown-item' href='$routes[16]'>Archivo 3</a></li>
                                </ul>
                            </li>
                        </ul>
                        <span class='navbar-text'>
                            <a class='btn btn-primary' id='login-button' href='$routes[7]'>Login</a>
                        </span>
                    </div>
                </div>
            </nav>";
}

echo renderNavbar(); 
