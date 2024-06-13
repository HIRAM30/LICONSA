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

// Obtener el valores del formulario
$curp = $_POST['CURP'];
$nombre = $_POST['Nombre'];
$apellidos = $_POST['Apellidos'];
$edad = $_POST['Edad'];
$direccion = $_POST['Direccion'];
$telefono = $_POST['Telefono'];
$correo_electronico = $_POST['CorreoElectronico'];

// Actualizar los datos en la base de datos
$sql = "UPDATE beneficiario SET Nombre='$nombre', Apellidos='$apellidos', Edad='$edad', Direccion='$direccion', Telefono='$telefono', CorreoElectronico='$correo_electronico' WHERE CURP='$curp'";

if ($conn->query($sql) === TRUE) {
  echo "Los datos se actualizaron correctamente.";
  header("Location: admin.php");
  exit();
} else {
  echo "Error al actualizar los datos: " . $conn->error;
}

$conn->close();
?>
