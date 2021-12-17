<?php
    require_once("controlador/carrito.php");
    session_start();
    //echo $_SESSION['email'];
    $controladorCarrito = new ControladorCarrito();
   
?>

<!DOCTYPE html>
<html>
    <head>
        <title>LoQueTeDeLaGana</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>
        <link rel="stylesheet" type="text/css" href="./css/admin.css"/>
        <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(e){
                $(".cantidad").change(function(){
                    var cantidad = $(this).val();
                    var id = $(this).attr("id");
                    var idProducto = id.substring(1,id.length);
                    //alert("You have selected cantidad= " + cantidad + " idProducto=" + idProducto);
                    if(cantidad>0){
                        $.ajax({
                            type: "POST",
                            url: "carritoDeleteItemHandler.php",
                            data:('cantidad='+cantidad+'&idProducto='+idProducto),
                            beforeSend: function(){
                            },
                            success: function(respuesta){
                                //alert(respuesta);
                            }

                        });
                    }

                });

            });

        </script>
    </head>
    <body>
          <header>
        <div class="titulo">      
            <a href="Principal.html"><img height="90%"width="130%" src="Imagenes/LQTDLG.png"></a>
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
            <br/>
            <h3> Carrito de la compra </h3>
           
        <table>
            <tr>
                <td>        </td>
                <td> Nombre  </td>
                <td> Precio  </td>
                <td> Cantidad   </td>
                <td> Eliminar </td>
            
            </tr>
            <?php
            $subtotal = 0;
            if(isset($_SESSION['productosUsuario'])){
                $producto = $_SESSION['productosUsuario'];
                $cantidadesProductos = $_SESSION['cantidadesProductos'];
                //print_r($producto);
                $i = 0;
                while($i<count($producto)){  
                    //Iteramos el array
                    //echo $_SESSION['cantidadesProductos'][$i];
                    echo "<tr class='producto'>
                    <td><img src='". $producto[$i]['imagen'] . "'></td>
                        <td>". $producto[$i]['nombre'] . "</td>
                        <td>" . $producto[$i]['precio'] . "€  </td>
                        <td><input class='cantidad' id='s". $producto[$i]['idProducto'] . "' type='number' min='1' value='" . $cantidadesProductos[$i] . "'/></td>   
                        <td><a href='carritoDeleteItemHandler.php?id=".$producto[$i]['idProducto']."'><button class='boton1' type='submit'> <img src='./Imagenes/eliminar.png' width='10px' height='10px' /></button></a></td>
                    </tr>";
                    $subtotal+=$producto[$i]['precio'];
                    $i++;
                }
            }else{
                echo "<br>No hay nada en el carrito aun";
            }
            ?>
            </div>
        </table>
            <div class="cuadroboton">
                        Subtotal: <?php echo $subtotal ?> €
                        <br/>
                        <br/>
                        <button clas="boton"> Comprar </button>
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