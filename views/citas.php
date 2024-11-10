<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0./css/all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a4b1bc17f3.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <h1>Administracionde Usuarios</h1>

    <h2>Crear Usuarios</h2>
    
    <form method ="POST">
        <input type="text" name="username" placeholder = "nombre de usuario">
        <input type="password" name="password" placeholder ="contraseña">
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type ="submit" name = "crear">Crear Usuarios</button>

    </form>
<!-- modificar usuarios -->
     <h2>Modificar Usuarios</h2>
     <form action="POST">
        <select name="id" required>
            <option value="">Seleccionar Usuarios</option>
            <?php foreach ($usuarios  as $usuario): ?>
                <option value="<?= $usuario['id'] ?>"><?= $usuario['username'] ?></option>
                <?php endforeach; ?>
        </select>
        <input type="text" name="username" placeholder="Nuevo nombre de usuario" required>
        <input type="password" name="password" placeholder="Nueva contraseña (opcional)">
        <select name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit" name="modificar">Modificar Usuario</button>
    </form>
    
    <h2>Eliminar Usuario</h2>

    <form method="POST"><select name="id" required>
        <option value="">Seleccionar Usuario</option>
        <?php foreach ($usuarios as $usuario): ?>
            <option value="<?= $usuario['id'] ?>"><?= $usuario['username'] ?></option>
            <?php endforeach; ?>
            <button type="submit" name="eliminar">Eliminar Usuario</button>
    </form>


    <h2>Lista de Usuarios</h2>
    <table border="1">
        <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
            <td><?= $usuario['id'] ?></td>
            <td><?= $usuario['username'] ?></td>
            <td><?= $usuario['role'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
   


