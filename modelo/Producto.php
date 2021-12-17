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

class Producto{

    private $idProducto;
    private $categoria;
    private $subcategoria;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;
    private $tallaseleccionada;
    private $colorTextura;
    protected $db;

 public function __construct(){
     require("conexion.php");
     //$this->db= new PDO('msql:host=$servidor;dbname=$dbname',$usuario,$passwd);
     $this->db = new PDO("mysql:host=$servidor; dbname=$dbname", "$usuario", "$passwd");
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }



public function getColores($idProducto){
    $sqlc = "SELECT aspecto FROM tieneII WHERE idProducto= :idProducto";
    $consulta=$this->db->prepare($sqlc);
    $consulta->execute(array(":idProducto"=>$idProducto));
    $registro=$consulta->fetch(PDO::FETCH_ASSOC);
    return $registro;


}
public function getTallas($idProducto){
    $sqlc = "SELECT letra FROM tiene WHERE idProducto= :idProducto";
    $consulta=$this->db->prepare($sqlc);
    $consulta->execute(array(":idProducto"=>$idProducto));
    $registro=$consulta->fetch(PDO::FETCH_ASSOC);
    return $registro;



}
public function getProducto($idProducto){
    $sqlc = "SELECT * FROM Producto WHERE idProducto= :idProducto";
    $consulta=$this->db->prepare($sqlc);
    $consulta->execute(array(":idProducto"=>$idProducto));
    $registro=$consulta->fetch(PDO::FETCH_ASSOC);
    return $registro;



}

public function getProducto2($nombre){
    $consulta=$this->db->prepare("SELECT * FROM producto WHERE nombre LIKE '%$nombre%'");
    $consulta->execute();
    $registro=$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $registro;
}
public function getProductoCategoria($categoria, $subcategoria){
    if($subcategoria!=""){
        $consulta=$this->db->prepare("SELECT * FROM producto WHERE categoria='$categoria' AND subcategoria='$subcategoria'");
    }else{
        $consulta=$this->db->prepare("SELECT * FROM producto WHERE categoria='$categoria'");
    }
    $consulta->execute();
    $registro=$consulta->fetchAll(PDO::FETCH_ASSOC);
    return $registro;
}

/*
public function getProducto3($categoria){
    $sqlc = "SELECT * FROM Producto WHERE idProducto= :idProducto";
    $consulta=$this->db->prepare($sqlc);
    $consulta->execute(array(":idProducto"=>$idProducto));
    $registro=$consulta->fetch(PDO::FETCH_ASSOC);
    return $registro;
}
*/

}
?>