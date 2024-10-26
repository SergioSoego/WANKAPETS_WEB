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

$input = json_decode(file_get_contents('php://input'), true);
$email = $conn->real_escape_string(trim($input['email']));
$code = $conn->real_escape_string(trim($input['code']));

// Verificar el código de verificación en la base de datos
$query = "SELECT * FROM usuarios WHERE temporal_email = '$email' AND two_factor_key = '$code'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    // Actualizar el correo electrónico en la base de datos
    $updateQuery = "UPDATE usuarios SET email = '$email', temporal_email = NULL, two_factor_key = NULL WHERE temporal_email = '$email'";
    if ($conn->query($updateQuery) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al actualizar el correo electrónico.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Código incorrecto.']);
}

$conn->close();
?>
