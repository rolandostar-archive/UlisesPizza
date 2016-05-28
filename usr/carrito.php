<?php

require_once('carrito.class.php');
require_once('db.class.php');

$title = "Little Ulises Pizza&trade; - Tu carrito de compras";
$css = "./css/carrito.css";

session_start();
if(isset($_SESSION['email'])) {
	$c = unserialize($_SESSION['carrito']); //mapeamos carrito a $c
	//$c->display(); //Debug
	?>

<!DOCTYPE html>
<html lang="en">
	<?php require_once("header.php"); ?>
		<div class="header">
			<div class=container>
				<h1 class=header-heading>Tu Carrito de Compras</h1>
			</div>
		</div>
		<main class="content">
			<div class="container">
				<!-- Tabla de pedidos actuales -->
				<?php $c->showCart(); ?>
			</div>
			<br>
			<br>
			<a class="btn" href="./pedido.php">Agregar Pizza</a>
			<a class="btn" href="./checkout.php">Check Out</a>
		</main>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script>
		var lock = false;
		var element = document.getElementsByClassName("edit-btn");
		for(var i=0;i<element.length;i++){
			element[i].addEventListener("click", function(){ // Click en Editar
				//alert('clicked');
				if (!lock){
					this.style.visibility = "hidden";
					this.previousSibling.disabled = false;
					this.nextSibling.style.visibility = "visible";
					this.nextSibling.nextSibling.style.visibility = "visible";
					lock = true;
				}else{
					
				}
			}, false);   
		}
		var element = document.getElementsByClassName("accept-btn");
		for(var i=0;i<element.length;i++){
			element[i].addEventListener("click", function(){ // Click en Aceptar
				//alert('clicked');
				this.previousSibling.previousSibling.form.submit();
			}, false);   
		}
				var element = document.getElementsByClassName("cancel-btn");
		for(var i=0;i<element.length;i++){
			element[i].addEventListener("click", function(){ // Click en Cancelar
				//alert('clicked');
				this.style.visibility = "hidden";
				this.previousSibling.style.visibility = "hidden";
				this.previousSibling.previousSibling.style.visibility = "visible";
				this.previousSibling.previousSibling.previousSibling.disabled = true;
				lock = false;
			}, false);   
		}

	</script>
</html>

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>