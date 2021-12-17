<?php
            require_once("controlador/categoria.php");
            $controlador_categoria = new ControladorCategoria();
            if(isset($_GET['tipoCategoria'])){
                $categoria=$_GET['tipoCategoria'];
            }
            if(isset($_GET['tipoSubCategoria'])){
                $subcategoria=$_GET['tipoSubCategoria'];
            }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Categorias</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>
    </head>
    <body>
      <header>
        <div class="titulo">      
            <a href="Principal.html"><img height="90%" width="130%" src="Imagenes/LQTDLG.png"></a>
        </div> 
        <form method="post" class="busqueda">   
            <input type="search" id="textoBusqueda" name="busquedatienda" placeholder="Camiseta, Sudadera ...">                            
            <input type="submit" id="buscar" value="Buscar">
                     
        </form>             
       </header> 
       <nav>
        <ul id="menu">
            <li>
                <a href="novedades.html"><b>NOVEDADES</b></a>
            </li>
            <li>
                <a href="mascarillas.html"><b>MASCARILLAS</b></a>
                <ul>
                    <li><a href=""> FP2 </a> </li>
                    <li><a href=""> Quirúrgica </a></li>
                </ul>
            </li>
            <li>
                <a href="categoria.html"><b>CAMISETAS</b></a>
                <ul>
                    <li><a href="">Manga Corta</a></li>
                    <li><a href="">Manga Larga</a></li>
                    <li><a href="">Térmicas</a></li>
                </ul>
            </li>
            <li>
                <a href="categoria2.html"><b>SUDADERAS</b></a>
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
            <a href="inicioSesion.html"_title="Inicio de sesión">
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
	<section>


	<div id=categoria1 class="categoria">
		   <?php
            if(isset($categoria) && isset($subcategoria)){
            $productosCategoria = $controlador_categoria->cargaCategoria($categoria, $subcategoria);
            if(isset($productosCategoria)){
            $i=0;
       		while($i<count($productosCategoria)){	
           		$j=$i+1;
                echo "
                <div class='elemento".$j."'>
                <div camiseta".$j.">
                    <a title ='".$productosCategoria[$i]['nombre']."' href=''><img src='".$productosCategoria[$i]['imagen']. "' alt='".$productosCategoria[$i]['nombre']."' width='200' height='200'/></a>
                </div>

                <div nombre".$j.">
                    <a href='' >".$productosCategoria[$i]['nombre']. "</a>
                </div>

                <div precio".$j.">
                    ".$productosCategoria[$i]['precio']."€
                </div>
                
                
                </div>";
           		$i++;
            }

          }
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
