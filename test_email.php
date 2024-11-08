<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$to = "tucorreo@ejemplo.com";
$subject = "Prueba de correo";
$message = "Este es un correo de prueba para verificar la configuración.";
$headers = "From: jordangeralmy2002@gmail.com\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Correo enviado correctamente.";
} else {
    echo "Error al enviar el correo.";
    print_r(error_get_last());
}
