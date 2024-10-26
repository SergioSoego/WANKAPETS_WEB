<?php
session_start();

$servername = "localhost";
$username = "root"; 
$dbpassword = ""; 
$dbname = "wankapets"; 

$conn = new mysqli($servername, $username, $dbpassword, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$userId = $_SESSION['user_id'];

$sql = "SELECT nombre, email FROM usuarios WHERE ID=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($nombre, $email);
$stmt->fetch();
$stmt->close();
$conn->close();


$_SESSION['nombre'] = $nombre;
$_SESSION['email'] = $email;

header("Location: cambiar_datos.php");
exit();
?>
