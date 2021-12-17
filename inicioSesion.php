<?php
	if(isset($_POST['email']) && isset($_POST['passwd'])){
		require_once("controlador/login.php");
		$controlador = new ControladorLogin();
		$controlador->login();
	}

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>
    </head>
    <body class="cuerpo">
        
         <a href="Principal.html"><img src="Imagenes/LQTDLG_2.png" width="276px" height="137px" padding-top="0%"></img></a>
         <br></br>
         <p id="textito"> Inicia sesión con tu cuenta!</p>
        <form method="POST" class="formulario" name="inicio-sesión">
            <p><label class="etiqueta"> Dirección de email </label></p>
            <p> <input class="entrada" type="text" name="email" pattern="[a-zA-Z0-9@.]+" required></p>
            
            <p><label class="etiqueta"> Contraseña </label></p>
            <p> <input class="entrada" type="password" name="passwd" required></p> 
            <button class="boton" type="submit" name="login" value="login">Iniciar Sesión</button>
        </form>
        <p>
            <a href="recuperarContrasena.html" name="recuperarcontraseña">¿Has olvidado tu contraseña?</a> 
            <a href="registro.php" name="registrarse"> ¿No dispone de una cuenta?</a>
        </p>
    </body>
      
</html>

