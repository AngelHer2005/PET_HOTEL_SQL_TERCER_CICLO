<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>PET HOTEL</title>
</head>
<body>
    <div>
        <h1 class="text-center" style="background-color: blueviolet; color:aliceblue; border-radius: 10px;">LISTADO DE CUENTAS</h1>
        <br>
    </div>
    <div class="container">
        <a href="AgregarForm.php" class='btn btn-success'>Agregar Cuenta</a><br><br>
        <table class="table">
            <thead>
                <tr class="table-info text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "../Conexion/connection.php";
                    $query = $connection->query("SELECT * FROM Cuentas");
                    $fila = $query->fetchAll(PDO::FETCH_OBJ);

                    foreach ($fila as $row) {
                        echo "<tr>";
                        echo "<th scope='row'>{$row->id}</th>";
                        echo "<td>{$row->usuario}</td>";
                        echo "<td>{$row->contraseña}</td>";
                        echo "<td>";
                        echo "<a href='EditarForm.php?id={$row->id}' class='btn btn-primary'>Editar</a>";
                        echo "<form action='../Controlador/Eliminar.php' method='POST' style='display: inline;'>";
                        echo "<input type='hidden' name='id' value='$row->id'>";
                        echo "<button type='submit' name='eliminar_cuenta' class='btn btn-danger'>Eliminar</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
