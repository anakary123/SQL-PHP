<?php

    require_once __DIR__ . '/../connection/connection.php';


    function handleRequest() {
        if (isset($_POST ['method'])) {
            switch ($_POST ['method']) {
                case 'create':
                    crear();
                    break;
                case 'delete':
                    eliminar();
                    break;
                case 'show':
                    mostrar();
                case 'update':
                    editar();
                    break;
            }
        }
    }

    
    function index() {
        $pdo = createConnection();
    
        $sql = "SELECT * FROM noticias";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    
        $noticias = $stmt->fetchAll();
    
        if (empty($noticias)) {
            echo "No se encontraron noticias en la base de datos.";
            exit;
        }
    
        return $noticias;
    }

    //Crea noticias de la base de datos
    function create(): void {
        $pdo = createConnection(); 

       
        $titulo = $_POST ['titulo'];
        $imagen = $_FILES['imagen']['tmp_name'];
        $texto = $_POST ['texto'];
        $fecha = date('Y-m-d');
        $idUser = 4;

        $sql = "INSERT INTO noticias ( titulo, imagen, texto, fecha, idUser)
                VALUES ( :titulo, :imagen, :texto, :fecha, :idUser)";

        $stmt = $pdo->prepare($sql);


        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':idUser', $idUser);

        if ($stmt->execute()) {

            echo 'Noticia creada correctamente';
            exit();
        } else {
            header('Location: ../../views/news/create.php');
            exit();
        }
    }


    //muestra una noticia en la base de datos
    function show(int $id) {
        $pdo = createConnection();

        $sql = "SELECT * FROM noticias WHERE idNoticia = :idNoticia";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idNoticia', $id);

        $stmt->execute();
        
        return $stmt ->fetch();

    }

        //edita una noticia en la base de datos
    function update(): void {
            $pdo = createConnection();

            $idNoticia = $_POST['id'];
            $titulo = $_POST['titulo'];
            $fecha = $_POST['fecha'];
            $texto = $_POST['texto'];
            $imagen = $_POST['imagen'];

            $sql = "UPDATE noticias SET titulo = :titulo, fecha = :fecha, texto = :texto, imagen = :imagen WHERE idNoticia = :idNoticia";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':idNoticia', $idNoticia);

            if ($stmt->execute()) {
                    header('Location: ../../views/news/news.php');
                exit();
            } else {
                header('Location: ../../views/news/update.php');
                exit();
            }
    }

    //elimina una noticia de la base de datos
    function delete(int $id) {
        $pdo = createConnection();

        $sql = "DELETE FROM noticias WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam('id', $id);

        if ($stmt->execute()) {

            header('Location: ../../views/news/news.php');
            exit();
        } else {
            header('Location: ../../views/news/news.php');
            exit();
        }

    }

    handleRequest()

    ?>