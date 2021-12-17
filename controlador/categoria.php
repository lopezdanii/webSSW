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

class ControladorCategoria
{

    private $modelo;

    function __construct() {
        $this->modelo = new Producto();
	} 
    
    public function cambiaCategoria(){
        //session_start();
        $categoria=$_POST['tipoCategoria'];
        $subcategoria=$_POST['tipoSubCategoria'];
        //$productos=$this->modelo->getProductoCategoria($categoria, $subcategoria);
        echo ("categoria.php");
        //header('Location: categoria.php');
    }

    public function cargaCategoria($categoria, $subcategoria){
        $productos=$this->modelo->getProductoCategoria($categoria, $subcategoria);
        return $productos;
    }
}
?>
