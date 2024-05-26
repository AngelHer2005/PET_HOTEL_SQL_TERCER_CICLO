<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Agregar Cuenta</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center" style="background-color: blueviolet; color:aliceblue; border: radius 10px;">AGREGAR CUENTA</h1>
        <br>

        <form action="../Controlador/Agregar.php" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario: </label>
                <input type="text" class="form-control" name="usuario">
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña: </label>
                <input type="password" class="form-control" name="contraseña">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="../Plantillas/index.php" class="btn btn-dark">Regresar</a>
        </form>
    </div>
    
</body>
</html>
