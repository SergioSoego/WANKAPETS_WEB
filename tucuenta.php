<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tu Cuenta - Amazon</title>
    <link rel="stylesheet" href="css/tucuenta.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var nombreElement = document.getElementById("nombre");
            var storedNombre = "<?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ''; ?>";
            if (storedNombre) {
                nombreElement.textContent = storedNombre;
            }
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
        <a href="#" tabindex="0"><i class="fas fa-user"></i> Hola, <span id="nombre">Usuario</span></a>
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

<main class="main">
<section class="flex1">

</section>
<section class="flex2">
    <section class="account-options">
        <h2>Tu Cuenta</h2>
        <div class="options-grid">
            <div class="option">
                <img src="imagenes/1.png">
                    <div>
                        <h3>Tus Pedidos</h3>
                        <p>Rastrar y devolver, cancelar un pedido , descragar una factura o comprar de nuevos</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/seguridad.png">
                <a href="cambiar_datos.php">
                    <div>
                        <h3>Inicion de sesion y seguridad</h3>
                        <p>Administrar tus direcciones de envío.</p>
                    </div>
                </a>
            </div>
            <div class="option">
                <img src="imagenes/primeamazaon.png">
                <a href="detalles_cuenta.html">
                    <div>
                        <h3>Amazon Prime</h3>
                        <p>Actualizar información de tu cuenta.</p>
                    </div>
                </a>
            </div>
            <div class="option">
                <img src="imagenes/agensa.png" alt="Métodos de Pago">
                <a href="imagenes/amazon prime.png">
                    <div>
                        <h3>Direccion del usuario</h3>
                        <p>Gestionar tus métodos de pago.</p>
                    </div>
                </a>
            </div>
            <div class="option">
                <img src="imagenes/amazon bussines.jpg" alt="Seguridad">
                <a href="seguridad.html">
                    <div>
                        <h3>Tu cuenta empresarial</h3>
                        <p>Configuraciones de seguridad y acceso.</p>
                    </div>
                </a>
            </div>
            <div class="option">
                <img src="imagenes/prim.png" alt="Historial de Pedidos">
                    <div>
                        <h3>Tarjetas de regalo</h3>
                        <p>Revisa tu historial de compras.</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/amazon prime.png" alt="Suscripciones">
                    <div>
                        <h3>Pagos</h3>
                        <p>Gestiona tus suscripciones.</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/ajustes.png" alt="Lista de Deseos">
                    <div>
                        <h3>Tus perfiles</h3>
                        <p>Ver y editar tu lista de deseos.</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/dispositiivps.png" alt="Tarjetas de Regalo">
                    <div>
                        <h3>Tus dispositivos y contenido</h3>
                        <p>Gestionar tus tarjetas de regalo.</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/papeles.png" alt="Comentarios">
                    <div>
                        <h3>Pedidos archivados</h3>
                        <p>Ver y gestionar tus comentarios.</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/notas.png" alt="Configuración de Dispositivo">
                    <div>
                        <h3>Tus listas</h3>
                        <p>Gestiona tus dispositivos.</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/soporte.png" alt="Preferencias de Comunicación">
                    <div>
                        <h3>Servicio al cliente</h3>
                        <p>Gestiona tus preferencias de comunicación.</p>
                    </div>
            </div>
            <div class="option">
                <img src="imagenes/mensaje.jpg" alt="Mi Cuenta Amazon Prime">
                    <div>
                        <h3>Tus mensajes</h3>
                        <p>Gestiona tu suscripción a Amazon Prime.</p>
                    </div>
            </div>
        </div>
    </section>
</section>
<section class="flex3">

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
