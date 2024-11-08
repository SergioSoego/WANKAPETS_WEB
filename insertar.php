<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    if ($password !== $confirm_password) {
        die("Las contraseñas no coinciden.");
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $verification_code = rand(100000, 999999);

    $servername = "localhost";
    $username = "root";
    $password_db = ""; 
    $dbname = "wankapets";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password, two_factor_key, confirmado) VALUES (?, ?, ?, ?, 0)");
    $stmt->bind_param("ssss", $nombre, $email, $hashed_password, $verification_code);

    if ($stmt->execute()) {
        $_SESSION['nombre'] = $nombre;

        $to = $email;
        $subject = "Código de verificación";
        $message = "Tu código de verificación es: " . $verification_code;
        $headers = "From: jordangeralmy2002@gmail.com";

        if (mail($to, $subject, $message, $headers)) {
            echo "Correo enviado exitosamente.";
        } else {
            echo "Error al enviar el correo.";
        }

        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
