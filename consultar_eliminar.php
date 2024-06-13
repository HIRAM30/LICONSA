<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
  <title>Eliminar Beneficiario</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
</head>
<body>

  <h1>Consulta y Eliminación</h1>
  <?php
  // Código PHP para realizar la búsqueda y mostrar resultados
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "liconsa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }

    $curp = $_POST['CURP'];

    // Consulta SQL para recuperar datos basados en el CURP
    $sql = "SELECT * FROM beneficiario WHERE CURP = '$curp'";
    $result = $conn->query($sql);

    // Mostrar los resultados
    if ($result->num_rows > 0) {
      // Mostrar los resultados dentro de un formulario para permitir la edición
      echo "<h2>Resultados de la búsqueda:</h2>";
      echo "<form action='eliminar.php' method='post'>";
      echo "<table border='1'>";

      // Iterar sobre los resultados y mostrar en la tabla
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<th>ID</th><td>" . $row['id'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Foto</th><td>" . $row['Foto'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Nombre</th><td>" . $row['Nombre'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Apellidos</th><td>" . $row['Apellidos'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>CURP</th><td>" . $row['Curp'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Edad</th><td>" . $row['Edad'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Personas Dependientes</th><td>". $row['NumPersonasDependen'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Dirección</th><td>" . $row['Direccion'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Teléfono</th><td>" . $row['Telefono'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Correo Electrónico</th><td>" . $row['CorreoElectronico'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Tipo Usuario</th><td>" . $row['TipoUsuario'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Días</th><td>" . $row['Dias'] . "</td>";//no se puede editar
        echo "</tr>";
        echo "<tr>";
        echo "<th>Contraseña</th><td>" . $row['Contrasena'] . "</td>";//no se puede editar
        echo "</tr>";
      }
      echo "</table>";
      echo "<input type='hidden' name='CURP' value='$curp'>";
      echo "<input id='botonsubmit' type='submit' value='Eliminar'>";
      echo "</form>";
    } else {
      echo "<p>No se encontraron resultados para el CURP ingresado.</p>";
    }

    $conn->close();
  }
  ?>

  <!-- Botón para regresar -->
  <button><a href="ADMIN.php">Cancelar</a></button>

</body>
</html>
