<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Escáner de Código de Barras</title>
<link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" href="css/styles.css">
<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
<script>
    // Función para inicializar el escáner de código de barras
    function inicializarEscaneo() {
        Quagga.init({
            inputStream : {
                name : "Camara",
                type : "LiveStream",
                target: document.querySelector('#scanner-container'),
                constraints: {
                    facingMode: "environment" // Utiliza la cámara trasera del dispositivo si está disponible
                }
            },
            decoder : {
                readers : ["ean_reader", "upc_reader"]
            }
        }, function(err) {
            if (err) {
                console.log(err);
                return;
            }
            console.log("Iniciando escáner");
            Quagga.start();
        });

        Quagga.onDetected(function(result) {
            document.getElementById('codigo_barras').value = result.codeResult.code;
            Quagga.stop();
        });
    }
</script>
</head>
<body onload="inicializarEscaneo()">
    <h2>Escáner de Código de Barras</h2>
    <div id="scanner-container"></div>
    <form action="agregarcompra.php" method="post">
        <label for="codigo_barras">Código de Barras:</label>
        <input type="text" id="codigo_barras" name="codigo_barras" readonly>
        <br><br>
        <button type="submit">Guardar</button>
    </form>
    <button><a href="JEFEDETURNO.php">REGRESAR</a></button>
</body>
</html>
