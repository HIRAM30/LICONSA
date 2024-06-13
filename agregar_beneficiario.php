<?php

// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "liconsa";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

// Validar la conexión
if (!$conexion) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}

// Obtener los datos del formulario
$id = $_POST['id'];
$foto = $_FILES['foto']['tmp_name'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$curp = $_POST['curp'];
$edad = $_POST['edad'];
$personas_dependientes = $_POST['personas_dependientes'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$correo_electronico = $_POST['correo_electronico'];
$contrasena = $_POST['contrasena'];
$tipo_usuario = $_POST['tipo_usuario'];

// Guardar la foto en el servidor
if ($foto != "") {
  $ruta_foto = "img/" . uniqid() . ".jpg";
  move_uploaded_file($foto, $ruta_foto);
} else {
  $ruta_foto = "";
}

// Consulta SQL para insertar los datos
$sql = "INSERT INTO beneficiario ( Foto, Nombre, Apellidos, Curp, Edad, 
NumPersonasDependen, Direccion, Telefono, CorreoElectronico, Contrasena, 
TipoUsuario) 
VALUES ( '$ruta_foto', '$nombre', '$apellidos', '$curp', '$edad', 
'$personas_dependientes', '$direccion', '$telefono', '$correo_electronico', 
'$contrasena', '$tipo_usuario')";

// Ejecutar la consulta
if (mysqli_query($conexion, $sql)) {
  echo '<script>alert("Los datos se han insertado correctamente.");</script>';
} else {
  echo '<script>alert("Error al insertar los datos: ' . mysqli_error($conexion) . '");</script>';
}
echo '<script>window.history.back();</script>';

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>