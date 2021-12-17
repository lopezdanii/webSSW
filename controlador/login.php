<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("./modelo/Cliente.php");
class ControladorLogin
{
	private $modelo;
 	function __construct() {
        $this->modelo = new Cliente();
	}
	
	function index() {
	/*fdihjbh kv,j.bf enm*/
		$this->view->render('login/index');
	}
	
	function login()
	{
            $email=$_POST['email'];
            $passwd=$_POST['passwd'];
            $resultado=$this->modelo->getUser($email);
            if($resultado){
                if(password_verify($passwd, $resultado['contra'])){
                	/*login correcto*/
                	session_start();
                	$_SESSION['email'] = $email;
                	/*if($email == "admin") echo 2;
                	else echo 1;*/
                	header('Location: index.php');
            	}
            }
		
	}
	/* logging out the user */
	function logout()
	{
		Session::destroy();
		header('location: index');
		exit;
	}
 
}

