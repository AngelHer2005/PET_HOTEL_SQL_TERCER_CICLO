<?php
try {
    $connection = new PDO("sqlsrv:Server=localhost;Database=WEB_PET", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
