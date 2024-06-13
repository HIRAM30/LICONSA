<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" sizes="32x32" href="https://iconape.com/wp-content/files/km/254233/png/254233.png"/>
    <title>BENEFICIARIO</title>

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
                    <p>BIENVENIDO BENEFICIARIO</p>
                    <a href="LOGIN.php"><button id="bcsn">Cerrar Sesion</button></a>
                </div>
            </article>
            <article><!--Columna derecha-->
                <div class="content">
                    <div class="grid">
                        <section><!--Seccion 1, 1 caja en columna-->

                        <form action="Tarjeta.php" method="post" enctype="multipart/form-data">                                                              
                        <div class="caja"><!--Caja 1-->                            
                                <button id="btn-caja" title="Agregar" name="Agregar" onclick="mostrarcaja1()">
                                    <i class="fas fa-id-badge fa-3x tm-nav-icon"></i>
                                    Tarjeta
                                </button>   
                                
                                </div> 
                                </form>                             
                                                                                               
                            </section><!--Termina seccion 1-->
                            <section><!--Seccion 2, 2 cajas en columna-->

                                <div class="caja"><!--Caja 3-->
                                    <form action="consultar_bene.php" method="post" enctype="multipart/form-data">  
                                        <div class="caja"><!--Caja 5-->
                                            <button id="btn-caja" title="Consultar" name="Consultar" onclick="mostrarcaja5()">
                                            <i class="fas fa-id-card fa-3x tm-nav-icon"></i>
                                            Mis Datos
                                            </button>                                        
                                            <div class="overlay" id="overlay5">
                                                <div class="popup">
                                                    <span class="close-btn" onclick="cerrarcaja5()">CERRAR</span>
                                                    <!-- Aquí puedes agregar el contenido de la caja --> 
                                                    <h2 class="tm-page-title">Consultar</h2><br>
                                                    <input class="loginin" type="text" name="CURP" placeholder="CURP" required>
                                                    <button class="btn btn-primary tm-btn-submit" type="submit" title="Buscar" name="Buscar">Buscar</button>
                                                    <!-- Aquí termina el contenido de la caja -->
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                                                    

                            </section><!--Termina seccion 2-->
                </div>
            </div>
        </article>
    </section>
</div>
        <script src="js/main.js"></script>
    </body>
</html>