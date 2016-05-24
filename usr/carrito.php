<?php
//print_r($_POST);
$title = "Little Ulises Pizza&trade; - Tu carrito de compras";
$css = "./css/carrito.css";
session_start();
if(isset($_SESSION['email'])) {?>

<!DOCTYPE html>
<html lang="en">

	<?php require_once("header.php"); ?>

		<main class="content">
			<div class="container">
				<!-- Tabla de pedidos actuales -->
				<h3>Tu carrito de compras</h3>
				<table class="tabla-pedido">
					<thead>
						<tr>
							<th>Descripcion</th>
							<th>Cantidad</th>
							<th>Precio individual</th>
							<th>Precio total</th>
							
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Pizza mexicana grande
							<br> masa orilla de queso</td>
							<td>
							<input type="number" name="cantidad"><br>
							<input type="reset" value="Remover"/>	
							</td>
							<td>
								$199
							</td>
							<td>$199</td>
							
						</tr>
						<tr>
							<td>Refresco 2 litros</td>
							<td>
							<input type="number" name="cantidad"><br>
							<input type="reset" value="Remover"/>
							</td>
							<td>
								$24
							</td>
							<td>$68</td>
							
						</tr>
						<tr>
							<td>Paquete</td>
							<td>
							<input type="number" name="cantidad"><br>
							<input type="reset" value="Remover"/>
							</td>
							<td> $239</td>
							<td> $239</td>
							
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td>Total</td>
							<td> $496 </td>
						</tr>

											
					</tbody>
				</table>

			</div>
			<br>
			<br>
				

			<button name="Check out">Agregar Otra Pizza</button>


			<a class="btn" href="./checkout.php">Check Out</a>
		</main>
	</body>
</html>

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>