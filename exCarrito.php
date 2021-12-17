<?php
	$controlador = new ControladorCarrito();
	$productos = $controlador->init();

?>

<html>
<!--
...
-->
<body>
	<tr>
		<?php
			echo "<td>" . $productos['nombre'] . "</td><td>" . $productos['descripcion'] . "</td>";
			if(isset($_POST['eliminarProducto'])){
				$controlador->eliminarProducto;
			}
		?>

	</tr>
	<button id="eliminar"></button>
</body>
<script>
	
	$("#eliminar").click(function(e){
		jQuery.ajax({
    		type: "POST",
    		url: 'carritoVista.php',
    		dataType: 'json',
    		data: {functionName: 'eliminarProducto' , id: 'id'},
    	);
	});

</script>
</html>