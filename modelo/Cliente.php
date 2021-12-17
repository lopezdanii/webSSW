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

class Cliente{

    private $email;
    private $nif;
    private $contraseña;
    private $direccionFisica;
    private $telefonoContacto;
    private $nombre;
    private $apellidos;
    protected $db;
    
 public function __construct(){
     require("conexion.php");
     //$this->db= new PDO('msql:host=$servidor;dbname=$dbname',$usuario,$passwd);
     $this->db = new PDO("mysql:host=$servidor; dbname=$dbname", "$usuario", "$passwd");
     $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }
 public function anadeUsuario($email,$passwd){
     
     $sql= "INSERT INTO cliente (nif, nombre, apellidos, contra, email, direccion_fisica, telefono_contacto) VALUES ( 'Sin nombre', 'S/N', 'S/N', '$passwd', '$email', 'S/N', 'S/N')";
     $result=$this->db->query($sql); 
     if($result){
         return true;
     }else{
         return false;
     }
 }

 public function getUser($email) {
    $sqlc = "SELECT * FROM cliente WHERE email= :login";
    $consulta=$this->db->prepare($sqlc);    
    $consulta->execute(array(":login"=>$email));
    $registro=$consulta->fetch(PDO::FETCH_ASSOC);
    return $registro;
 }

 public function getNif() {
     return $this->nif;
 }

 public function getContraseña() {
     return $this->contraseña;
 }

 public function getDireccionFisica() {
     return $this->direccionFisica;
 }

 public function getTelefonoContacto() {
     return $this->telefonoContacto;
 }

 public function getNombre() {
     return $this->nombre;
 }

 public function getApellidos() {
     return $this->apellidos;
 }

 public function setEmail($email): void {
     $this->email = $email;
 }

 public function setNif($nif): void {
     $this->nif = $nif;
 }

 public function setContraseña($contraseña): void {
     $this->contraseña = $contraseña;
 }

 public function setDireccionFisica($direccionFisica): void {
     $this->direccionFisica = $direccionFisica;
 }

 function setTelefonoContacto($telefonoContacto): void {
     $this->telefonoContacto = $telefonoContacto;
 }

 function setNombre($nombre): void {
     $this->nombre = $nombre;
 }

 function setApellidos($apellidos): void {
     $this->apellidos = $apellidos;
 }


    
}
?>
