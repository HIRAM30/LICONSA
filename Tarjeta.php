<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
    <title>Tarjeta de Beneficiario</title>
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body style="display:flex; justify-content: center; align-items: center;">
<div>
    <?php
    session_start();

    // Verificar si hay una sesión activa
    if (isset($_SESSION['usuario'])) {
        // Conectar a la base de datos
        $conexion = mysqli_connect("localhost", "root", "", "liconsa");

        // Verificar la conexión
        if ($conexion === false) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Obtener información del beneficiario que inició sesión
        $usuario = $_SESSION['usuario'];
        $consulta = "SELECT id, Foto FROM beneficiario WHERE CorreoElectronico=?";
        $stmt = mysqli_prepare($conexion, $consulta);
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $foto);
        
        // Obtener el resultado de la consulta
        mysqli_stmt_fetch($stmt);

        // Mostrar la tarjeta del beneficiario
        echo "<div style='background-color:white; border: 1px solid #946D43; margin:20px; padding: 20px; width: 80%; border-radius: 5px;'>";
        echo "<section style='display: flex; gap: 10px; padding: 20px;'>";
        echo "<article style='padding: 20px; width: 100%; height: auto;'>";
        
        // Verificar si la imagen existe en la ruta especificada
        if (file_exists($foto)) {
            // Mostrar la imagen
            echo "<img width='200' height='250' src='$foto' alt='Foto de beneficiario'>";
        } else {
            // Mostrar una imagen de error o un mensaje
            echo "Imagen no encontrada";
        }

        echo "</article>";
        echo "<article style='padding: 20px; width: 100%; height: auto;'>";
        echo "<p>ID de Beneficiario: $id</p>";
        echo "<div id='codigo_barras'></div>";
        echo "</article>";
        echo "</section>";
        echo "</div>";

        // Liberar recursos
        mysqli_stmt_close($stmt);
        mysqli_close($conexion);
    } else {
        // Si no hay sesión activa, redirigir a la página de inicio de sesión
        header("Location: login.php");
        exit(); // Asegurar que el script se detenga después de redirigir
    }
    ?>

    <script>
        // Generar el código de barras utilizando BarcodeAPI.org
        var codigoBarrasDiv = document.getElementById('codigo_barras');
        var idBeneficiario = '<?php echo $id; ?>';
        var codigoBarrasUrl = 'https://barcodeapi.org/api/128/' + idBeneficiario;

        // Crear la imagen del código de barras y añadirla al div
        var codigoBarrasImg = document.createElement('img');
        codigoBarrasImg.src = codigoBarrasUrl;
        codigoBarrasDiv.appendChild(codigoBarrasImg);
    </script>

    <button><a href="BENEFICIARIO.php">REGRESAR</a></button>
</div>
</body>
</html>
