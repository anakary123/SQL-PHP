
<?php
// Incluir la conexión a la base de datos
include($_SERVER['DOCUMENT_ROOT'] . '/basededatos.php');

// Inicializamos la variable de noticias
$noticias = [];

try { 
// Obtener todas las noticias desde la base de datos
$query = "SELECT n.id, n.titulo, n.fecha_publicacion, n.texto, n.foto, u.nombre 
              FROM noticias n 
              INNER JOIN usuarios u ON n.usuario_id = u.id
              ORDER BY n.fecha_publicacion DESC";
       
$stmt = $pdo->prepare($query);  
$stmt->execute();
// Verificamos si la consulta devuelve resultados
    
  
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
if (empty($noticias)) {     
// Si no se encuentran noticias, podemos mostrar un mensaje     
$error_message = "No hay noticias disponibles.";
    }
} 
catch (PDOException $e) {
    
// Manejo de error en caso de que la consulta falle 
$error_message = "Error al obtener noticias: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h1 class="text-center mb-4">Noticias</h1>

    <?php foreach ($noticias as $noticia): ?>
        <div class="card mb-4">
            <img src="../../img/logo1.png<?php echo $noticia['foto']; ?>" class="card-img-top" alt="Foto de la noticia">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($noticia['titulo']); ?></h5>
                <p class="card-text"><?php echo nl2br(htmlspecialchars($noticia['texto'])); ?></p>
                <p class="card-text"><small class="text-muted">Publicado el <?php echo date('d/m/Y H:i', strtotime($noticia['fecha_publicacion'])); ?> por <?php echo htmlspecialchars($noticia['nombre']); ?></small></p>
            </div>
        </div>
    <?php endforeach; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
