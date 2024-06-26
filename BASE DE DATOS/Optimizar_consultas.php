<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buscar Beneficiarios</title>
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div id="tm-wrap">
  <section>
    <article>
      <section>
        <form action="buscar_beneficiarios.php" method="post">
          <h2>Buscar Beneficiarios</h2>
          <input class="loginin" type="text" name="search" placeholder="Buscar por CURP, Nombre, Apellidos" required>
          <button class="btn btn-primary tm-btn-submit" type="submit">Buscar</button>
          <?php
// buscar_beneficiarios.php
$host = 'localhost';
$db = 'liconsa';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $search = '%' . $_POST['search'] . '%';
        $stmt = $pdo->prepare("
            SELECT * 
            FROM beneficiarios 
            WHERE curp LIKE :search 
            OR nombre LIKE :search 
            OR apellidos LIKE :search 
            LIMIT 10
        ");
        $stmt->bindParam(':search', $search, PDO::PARAM_STR);
        $stmt->execute();

        $beneficiarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($beneficiarios as $beneficiario) {
            echo $beneficiario['nombre'] . " " . $beneficiario['apellidos'] . "<br>";
        }
    }
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

        </form>
      </section>
    </article>
  </section>
</div>
</body>
</html>
