<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Registro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/main.css"/>


    </head>
    <body class="cuerpo">
	    <a href="Principal.html"><img src="Imagenes/LQTDLG_2.png" width="276px" height="137px" padding-top="0%"></img></a>
         <br></br>
	<p id="textito"> Introduce los datos para crear una cuenta</p>

    <form method="post" action="registro.php" class="formulario">


		<p><label class="etiqueta">Email</label></p>
		<input class="entrada" name="email" type="text" required></p>
	
		<p><label class="etiqueta"> Contraseña</label></p>
		<p><input class="entrada" name="passwd" type="text" pattern="[a-zA-Z0-9]+" required></p>
		</p>
		<p><label class="etiqueta"> Repetir contraseña</p>
		<p><input class="entrada" name="repeatPasswd" type="text" pattern="[a-zA-Z0-9]+" required></p>

		<p>
			<button class="boton" type="submit" name= "registrarse" value="registrarse" > Registrarse </button>
		</p>
	</form>
    <p>
        Al registrarte, aceptas nuestra <a href="privacidad.html">política de Privacidad.</a>
    </p>
    </body>
</html>
<?php
	if(isset($_POST['email']) && isset($_POST['passwd'])){
		require_once("controlador/registro.php");
		$controlador = new ControladorRegistro();
		$controlador->register();
	}

?>