<?php
    include "../BASE DE DATOS/conexion.php";
    $tarifa = $_POST['tarifa'];
    switch ($tarifa) {
        case 'HRT':
            $tarifa = 'Habitación Raza Miny o Toy';
            break;
        case 'HRP':
            $tarifa = 'Habitación Raza Pequeña';
            break;
        case 'HRM':
            $tarifa = 'Habitación Raza Mediana';
            break;
        case 'HRG':
            $tarifa = 'Habitación Raza Grande';
            break;
        case 'HREG':
            $tarifa = 'Habitación Raza Extra Grande';
            break;
    }
    $precios = [
        'HRT' => ['premium' => 60, 'estandar' => 55],
        'HRP' => ['premium' => 75, 'estandar' => 70],
        'HRM' => ['premium' => 65, 'estandar' => 60],
        'HRG' => ['premium' => 85, 'estandar' => 80],
        'HREG' => ['premium' => 100, 'estandar' => 95]
    ];
    
    $id = $connection->query("SELECT COUNT(*) AS total FROM datoscuenta");
    $id = $id->fetch(PDO::FETCH_ASSOC)['total'] + 1;
    $nombre_dueno = $_POST['nombre_dueno'];
    $dni = $_POST['dni'];
    $dir = $_POST['dir'];
    $telefono = $_POST['telefono'];
    $habitacion = $_POST['habitacion'];
    $precio = $precios[$_POST['tarifa']][$habitacion];

    $sql = $connection->prepare("INSERT INTO datoscuenta (iddatos, nombre, dni, direccion, celular) VALUES (?, ?, ?, ?, ?)");

    if ($sql->execute([$id, $nombre_dueno, $dni, $dir, $telefono])) {
        $sql = $connection->prepare("INSERT INTO habitaciones (idhabitacion, tipohabitacion, precio, tipo) VALUES (?, ?, ?, ?)");
        if($sql->execute([$id, $tarifa, $precio, $habitacion])){
            $sql = $connection->prepare("INSERT INTO datosh (iddatos, idhabitacion) VALUES (?, ?)");
            if($sql->execute([$id, $id])){
                header("Location:../PLANTILLAS/HOME.php");
                echo "Reserva realizada con éxito para $nombre_perro ($raza) del $fecha_entrada - $fecha_salida.";
            }else{
                echo "<div class='alert alert-danger' role='alert'>Hubo un error al registrar la reserva.</div>";
            }
        }else{
            echo "<div class='alert alert-danger' role='alert'>Hubo un error al registrar la reserva.</div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>Hubo un error al registrar la reserva.</div>";
    }
?>