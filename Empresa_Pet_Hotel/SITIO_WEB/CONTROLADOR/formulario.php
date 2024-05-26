<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];
    
    $destinatario = "angelhernanpatricioarroyo@gmail.com"; 
    
    $asunto = "Email de Prueba";
    
    $cuerpo = '
    <html>
        <head>
            <title>Prueba de correo</title>
        </head>
        <body>
            <h1>Email de: '.$nombre . $apellido. '</h1>
            <p> '.$mensaje.'</p>
        </body>
    </html>';

    $cuerpoMensaje = "Nombre: $nombre $apellido\n";
    $cuerpoMensaje .= "Email: $email\n";
    $cuerpoMensaje .= "Mensaje:\n$mensaje";
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: $nombre $apellido <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    
    if (mail($destinatario, $asunto, $cuerpoMensaje, $headers)) {
        header("Location: ../PLANTILLAS/HOME.php");
    } else {
        echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
} else {
    header("Location: ../PLANTILLAS/HOME.php");
    exit;
}
?>






