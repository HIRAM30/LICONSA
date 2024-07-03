<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FBEED7;
        }
        .container-custom {
            max-width: 600px;
            margin: auto;
            padding-top: 50px;
        }
        form {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        h1, h2 {
            color: #946D43;
        }
        h1 {
            text-align: center;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .btn-submit {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #946D43;
<<<<<<< HEAD
            border-radius: 5px;
            cursor: pointer;
        }
=======
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #7b5435;
        }
>>>>>>> 4809f820fd62e5b66936a3c14c7e09ed89fd1838
    </style>
</head>
<body>
    <div class="container container-custom">
        <header>
            <h1>Bienvenido a Liconsa</h1>
        </header>
        <form id="formInicioSesion" action="iniciodesesion.php" method="post">
            <h2>Iniciar Sesión</h2>
            <div class="form-group">
                <label for="usuario">Correo:</label>
                <input type="text" class="form-control" id="usuario" placeholder="Ingrese su correo" name="usuario">
            </div>
            <div class="form-group">
                <label for="contraseña">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" placeholder="Ingrese su contraseña" name="contraseña">
            </div>
            <div class="g-recaptcha mb-3" data-sitekey="6Le5fgAqAAAAAHvSg_sePzhVc-BwDjWUsIv71M7g"></div>
            <button type="submit" class="btn btn-submit">Ingresar</button>
        </form>
    </div>
<<<<<<< HEAD
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('formInicioSesion').addEventListener('submit', function(event) {
                event.preventDefault(); // Evitar que el formulario se envíe inmediatamente

                // Obtener los elementos del formulario
                var usuarioInput = document.getElementById('usuario');
                var contrasenaInput = document.getElementById('contraseña');

                // Verificar si faltan datos por ingresar
                if (!usuarioInput.value || !contrasenaInput.value) {
                    alert("Por favor, complete todos los campos requeridos.");
                    return;
                }

                // Enviar el formulario con la contraseña hasheada
                this.submit();
            });
        });
    </script>
</body>
</html>

=======
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
>>>>>>> 4809f820fd62e5b66936a3c14c7e09ed89fd1838
