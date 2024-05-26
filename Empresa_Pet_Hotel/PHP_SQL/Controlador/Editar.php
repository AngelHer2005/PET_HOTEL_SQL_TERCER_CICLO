<?php
include "../Conexion/connection.php";

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$contra = $_POST['contra'];

$sql = "UPDATE Cuentas SET Usuario = ?, Contraseña = ? WHERE id = ?";
$params = array($usuario, $contra, $id);
$stmt = sqlsrv_prepare($connection, $sql, $params);

if (sqlsrv_execute($stmt) === false) {
    echo "<div class='alert alert-danger' role='alert'>Error al actualizar.</div>";
} else {
    header("Location: ../Plantillas/index.php"); 
    exit();
}
?>
