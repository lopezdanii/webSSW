<?php
require_once("controlador/categoria.php");
require_once("controlador/busqueda.php");
$controlador_categoria = new ControladorCategoria();
$controlador_busqueda = new ControladorBusqueda();

if(isset($_POST['busquedatienda']) /*&& isset($_POST['buscar'])*/){
    $controlador_busqueda->busqueda();
}
if(isset($_POST['tipoCategoria']) || isset($_POST['tipoSubCategoria'])){
    $controlador_categoria->cambiaCategoria();   
}
?>