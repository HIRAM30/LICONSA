<?php
// Función para obtener datos de beneficiarios
function getBeneficiarios($curp) {
    global $memcached;

    // Generar una clave única para la caché
    $cacheKey = "beneficiario_" . $curp;

    // Intentar obtener los datos de la caché
    $beneficiario = $memcached->get($cacheKey);

    if ($beneficiario === false) {
        // Si los datos no están en la caché, obtenerlos de la base de datos
        $pdo = new PDO('mysql:host=localhost;dbname=liconsa', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $pdo->prepare("SELECT nombre, apellidos FROM beneficiarios WHERE curp = :curp");
        $query->execute(['curp' => $curp]);
        $beneficiario = $query->fetch(PDO::FETCH_ASSOC);

        // Guardar los datos en la caché
        $memcached->set($cacheKey, $beneficiario, 300); // Caché por 5 minutos
    }

    return $beneficiario;
}

// Uso de la función
$curp = "ABC12345678";
$beneficiario = getBeneficiarios($curp);
if ($beneficiario) {
    echo "Nombre: " . $beneficiario['nombre'] . " Apellidos: " . $beneficiario['apellidos'];
} else {
    echo "Beneficiario no encontrado.";
}
?>
