<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración de verificación en dos pasos</title>
    <link rel="stylesheet" href="css/cambiar_datos_verificacion2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <h1>Configuración de verificación en dos pasos</h1>
            <div class="container">
                <form id="verificacion-form">
                    <div class="form-group">
                        <label for="nombre">Actualiza si quieres la verificación en dos pasos</label>
                        <div class="input-group">
                            <label for="verificacion"><strong>¿Quieres verificación en dos pasos?:</strong></label>
                            <select id="verificacion" name="verificacion" required>
                                <option value="si">Sí</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <input type="hidden" id="nombre-usuario-hidden" name="nombre_usuario" value="<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>">

                        <div class="botoneditar">
                            <button type="submit">Guardar cambios</button>
                        </div>
                    </div>
                </form>
                <div id="mensaje" style="display:none;"></div>
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

<script>
$(document).ready(function() {
    $('#verificacion-form').submit(function(event) {
        event.preventDefault(); // Evita que se envíe el formulario de forma convencional
        $.ajax({
            url: 'BACK/actualizar_verificacion2.php',
            type: 'post',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#mensaje').text('Verificación actualizada').css('color', 'green').show();
                    setTimeout(function() {
                        window.location.href = 'cambiar_datos.php';
                    }, 2000);
                } else {
                    $('#mensaje').text(response.message).css('color', 'red').show();
                }
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', error);
                $('#mensaje').text('Error al actualizar la verificación').css('color', 'red').show();
            }
        });
    });
});
</script>

</body>
</html>
