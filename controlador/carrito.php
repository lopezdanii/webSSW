<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
?>
 * Description of ControladorRegistro
 *
 * @author jesus
 */

require_once("./modelo/Carrito.php");

class ControladorCarrito
{

    private $modeloCarrito;

    function __construct() {
        $this->modeloCarrito = new Carrito();
        
        if(isset($_SESSION['email'])){
            $email = $_SESSION['email'];
            $productosUsuario = $this->modeloCarrito->getProductosUsuario($email);
            $_SESSION['productosUsuario'] = $productosUsuario;
            $cantidadesProductos = array();
            foreach ($productosUsuario as $item) {
                $idProducto = $item['idProducto'];
                array_push($cantidadesProductos, $this->modeloCarrito->getCantidadProductoUsuario($email,$idProducto));
            }
                
            $_SESSION['cantidadesProductos'] = $cantidadesProductos;
        }
    } 
    
    public function procesaEliminaProducto($email,$idProducto){
            $this->modeloCarrito->eliminaProducto($email,$idProducto);
            //header('Location : carrito.php');        
    }
    public function procesaCambiaCantidad($email,$idProducto,$cantidad){
            $this->modeloCarrito->actualizaCantidad($email,$idProducto,$cantidad);
    }
}
?>