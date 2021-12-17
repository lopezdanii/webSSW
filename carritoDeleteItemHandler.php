 <?php
 session_start();
 require_once("controlador/carrito.php");
 $controladorCarrito = new ControladorCarrito();
 if(isset($_GET['id'])&&isset($_SESSION['email'])){
            
        $controladorCarrito->procesaEliminaProducto($_SESSION['email'],$_GET['id']);
 }
 if(isset($_POST['idProducto']) && isset($_POST['cantidad']) && isset($_SESSION['email'])){
 		$controladorCarrito->procesaCambiaCantidad($_SESSION['email'], $_POST['idProducto'], $_POST['cantidad']);
 }
 ?>

 <script type="text/javascript">
 	
 	location.href="carrito.php";

 </script>