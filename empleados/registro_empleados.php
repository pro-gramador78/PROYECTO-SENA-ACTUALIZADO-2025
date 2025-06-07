<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDeDatos = "sultipan";
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$enlace) {
    die("Error en la conexión: " . mysqli_connect_error());
}

$mensaje = "";
$mensaje_tipo = "";

if (isset($_POST['registrar'])) {
    $documento = trim($_POST['doc_cliente']); // No se usará pero puedes mantenerlo si quieres validación adicional
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);
    $rol = trim($_POST['rol']);

    if (empty($nombre) || empty($correo) || empty($contraseña) || empty($rol)) {
        $mensaje = "⚠ TODOS LOS CAMPOS SON OBLIGATORIOS";
        $mensaje_tipo = "mensaje-error";
    } else {
        // Verificar si el correo ya existe en ambas tablas
        $correoExiste = false;

        // Revisar en cajero
        $verificarCorreoCajero = $enlace->prepare("SELECT * FROM cajero WHERE correo = ?");
        $verificarCorreoCajero->bind_param("s", $correo);
        $verificarCorreoCajero->execute();
        $resultadoCajero = $verificarCorreoCajero->get_result();
        if ($resultadoCajero->num_rows > 0) {
            $correoExiste = true;
        }
        $verificarCorreoCajero->close();

        // Revisar en administrador
        $verificarCorreoAdmin = $enlace->prepare("SELECT * FROM administrador WHERE correo = ?");
        $verificarCorreoAdmin->bind_param("s", $correo);
        $verificarCorreoAdmin->execute();
        $resultadoAdmin = $verificarCorreoAdmin->get_result();
        if ($resultadoAdmin->num_rows > 0) {
            $correoExiste = true;
        }
        $verificarCorreoAdmin->close();

        if ($correoExiste) {
            $mensaje = "❌ EL CORREO YA ESTÁ REGISTRADO EN EL SISTEMA";
            $mensaje_tipo = "mensaje-error";
        } else {
            if ($rol === "cajero") {
                $stmt = $enlace->prepare("INSERT INTO cajero (nombre, correo, contraseña) VALUES (?, ?, ?)");
            } elseif ($rol === "administrador") {
                $stmt = $enlace->prepare("INSERT INTO administrador (nombre, correo, contraseña) VALUES (?, ?, ?)");
            } else {
                $mensaje = "❌ ROL INVÁLIDO";
                $mensaje_tipo = "mensaje-error";
                exit;
            }

            $stmt->bind_param("sss", $nombre, $correo, $contraseña);

            if ($stmt->execute()) {
                $mensaje = "✅ REGISTRO EXITOSO COMO " . strtoupper($rol);
                $mensaje_tipo = "mensaje-exito";
            } else {
                $mensaje = "❌ ERROR AL REGISTRAR: " . $stmt->error;
                $mensaje_tipo = "mensaje-error";
            }

            $stmt->close();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>REGISTRO - Panadería Sultipan</title>
  <link rel="stylesheet" href="empleados.css" />
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="top-right-button">
  <a href="registro empleados/crud_empleados.php" class="btn-editar">
    <ion-icon name="create-outline"></ion-icon> Editar registros de empleados
  </a>
</div>
  <section aria-label="Formulario de Registro">
    <div class="form-box">
      <div class="form-value">
        <h1 id="parrafo">Registrarse</h1>

        <?php if (!empty($mensaje)): ?>
          <div class="<?php echo $mensaje_tipo; ?>"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <form action="#" method="post" novalidate>
          <div class="inputbox">
            <input type="text" name="doc_cliente" required placeholder=" " />
            <label id="parrafo">Documento</label>
            <ion-icon name="person-outline"></ion-icon>
          </div>

          <div class="inputbox">
            <input type="text" name="nombre" required placeholder=" " />
            <label id="parrafo">Nombre</label>
            <ion-icon name="person-circle-outline"></ion-icon>
          </div>

          <div class="inputbox">
            <input type="email" name="correo" required placeholder=" " />
            <label id="parrafo">Correo</label>
            <ion-icon name="mail-outline"></ion-icon>
          </div>

          <div class="inputbox">
            <input type="password" name="contraseña" required placeholder=" " />
            <label id="parrafo">Contraseña</label>
            <ion-icon name="lock-closed-outline"></ion-icon>
          </div>

          <div class="inputbox">
            <label id="parrafo" for="rol"></label>
            <select name="rol" required>
              <option value="">Selecciona un rol</option>
              <option value="cajero">Cajero</option>
              <option value="administrador">Administrador</option>
            </select>
            <ion-icon name="briefcase-outline"></ion-icon>
          </div>

          <input type="submit" name="registrar" value="REGISTRARSE" />
          <input type="reset" value="LIMPIAR" />

          <div class="register">
            <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
            <p>Ir a <a href="iniciopagina.php">Inicio</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>
</html>
