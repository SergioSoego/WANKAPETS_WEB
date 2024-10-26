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

$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$passactual = $_POST['passactual'];
$newpass = $_POST['newpass'];
$repeatpass = $_POST['repeatpass'];

// Verificar que las nuevas contraseñas coincidan
if ($newpass !== $repeatpass) {
    echo json_encode(['success' => false, 'message' => 'Las nuevas contraseñas no coinciden.']);
    $conn->close();
    exit();
}

// Verificar la contraseña actual
$query = "SELECT password FROM usuarios WHERE email = '$email'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($passactual, $row['password'])) {
        // Verificar que la nueva contraseña no sea igual a la actual
        if (password_verify($newpass, $row['password'])) {
            echo json_encode(['success' => false, 'message' => 'La nueva contraseña no puede ser igual a la actual.']);
            $conn->close();
            exit();
        }

        // Hash de la nueva contraseña
        $newpass_hash = password_hash($newpass, PASSWORD_DEFAULT);
        // Actualizar la nueva contraseña en la base de datos
        $updateQuery = "UPDATE usuarios SET password = '$newpass_hash' WHERE email = '$email'";
        if ($conn->query($updateQuery) === TRUE) {
            echo json_encode(['success' => true, 'message' => 'Contraseña actualizada correctamente.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar la contraseña.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Contraseña actual incorrecta.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Usuario no encontrado.']);
}

$conn->close();
?>
