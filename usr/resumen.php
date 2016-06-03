<?php
session_start();
$title = "Little Ulises Pizza&trade; - Resumen";
$css = "./css/resumen.css";
if(isset($_SESSION['email'])) {
	require_once('db.class.php');
	$db = new database();
	?>
	<!DOCTYPE html>
	<html lang="en">

	<?php require_once("header.php"); ?>
	<div class="header">
		<h1 class=header-heading>Tu resumen</h1>
	</div>
	<main class="content">
		<div>
			<!-- Tabla de pedidos actuales -->
			<h3>Pedidos Actuales</h3>


<?php

$db -> query('SELECT * from pedidos,usuarios WHERE pedidos.id_usuario=usuarios.id_user AND usuarios.correo = :correo and estado<3');
$db -> bind(':correo', $_SESSION['email']);
$result = $db->resultset();
if (!empty($result)) {
     // list is empty.

?>

			<table class="tabla-pedido">
				<tr>
					<th>Codigo</th>
					<th>Hora</th>
					<th>Fecha</th>
					<th>Precio</th>
					<th>Direccion</th>
					<th>Descripcion</th>
					<th>Hora Estimada</th>
					<th>Estado</th>
					<th>Accion</th>
				</tr>

				<?php
				foreach ($result as $index => $row) {
					$phpdate = strtotime( $row['tiempoPedido'] );
					$endtime = strtotime('+ 30 minutes', $phpdate );
					echo "<tr>";
					echo "<td>".$row['codigo']."</td>";
					echo "<td>".date('g:i A',$phpdate)."</td>";
					echo "<td>".date('d/m/Y',$phpdate )."</td>";
					echo "<td>".$row['precio']."</td>";
					echo "<td>".$row['direccion']."</td>";
					echo "<td>".$row['descripcion']."</td>";
					echo "<td>".date('g:i A',$endtime )."</td>";
					switch ($row['estado']) {
						case '0': echo "<td> Pendiente </td>"; break;
						case '1': echo "<td> Cocinando </td>"; break;
						case '2': echo "<td> En Camino </td>"; break;
					}
					echo "<td><button onclick=\"cancel(".$row['codigo'].")\"";
					if($row['estado']>0) echo "disabled";
					echo ">Cancelar</button></td>";
					echo "</tr>";
				}
				?>
			</table>
		</div>
<?php
}else{
	echo "No tienes pedidos activos. Agrega uno!";
}
?>
		<div class="tabla-precios">

			<?php

			$db -> query('SELECT * from paquetes');
			$result = $db->resultset();
			foreach ($result as $index => $row) {
				echo '<column>
				<div class="paquete">
					<div class="paq-head" style="background: '.$row['color'].';">
						<h2>Paquete '.$row['id_paquete'].'</h2>
						<span class="precio">
							$'.$row['precio'].' <span>'.$row['slogan'].'</span>
						</span>
					</div>
					<ul class="lista-productos">';
						if($row['pizza_grande']>0){
							echo '<li>'.$row['pizza_grande'].' Pizza';
							if($row['pizza_grande']>1) echo 's';
							echo ' Grande';
							if($row['pizza_grande']>1) echo 's';
							echo '</li>';
						}
						if($row['pizza_mediana']>0){
							echo '<li>'.$row['pizza_mediana'].' Pizza';
							if($row['pizza_mediana']>1) echo 's';
							echo ' Mediana';
							if($row['pizza_mediana']>1) echo 's';
							echo '</li>';
						}
						if($row['pizza_chica']>0){
							echo '<li>'.$row['pizza_chica'].' Pizza';
							if($row['pizza_chica']>1) echo 's';
							echo ' Chica';
							if($row['pizza_chica']>1) echo 's';
							echo '</li>';
						}
						if($row['refrescos']>0){
							echo '<li>'.$row['refrescos'].' Refresco';
							if($row['refrescos']>1) echo 's';
							echo '</li>';
						}
						echo '</ul>
						<a class="btn-pedir" href="#" role="button">Pedir</a>
					</div>
				</column>';
			}
			?><column>
			<div class="paquete">
				<div class="paq-head" style="background: #E38F27;">
					<h2>Personalizada</h2>
					<span class="precio">
					Armala! <span>Como tu quieras</span>
					</span>
				</div>
				<ul class="lista-productos">
					<li>Masa y Tamaño a escojer</li>
					<li>Los ingredientes que tu quieras</li>
				</ul>
				<a class="btn-pedir" href="./pedido.php" role="button">Personalizar</a>
			</div>
		</column>
	</div>

	<!-- Tabla de historial -->
	<div>
		<h3>Historial</h3>
<?php 
$db -> query('SELECT * from pedidos,usuarios WHERE pedidos.id_usuario=usuarios.id_user AND usuarios.correo = :correo and estado=5');
$db -> bind(':correo', $_SESSION['email']);
$result = $db->resultset();
if (!empty($result)) {

?>
		<table class = "tabla-pedido">
			<tr>
				<th>Codigo</th>
				<th>Hora</th>
				<th>Fecha</th>
				<th>Precio</th>
				<th>Direccion</th>
				<th>Descripcion</th>
				<th>Hora de Entrega</th>
				<th>Calificar</th>
			</tr>

			<?php 

			foreach ($result as $index => $row) {
				$phpdate = strtotime( $row['tiempoPedido'] );
				$entrega = strtotime( $row['tiempoEntrega'] );
				echo "<tr>";
				echo "<td>".$row['codigo']."</td>";
				echo "<td>".date('g:i A',$phpdate)."</td>";
				echo "<td>".date('d/m/Y',$phpdate )."</td>";
				echo "<td>".$row['precio']."</td>";
				echo "<td>".$row['direccion']."</td>";
				echo "<td>".$row['descripcion']."</td>";
				echo "<td>".date('g:i A',$entrega)."</td>";
				echo '<td>
				<form class="calif" id="1">
					<div class="clasificacion">';
						for($index=5;$index>0;$index--){
							echo '
							<input id="radio'.$index.'" type="radio" name="estrellas" value="'.$index.'"';
							if($row['calificacion']==$index) echo 'checked="checked"';
							echo '><label for="radio'.$index.'">&#9733;</label>';
						}
						echo '</div>
					</form>

				</td>';
				echo "</tr>";
			}
			?>

		</table>
<?php
}else echo "Cuando tus pizzas sean entregadas, se mostraran aqui.";
?>
	</div>

</main>
<div class="footer ">
	&copy; Sindral Software 2016
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script>
	$(document).ready(function () {
		$("[name='estrellas']").click(function(){
			submitForm();
		});
	});

	function submitForm() {
		    var url = "rate.php"; // the script where you handle the form input.
		    $.ajax({
		    	type: "POST",
		    	url: url,
		           data: $("#1").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		               alert(data); // show response from the php script.
		           }
		       });

		    return false; // avoid to execute the actual submit of the form.
		};
	</script>
</body>
</html>
<?php
}else{
	echo '<script> window.location="login.php"; </script>';
}
?>
