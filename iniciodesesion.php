<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
<<<<<<< HEAD
=======
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Validar el reCAPTCHA
    $secret = '6Le5fgAqAAAAACrkUV499SejFuEIkHnKd6qrrMPh';
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha_response");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        header("Location: login.php?error=captcha_failed");
        exit;
    }
>>>>>>> 4809f820fd62e5b66936a3c14c7e09ed89fd1838

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "liconsa");

    if ($conexion === false) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Consulta preparada para evitar inyección SQL
    $consulta = "SELECT TipoUsuario FROM beneficiario WHERE CorreoElectronico=? AND Contrasena=?";
    $stmt = mysqli_prepare($conexion, $consulta);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $contraseña);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

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
                header("Location: index.html?error=invalid_user_type");
                break;
        }
    } else {
        header("Location: login.php?error=authentication_failed");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    header("Location: login.php");
}
?>
<<<<<<< HEAD





=======
>>>>>>> 4809f820fd62e5b66936a3c14c7e09ed89fd1838
