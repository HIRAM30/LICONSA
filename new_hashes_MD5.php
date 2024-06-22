<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "liconsa");

if ($conexion === false) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Ejemplo de cómo insertar un nuevo usuario con una contraseña hasheada
$usuario = 'nuevoUsuario@example.com';
$contraseña = md5('password'); // Hashear la contraseña usando MD5
$tipoUsuario = 1; // Tipo de usuario, por ejemplo, 1 para Administrador

$consulta = "INSERT INTO beneficiario (CorreoElectronico, Contrasena, TipoUsuario) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($stmt, "ssi", $usuario, $contraseña, $tipoUsuario);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
