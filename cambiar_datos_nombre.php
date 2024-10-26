<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Mi Nombre</title>
    <link rel="stylesheet" href="css/cambiar_datos_nombre.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var form = document.querySelector('form');
            var nombreElement = document.getElementById("nombre");
            var spanNombreElement = document.getElementById("nombre-usuario");
            
            if (spanNombreElement && spanNombreElement.textContent.trim() !== '') {
                nombreElement.value = spanNombreElement.textContent.trim(); 
            }

            form.addEventListener('submit', function(event) {
                event.preventDefault(); 

                var formData = new FormData(form);

                fetch('BACK/actualizar_nombre.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud: ' + response.statusText);
                    }
                    return response.json(); 
                })
                .then(data => {
                    console.log(data); 

                    
                    if (data.status === 'success') {
                        alert('Nombre actualizado correctamente.');
                        spanNombreElement.textContent = formData.get('nombre');
                    } else {
                        alert('Error al actualizar el nombre: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error en la solicitud:', error);
                    alert('Error en la solicitud: ' + error.message);
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
                <img src="https://kimikoroasiancraftbeer.com/wp-content/uploads/2020/02/amazon-logo-white.png" alt="Amazon Logo">
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
            <h1>Cambiar Mi Nombre</h1>
            <div class="container">
                <form action="BACK/actualizar_nombre.php" method="POST">
                    <div class="form-group">
                        <label for="nombre">Si quieres cambiar el nombre asociado a tu cuenta de cliente de Amazon, puedes hacerlo a continuación. Asegúrate de hacer clic en el botón <strong>Guardar cambios</strong> cuando hayas terminado.</label>
                        <label for="nuevo-nombre"><strong>Nuevo nombre</strong></label>
                        <div class="input-group">
                            <input type="text" id="nombre" name="nombre" required>
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
