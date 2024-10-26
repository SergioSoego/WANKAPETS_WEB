<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="css/cambiar_datos_password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function(event) {
                event.preventDefault();

                var passactual = document.getElementById('passactual').value;
                var newpass = document.getElementById('newpass').value;
                var repeatpass = document.getElementById('repeatpass').value;

                // Validación adicional para asegurar que la nueva contraseña no sea igual a la actual
                if (passactual === newpass) {
                    alert('La nueva contraseña no puede ser igual a la actual.');
                    return;
                }

                fetch('BACK/actualizar_password.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'passactual=' + encodeURIComponent(passactual) +
                          '&newpass=' + encodeURIComponent(newpass) +
                          '&repeatpass=' + encodeURIComponent(repeatpass)
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    if (data.success) {
                        window.location.href = 'cambiar_datos.php';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Hubo un error al actualizar la contraseña.');
                });
            });

            // Función para mostrar el carácter temporalmente al escribir
            function showPassword(input) {
                input.type = 'text';
                setTimeout(() => {
                    input.type = 'password';
                }, 500); // 500 milisegundos
            }

            // Asignar evento de entrada para los campos de contraseña
            document.querySelectorAll('input[type="password"]').forEach(input => {
                input.addEventListener('input', () => {
                    showPassword(input);
                });
            });
        });
    </script>
</head>
<body>
<header>
    <section class="general">
        <section class="nav1">
            <div class="logo">
                <img src="imagenes/logo2.png" alt="Amazon Logo">
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Buscar productos, marcas y más...">
                <button type="button">Buscar</button>
            </div>
            <div class="user-options">
                <a href="#" tabindex="0"><i class="fas fa-user"></i> Hola, <span id="nombre-usuario"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></span></a>
                
                <a href="#"><i class="fas fa-undo"></i> Devoluciones y Pedidos</a>
                <a href="#"><i class="fas fa-shopping-cart"></i> Carrito</a>
            </div>
        </section>
        <section>
            <div class="nav2">
                <ul>
                    <i class="fas fa-bars"></i>
                    <a href="">Ofertas del día</a>
                    <a href="">Servicio al cliente</a>
                    <a href="">Listas</a>
                    <a href="">Tarjetas de regalo</a>
                    <a href="">Vender</a>
                </ul>
            </div>
        </section>
    </section>
</header>

<main>
    <section class="profile-section">
        <section class="flex1"></section>
        <section class="main">
            <h1>Cambiar contraseña</h1>
            <div class="container">
                <form>
                    <div class="form-group">
                        <label for="nombre">Utiliza el siguiente formulario para cambiar la contraseña de tu cuenta de Amazon.</label>
                        <label for="passactual"><strong>Contraseña actual:</strong></label>
                        <div class="input-group">
                            <input type="password" id="passactual" name="passactual" required>
                        </div>
                        <label for="newpass"><strong>Nueva contraseña:</strong></label>
                        <div class="input-group">
                            <input type="password" id="newpass" name="newpass" required>
                        </div>
                        <label for="repeatpass"><strong>Introduce tu nueva contraseña otra vez:</strong></label>
                        <div class="input-group">
                            <input type="password" id="repeatpass" name="repeatpass" required>
                        </div>
                        <div class="botoneditar">
                            <button type="submit">Guardar cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section class="flex2"></section>
    </section>
</main>

<footer>
    <div class="footer-links">
        <a href="#">Condiciones de Uso</a>
        <a href="#">Aviso de Privacidad</a>
        <a href="#">Ayuda</a>
    </div>
    <p>&copy; 1996-2024 Amazon.com, Inc. o sus afiliados</p>
</footer>

</body>
</html>
