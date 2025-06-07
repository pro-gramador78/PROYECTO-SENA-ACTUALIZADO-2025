<?php
session_start();
include("conexion.php"); // conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btningresar'])) {
    $correo = $_POST['correo'];
    $contrasena = $_POST['contraseña'];

    // Verificar en administrador
    $sql = "SELECT * FROM administrador WHERE correo = '$correo' AND contraseña = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['usuario'] = $correo;
        $_SESSION['rol'] = "administrador";
        header("Location: admin.php");
        exit();
    }

    // Verificar en cajero
    $sql = "SELECT * FROM cajero WHERE correo = '$correo' AND contraseña = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['usuario'] = $correo;
        $_SESSION['rol'] = "cajero";
        header("Location: cajero.php");
        exit();
    }

    // Verificar en cliente
    $sql = "SELECT * FROM cliente WHERE correo = '$correo' AND contraseña = '$contrasena'";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        $_SESSION['usuario'] = $correo;
        $_SESSION['rol'] = "cliente";
        header("Location: cliente.php");
        exit();
    }

    // Si no coincide nada
    $_SESSION['error_login'] = "❌ Correo o contraseña incorrectos.";
    header("Location: login.php");
    exit();
}
?>
