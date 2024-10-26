<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wankapets";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT * FROM mascotasperdidas";
$result = $conn->query($sql);


$mascotasperdidas = array();

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        $mascotasperdidas[] = $row;
    }
} else {
    echo "0 resultados";
}


$conn->close();


echo json_encode($mascotasperdidas);
?>
