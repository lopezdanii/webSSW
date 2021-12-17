<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>LoQueTeDeLaGana</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script>
          $(document).ready(function(){
            var tipoSeccion = "";
            var tipoSubseccion = "";
            $("#seccionMascarillas").click(function(e){
                e.preventDefault();
                tipoSeccion = "Mascarillas";
                enviar(tipoSeccion, tipoSubseccion);
            });
            $("#seccionNovedades" ).click(function(e){
                e.preventDefault();
                tipoSeccion = "Novedades";
                enviar(tipoSeccion, tipoSubseccion);
            });
            $("#seccionSudaderas").click(function(e){
                e.preventDefault();
                tipoSeccion = "Sudaderas";
                enviar(tipoSeccion, tipoSubseccion);
            });
            $("#seccionCamisetas").click(function(e){
                e.preventDefault();
                tipoSeccion = "Camisetas";
                enviar(tipoSeccion, tipoSubseccion);
            });
            $("#subseccionCamisetasCorta").click(function(e){
                e.preventDefault();
                tipoSeccion = "Camisetas";
                tipoSubseccion = "Manga Corta";
                enviar(tipoSeccion, tipoSubseccion);
            });
            $("#subseccionCamisetasLarga").click(function(e){
                e.preventDefault();
                tipoSeccion = "Camisetas";
                tipoSubseccion = "Manga Larga";
                enviar(tipoSeccion, tipoSubseccion);
            });            
            $("#subseccionCamisetasTermica").click(function(e){
                e.preventDefault();
                tipoSeccion = "Camisetas";
                tipoSubseccion = "Térmicas";
                enviar(tipoSeccion, tipoSubseccion);
            });            
            $("#subseccionMascarillasFP2").click(function(e){
                e.preventDefault();
                tipoSeccion = "Mascarillas";
                tipoSubseccion = "FP2";
                enviar(tipoSeccion, tipoSubseccion);
            });            
            $("#subseccionMascarillasQuirurgica").click(function(e){
                e.preventDefault();
                tipoSeccion = "Mascarillas";
                tipoSubseccion = "Quirúrgica";
                enviar(tipoSeccion, tipoSubseccion);
            });            
            $("#subseccionSudaderasCapucha").click(function(e){
                e.preventDefault();
                tipoSeccion = "Sudaderas";
                tipoSubseccion = "Con Capucha";
                enviar(tipoSeccion, tipoSubseccion);
            });            
            $("#subseccionSudaderasSinCapucha").click(function(e){
                e.preventDefault();
                tipoSeccion = "Sudaderas";
                tipoSubseccion = "Sin Capucha";
                enviar(tipoSeccion, tipoSubseccion);
            });

            function enviar(seccion, subseccion){                                      
                $.ajax({
                    type: "GET",
                    url: "categoria.php",
                    data:('tipoCategoria='+seccion+'&tipoSubCategoria='+subseccion),
                    beforeSend: function(){
                    },
                    success: function(respuesta){
                        //alert(respuesta);
                    location.href='categoria.php?tipoCategoria='+seccion+'&tipoSubCategoria='+subseccion;
                        
                    }
                });
            }

           });
            
    
        </script>
    </head>
    <body>
      <header>
        <div class="titulo">      
            <a href="index.html"><img height="90%" width="130%" src="Imagenes/LQTDLG.png"></a>
        </div> 
        <form method="post" class="busqueda">   
            <input type="search" id="textoBusqueda" name="busquedatienda" placeholder="Camiseta, Sudadera ...">                            

            <input type="submit" id="buscar" value="Buscar">
                     
        </form>             
       </header> 
       <nav>
         <ul id="menu">
            <li>
                <a id="seccionNovedades" href=""><b>NOVEDADES</b></a>
            </li>
            <li>
                <a id="seccionMascarillas" href=""><b>MASCARILLAS</b></a>
                <ul>
                    <li><a id="subseccionMascarillasFP2" href=""> FP2 </a> </li>
                    <li><a id="subseccionMascarillasQuirurgica" href=""> Quirúrgica </a></li>
                </ul>
            </li>
            <li>
                <a id="seccionCamisetas" href=""><b>CAMISETAS</b></a>
                <ul>
                    <li><a id="subseccionCamisetasCorta" href="">Manga Corta</a></li>
                    <li><a id="subseccionCamisetasLarga" href="">Manga Larga</a></li>
                    <li><a id="subseccionCamisetasTermica" href="">Térmicas</a></li>
                </ul>
            </li>
            <li>
                <a id="seccionSudaderas" href=""><b>SUDADERAS</b></a>
                <ul>
                    <li><a id="subseccionSudaderasCapucha" href="">Con capucha </a></li>
                    <li><a id="subseccionSudaderasSinCapucha" href="">Sin capucha </a></li>
                </ul>
            </li>
        
             
        </ul>
        <div class="logos">  
        <?php
        if(isset($_SESSION['email'])){
            if($_SESSION['email']=='admin'){
            echo '<a href="consulta.html" title="Teléfono de contacto">
                <img src="Imagenes/telefono.png" alt="Telefono Contacto" witdh="50" heigth="50"/>
            </a>
            <a href="inicioSesion.php"_title="Inicio de sesión">
                <img src="Imagenes/login.png" alt="Inicio de Sesion" witdh="50" height="50"/>
            </a>
            <a href="carrito.html" title="Carrito de la compra">
                <img src="Imagenes/carrito.png" alt="Carrito de la compra" witdh="10" heigth="10"/>  
            </a>
            <a href="panelAdmin.html" title="Panel de administración">
                <img src="Imagenes/administracion.png" alt="Panel de administración" witdh="10" heigth="10"/>  
            </a>
            <a href="pedido.html" title="Pedido">
                <img src="Imagenes/pedido.png" alt="Pedido" witdh="10" heigth="10"/>  
            </a>';
            }else{
                echo '
                <a href="cerrar_sesion.php" title="Cerrar sesión">
                    <img src="Imagenes/telefono.png" alt="Telefono Contacto" witdh="50" heigth="50"/>';
                    
                    echo '
                </a>
                <a href="consulta.html" title="Teléfono de contacto">
                    <img src="Imagenes/telefono.png" alt="Telefono Contacto" witdh="50" heigth="50"/>
                </a>
                <a href="carrito.html" title="Carrito de la compra">
                    <img src="Imagenes/carrito.png" alt="Carrito de la compra" witdh="10" heigth="10"/>  
                </a>
                <a href="pedido.html" title="Pedido">
                    <img src="Imagenes/pedido.png" alt="Pedido" witdh="10" heigth="10"/>  
                </a>';
            }

        }else{
            echo '<a href="consulta.html" title="Teléfono de contacto">
                <img src="Imagenes/telefono.png" alt="Telefono Contacto" witdh="50" heigth="50"/>
            </a>
            <a href="inicioSesion.php"_title="Inicio de sesión">
                <img src="Imagenes/login.png" alt="Inicio de Sesion" witdh="50" height="50"/>
            </a>';
        }
        ?>
        </div>
       </nav>
       <section class="section_principal"><center><img src="Imagenes/Principal.jpg" height="100%" width="100%"></img></center></section>
       <footer>
        <nav>
            <div class="abajo">
                <div class="logosabajo">
                    <div class="logosabajoizqu">
                     <a title="Acerca de" href="acercade.html">
                        <img src="Imagenes/acercade.png" alt="Acerca de" witdh="50" heigth="50">
                     </a>
                     &nbsp;
                     <a href="privacidad.html">Privacidad</a>
                    </div>
                    <a title="Facebook" href="https://es-es.facebook.com/" target="_blank">
                        <img src="Imagenes/facebook.png" alt="Facebook" witdh="50" heigth="50"/>
                        
                    </a>
                    <a title="Twitter" href="https://twitter.com/" target="_blank">
                        <img src="Imagenes/twitter.png" alt="Twitter" witdh="50" height="50"/>
                    </a>
                    <a title="Instagram" href="https://instagram.com" target="_blank">
                        <img src="Imagenes/instagram.png" alt="Instagram" witdh="10" heigth="10"/>  
                    </a>
                </div>
              <h1><marquee>Teléfono: 815 13 41 14 &nbsp; &nbsp; C/España, 11, 1º Izquierda</marquee></h1>
            </div>
        </nav>
       </footer>
    </body>
</html>


