<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControladorRegistro
 *
 * @author jesus
 */

require_once("./modelo/Producto.php");

class ControladorBusqueda
{

    private $modelo;

    function __construct() {
        $this->modelo = new Producto();
	} 
    
    public function busqueda(){
        $busqueda=$_POST['busquedatienda'];//o name?
        $productos=$this->modelo->getProducto2($busqueda);
        $_SESSION['Producto']=$productos;
        header('Location: busqueda.php');
    }
}
?>
