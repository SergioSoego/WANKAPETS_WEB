<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password_db = ""; 
$dbname = "wankapets";

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Error de conexión a la base de datos.']));
}

$newEmail = isset($_POST['new_email']) ? $_POST['new_email'] : '';

if (empty($newEmail)) {
    die(json_encode(['success' => false, 'message' => 'No se proporcionó un correo electrónico válido.']));
}

$verificationCode = rand(100000, 999999);
$_SESSION['verification_code'] = $verificationCode;
$_SESSION['temporal_email'] = $newEmail; // Guardar el correo temporal en la sesión

$email = $_SESSION['email']; 

// Actualizar tanto el correo temporal como el código de verificación en la tabla usuarios
$updateQuery = "UPDATE usuarios SET temporal_email = '$newEmail', two_factor_key = '$verificationCode' WHERE email = '$email'";

if ($conn->query($updateQuery) === TRUE) {
    // Envío de correo electrónico de verificación (aquí debes implementar tu lógica de envío de correo)
    $to = $newEmail;
    $subject = "Código de verificación para cambiar correo electrónico";
    $message = "Tu código de verificación es: " . $verificationCode;
    $headers = "From: tu_email@example.com"; // Ajusta el remitente

    if (mail($to, $subject, $message, $headers)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al enviar el correo electrónico con el código de verificación.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar el correo temporal y el código de verificación en la base de datos.']);
}

$conn->close();
?>
