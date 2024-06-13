<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "liconsa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el CURP del beneficiario que se desea eliminar
$curp = $_POST['CURP']; // Asegúrate de tener el CURP del beneficiario que se desea eliminar

// Consulta SQL para eliminar los registros del beneficiario especificado por su CURP
$sql = "DELETE FROM beneficiario WHERE CURP = '$curp'";

if ($conn->query($sql) === TRUE) {
  echo '<script>alert("Los datos del beneficiario con CURP ',$curp,' han sido eliminados correctamente.");</script>';
  header("Location: admin.php");
  exit();
} else {
  echo "Error al eliminar los datos del beneficiario: " . $conn->error;
}


$conn->close();
?>
