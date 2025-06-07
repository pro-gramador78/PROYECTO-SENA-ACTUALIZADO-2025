<?php
$conexion = new mysqli("localhost", "root", "", "sultipan");
if ($conexion->connect_error) {
  die("Conexión fallida: " . $conexion->connect_error);
}

// Eliminar registro
if (isset($_GET['eliminar']) && isset($_GET['rol']) && isset($_GET['id'])) {
  $rol = $_GET['rol'];
  $id = (int) $_GET['id'];

  // Mensaje para depurar si entra a esta sección
  error_log("Intentando eliminar rol: $rol con ID: $id");

  if ($rol === "cajero") {
    $resultado = $conexion->query("DELETE FROM cajero WHERE id_cajero = $id");
    if (!$resultado) {
      die("Error al eliminar cajero: " . $conexion->error);
    }
  } elseif ($rol === "administrador") {
    $resultado = $conexion->query("DELETE FROM administrador WHERE id_admin = $id");
    if (!$resultado) {
      die("Error al eliminar administrador: " . $conexion->error);
    }
  } else {
    die("Rol inválido: $rol");
  }

  header("Location: crud_empleados.php");
  exit;
}

// El resto del código se mantiene igual
// Actualizar registro
if (isset($_POST['actualizar'])) {
  $rol = $_POST['rol'];
  $id = (int) $_POST['id'];
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $contraseña = $_POST['contraseña'];

  if ($rol === "cajero") {
    $conexion->query("UPDATE cajero SET nombre='$nombre', correo='$correo', contraseña='$contraseña' WHERE id_cajero = $id");
  } elseif ($rol === "administrador") {
    $conexion->query("UPDATE administrador SET nombre='$nombre', correo='$correo', contraseña='$contraseña' WHERE id_admin = $id");
  }

  header("Location: crud_empleados.php");
  exit;
}

// Obtener todos los empleados
$cajeros = $conexion->query("SELECT id_cajero AS id, nombre, correo, contraseña, 'cajero' AS rol FROM cajero");
$administradores = $conexion->query("SELECT id_admin AS id, nombre, correo, contraseña, 'administrador' AS rol FROM administrador");
$empleados = array_merge($cajeros->fetch_all(MYSQLI_ASSOC), $administradores->fetch_all(MYSQLI_ASSOC));
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Empleados</title>
  <link rel="stylesheet" href="style_crud_empleados.css">
</head>
<body>

<h1>Editar Registros de Empleados</h1>

<table>
  <thead>
    <tr>
      <th>Rol</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Contraseña</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($empleados as $empleado): ?>
      <tr>
        <form method="post" class="inline-form">
          <input type="hidden" name="id" value="<?= $empleado['id'] ?>">
          <input type="hidden" name="rol" value="<?= $empleado['rol'] ?>">
          <td><?= ucfirst($empleado['rol']) ?></td>
          <td><input type="text" name="nombre" value="<?= htmlspecialchars($empleado['nombre']) ?>"></td>
          <td><input type="email" name="correo" value="<?= htmlspecialchars($empleado['correo']) ?>"></td>
          <td><input type="text" name="contraseña" value="<?= htmlspecialchars($empleado['contraseña']) ?>"></td>
          <td>
            <button type="submit" name="actualizar" class="btn btn-edit">Guardar</button>
            <a href="crud_empleados.php?eliminar=1&rol=<?= $empleado['rol'] ?>&id=<?= $empleado['id'] ?>" class="btn btn-delete" onclick="return confirm('¿Eliminar este empleado?')">Eliminar</a>
          </td>
        </form>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</body>
</html>