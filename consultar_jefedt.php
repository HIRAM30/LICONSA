<!DOCTYPE html>
<html lang="es">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
  <title>Consulta</title>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
</head>
<body>

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
      // Mostrar los resultados dentro de una tabla
      echo "<h2>Resultados de la búsqueda:</h2>";
      echo "<table>";
      while ($row = $result->fetch_assoc()) {
        foreach ($row as $key => $value) {
          echo "<tr>";
          echo "<th>$key</th>";
          echo "<td>$value</td>";
          echo "</tr>";
        }
      }
      echo "</table>";
    } else {
      echo "<p>No se encontraron resultados para el CURP ingresado.</p>";
    }

    $conn->close();
  }
  ?>
<button><a href="jefedeturno.php">REGRESAR</a></button>
</body>
</html>
