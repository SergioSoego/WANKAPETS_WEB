<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Página Principal de Amazon</title>
    <link rel="stylesheet" href="css/Adoptar.css">
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
            <img src="imagenes/logo2.png" alt="">
            </div>
            <div class="nav2">
                <ul>
                    <a href="index.php">Inicio</a>
                    <a href=" Quienesomos.html">Quienes somos</a>
                    <a href="">Contactanos</a>
                    <a href="Adoptar.php">Adoptar</a>
                    <a href="AnimalesPerdidos.php">Mascotas Perdidas</a>
    
                </ul>
            </div>
            <div class="user-options">
                <div class="user">
                    <i class="fas fa-user"></i>
                    <a href="login.html">Iniciar Sesion</a>
                </div>
            </div>
        </section>
    
</section>
</header>

<main>
<section class="banner">
    <section class="banner-text-conteiner">
        <section class="banner-text">
            <h2>AYUDANOS A AYUDAR,
            ADOPTA!</h2>
            <p>"¡Adopta y cambia una vida hoy! Al adoptar, no solo le das un hogar a un animal que lo necesita, sino que también ganas un amigo leal e incondicional. Cada mascota tiene una historia y está esperando la oportunidad de ser parte de una nueva familia. Llena tu hogar de amor, compañía y momentos inolvidables. ¡Dale una segunda oportunidad a un ser lleno de amor y adopta hoy mismo!"</p>
        </section>
    </section> 
        <section class="products">
            <div class="product-list">
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/1.png" alt="Producto 1">
                     <h2>Lila</h2>
                    <button class="adopt-button">Adoptar</button>
                    
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/2.jpeg" alt="Producto 2">
                    <h2>Lila</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/3.jpeg" alt="Producto 3">
                    <h2>Chispa</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/4.jpeg" alt="Producto 4">
                    <h2>Panda</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
            </div>
            <hr>
            <div class="product-list">
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/5.jpeg" alt="Producto 1">
                    <h2>Milo</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/6.jpeg" alt="Producto 2">
                    <h2>Coco</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/7.jpeg" alt="Producto 3">
                    <h2>Mía</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Gatos/8.jpeg" alt="Producto 4">
                    <h2>Luna</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
            </div>
        </section>
    
        <section class="products">
            <div class="product-list">
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/1.jpg" alt="Oferta1">
                    <h2>Thor</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/2.jpg" alt="">
                    <h2>Zeus</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/3.jpg" alt="Oferta 3">
                    <h2>Dante</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/4.jpg" alt="Oferta 4">
                    <h2>Bongo</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
            </div>
            
            <hr>
            <div class="product-list">
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/5.jpg" alt="Oferta1">
                    <h2>Oliver</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/6.jpg" alt="">
                    <h2>Shadow</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/7.jpg" alt="Oferta 3">
                    <h2>Daisy</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
                <div class="product-item">
                    <img src="imagenes/Adopcion/Perros/8.jpg" alt="Oferta 4">
                    <h2>Rocco</h2>
                    <button class="adopt-button">Adoptar</button>
                </div>
            </div>
        </section>
    </section>
</main>

<footer>
    
    <div class="footer-links">
        <a href="index.php">Inicio</a>
        <a href=" Quienesomos.html">Quienes somos</a>
        <a href="">Contactanos</a>
        <a href="Adoptar.php">Adoptar</a>
        <a href="registraranimalesperdidos.html">Registrar Mascotas Perdidas</a>
        <a href="#">Condiciones de Uso</a>
        <a href="#">Aviso de Privacidad</a>
        <a href="#">Ayuda</a>

    <p>&copy; 1996-2024 Amazon.com, Inc. o sus afiliados</p>
    
</footer>

</body>

</html>
