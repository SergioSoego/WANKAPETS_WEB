<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wankapets";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $tipo_mascota = $_POST['tipo_mascota'];
    $color = $_POST['color'];
    $raza = $_POST['raza'];
    $distrito = $_POST['distrito'];
    $direccion_ultima_vista = $_POST['dirección'];
    $fecha_perdida = $_POST['fecha_perdida'];
    $hora_perdida = $_POST['hora_perdida'];

    // Inicializar la variable de la imagen como NULL en caso de no haber imagen
    $imagen_mascota = null;

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $imagen_mascota = $_FILES['foto']['name'];
        $ruta_temporal_imagen = $_FILES['foto']['tmp_name'];
        $directorio_destino = "uploads/" . basename($imagen_mascota);

        // Verificar si el directorio 'uploads' existe, si no, crearlo
        if (!is_dir('uploads')) {
            mkdir('uploads', 0777, true);
        }

        // Mover el archivo a la carpeta de destino
        if (!move_uploaded_file($ruta_temporal_imagen, $directorio_destino)) {
            echo "<script>alert('Error al mover el archivo.');</script>";
        }
    } else {
        // Verificar si hay un error en la subida del archivo
        if (isset($_FILES['foto'])) {
            $error = $_FILES['foto']['error'];
            if ($error == UPLOAD_ERR_INI_SIZE) {
                $error_msg = "El archivo excede el tamaño máximo permitido.";
            } elseif ($error == UPLOAD_ERR_FORM_SIZE) {
                $error_msg = "El archivo excede el tamaño máximo permitido en el formulario.";
            } elseif ($error == UPLOAD_ERR_PARTIAL) {
                $error_msg = "El archivo se subió parcialmente.";
            } elseif ($error == UPLOAD_ERR_NO_FILE) {
                $error_msg = "No se subió ningún archivo.";
            } else {
                $error_msg = "Error desconocido en la subida del archivo.";
            }
            echo "<script>alert('Error: $error_msg');</script>";
        }
    }

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO mascotasperdidas (nombre_mascota, tipo_mascota, color, raza, distrito, direccion_ultima_vista, imagen_mascota, fechaperdida, hora_perdida) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $nombre, $tipo_mascota, $color, $raza, $distrito, $direccion_ultima_vista, $imagen_mascota, $fecha_perdida, $hora_perdida);

    if ($stmt->execute()) {
        echo "<script>alert('Los datos han sido insertados correctamente.'); window.location.href = 'index.html';</script>";
    } else {
        echo "<script>alert('Error al insertar los datos en la base de datos.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
