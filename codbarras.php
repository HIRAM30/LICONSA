<?php
// Generar el código de barras utilizando la biblioteca 'php-barcode-generator'
require_once('vendor/autoload.php');

use BarcodeBakery\Common\BCGColor;
use BarcodeBakery\Common\BCGFontFile;
use BarcodeBakery\Common\BCGDrawing;
use BarcodeBakery\Barcode\BCGcode39;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el valor de CURP del formulario
    $curp = $_POST['curp'];
    
    // Generar el código de barras
    $barcode = new BCGcode39();
    $barcode->setScale(2);
    $barcode->setThickness(30);
    $barcode->setForegroundColor(new BCGColor(0, 0, 0));
    $barcode->setBackgroundColor(new BCGColor(255, 255, 255));
    $barcode->setFont(new BCGFontFile('font/Arial.ttf'));
    $barcode->parse($curp);
    
    // Crear la imagen del código de barras
    $drawing = new BCGDrawing('', new BCGColor(255, 255, 255));
    $drawing->setBarcode($barcode);
    $drawing->draw();
    
    // Guardar la imagen en el servidor
    $file = 'barcodes/' . $curp . '.png';
    $drawing->finish(BCGDrawing::IMG_FORMAT_PNG, $file);
    
    // Devolver el nombre del archivo generado para mostrarlo en el formulario
    echo json_encode(['barcode_file' => $file]);
}
?>
