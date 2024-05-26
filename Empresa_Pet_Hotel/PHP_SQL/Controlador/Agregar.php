<?php
include "../Conexion/connection.php";

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$sql = "INSERT INTO Cuentas (Usuario, Contraseña) VALUES (?, ?)";
$params = array($usuario, $contrasña);
$stmt = sqlsrv_prepare($connection, $sql, $params);

if (sqlsrv_execute($stmt)) {
    echo "<div class='alert alert-success' role='alert'>Cuenta agregada exitosamente. <a href='../Plantillas/index.php' class='alert-link'>Ver listado</a></div>";
    exit();
} else {
    echo "<div class='alert alert-danger' role='alert'>Error al agregar la cuenta.</div>";
}
?>
