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
$email = $conn->real_escape_string($input['email']);
$code = $conn->real_escape_string($input['code']);

$query = "SELECT * FROM usuarios WHERE email = '$email' AND two_factor_key = '$code'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Código incorrecto.']);
}

$conn->close();
?>
