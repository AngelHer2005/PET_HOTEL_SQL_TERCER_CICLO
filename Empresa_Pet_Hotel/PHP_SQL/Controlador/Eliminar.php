<?php
if(isset($_POST['eliminar_cuenta'])) {
    if(isset($_POST['id'])) {
        include "../Conexion/connection.php";

        $id = $_POST['id'];

        $sql = "DELETE FROM Cuentas WHERE id = ?";
        $params = array($id);
        $stmt = sqlsrv_prepare($connection, $sql, $params);

        if (sqlsrv_execute($stmt)) {
            if(sqlsrv_rows_affected($stmt) > 0) {
                header("Location:../Plantillas/index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Error al eliminar la cuenta.</div>";   
            }
        } else {
            echo "<div class='alert alert-danger'>Error al ejecutar la consulta.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>ID de la cuenta no recibido.</div>";
    }
}
?>
