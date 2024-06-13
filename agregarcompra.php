<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir el código de barras enviado desde el formulario
    $codigo_barras_id = $_POST['codigo_barras'];

    // Obtener la fecha actual
    $fecha_compra = date("Y-m-d H:i:s");

    // Datos de conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "liconsa";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si el código de barras existe en la tabla tarjeta
    $sql_verificar = "SELECT idTarjeta FROM tarjeta WHERE idTarjeta = '$codigo_barras_id'";
    $resultado_verificar = $conn->query($sql_verificar);

    if ($resultado_verificar->num_rows > 0) {
        // El código de barras existe en la tabla tarjeta, proceder con la inserción en la tabla compra

        // Preparar la consulta SQL para insertar el registro en la tabla compra
        $sql = "INSERT INTO compra (idTarjeta, fecha_compra) VALUES ('$codigo_barras_id', '$fecha_compra')";

        // Ejecutar la consulta SQL
        if ($conn->query($sql) === TRUE) {
            echo "Registro de compra guardado correctamente.";
        } else {
            echo "Error al guardar el registro de compra: " . $conn->error;
        }
    } else {
        // El código de barras no existe en la tabla tarjeta
        echo "Error: El código de barras no existe en la tabla tarjeta.";
    }

    // Cerrar conexión
    $conn->close();
} else {
    echo "No se han recibido datos del formulario.";
}
?>
