<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoge y limpia los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Dirección de correo electrónico del destinatario
    $to = 'delucaalanmauricio@gmail.com'; // Cambia esto a tu dirección de correo
    $subject = 'Nuevo mensaje de contacto de ' . $name;
    
    // Cuerpo del mensaje
    $body = "Nombre: $name\n";
    $body .= "Correo Electrónico: $email\n";
    $body .= "Mensaje:\n$message\n";

    // Encabezados del correo
    $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

    // Envía el correo electrónico
    if (mail($to, $subject, $body, $headers)) {
        echo '<p>Mensaje enviado exitosamente.</p>';
    } else {
        echo '<p>Error al enviar el mensaje. Inténtalo de nuevo.</p>';
    }
} else {
    // Redirige si no es una solicitud POST
    header("Location: index.php");
    exit();
}
?>
