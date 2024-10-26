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

$sql = "SELECT nombre, email, confirmado FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($nombre, $email, $confirmado);
    $stmt->fetch();

    $_SESSION['nombre'] = $nombre;

    if ($confirmado == "1") {
        header("Location: ../verificacion_activada.php");
    } else {
        header("Location: ../login2.html");
    }
} else {
    echo "<script>alert('Correo no encontrado'); window.location.href = '../login.html';</script>";
}

$stmt->close();
$conn->close();
?>
