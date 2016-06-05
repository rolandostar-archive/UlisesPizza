<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Little Ulises Pizza&trade; - Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="shortcut icon" href="/favicon.ico">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="/css/styles.css">

		<style>
			body {
				background: none;
			}
			.pedidos-act {
				flex-grow: 1;
			}
			.tabla-pedido {
				margin: 0 auto;
				width: 100%;
			}
			.tabla-pedido th {
				background: #E38F27;
			}
			tr:nth-child(odd) {
				background-color: #f2f2f2
			}
			.flex-wrapper {
				display: flex;
			}
			.cooking {
				width: 50px;
				height: 50px;
				background-color: red;
			}
			.ready {
				width: 50px;
				height: 50px;
				background-color: green;
			}
			.toggle {
				cursor: pointer;
			}
		</style>



	</head>

	<body>
		<header>
			<div class="nav-bar">
				<div class="container">
					<ul class="nav">
						<li>Dashboard: FH43</li>
						<li><a href="./login.php">Salir</a></li>
					</ul>
				</div>
			</div>
		</header>

		<main class="content">
			<div class="container">
				<!-- Tabla de pedidos actuales -->
				<h3>Pedidos Actuales</h3>
				<table class="tabla-pedido">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Hora del Pedido</th>
							<th>Direccion</th>
							<th>Descripción</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//Dashboard Empleado -> Pantalla que ven los empleados

							//Voy a suponer que recibo el id del empleado con _get
							require_once('db.class.php');
							$db = new database();

							//Buscar la sucursal el empleado
							$db -> query('SELECT id_sucursal from empleados where id_empleado=:emp');
							$db->bind(':emp', $_GET['id_empleado']);
							$row = $db->single(); //Solo va a ser uno
							//Buscar los pedidos de esa sucursal
							$db -> query('SELECT * FROM pedidos where id_sucursal=:id_suc');
							$db->bind(':id_suc', $row['id_sucursal']);

							//Mostrar resultados
							$result = $db->resultset();
							foreach ($result as $index => $row) { 
								echo "<tr>";
								echo "<td>".$row['id_pedido']."</td>";
								echo "<td>".$row['tiempoPedido']."</td>";
								echo "<td>".$row['direccion']."</td>";
								echo "<td>".$row['descripcion']."</td>";
								echo '<td> <img class="toggle" onclick="changeImage(this)" src="cook.png" width="50" height="50"> </td>';
								echo "</tr>";
							}
						?>
					</tbody>
				</table>
			</div>
		</main>
		<script>
			function changeImage(e) {
				var image = e;
				if (image.src.match("ready")) {
					image.src = "cook.png";
				} else {
					image.src = "ready.png";
				}
			}
		</script>

	</body>


</html>
