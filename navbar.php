<?php
    // Obtener la URL actual
    function getRoutes() {
        $url = $_SERVER['REQUEST_URI'];

        $route = explode('/',$url);

        $arrayContainsViews = in_array('views', $route);
        $arrayContainsAuth = in_array('auth', $route);

        if ($arrayContainsViews) {
            $definedRoutes = [
                '../index.php',
                'galeria.php',
                'presupuesto.php',
                'contacto.php',
                'noticias.php',
                'auth/login.php'
            ];
        }else{
            $definedRoutes = [
                'index.php',
                'views/galeria.php',
                'views/presupuesto.php',
                'views/contacto.php',
                'views/noticias.php',
                'views/auth/login.php'
            ];
        }

        if($arrayContainsAuth) {
            $definedRoutes = [
                '../../index.php',
                '../galeria.php',
                '../presupuesto.php',
                '../contacto.php',
                'noticias.php',
                'login.php'
            ];
        }

        return $definedRoutes; 
    }

    function getLogo() {
        $url = $_SERVER['REQUEST_URI'];

        $route = explode('/',$url);

        $arrayContainsViews = in_array('views', $route);
        $arrayContainsAuth = in_array('auth', $route);

        $logo = 'public/img/logo1.png';

        if ($arrayContainsViews) {
            $logo = '../public/img/logo1.png';
        }

        if ($arrayContainsAuth) {
            $logo =  '../../public/img/logo1.png';
        }

        return $logo;
    }

    function renderNavbar() {
        $routes = getRoutes();
        $logo = getLogo();

        return "<nav class='navbar navbar-expand-lg bg-light navbar-fixed'>
                    <div class='container-fluid'>
                        <a class='navbar-brand' href='#'>
                            <img src=$logo alt='Logo' width='100' height='100'>
                        </a>
                        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                                <li class='nav-item '>
                                    <a class='nav-link ' id='nav-inicio' href=$routes[0]>Inicio</a>
                                </li>
                                <li class='nav-item '>
                                    <a class='nav-link'  id= 'nav-galeria' href=$routes[1]>Galería</a>
                                </li>
                                <li class='nav-item '>
                                    <a class='nav-link' id='nav-presupuesto' href=$routes[2]>Presupuesto</a>
                                </li>
                                <li class='nav-item '>
                                    <a class='nav-link'  id='nav-contacto' href=$routes[3]>Contacto</a>
                                </li>
                                  <li class='nav-item '>
                                    <a class='nav-link'  id='nav-noticias' href=$routes[4]>Noticias</a>
                                </li>
                            </ul>

                            <span class='navbar-text'>
                                <a class='btn btn-primary' id='login-button' href=$routes[5]>Login</a>
                            </span>
                        </div>
                    </div>
                </nav>";
    }

    echo renderNavbar();
?>