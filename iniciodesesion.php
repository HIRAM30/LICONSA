<?php
session_start();

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener credenciales del formulario
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña']; // Esta ya está hasheada con MD5 en el cliente

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "liconsa");

    // Verificar la conexión
    if ($conexion === false) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta preparada para evitar inyección SQL
    $consulta = "SELECT TipoUsuario FROM beneficiario WHERE CorreoElectronico=? AND Contrasena=?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Verificar si se encontraron filas
    if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $tipoUsuario);
        mysqli_stmt_fetch($stmt);

        // Establecer variables de sesión
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipoUsuario'] = $tipoUsuario;

        // Redireccionar según el tipo de usuario
        switch ($tipoUsuario) {
            case 1: // Administrador
                header("Location: BENEFICIARIO.php");
                break;
            case 2: // Cliente
                header("Location: ADMIN.php");
                break;
            case 3: // Jefe de turno
                header("Location: JEFEDETURNO.php");
                break;
            default:
                // Tipo de usuario no válido
                header("Location: index.html?error=invalid_user_type");
                break;
        }
    } else {
        // No se encontraron coincidencias, redirigir a página de inicio de sesión con error
        header("Location: login.php?error=authentication_failed");
    }

    // Liberar recursos
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    // Si no se envió por POST, redirigir a la página de inicio
    header("Location: login.php");
}
?>




