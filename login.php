<?php
session_start();
$error = isset($_SESSION['error_login']) ? $_SESSION['error_login'] : "";
unset($_SESSION['error_login']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>INICIAR SESIÓN - Panadería Sultipan</title>
  <link rel="stylesheet" href="login_registro.css" />
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <section aria-label="Formulario de Inicio de Sesión">
    <div class="form-box">
      <div class="form-value">
        <h1>Iniciar Sesión</h1>

        <?php if (!empty($error)): ?>
          <div class="mensaje-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form action="ControladorLogin.php" method="post" novalidate>
          <div class="inputbox">
            <input type="email" name="correo" required placeholder=" " />
            <label>Correo</label>
            <ion-icon name="mail-outline"></ion-icon>
          </div>

          <div class="inputbox">
            <input type="password" name="contraseña" required placeholder=" " />
            <label>Contraseña</label>
            <ion-icon name="lock-closed-outline"></ion-icon>
          </div>

          <input name="btningresar" type="submit" value="INICIAR SESIÓN" />
          <input type="reset" value="LIMPIAR" />

          <div class="register">
            <p>¿No tienes cuenta? <a href="REGISTRO.php">Registrarme</a></p>
            <p>Ir a <a href="iniciopagina.php">Inicio</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
