<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
        <title>JEFE</title>

        <link rel="stylesheet" href="fontawesome/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300">
        <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div id="tm-wrap">
        <section><!--Seccion Display Flex-->
            <article class="tm-site-header-col"><!--Columna izquierda-->
                <div id="contenido-col-izq">
                    <h1 class="">LICONSA</h1><br>
                    <img src="img/underline.png">
                    <p>BIENVENIDO JEFE DE TURNO</p>
                    <a href="LOGIN.php"><button id="bcsn">Cerrar Sesion</button></a>
                </div>
            </article>
            <article><!--Columna derecha-->   

                <section><!--Seccion 1, 2 cajas en columna-->

                    <div class="caja"><!--Caja 1-->                            
                        <button id="btn-caja" title="Agregar" name="Agregar" onclick="mostrarcaja1()">
                            <i class="fas fa-user-plus fa-3x tm-nav-icon"></i>
                            Agregar Beneficiario
                        </button>   
                        <div class="overlay" id="overlay1">
                            <div class="popup">
                                <span class="close-btn" onclick="cerrarcaja1()">CERRAR</span>
                                <!-- Aquí puedes agregar el contenido de la caja -->  
                                <?php if (!empty($mensaje)) : ?>
                                  <p><?php echo $mensaje; ?></p>
                                  <?php endif; ?>
                                  <form action="agregar_beneficiario.php" method="post" enctype="multipart/form-data">                                  
                                  <h2 class="tm-page-title">Agregar</h2><br> 
                                    <input type="number" id="id" name="id"  placeholder="ID (No modificable)" hidden>
                                    <label for="foto">Foto:</label>
                                    <input class="selector" type="file" id="foto" name="foto" accept="image/*"><br>                                    
                                    <input class="loginin" type="text" id="nombre" name="nombre" placeholder="Nombre(s)" required>                                 
                                    <input class="loginin" type="text" id="apellidos" name="apellidos" placeholder="Apellido(s)" required>                                   
                                    <input class="loginin" type="text" id="curp" name="curp" placeholder="CURP" required>
                                    <label for="edad">Edad:</label>
                                    <input class="loginin" type="number" id="edad" name="edad" required>
                                    <label for="personas_dependientes"># Dependientes:</label>
                                    <input class="loginin" type="number" id="personas_dependientes" name="personas_dependientes" required>
                                    
                                    <input class="loginin" type="text" id="direccion" name="direccion" placeholder="Dirección" required>                                   
                                    <input class="loginin" type="tel" id="telefono" name="telefono" placeholder="Teléfono Celular" required>                                    
                                    <input class="loginin" type="email" id="correo_electronico" name="correo_electronico" placeholder="Correo Electrónico" required>
                                    <input class="loginin" type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                                    <label for="tipo_usuario" hidden>Tipo de usuario:</label>                                  
                                  <select class="selector" name="tipo_usuario" id="tipo_usuario" required hidden>
                                    <?php
                                    // Conexión a la base de datos
                                    $db = new PDO('mysql:host=localhost;dbname=liconsa', 'root', '');

                                    // Consulta para obtener los tipos de usuario
                                    $sql = "SELECT * FROM tipousuario";

                                    // Preparación de la consulta
                                    $stmt = $db->prepare($sql);

                                    // Ejecución de la consulta
                                    $stmt->execute();

                                    // Recorrido de los tipos de usuario
                                    while ($tipo_usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                      echo "<option value=\"{$tipo_usuario['id']}\">{$tipo_usuario['TipoUsuario']}</option>";
                                    }
                                    ?>
                                  </select><br>                                  

                                  <button class="btn btn-primary tm-btn-submit" type="submit">Agregar beneficiario</button>
                                </form>                                                                                                                                   
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>                                                               

                <form action="comprajdt.php" method="post" enctype="multipart/form-data">
                    <div class="caja"><!--Caja 2-->
                        <button id="btn-caja" title="Validar" name="Validar" onclick="mostrarcaja2()">
                            <i class="fas fa-calendar-check fa-3x tm-nav-icon"></i>
                            Validar Compra
                        </button>                                                               
                    </div>
                 </form>
                               
                </section><!--Termina seccion 2-->
                <section><!--Seccion 2, 2 cajas en columna-->

                <form action="consultar_jefedt.php" method="post" enctype="multipart/form-data">  
                    <div class="caja"><!--Caja 3-->
                        <button id="btn-caja" title="Consultar" name="Consultar" onclick="mostrarcaja3()">
                            <i class="fas fa-search fa-3x tm-nav-icon"></i>
                            Consultar Beneficiario
                        </button>                                        
                        <div class="overlay" id="overlay3">
                            <div class="popup">
                                <span class="close-btn" onclick="cerrarcaja3()">CERRAR</span>
                                <!-- Aquí puedes agregar el contenido de la caja --> 
                                <h2 class="tm-page-title">Consultar</h2><br>
                                <input class="loginin" type="text" name="CURP" placeholder="CURP" required>
                                <button class="btn btn-primary tm-btn-submit" type="submit" title="Buscar" name="Buscar">Buscar</button>
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>
                </form>
                <div class="caja"><!--Caja 4-->
                        <button id="btn-caja" title="Validar" name="Validar" onclick="mostrarcaja4()">
                            <i class="fas fa-user-circle fa-3x tm-nav-icon"></i>
                            Agregar Dependientes
                        </button>                                        
                        <div class="overlay" id="overlay4">
                            <div class="popup">
                                <span class="close-btn" onclick="cerrarcaja4()">CERRAR</span>
                                <!-- Aquí puedes agregar el contenido de la caja -->                                         
                                <h2 class="tm-page-title">Agregar</h2><br>  
                                <script>
                                    // Esta función se ejecuta cuando el usuario cambia el número de dependientes
                                    function mostrarCamposDependientes() {
                                        // Obtener el número de dependientes ingresado por el usuario
                                        var numDependientes = document.getElementById("num_dependientes").value;
                                        // Obtener el elemento del formulario donde se agregarán los campos de dependientes
                                        var formulario = document.getElementById("formulario_dependientes");

                                        // Limpiar el contenido previo del formulario
                                        formulario.innerHTML = "";

                                        // Generar campos de entrada para cada dependiente
                                        for (var i = 1; i <= numDependientes; i++) {
                                            formulario.innerHTML += `
                                                <div>
                                                    <label for="curp_dependiente_${i}">CURP del dependiente ${i}:</label>
                                                    <input type="text" id="curp_dependiente_${i}" name="curp_dependiente_${i}" required>
                                                </div>
                                                <div>
                                                    <label for="nombre_dependiente_${i}">Nombre del dependiente ${i}:</label>
                                                    <input type="text" id="nombre_dependiente_${i}" name="nombre_dependiente_${i}" required>
                                                </div>
                                                <br>
                                            `;
                                        }

                                        // Agregar el campo ID del Beneficiario
                                        formulario.innerHTML += `
                                            <label for="idBeneficiario">ID del Beneficiario:</label>
                                            <select class="selector" name="idBeneficiario" id="idBeneficiario" required>
                                                <?php
                                                // backup.php
                                                function backupDatabase($host, $username, $password, $database, $backupDir)
                                                {
                                                    $date = date('Y-m-d_H-i-s');
                                                    $backupFile = $backupDir . $database . '_' . $date . '.sql';
                                                    $command = "mysqldump --host=$host --user=$username --password=$password $database > $backupFile";
                                                
                                                    system($command, $output);
                                                
                                                    if ($output === 0) {
                                                        echo "Backup created successfully: $backupFile";
                                                    } else {
                                                        echo "Error creating backup: $output";
                                                    }
                                                }
                                                
                                                // Usage
                                                backupDatabase('localhost', 'root', '', 'liconsa', '/path/to/backup/directory/');
                                                
// recover.php
function isDatabaseOnline($host, $username, $password, $database)
{
    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function recoverDatabase($backupDir, $host, $username, $password, $database)
{
    $latestBackupFile = getLatestBackupFile($backupDir);
    $command = "mysql --host=$host --user=$username --password=$password $database < $latestBackupFile";

    system($command, $output);

    if ($output === 0) {
        echo "Database recovered successfully from: $latestBackupFile";
    } else {
        echo "Error recovering database: $output";
    }
}

function getLatestBackupFile($backupDir)
{
    $files = glob($backupDir . '*.sql');
    usort($files, function($a, $b) {
        return filemtime($b) - filemtime($a);
    });

    return $files[0];
}

// Usage
if (!isDatabaseOnline('localhost', 'root', '', 'liconsa')) {
    recoverDatabase('/path/to/backup/directory/', 'localhost', 'root', '', 'liconsa');
}
    
                                                // Conexión a la base de datos
                                                $db = new PDO('mysql:host=localhost;dbname=liconsa', 'root', '');

                                                // Consulta para obtener los tipos de usuario
                                                $sql = "SELECT id FROM beneficiario ORDER BY id DESC";

                                                // Preparación de la consulta
                                                $stmt = $db->prepare($sql);

                                                // Ejecución de la consulta
                                                $stmt->execute();

                                                // Recorrido de los tipos de usuario
                                                while ($tipo_usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<option value=\"{$tipo_usuario['id']}\">{$tipo_usuario['id']}</option>";
                                                }
                                                ?>
                                            </select><br>
                                        `;

                                        // Agregar el botón de guardar
                                        formulario.innerHTML += `
                                            <button class="btn btn-primary tm-btn-submit" type="submit">Guardar</button>
                                        `;
                                    }
                                </script>

                                <label for="num_dependientes">Número de Dependientes:</label>
                                <input type="number" id="num_dependientes" name="num_dependientes" min="1" onchange="mostrarCamposDependientes()" required>
                                <br><br>

                                <form id="formulario_dependientes" action="agregardependientes.php" method="post">
                                    <!-- Los campos de dependientes se agregarán aquí mediante JavaScript -->
                                </form>
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>
                </section><!--Termina seccion 2-->
                <section><!--Seccion 3, 1 caja en columna-->

                    <div class="caja"><!--Caja 5-->
                        <form action="resulfechajdt.php" method="post" enctype="multipart/form-data">                                                                            
                            <button id="btn-caja" title="Eliminar" name="Eliminar" onclick="mostrarcaja5()">
                                <i class="fas fa-server fa-3x tm-nav-icon"></i>
                                Registro de Compra
                            </button>                                        
                            <div class="overlay" id="overlay5">
                                <div class="popup">
                                    <span class="close-btn" onclick="cerrarcaja5()">CERRAR</span>
                                    <!-- Aquí puedes agregar el contenido de la caja -->  
                                    <h2 class="tm-page-title">Compras</h2><br>                 
                                    <label>Seleccione una fecha:</label><br>
                                    <input class="loginin" type="date" name="FechaCompra" placeholder="FechaCompra" required>
                                    <button class="btn btn-primary tm-btn-submit" type="submit" title="buscar_fecha" name="buscar_fecha">BUSCAR</button>  
                                    <!-- Aquí termina el contenido de la caja -->
                                </div>
                            </div>
                        </form> 
                    </div>

                </section><!--Termina seccion 3-->
            </article>
        </section>
    </div>
  <script src="js/main.js"></script>
</body>
</html>