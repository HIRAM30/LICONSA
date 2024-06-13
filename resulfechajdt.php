<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "liconsa";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Inicializar una variable para los resultados de la búsqueda
$resultados = [];

// Verificar si se envió una solicitud de búsqueda
if(isset($_POST['buscar_fecha'])) {
    $fecha_busqueda = $_POST['FechaCompra'];
    // Función para realizar la búsqueda por fecha
    function buscarPorFecha($conn, $fecha_busqueda) {
        $resultados = [];
        // Consulta SQL para buscar registros por fecha
        $sql = "SELECT * FROM compra WHERE FechaCompra = '$fecha_busqueda'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Almacenar los resultados en un arreglo
            while($row = $result->fetch_assoc()) {
                $resultados[] = $row;
            }
        }
        return $resultados;
    }
    // Realizar la búsqueda
    $resultados = buscarPorFecha($conn, $fecha_busqueda);
}

// Cerrar conexión
$conn->close();
?>

<!-- HTML para mostrar los resultados -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
    <title>Resultados de la búsqueda</title>
    <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Resultados de la búsqueda por fecha</h2>
    <?php if (!empty($resultados)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Tarjeta</th>
            </tr>
            <?php foreach ($resultados as $resultado) : ?>
                <tr>
                    <td><?php echo $resultado['idCompra']; ?></td>
                    <td><?php echo $resultado['FechaCompra']; ?></td>
                    <td><?php echo $resultado['idTarjeta']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No se encontraron resultados para la fecha especificada.</p>
     
    <?php endif; ?>
    <button><a href="JEFEDETURNO.php">Regresar</a></button>
</body>
</html>
