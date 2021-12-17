<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>LoQueTeDeLaGana</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>
        <script type="text/javascript" src="/js/jquery.js"></script>
        <script>

            var tipoSeccion = "";

            $("#seccionMascarillas").click(function(e){
                tipoSeccion = "seccionMascarillas";

            });
            $("#seccionNovedades").click(function(e){
                tipoSeccion = "seccionNovedades";

            });
            $("#seccionSudaderas").click(function(e){
                tipoSeccion = "seccionSudaderas";

            });
            $("#seccionCamisetas").click(function(e){
                tipoSeccion = "seccionCamisetas";

            });


            $.ajax({
            type: "POST",
            url: "categoria.php",
            data :('tipoCategoria=' +tipoSeccion),
            beforeSend: function(){
              
              },
            success: function(respuesta){
              
              }
          });
        </script>
    </head>
    <body>
      <header>
        <div class="titulo">      
            <a href="index.html"><img height="90%" width="130%" src="Imagenes/LQTDLG.png"></a>
        </div> 
        <form method="POST" class="busqueda">   
            <input type="text" id="textoBusqueda" name="busquedatienda" placeholder="Camiseta, Sudadera ...">                            
            <input type="submit" id="buscar" value="Buscar">
                     
        </form>             
       </header> 
       <nav>
        <ul id="menu">
            <li>
                <a id="seccionNovedades" href="novedades.html"><b>NOVEDADES</b></a>
            </li>
            <li>
                <a id="seccionMascarillas" href="mascarillas.html"><b>MASCARILLAS</b></a>
                <ul>
                    <li><a href=""> FP2 </a> </li>
                    <li><a href=""> Quirúrgica </a></li>
                </ul>
            </li>
            <li>
                <a id="seccionCamisetas" href="categoria.html"><b>CAMISETAS</b></a>
                <ul>
                    <li><a href="">Manga Corta</a></li>
                    <li><a href="">Manga Larga</a></li>
                    <li><a href="">Térmicas</a></li>
                </ul>
            </li>
            <li>
                <a id="seccionSudaderas" href="categoria2.html"><b>SUDADERAS</b></a>
                <ul>
                    <li><a href="">Con capucha </a></li>
                    <li><a href="">Sin capucha </a></li>
                </ul>
            </li>
        
             
        </ul>
        <div class="logos">            
            <a href="consulta.html" title="Teléfono de contacto">
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
            </a>
        </div>
       </nav>
       <section class="section_principal">
       	    <div id=categoria1 class="categoria">
        <?php
            $i=0;
       		while($i<count($_SESSION['Producto'])){	
       		$j=$i+1;
            echo '
            <div class=elemento'.$j.'>
            <div camiseta'.$j.'>
                <a title ='.$_SESSION['Producto'][$i]["nombre"].' href=""><img src='.$_SESSION['Producto'][$i]["imagen"].' alt='.$_SESSION['Producto'][$i]["nombre"].' width="200" height="200"/></a>
            </div>

            <div nombre'.$j.'>
                <a href="" >'.$_SESSION['Producto'][$i]["nombre"].'</a>
            </div>

            <div precio'.$j.'>
                '.$_SESSION['Producto'][$i]["precio"].'€
            </div>
            
            
            </div>';
       		$i++;
            }

       	?>
        </div>

       </section>
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
<?php
    if(isset($_POST['busquedatienda']) /*&& isset($_POST['buscar'])*/){
        require_once("controlador/busqueda.php");
        $controlador = new ControladorBusqueda();
        $controlador->busqueda();
    }
?>