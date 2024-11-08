<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>WANKA PETS</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Playpen+Sans:wght@100..800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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
            <div class="nav2">
                <ul>
                    <a href="index.php">Inicio</a>
                    <a href=" Quienesomos.html">Quienes somos</a>
                    <a href="">Contactanos</a>
                    <a href="Adoptar.php">Adoptar</a>
                    <a href="AnimalesPerdidos.html">Mascotas Perdidas</a>
    
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
        <img src="imagenes/img.webp" alt="Imagen de fondo">
        <div class="banner-text">
            <h2>Encuentra tu compañero perfecto con nosotros</h2>
        </div>
        <div class="banner-img">    
            <img src="imagenes/logo2.png" alt=""> 
        </div>
    </section>
    <section class="productos-text">
        <p>"¡Dale una segunda oportunidad a un amigo felino! Los gatos son compañeros llenos de amor, independencia y ternura. Adoptar a un gato no solo cambiará su vida, sino que llenará la tuya de momentos únicos de calma y compañía. Al abrir tu corazón y hogar a un gato rescatado, estarás brindándole una vida mejor y recibiendo a cambio un amigo incondicional. ¡Haz de tu casa su hogar hoy mismo!"</p>
    </section>
    <section class="products">
        <hr>
        <div class="product-list">
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/1.png" alt="Producto 1">
            </div>
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/2.jpeg" alt="Producto 2">
            </div>
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/3.jpeg" alt="Producto 3">
            </div>
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/4.jpeg" alt="Producto 4">
            </div>
        </div>
        <div class="product-list">
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/5.jpeg" alt="Producto 1">
            </div>
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/6.jpeg" alt="Producto 2">
            </div>
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/7.jpeg" alt="Producto 3">
            </div>
            <div class="product-item">
                <img src="imagenes/Adopcion/Gatos/8.jpeg" alt="Producto 4">
            </div>
        </div>
    </section>
<section class="anuncio">
    <p>Adoptar es darle a un animal una segunda oportunidad de ser amado. ¡Cambia su vida y la tuya también! ¡Adopta y crea un vínculo para siempre!</p>
</section>

    <section class="offers">
        <hr>
        <section class="productos-text">
        <p>¡Un perro espera por ti para comenzar una nueva aventura! Adoptar a un perro es más que darle un hogar, es formar un lazo de lealtad y amor incondicional. Cada perro rescatado trae consigo una historia y un corazón lleno de cariño que está listo para compartir. Al adoptar, no solo transformas su vida, sino que también añades alegría, compañía y muchas sonrisas a la tuya. ¡Adopta un perro y empieza un viaje lleno de amor y lealtad hoy!"</p>
        </section>
        <div class="offer-list">
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/1.jpg" alt="Oferta1">
            </div>
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/2.jpg" alt="">
            </div>
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/3.jpg" alt="Oferta 3">
            </div>
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/4.jpg" alt="Oferta 4">
            </div>
        </div>
        <div class="offer-list">
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/5.jpg" alt="Oferta1">
            </div>
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/6.jpg" alt="">
            </div>
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/7.jpg" alt="Oferta 3">
            </div>
            <div class="offer-item">
                <img src="imagenes/Adopcion/Perros/8.jpg" alt="Oferta 4">
            </div>
        </div>
    </section>

</main>

<footer>
    <div class="footer-logo">       
        <img src="imagenes/logo2.png" alt="">
        <p>Somos una fundación procupada por la protección y defensa del bienestar animal. Identificamos, registramos y contribuimos a la localización de mascotas en el territorio Peruano.</p>
    </div>
    <div class="footer-links">
        <a href="index.php">Inicio</a>
        <a href=" Quienesomos.html">Quienes somos</a>
        <a href="">Contactanos</a>
        <a href="Adoptar.php">Adoptar</a>
        <a href="AnimalesPerdidos.html">Mascotas Perdidas</a>
    </div>
</footer>


</body>

</html>
