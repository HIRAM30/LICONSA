<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";  // Deja vacío si no hay contraseña
$base_de_datos = "liconsa";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

// Validar la conexión
if (!$conexion) {
  echo "Error al conectar a la base de datos: " . mysqli_connect_error();
  exit();
}

// Obtener los datos del formulario de manera segura
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$apellidos = mysqli_real_escape_string($conexion, $_POST['apellidos']);
$curp = mysqli_real_escape_string($conexion, $_POST['curp']);
$edad = mysqli_real_escape_string($conexion, $_POST['edad']);
$personas_dependientes = mysqli_real_escape_string($conexion, $_POST['personas_dependientes']);
$direccion = mysqli_real_escape_string($conexion, $_POST['direccion']);
$telefono = mysqli_real_escape_string($conexion, $_POST['telefono']);
$correo_electronico = mysqli_real_escape_string($conexion, $_POST['correo_electronico']);
$contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);
$tipo_usuario = mysqli_real_escape_string($conexion, $_POST['tipo_usuario']);

// Subida de la imagen (opcional)
if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
  $foto_tmp_name = $_FILES['foto']['tmp_name'];
  $foto_name = basename($_FILES['foto']['name']);
  $ruta_foto = "img/" . uniqid('', true) . "_" . $foto_name;
  if (!move_uploaded_file($foto_tmp_name, $ruta_foto)) {
    echo '<script>alert("Error al subir la foto.");</script>';
    exit();
  }
} else {
  $ruta_foto = ""; // Puedes asignar una imagen por defecto si no se sube ninguna
}

// Consulta SQL para insertar los datos
$sql = "INSERT INTO beneficiario (Foto, Nombre, Apellidos, Curp, Edad, NumPersonasDependen, Direccion, Telefono, CorreoElectronico, Contrasena, TipoUsuario) 
        VALUES ('$ruta_foto', '$nombre', '$apellidos', '$curp', $edad, $personas_dependientes, '$direccion', $telefono, '$correo_electronico', '$contrasena', $tipo_usuario)";

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
