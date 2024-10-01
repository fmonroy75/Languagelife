<?php
// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $obraId = htmlspecialchars($_POST['obraId']); // ID de la obra
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // Correo electr�nico
    $mensaje = htmlspecialchars($_POST['mensaje']); // Mensaje del usuario

    // Validar que el correo electr�nico es v�lido
    if (!$email) {
        echo "Correo electr�nico no v�lido.";
        exit;
    }

    // Configuraci�n del correo
    $to = "educacion@languagelife.cl"; // Cambia esto por el correo destino
    $subject = "Consulta sobre la obra: " . $obraId;
    $body = "ID de la obra: " . $obraId . "\n";
    $body .= "Correo del usuario: " . $email . "\n\n";
    $body .= "Mensaje: \n" . $mensaje;

    // Configurar encabezados del correo
    $headers = "From: noreply@example.com\r\n"; // Cambia a un correo v�lido de tu servidor
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Correo enviado exitosamente.";
    } else {
        echo "Error al enviar el correo.";
    }
} else {
    echo "Solicitud no v�lida.";
}
?>
