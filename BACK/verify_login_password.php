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

$email = $_POST['email'];

$sql = "SELECT nombre, password FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($nombre, $hashed_password);
    $stmt->fetch();

    
    if (password_verify($_POST['password'], $hashed_password)) {
        
        $_SESSION['email'] = $email;
        $_SESSION['nombre'] = $nombre;

        
        header("Location: ../login3.html");
        exit();
    } else {
        echo "<script>alert('Contraseña incorrecta'); window.location.href = '../login2.html';</script>";
    }
} else {
    echo "Usuario no encontrado.";
}

$stmt->close();
$conn->close();
?>
