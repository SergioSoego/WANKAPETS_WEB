<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Página Principal de Amazon</title>
    <link rel="stylesheet" href="css/index.css">
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
                <img src="https://kimikoroasiancraftbeer.com/wp-content/uploads/2020/02/amazon-logo-white.png" alt="Amazon Logo">
            </div>
            <div class="user-options">
                <div class="user">
                    <a href="#" tabindex="0"><i class="fas fa-user"></i> Hola, <span id="nombre">Usuario</span></a>
                    <ul class="menu">
                        <li class="menu1">
                            <h4>Tus listas</h4>
                            <a href="#">Crear una lista</a>
                            <a href="#">Encuentre una lista de regalos</a>
                            <a href="#">Tus libros guardados</a>
                        </li>
                        <li class="menu2">
                            <h4>Tu cuenta</h4>
                            <a href="login.html">Identificate</a>
                            <a href="tucuenta.php">Cuenta</a>
                            <a href="#">Pedidos</a>
                            <a href="#">Recomendaciones</a>
                            <a href="#">Historial de búsqueda</a>
                            <a href="#">Lista de videos</a>
                            <a href="#">Compras y Rentas de video</a>
                            <a href="#">Kindle Unlimited</a>
                            <a href="#">Contenido y dispositivos</a>
                            <a href="#">Artículos de Subcribe & Save</a>
                            <a href="#">Membresías y suscripciones</a>
                            <a href="#">Biblioteca de música</a>
                            <a href="#">Cambio de Cuenta</a>
                            <a href="BACK/logout.php">Cerrar sesión</a>

                        </li>
                    </ul>
                </div>
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
    

<section class="banner">
        <img src="index/81hxkKd9IgL._SX3000_.jpg" alt="">
        <section class="products">
            <h2>Productos Destacados</h2>
            <div class="product-list">
                <div class="product-item">
                    <img src="index/710o0VupScL._AC_SY400_.jpg" alt="Producto 1">
                </div>
                <div class="product-item">
                    <img src="index/610ss62cTJL._AC_SY400_.jpg" alt="Producto 2">
                </div>
                <div class="product-item">
                    <img src="index/51i9uRh7YBL._AC_SY400_.jpg" alt="Producto 3">
                </div>
                <div class="product-item">
                    <img src="index/61-0P4XrCyL._AC_SY400_.jpg" alt="Producto 4">
                </div>
            </div>
        </section>
    
        <section class="offers">
            <h2>Ofertas del Día</h2>
            <div class="offer-list">
                <div class="offer-item">
                    <img src="index/91cFyM2VepL._AC_SY400_.jpg" alt="Oferta1">
                </div>
                <div class="offer-item">
                    <img src="index/61kSh8M67WL._AC_SY400_.jpg" alt="Oferta 2">
                </div>
                <div class="offer-item">
                    <img src="index/71SPhGKyMPL._AC_SY400_.jpg" alt="Oferta 3">
                </div>
                <div class="offer-item">
                    <img src="index/71zQ08Yu7rL._AC_SY400_.jpg" alt="Oferta 4">
                </div>
            </div>
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
