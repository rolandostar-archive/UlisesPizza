<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Little Ulises Pizza&trade; - Resumen</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index, follow">

	<!-- icons -->
	<link rel="shortcut icon" href="/favicon.ico">

	<!-- Override CSS file - add your own CSS rules -->
	<link rel="stylesheet" href="/css/styles.css">
	<link rel="stylesheet" href="./css/resumen.css">
</head>

<body>
	<header>
		<div class="nav-bar">
			<div class="container">
					<ul class="nav">
						<li>Hola Ulises!</li>
						<li>Inicio</li>
						<li>Resumen</li>
						<li>Carrito</li>
						<li>Logout</li>
						<li><a href="./login.php">Salir</a></li>
					</ul>
			</div>
		</div>
		<div class="header">
			<h1 class=header-heading>Tu resumen</h1>
		</div>
	</header>
	<main class="content">
		<div>
			<!-- Tabla de pedidos actuales -->
			<h3>Pedidos Actuales</h3>
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
				<tr>
					<td>CS16</td>
					<td>7:54 PM</td>
					<td>08/05/2016</td>
					<td>$199</td>
					<td>Av. Juan de Dios Batiz s/nGustavo A. MaderoNueva industria vallejo 08800</td>
					<td>Pizza hawaiiana grandePizza de pepperoni mediana</td>
					<td>7:12</td>
					<td>En Camino</td>
					<td><button onclick="cancel(1)">Cancelar</button></td>
				</tr>
				<tr>
					<td>RK65</td>
					<td>7:10 PM</td>
					<td>08/05/2016</td>
					<td>$129</td>
					<td>Av. Instituto Politecnico Nacional s/nGustavo A. MaderoLindavista</td>
					<td>Pizza hawaiiana grandePizza de pepperoni mediana</td>
					<td>7:27</td>
					<td>Pendiente</td>
					<td><button onclick="cancel(2)">Cancelar</button></td>
				</tr>
			</table>
		</div>

		<div class="tabla-precios">
			<column>
			<div class="paquete">
				<div class="paq-head" style="background: #212121;">
					<h2>Paquete 1</h2>
					<span class="precio">
						$125 <span>Para compartir</span>
					</span>
				</div>
				<ul class="lista-productos">
					<li>2 Pizzas Grandes
						<br/>(1 Ingrediente)</li>
						<li>Refresco Cualquier Sabor</li>
					</ul>
					<a class="btn-pedir" href="#" role="button">Pedir</a>
				</div>
			</column>
			<column>
			<div class="paquete">
				<div class="paq-head" style="background: blue;">
					<h2>Paquete 2</h2>
					<span class="precio">
						$125 <span>Para compartir</span>
					</span>
				</div>
				<ul class="lista-productos">
					<li>2 Pizzas Grandes
						<br/>(1 Ingrediente)</li>
						<li>Refresco Cualquier Sabor</li>
					</ul>
					<a class="btn-pedir" href="#" role="button">Pedir</a>
				</div>
			</column>
			<column>
			<div class="paquete">
				<div class="paq-head" style="background: red;">
					<h2>Paquete 3</h2>
					<span class="precio">
						$125 <span>Para compartir</span>
					</span>
				</div>
				<ul class="lista-productos">
					<li>2 Pizzas Grandes
						<br/>(1 Ingrediente)</li>
						<li>Refresco Cualquier Sabor</li>
					</ul>
					<a class="btn-pedir" href="#" role="button">Pedir</a>
				</div>
			</column>
			<column>
			<div class="paquete">
				<div class="paq-head" style="background: green;">
					<h2>Paquete 4</h2>
					<span class="precio">
						$125 <span>Para compartir</span>
					</span>
				</div>
				<ul class="lista-productos">
					<li>2 Pizzas Grandes
						<br/>(1 Ingrediente)</li>
						<li>Refresco Cualquier Sabor</li>
					</ul>
					<a class="btn-pedir" href="#" role="button">Pedir</a>
				</div>
			</column>
		</div>

		<!-- Tabla de historial -->
		<div>
			<h3>Historial</h3>
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
				<tr>
					<td>KJ14</td>
					<td>6:12 PM</td>
					<td>08/05/2016</td>
					<td>$100</td>
					<td>Lázaro Cárdenas 152, San Bartolo Atepehuacan, 07730</td>
					<td>Pizza hawaiiana grandePizza de pepperoni mediana</td>
					<td>6:23 PM</td>
					<td>
						<form class="calif" id="1">
							<div class="clasificacion">
								<input id="radio1" type="radio" name="estrellas" value="5">
								<label for="radio1">&#9733;</label>
								<input id="radio2" type="radio" name="estrellas" value="4">
								<label for="radio2">&#9733;</label>
								<input id="radio3" type="radio" name="estrellas" value="3">
								<label for="radio3">&#9733;</label>
								<input id="radio4" type="radio" name="estrellas" value="2">
								<label for="radio4">&#9733;</label>
								<input id="radio5" type="radio" name="estrellas" value="1">
								<label for="radio5">&#9733;</label>
							</div>
						</form>

					</td>
				</tr>
			</table>
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
		    var url = "calify.php"; // the script where you handle the form input.
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
