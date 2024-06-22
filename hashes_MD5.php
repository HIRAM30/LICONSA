<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "liconsa");

if ($conexion === false) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener todas las contraseñas en texto plano
$consulta = "SELECT id, Contrasena FROM beneficiario";
$resultado = mysqli_query($conexion, $consulta);

while ($fila = mysqli_fetch_assoc($resultado)) {
    $id = $fila['id'];
    $contraseña = $fila['Contrasena'];

    // Convertir la contraseña en texto plano a MD5
    $contraseñaHasheada = md5($contraseña);

    // Actualizar la base de datos con la contraseña hasheada
    $actualizar = "UPDATE beneficiario SET Contrasena = '$contraseñaHasheada' WHERE id = $id";
    mysqli_query($conexion, $actualizar);
}

mysqli_close($conexion);
?>
