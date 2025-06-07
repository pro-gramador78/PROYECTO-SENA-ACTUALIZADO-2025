<?php
// admin.php - Main admin page
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Menú Administrador</title>
  <link rel="stylesheet" href="style/estilo_menu_inicio.css" />
</head>
<body>

  <!-- Barra de navegación superior -->
  <nav>
    <div class="btn-menu">
      <label for="btn-menu">☰</label>
      <img src="img/logo.jpeg" alt="Logo" class="logo-menu" />
    </div>

    <div class="texto-menu" role="banner" aria-label="Mensaje de bienvenida">
      Bienvenido Administrador, gestiona tu panel con eficiencia y control total
    </div>

    <ul>
      <img src="" alt="">
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"></a></li>
      <li><a href="#"> </a></li>
    </ul>

    <img src="img/usuario.jpeg" alt="Usuario" class="usuario-icono" />
    
    <!-- Menú desplegable de usuario -->
    <div class="menu-desplegable">
      <div class="emboltorio-menu">
        <div class="usuario-info">
          <img src="img/usuario.jpeg" alt="Usuario" />
          <h2>Fabio Turuma</h2>
        </div>
        <hr />
        <div class="menu-opciones">
          <div>
            <img src="img/feedback.png" alt="Feedback" />
            <p>Enviar comentarios</p>
            <span>&gt;</span>
          </div>
          <div>
            <img src="img/setting.png" alt="Configuración" />
            <p>Configuración</p>
            <span>&gt;</span>
          </div>
          <div>
            <img src="img/help.png" alt="Ayuda" />
            <p>Ayuda</p>
            <span>&gt;</span>
          </div>
          <div>
            <img src="img/display.png" alt="Pantalla" />
            <p>Pantalla</p>
            <span>&gt;</span>
          </div>
          <div onclick="location.href='iniciopagina.php';">
            <img src="img/logout.png" alt="logout" />
              Cerrar sesión
            <span>></span>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Menú lateral -->
  <input type="checkbox" id="btn-menu" />
  <div class="container-menu">
    <div class="cont-menu">
      <nav>
        <a href="#">INICIO</a>
        <a href="empleados/registro_empleados.php">REGISTRO EMPLEADOS</a>
        <a href="clientes/registro_clientes.php">REGISTRO CLIENTES
        </a>
        <a href="modulo_ventas_facturacion/">VENTA Y FACTURACIÓN</a>
        <a href="modulo_inventario/inventario.php">INVENTARIO</a>
      </nav>
      <label for="btn-menu">✖️</label>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const usuarioicono = document.querySelector('.usuario-icono');
      const menu = document.querySelector('.menu-desplegable');

      if (usuarioicono && menu) {
        usuarioicono.addEventListener('click', () => {
          menu.classList.toggle('abrir-menu');
        });
      } else {
        console.error('No se encontraron elementos usuario-icono o menu-desplegable');
      }
    });
  </script>
</body>
</html>


