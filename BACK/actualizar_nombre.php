<?php
session_start();

$response = array();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_SESSION['nombre']) && isset($_SESSION['email'])) {
        
        $nuevo_nombre = $_POST['nombre'];
        $email = $_SESSION['email'];

        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wankapets";

        
        $conn = new mysqli($servername, $username, $password, $dbname);

       
        if ($conn->connect_error) {
            $response['status'] = 'error';
            $response['message'] = 'Conexión fallida: ' . $conn->connect_error;
        } else {
            
            $sql = "SELECT ID FROM usuarios WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($userId);
            $stmt->fetch();
            $stmt->close();

            if ($userId) {
                
                $sql_update = "UPDATE usuarios SET nombre = ? WHERE ID = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("si", $nuevo_nombre, $userId);

                if ($stmt_update->execute()) {
                    $_SESSION['nombre'] = $nuevo_nombre; 
                    $response['status'] = 'success';
                    $response['message'] = 'Nombre actualizado correctamente.';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Error al actualizar el nombre: ' . $conn->error;
                }

                $stmt_update->close();
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Usuario no encontrado.';
            }
        }

        
        $conn->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Usuario no autenticado.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Método de solicitud incorrecto.';
}


ob_clean();


header('Content-Type: application/json');
echo json_encode($response);
?>
