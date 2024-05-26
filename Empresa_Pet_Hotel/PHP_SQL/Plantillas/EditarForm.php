<?php
include "../Conexion/connection.php";

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    $query = "SELECT * FROM Cuentas WHERE id = ?";
    $params = array($id);
    $stmt = sqlsrv_query($connection, $query, $params);

    if ($stmt === false) {
        echo "Error al ejecutar la consulta.";
        exit;
    }

    $cuenta = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if (!$cuenta) {
        echo "Cuenta no encontrada.";
        exit;
    }
} else {
    echo "ID no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Editar cuenta</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center" style="background-color: blueviolet; color:aliceblue; border-radius: 10px;">EDITAR CUENTA</h1>
        <br>
        <form action="../Controlador/Editar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $cuenta['id']; ?>">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario: </label>
                <input type="text" class="form-control" name="usuario" value="<?php echo htmlspecialchars($cuenta['usuario']); ?>">
            </div>
            <div class="mb-3">
                <label for="contra" class="form-label">Contraseña:</label>
                <input type="text" class="form-control" name="contraseña" value="<?php echo htmlspecialchars($cuenta['contraseña']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</body>
</html>
