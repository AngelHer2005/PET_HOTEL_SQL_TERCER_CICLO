<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="login">
    <h1 class="text-center">REGÍSTRATE</h1>
    <div class="loginF text-center">
        <form action="../CONTROLADOR/registroC.php" method="POST">
            <div>
                <label for="usuario">USUARIO: </label>
                <input type="text" name="usuario">
            </div>
            <div>
                <label for="contraseña">CONTRASEÑA:</label>
                <input type="password" name="contraseña">
            </div>
            <button class="btn btn-success btn-lg" type="submit" value="ok">REGISTRARSE</button>
            <a href="LOGIN.php" class="btn btn-primary btn-lg">INGRESAR SESIÓN</a>
        </form>
        
    </div>
</body>
</html>