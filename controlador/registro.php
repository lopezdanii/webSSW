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

require_once("./modelo/Cliente.php");

class ControladorRegistro
{

    private $modelo;

    function __construct() {
        $this->modelo = new Cliente();
	} 
    
    public function register(){
        
        $email=$_POST['email'];
        $passwd=$_POST['passwd'];
        $contra_cifrada = password_hash($passwd, PASSWORD_BCRYPT);
        $registro=$this->modelo->getUser($email);
        
        if ($registro){
            echo "<p span style='color: red'>Error al registrar el usuario ya existe</p>";   
        }else{
                $this->modelo->anadeUsuario($email,$contra_cifrada); 
                echo "<p span style='color: green'>Se ha registrado con exito</p>";   
        }

        
    }
}
?>
