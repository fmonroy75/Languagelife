<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // Validar los campos
    if (empty($name) || empty($subject) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Por favor, completa el formulario correctamente.";
        exit;
    }

    // Configurar el destinatario y el asunto del correo
    $recipient = "educacion@languagelife.cl";  // Cambia esto por tu correo real
    $email_subject = "Nuevo mensaje de contacto: $subject";

    // Construir el cuerpo del correo
    $email_content = "Nombre: $name\n";
    $email_content .= "Correo: $email\n\n";
    $email_content .= "Mensaje:\n$message\n";

    // Construir los encabezados del correo
    $email_headers = "From: $name <$email>";

    // Enviar el correo
    if (mail($recipient, $email_subject, $email_content, $email_headers)) {
        echo "success";  // Devolver "success" si el correo se envió correctamente
    } else {
        echo "Hubo un problema al enviar tu mensaje, por favor intenta más tarde.";
    }
} else {
    echo "Hubo un problema con tu envío, por favor intenta de nuevo.";
}
?>
