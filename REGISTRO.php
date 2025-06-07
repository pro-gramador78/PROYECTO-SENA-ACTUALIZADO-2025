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
    $documento = trim($_POST['doc_cliente']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $contraseña = trim($_POST['contraseña']);

    if (empty($documento) || empty($nombre) || empty($correo) || empty($contraseña)) {
        $mensaje = "⚠ TODOS LOS CAMPOS SON OBLIGATORIOS";
        $mensaje_tipo = "mensaje-error";
    } else {
        // Verificar si el documento ya existe
        $verificarDocumento = $enlace->prepare("SELECT * FROM cliente WHERE doc_cliente = ?");
        $verificarDocumento->bind_param("s", $documento);
        $verificarDocumento->execute();
        $resultadoDocumento = $verificarDocumento->get_result();

        if ($resultadoDocumento->num_rows > 0) {
            $mensaje = "❌ EL DOCUMENTO YA ESTÁ REGISTRADO";
            $mensaje_tipo = "mensaje-error";
        } else {
            // Verificar si el correo ya existe
            $verificarCorreo = $enlace->prepare("SELECT * FROM cliente WHERE correo = ?");
            $verificarCorreo->bind_param("s", $correo);
            $verificarCorreo->execute();
            $resultadoCorreo = $verificarCorreo->get_result();

            if ($resultadoCorreo->num_rows > 0) {
                $mensaje = "❌ EL CORREO YA ESTÁ REGISTRADO";
                $mensaje_tipo = "mensaje-error";
            } else {
                $stmt = $enlace->prepare("INSERT INTO cliente (doc_cliente, nom_cliente, correo, contraseña) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $documento, $nombre, $correo, $contraseña);

                if ($stmt->execute()) {
                    $mensaje = "✅ REGISTRO EXITOSO";
                    $mensaje_tipo = "mensaje-exito";
                } else {
                    $mensaje = "❌ ERROR AL REGISTRAR: " . $stmt->error;
                    $mensaje_tipo = "mensaje-error";
                }

                $stmt->close();
            }

            $verificarCorreo->close();
        }

        $verificarDocumento->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>REGISTRO - Panadería Sultipan</title>
  <link rel="stylesheet" href="login_registro.css" />
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <section aria-label="Formulario de Registro">
    <div class="form-box">
      <div class="form-value">
        <h1>Registrarse</h1>

        <?php if (!empty($mensaje)): ?>
          <div class="<?php echo $mensaje_tipo; ?>"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <form action="#" method="post" novalidate>
          <div class="inputbox">
            <input type="text" name="doc_cliente" required placeholder=" " />
            <label>Documento</label>
            <ion-icon name="person-outline"></ion-icon>
          </div>

          <div class="inputbox">
            <input type="text" name="nombre" required placeholder=" " />
            <label>Nombre</label>
            <ion-icon name="person-circle-outline"></ion-icon>
          </div>

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

