<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author jesus
 */
require_once("Producto.php");
require_once("Cliente.php");
class Carrito{

    private $modeloProducto;
    protected $db;
    
 public function __construct(){
     require("conexion.php");
     //$this->db= new PDO('msql:host=$servidor;dbname=$dbname',$usuario,$passwd);
     $this->db = new PDO("mysql:host=$servidor; dbname=$dbname", "$usuario", "$passwd");
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $this->modeloProducto=new Producto();
 }
 public function getProductosUsuario($email){
    $productos=array();
    $sqlc = "SELECT idProducto FROM carrito WHERE emailCliente='" . $email . "'";
    foreach ($this->db->query($sqlc) as $item) {
        $idProducto = $item['idProducto'];
        array_push($productos, $this->modeloProducto->getProducto($idProducto));
    }
    return $productos;

 }

 public function anadeProducto($email,$idProducto,$cantidad){
     $sql= "INSERT INTO carrito (emailCliente, idProducto, cantidad) VALUES ('$email','$idProducto','$cantidad')";
     $result=$this->db->query($sql);
     return $result;
 }

 public function eliminaProducto($email,$idProducto){

     $sql= "DELETE FROM carrito WHERE emailCliente= :email AND idProducto= :idProducto";
     $consulta=$this->db->prepare($sql);    
     $resultado=$consulta->execute(array(":email"=>$email,":idProducto"=>$idProducto));
     return $resultado;

 }
 public function actualizaCantidad($email,$idProducto,$cantidad){
     $sql= "UPDATE carrito SET cantidad='$cantidad' WHERE emailCliente= :email AND idProducto= :idProducto";
     $consulta=$this->db->prepare($sql);    
     $resultado=$consulta->execute(array(":email"=>$email,":idProducto"=>$idProducto));
     return $resultado;
 }

 public function getCantidadProductoUsuario($email,$idProducto){
    $sqlc = "SELECT cantidad FROM Carrito WHERE emailCliente= :email AND idProducto= :idProducto";
    $consulta=$this->db->prepare($sqlc);    
    $consulta->execute(array(":email"=>$email, ":idProducto"=>$idProducto));
    $registro=$consulta->fetch(PDO::FETCH_ASSOC);
    $cantidad = $registro['cantidad'];
    return $cantidad;
 }

}
 ?>