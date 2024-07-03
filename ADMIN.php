<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
        <title>ADMIN</title>

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
                    <p>BIENVENIDO ADMINISTRADOR</p>
                    <a href="LOGIN.php"><button id="bcsn">Cerrar Sesion</button></a>
                </div>
            </article>
            <article><!--Columna derecha-->   

                <section><!--Seccion 1, 2 cajas en columna-->

                    <div class="caja"><!--Caja 1-->                            
                        <button id="btn-caja" title="Agregar" name="Agregar" onclick="mostrarcaja1()">
                            <i class="fas fa-user-plus fa-3x tm-nav-icon"></i>
                            Agregar Usuario
                        </button>   
                        <div class="overlay" id="overlay1">
                            <div class="popup">
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
                                    <label for="tipo_usuario">Tipo de usuario:</label>                                  
                                  <select class="selector" name="tipo_usuario" id="tipo_usuario" required>
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
                                  <button class="btn btn-primary tm-btn-submit close-btn" onclick="cerrarcaja1()">Cerrar</button>
                                  <button class="btn btn-primary tm-btn-submit" type="submit">Agregar</button>

                                </form>                                                                                                                                   
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>                                                                

                    <form action="consultar_eliminar.php" method="post" enctype="multipart/form-data">
                    <div class="caja"><!--Caja 2-->                                                                               
                        <button id="btn-caja" title="Eliminar" name="Eliminar" onclick="mostrarcaja2()">
                            <i class="fas fa-trash fa-3x tm-nav-icon"></i>
                            Eliminar Usuario
                        </button>                                        
                        <div class="overlay" id="overlay2">
                            <div class="popup">

                                <!-- Aquí puedes agregar el contenido de la caja -->
                                <h2 class="tm-page-title">Eliminar</h2><br>                                
                                <input class="loginin" type="text" name="CURP" placeholder="CURP" required>
                                <button class="btn2 btn-primary tm-btn-submit close-btn" onclick="cerrarcaja2()">Cerrar</span>
                                <button class="btn2 btn-primary tm-btn-submit" type="submit" title="Buscar" name="Buscar">Buscar</button>                                
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>
                    </form>
                </section><!--Termina seccion 1-->
                <section><!--Seccion 2, 2 cajas en columna-->

                <form action="consultar_editar.php" method="post" enctype="multipart/form-data"> 
                    <div class="caja"><!--Caja 3-->
                        <button id="btn-caja" title="Editar" name="Editar" onclick="mostrarcaja3()">
                            <i class="fas fa-edit fa-3x tm-nav-icon"></i>
                            Editar Usuario
                        </button>                                           
                        <div class="overlay" id="overlay3">
                            <div class="popup">

                                <!-- Aquí puedes agregar el contenido de la caja --> 
                                <h2 class="tm-page-title">Editar</h2><br>                                
                                <input class="loginin" type="text" name="CURP" placeholder="CURP" required>
                                <button class="btn2 btn-primary tm-btn-submit close-btn" onclick="cerrarcaja3()">Cerrar</span>                               
                                <button class="btn2 btn-primary tm-btn-submit" type="submit" title="Buscar" name="Buscar">Buscar</button>
                               
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>                                                                    
                </form>

                <form action="Compra.php" method="post" enctype="multipart/form-data">
                    <div class="caja"><!--Caja 4-->
                        <button id="btn-caja" title="Validar" name="Validar" onclick="mostrarcaja4()">
                            <i class="fas fa-calendar-check fa-3x tm-nav-icon"></i>
                            Validar Compra
                        </button>                                                               
                    </div>
                </form>
                </section><!--Termina seccion 2-->
                <section><!--Seccion 3, 2 cajas en columna-->

                <form action="consultar.php" method="post" enctype="multipart/form-data">  
                    <div class="caja"><!--Caja 5-->
                        <button id="btn-caja" title="Consultar" name="Consultar" onclick="mostrarcaja5()">
                            <i class="fas fa-search fa-3x tm-nav-icon"></i>
                            Consultar Usuario
                        </button>                                        
                        <div class="overlay" id="overlay5">
                            <div class="popup">

                                <!-- Aquí puedes agregar el contenido de la caja --> 
                                <h2 class="tm-page-title">Consultar</h2><br>
                                <input class="loginin" type="text" name="CURP" placeholder="CURP" required>
                                <button class="btn2 btn-primary tm-btn-submit close-btn" onclick="cerrarcaja5()">Cerrar</span>                                
                                <button class="btn2 btn-primary tm-btn-submit" type="submit" title="Buscar" name="Buscar">Buscar</button>
                                <div id="resultadoConsulta"></div>

                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>
                </form>      
                
                <div class="caja"><!--Caja 6-->
                        <button id="btn-caja" title="Validar" name="Validar" onclick="mostrarcaja6()">
                            <i class="fas fa-user-circle fa-3x tm-nav-icon"></i>
                            Agregar Dependientes
                        </button>                                        
                        <div class="overlay" id="overlay6">
                            <div class="popup">
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
                                <button class="btn2 btn-primary tm-btn-submit close-btn" onclick="cerrarcaja6()">Cerrar</span>                              
                                <form id="formulario_dependientes" action="agregardependientes.php" method="post">
                                    <!-- Los campos de dependientes se agregarán aquí mediante JavaScript -->
                                </form>
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </div>

                </section><!--Termina seccion 3-->
                <section><!--Seccion 4, 1 caja en columna-->

                <div class="caja"><!--Caja 7-->
                    <form action="resulfecha.php" method="post" enctype="multipart/form-data">                                                                            
                        <button id="btn-caja" title="Eliminar" name="Eliminar" onclick="mostrarcaja7()">
                            <i class="fas fa-server fa-3x tm-nav-icon"></i>
                            Registro de Compra
                        </button>                                        
                        <div class="overlay" id="overlay7">
                            <div class="popup">

                                <!-- Aquí puedes agregar el contenido de la caja -->  
                                <h2 class="tm-page-title">Compras</h2><br>                 
                                <label>Seleccione una fecha:</label><br>
                                <input class="loginin" type="date" name="FechaCompra" placeholder="FechaCompra" required>
                                <button class="btn2 btn-primary tm-btn-submit close-btn" onclick="cerrarcaja7()">Cerrar</span>                                
                                <button class="btn2 btn-primary tm-btn-submit" type="submit" title="buscar_fecha" name="buscar_fecha">Buscar</button>  
                                <!-- Aquí termina el contenido de la caja -->
                            </div>
                        </div>
                    </form> 
                </div>
                </section>                
            </article>
        </section>
    </div>
  <script src="js/main.js"></script>
  <script>
    function mostrarcaja7() {
		document.getElementById('overlay7').style.display = 'flex';
	}
	function cerrarcaja7() {
		document.getElementById('overlay7').style.display = 'none';
	}
	function mostrarcaja8() {
		document.getElementById('overlay8').style.display = 'flex';
	}
	function cerrarcaja8() {
		document.getElementById('overlay8').style.display = 'none';
	}
  </script>
</body>
</html>