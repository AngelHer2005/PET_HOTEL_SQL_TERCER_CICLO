<?php
$connection = new PDO("mysql:host=localhost;dbname=WEB_PET","root","");
if (!$connection) {
    die("Error de conexión: " . $connection->errorInfo()[2]);
}
?>