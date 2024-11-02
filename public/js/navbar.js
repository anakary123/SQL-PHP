function estilizarNavbar() {
    //Detectar la pagina en la que estamos y añadir la clase "active" al enlace correspondiente
    if (location.includes('index.php')) {
        document.getElementById ('nav-inicio').classList.add('active');
    } else if (location.includes('galeria.php')) {
        document.getElementById ('nav-galeria').classList.add('active');
    } else if (location.includes ('presupuesto.php')) {
        document.getElementById ('nav-presupuesto').classList.add('active');
    } else if (location.includes ('contacto.php')) {
        document.getElementById ('nav-contacto').classList.add('active');
    }
}



estilizarNavbar();