<?php
session_start();


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wankapets";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT nombre_mascota, imagen_mascota FROM mascotasperdidas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Animales Perdidos</title>
    <link rel="stylesheet" href="css/AnimalesPerdidos.css">
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
                <a href="Quienesomos.html">Quienes somos</a>
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
    <section class="banner-text-conteiner">
        <section class="banner-text">
            <h2>¿Has perdido a tu mascota?
                En esta sección podrás encontrar información sobre mascotas que han sido reportadas como perdidas en tu área. Nuestro objetivo es ayudar a reunir a las familias con sus compañeros peludos lo más rápido posible. Si has visto alguno de estos animales o si tienes información que pueda ser útil, no dudes en contactarnos.</h2>
        </section>
    </section>

    <section class="products">
        <div class="product-list">
            <?php
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="product-item">';
                    
                    echo '<img src="BACK/uploads/' . $row['imagen_mascota'] . '" alt="Producto">';
                    echo '<h2>' . $row['nombre_mascota'] . '</h2>';
                    echo '<button class="adopt-button">Contactar</button>';
                    echo '</div>';
                }
            } else {
                echo '<p>No se han encontrado animales perdidos registrados.</p>';
            }
            ?>
        </div>
    </section>
</section>

<a href="registraranimalesperdidos.html" class="btn-flotante">Registrar animal perdido</a>
<a href="https://sergiosoego.github.io/WankaAI/" class="btn-flotante1">Detectar Raza / AI</a>
</main>

<footer>
    <div class="footer-logo">
        <img src="imagenes/logo2.png" alt="">
        <p>Somos una fundación preocupada por la protección y defensa del bienestar animal. Identificamos, registramos y contribuimos a la localización de mascotas en el territorio peruano.</p>
    </div>
    <div class="footer-links">
        <a href="index.php">Inicio</a>
        <a href="Quienesomos.html">Quienes somos</a>
        <a href="">Contactanos</a>
        <a href="Adoptar.php">Adoptar</a>
        <a href="registraranimalesperdidos.html">Registrar Mascotas Perdidas</a>
    </div>
</footer>

<?php
$conn->close();
?>

</body>

</html>
