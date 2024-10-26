<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wankapets";

// Establecer conexión
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar que se recibieron los datos del formulario
if (!isset($_POST['password']) || !isset($_SESSION['email'])) {
    die("Datos del formulario no recibidos.");
}

$email = $_SESSION['email'];
$input_password = $_POST['password'];

// Verificar la contraseña
$sql = "SELECT password FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($input_password, $hashed_password)) {
        // Generar código de 6 dígitos para la verificación
        $verification_code = rand(100000, 999999);

        // Guardar el código de verificación en la sesión
        $_SESSION['verification_code'] = $verification_code;

        // Actualizar el código de verificación en la base de datos
        $update_stmt = $conn->prepare("UPDATE usuarios SET two_factor_key = ? WHERE email = ?");
        $update_stmt->bind_param("ss", $verification_code, $email);
        
        if ($update_stmt->execute()) {
            // Enviar correo electrónico con el código de verificación
            $to = $email;
            $subject = "Código de verificación";
            $message = "Tu código de verificación es: " . $verification_code;
            $headers = "From: tu_email@example.com";
            
            if (mail($to, $subject, $message, $headers)) {
                echo "Correo enviado exitosamente.";
                header("Location: ../verificacion_activada1.php");
                exit();
            } else {
                echo "Error al enviar el correo.";
                error_log("Error al enviar correo a $to");
            }
        } else {
            echo "Error al actualizar el código de verificación en la base de datos.";
        }
    } else {
        echo "<script>alert('Contraseña incorrecta'); window.location.href = '../login.html';</script>";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
?>
