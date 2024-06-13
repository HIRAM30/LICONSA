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
                            <section><!--Seccion 3, 1 caja en columna-->

                                <div class="caja"><!--Caja 4-->
                                    <button id="btn-caja" title="Validar" name="Validar" onclick="mostrarcaja4()">
                                        <i class="fas fa-handshake fa-3x tm-nav-icon"></i>
                                        Mas Información
                                    </button>                                        
                                <div class="overlay" id="overlay4">
                                    <div class="popup">
                                        <span class="close-btn" onclick="cerrarcaja4()">CERRAR</span>
                                        <!-- Aquí puedes agregar el contenido de la caja -->                                                                                 
                                                <section class="article-container">
                                                    <article class="article" id="productos">

                                                        <details>
                                                            <summary>
                                                                <h2>¿Qué es la leche Liconsa?</h2>
                                                            </summary>
                                                            <p>La leche Liconsa es un programa emblemático del Gobierno
                                                                Federal de México que tiene como objetivo
                                                                principal contribuir a mejorar la nutrición y la salud
                                                                de la población más vulnerable del país. Esta
                                                                iniciativa busca garantizar el acceso a productos
                                                                lácteos de alta calidad a precios accesibles,
                                                                especialmente para familias de bajos recursos
                                                                económicos, mujeres embarazadas, niños y personas de la
                                                                tercera edad.
                                                                Liconsa opera a través de una red de lecherías y puntos
                                                                de distribución estratégicamente ubicados en
                                                                comunidades de todo México. La leche que se ofrece bajo
                                                                la marca Liconsa es sometida a rigurosos
                                                                estándares de calidad y seguridad alimentaria,
                                                                asegurando que cumpla con los más altos estándares de
                                                                higiene y frescura.</p>
                                                            </summary>
                                                            <p>Además de proporcionar leche líquida, Liconsa también
                                                                produce otros productos lácteos, como leche en
                                                                polvo y derivados lácteos, que son distribuidos a través
                                                                de su red de puntos de venta.
                                                                Una característica importante de la leche Liconsa es que
                                                                suele estar fortificada con nutrientes
                                                                esenciales, como vitaminas A y D, calcio y hierro, para
                                                                garantizar una nutrición óptima, especialmente
                                                                en poblaciones que pueden tener deficiencias de estos
                                                                nutrientes. Esta fortificación ayuda a prevenir
                                                                enfermedades relacionadas con la malnutrición y promueve
                                                                un desarrollo saludable, especialmente en niños
                                                                en edad de crecimiento y en mujeres embarazadas o en
                                                                período de lactancia.</p>
                                                        </details>
                                                        <img src="img/leche 1.jpg" alt="" width="750" height="400">
                                                    </article>
                                                    </section>
                                                    <section>
                                                    <article class="article" id="historia">

                                                        <details>
                                                            <summary>
                                                                <h2>Historia</h2>
                                                            </summary>
                                                            <p>Liconsa es una empresa mexicana fundada en 1977 como
                                                                parte de la Corporación Nacional de Subsistencias
                                                                Populares (Conasupo). Su objetivo principal ha sido
                                                                garantizar el acceso a la leche y productos lácteos
                                                                a precios accesibles para sectores vulnerables de la
                                                                población, como familias de bajos recursos, mujeres
                                                                embarazadas, niños y personas mayores.</p>
                                                            <p>A lo largo de los años, Liconsa ha ampliado su alcance,
                                                                estableciendo una extensa red de lecherías y
                                                                puntos de distribución en todo México. Además de
                                                                proporcionar leche fortificada y otros productos
                                                                lácteos, la empresa se ha centrado en mejorar la
                                                                nutrición de la población mediante la fortificación de
                                                                sus productos con nutrientes esenciales.</p>
                                                            </summary>
                                                            <p>Liconsa ha participado en varios programas sociales del
                                                                gobierno mexicano, incluidos el Programa de
                                                                Abasto Rural y el Programa de Abasto Social de Leche,
                                                                con el objetivo de mejorar la calidad de vida de
                                                                las comunidades más vulnerables.</p>
                                                            <p>A lo largo de los años, Liconsa ha demostrado su
                                                                compromiso continuo con el bienestar de los sectores más
                                                                necesitados de la sociedad mexicana, adaptándose a las
                                                                necesidades cambiantes de la población y
                                                                promoviendo la nutrición y la salud en todo el país.</p>
                                                        </details>
                                                        <img src="img/2.jpg" alt="" width="750" height="400">
                                                    </article>
                                                    </section>
                                                    <section>
                                                    <article class="article" id="beneficios">

                                                        <details>
                                                            <summary>
                                                                <h2>Beneficios de la leche Liconsa</h2>
                                                            </summary>
                                                            <p>La leche Liconsa ofrece una serie de beneficios
                                                                importantes para la salud y el bienestar de la
                                                                población.
                                                                Algunos de estos beneficios incluyen:</p>
                                                            <ul>
                                                                <h3>
                                                                    <li>
                                                                        <p>Alta calidad:</p>
                                                                    </li>
                                                                </h3>
                                                                <p>La leche Liconsa pasa por rigurosos controles de
                                                                    calidad y seguridad alimentaria, lo que garantiza un
                                                                    producto seguro para el consumo humano.</p>
                                                                <h3>
                                                                    <li>
                                                                        <p>Enriquecida con nutrientes esenciales:</p>
                                                                    </li>
                                                                </h3>
                                                                <p>Liconsa suele fortificar sus productos lácteos con
                                                                    nutrientes esenciales, como vitaminas A y D,
                                                                    calcio y hierro, que son importantes para el
                                                                    crecimiento y desarrollo adecuado, especialmente en
                                                                    niños y mujeres embarazadas.</p>
                                                                <h3>
                                                                    <li>
                                                                        <p>Precios accesibles:</p>
                                                                    </li>
                                                                </h3>
                                                                <p>Liconsa ofrece sus productos a precios accesibles, lo
                                                                    que permite que personas de bajos recursos
                                                                    económicos y comunidades vulnerables puedan acceder
                                                                    a alimentos nutritivos.</p>
                                                                <h3>
                                                                    <li>
                                                                        <p>A comunidades vulnerables:</p>
                                                                    </li>
                                                                </h3>
                                                                <p>La misión principal de Liconsa es garantizar el
                                                                    acceso a la leche y productos lácteos a sectores de
                                                                    la población en situación de vulnerabilidad, como
                                                                    familias de bajos recursos, mujeres embarazadas,
                                                                    niños y personas de la tercera edad, lo que
                                                                    contribuye a mejorar su calidad de vida.</p>
                                                            </ul>
                                                        </details>
                                                        <img src="img/leche.jpg" alt="" width="750" height="400">
                                                    </article>
                                                </section>                                          
                                        <!-- Aquí termina el contenido de la caja -->
                                                </div>
                                            </div>
                                        </div>
                            </section><!--Termina seccion 3-->
                </div>
            </div>
        </article>
    </section>
</div>
        <script src="js/main.js"></script>
    </body>
</html>