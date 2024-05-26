<?php
    include "../BASE DE DATOS/conexion.php";

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $id = $connection->query("SELECT COUNT(*) AS total FROM Cuentas");
    $total_cuentas = $id->fetch(PDO::FETCH_ASSOC)['total'] + 1;

    $sql = $connection->prepare("INSERT INTO Cuentas (IdCuenta, Usuario, Contraseña) VALUES (?, ?, ?)");

    if ($sql->execute([$total_cuentas, $usuario, $contraseña])) {
        header("Location: ../PLANTILLAS/HOME.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>Hubo un error al registrar la cuenta.</div>";
    }
?>
