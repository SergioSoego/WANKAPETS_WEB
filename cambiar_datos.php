<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de sesion y seguridad</title>
    <link rel="stylesheet" href="css/cambiar_datos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var emailElement = document.getElementById("email");
            var storedEmail = "<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>";
            if (storedEmail) {
                emailElement.value = storedEmail;
            }

            var passwordElement = document.getElementById("password");
            passwordElement.value = "**********"; // Mostrar 10 asteriscos

            var nombreElement = document.getElementById("nombre");
            var storedNombre = "<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>";
            if (storedNombre) {
                nombreElement.value = storedNombre;
            }
        });
        
        function redirectToEditPage(page) {
            window.location.href = page;
        }
        
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
        <a href="index.php" tabindex="0"><i class="fas fa-user"></i> Hola, <span id="nombre-usuario"><?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'Usuario'; ?></span></a>
        
        <a href="#"><i class="fas fa-undo"></i> Devoluciones y Pedidos</a>
        <a href="#"><i class="fas fa-shopping-cart"></i> Carrito</a>
    </div>
    </section>
    <section>
        <div class="nav2">
            <ul>
                <i class="fas fa-bars"></i>
                <a href="">Ofertas del dia</a>
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
        
        <section class="flex1">
        </section>
        <section class="main">
            <h1>Inicio de sesion y seguridad</h1>
            <div class="container">
                <form action="actualizar.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <div class="input-group">
                            <input type="text" id="nombre" name="nombre" required disabled>
                            <button type="button" onclick="redirectToEditPage('cambiar_datos_nombre.php')">Editar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <div class="input-group">
                        <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required disabled>
                            <button type="button" onclick="redirectToEditPage('cambiar_datos_email.php')">Editar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Número de Teléfono</label>
                        <div class="input-group">
                            <input type="tel" id="telefono" name="telefono" required disabled>
                            <button type="button" onclick="enableEdit('telefono')">Editar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Cambiar Contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" minlength="6" required disabled>
                            <button type="button" onclick="redirectToEditPage('cambiar_datos_password.php')">Editar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="input-group">
                        <label for="confirm-password">Verificación en 2 pasos</label>
                        <a>                         </a>
                        <button type="button" onclick="redirectToEditPage('cambiar_datos_verificacion.php')">Editar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">¿La cuenta está en riesgo?</label>
                        <div class="input-group">
                            <a>Toma medidas como cambiar la contraseña  </a>
                            
                            <button type="button" onclick="enableEdit('confirm-password')">Comenzar</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </section>
        <section class="flex2">
        </section>
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
