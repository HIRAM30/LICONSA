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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            padding-top: 50px;
        }
        form {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #946D43;
        }
        h2 {
            margin-bottom: 20px;
            color: #946D43;
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
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Bienvenido a Liconsa</h1>
        </header>
        <form action="iniciodesesion.php" method="post">
            <h2>Iniciar Sesión</h2>
            <p>
                <label for="usuario">Correo:</label>
                <input type="text" id="usuario" placeholder="Ingrese su correo" name="usuario">
            </p>
            <p>
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" placeholder="Ingrese su contraseña" name="contraseña">
            </p>
            <div class="g-recaptcha" data-sitekey="6Le5fgAqAAAAAHvSg_sePzhVc-BwDjWUsIv71M7g"></div>
            <input class="btn-submit" type="submit" value="Ingresar">
        </form>
    </div>
</body>
</html>
