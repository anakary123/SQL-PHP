<?php

    require_once __DIR__ . '/../connection/connection.php';


    function handleRequest() {
        if (isset($_POST ['method'])) {
            switch ($_POST ['method']) {
                case 'store':
                    create();
                    break;
                case 'delete':
                    delete();
                    break;
                case 'show':
                    show();
                    break;
                case 'update':
                    update();
                    break;
            }
        }
    }

    function index() {
        $pdo = createConnection();
    
        $sql = "SELECT * FROM noticias JOIN users_data ON noticias.idUser = users_data.idUser ORDER BY noticias.idNoticia DESC";
    
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();
    
        $noticias = $stmt->fetchAll();
    
        if (empty($noticias)) {
            echo "No se encontraron noticias en la base de datos.";
            return;
        }
    
        return $noticias;
    }

    //Crea noticias de la base de datos
    function create(): void {
        $pdo = createConnection(); 

        $titulo = $_POST ['titulo'];
        $imagen = $_POST['imagen'];
        $texto = $_POST ['texto'];
        $fecha = date('Y-m-d');
        $idUser = $_POST['idUser'];

        $sql = "INSERT INTO noticias ( titulo, imagen, texto, fecha, idUser)
                VALUES ( :titulo, :imagen, :texto, :fecha, :idUser)";

        $stmt = $pdo->prepare($sql);


        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':imagen', $imagen);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':idUser', $idUser);

        if ($stmt->execute()) {
            header('Location: ../../views/news/news.php');
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

    function update(): void {
            $pdo = createConnection();

            $idNoticia = $_POST['id'];
            $titulo = $_POST['titulo'];
            $fecha = $_POST['fecha'];
            $texto = $_POST['texto'];
            $imagen = $_POST['imagen'];
            $idUser = $_POST['idUser'];

            $sql = "UPDATE noticias SET 
                    titulo = :titulo, 
                    fecha = :fecha, 
                    texto = :texto, 
                    imagen = :imagen, 
                    idUser = :idUser 
                    WHERE idNoticia = :idNoticia";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':texto', $texto);
            $stmt->bindParam(':imagen', $imagen);
            $stmt->bindParam(':idNoticia', $idNoticia);
            $stmt->bindParam(':idUser', $idUser);

            if ($stmt->execute()) {
                header('Location: ../../views/news/news.php');
                exit();
            } else {
                header('Location: ../../views/news/update.php');
                exit();
            }
    }

    //elimina una noticia de la base de datos
    function delete() {
        $pdo = createConnection();

        $id = $_POST['id'];

        $sql = "DELETE FROM noticias WHERE idNoticia = :idNoticia";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':idNoticia', $id);

        if ($stmt->execute()) {

            header('Location: ../../views/news/news.php');
            exit();
        } else {
            header('Location: ../../views/news/news.php');
            exit();
        }

    }

    function getUsers() {
        $pdo = createConnection();

        $sql = "SELECT * FROM users_data";

        $stmt = $pdo->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    handleRequest();