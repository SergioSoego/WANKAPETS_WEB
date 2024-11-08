<?php
session_start(); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wankapets";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if (!isset($_POST['password']) || !isset($_SESSION['email'])) {
    die("Datos del formulario no recibidos.");
}

$email = $_SESSION['email'];
$input_password = $_POST['password'];

echo "<div style='border: 1px solid #000; padding: 10px; margin: 20px; background-color: #f8f8f8;'>
        <strong>Usuario recibido:</strong> $email
      </div>";


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
        
        $verification_code = rand(100000, 999999);

        
        $_SESSION['verification_code'] = $verification_code;

        
        $update_stmt = $conn->prepare("UPDATE usuarios SET two_factor_key = ? WHERE email = ?");
        $update_stmt->bind_param("ss", $verification_code, $email);
        
        if ($update_stmt->execute()) {
            
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
        echo "<script>alert('Contraseña incorrecta.'); window.location.href = '../login.html';</script>";
    }
} else {
    echo "<script>alert('Usuario no encontrado: $email. Por favor, verifica tu email.'); window.location.href = '../login.html';</script>";
}

$stmt->close();
$conn->close();
?>
