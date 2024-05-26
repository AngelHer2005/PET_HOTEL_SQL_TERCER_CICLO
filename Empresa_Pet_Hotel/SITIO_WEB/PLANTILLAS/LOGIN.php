<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="login">
    <h1 class="text-center">INGRESA SESIÓN</h1>
    <div class="loginF text-center">
        <form action="../CONTROLADOR/loginC.php" method="POST">
            <div>
                <label for="usuario">USUARIO: </label>
                <input type="text" name="usuario">
            </div>
            <div>
                <label for="contraseña">CONTRASEÑA:</label>
                <input type="password" name="contraseña">
            </div>
            <button class="btn btn-success btn-lg" type="submit">INGRESAR</button>
            <a href="REGISTRO.php" class="btn btn-primary btn-lg">REGISTRARSE</a>
        </form>
        
    </div>
</body>
</html>