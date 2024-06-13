<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obtener el ID del beneficiario
    $idBeneficiario = $_POST['idBeneficiario'];

    // Verificar si se han enviado datos de dependientes
    if(isset($_POST['curp_dependiente_1'])) {
        // Contador para identificar los campos
        $i = 1;

        // Procesar cada dependiente
        while(isset($_POST["curp_dependiente_$i"])) {
            // Obtener los datos del dependiente del formulario
            $curp = $_POST["curp_dependiente_$i"];
            $nombre = $_POST["nombre_dependiente_$i"];

            // Insertar datos del dependiente en la base de datos
            $sql = "INSERT INTO dependientes (idBeneficiario, NombreCompleto, Curp) VALUES ('$idBeneficiario', '$nombre', '$curp')";

            if ($conn->query($sql) !== TRUE) {
                echo "Error al insertar dependiente: " . $conn->error;
            }

            // Incrementar contador
            $i++;
        }

        echo "Datos de dependientes insertados correctamente.";
    } else {
        echo "No se han recibido datos de dependientes.";
    }

    // Cerrar conexión
    $conn->close();
} else {
    echo "No se han recibido datos del formulario.";
}
?>
