<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "wankapets";

// Crear la conexión
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die(json_encode(array("status" => "error", "message" => "Connection failed: " . $conn->connect_error)));
}

// Verificar si se recibieron los parámetros necesarios
if (!isset($_POST['verificacion']) || !isset($_POST['nombre_usuario'])) {
    die(json_encode(array("status" => "error", "message" => "Parámetros incompletos.")));
}

// Obtener los datos del formulario
$nombre_o_email = $_POST['nombre_usuario'];
$verificacion = $_POST['verificacion'];

// Determinar el valor de 'confirmado' basado en la selección del usuario
$confirmado = ($verificacion === 'si') ? 1 : 0;

// Construir la consulta SQL para actualizar el campo 'confirmado' usando el nombre o email del usuario
$sql = "UPDATE usuarios SET confirmado=? WHERE nombre=? OR email=?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die(json_encode(array("status" => "error", "message" => "Error preparing statement: " . $conn->error)));
}
$stmt->bind_param("iss", $confirmado, $nombre_o_email, $nombre_o_email);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo json_encode(array("status" => "success", "message" => "Configuración actualizada exitosamente."));
} else {
    echo json_encode(array("status" => "error", "message" => "Error actualizando la configuración: " . $stmt->error));
}

// Cerrar la conexión y liberar recursos
$stmt->close();
$conn->close();
?>
