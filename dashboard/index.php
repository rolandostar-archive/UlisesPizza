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
							<th>Pizza</th>
							<th>Descripción</th>
							<th>Cantidad</th>
							<th>Accion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Hawaiiana</td>
							<td>
								Pizza hawaiiana grande, masa tradicional.
							</td>
							<td>1</td>
							<td>
								<img class="toggle" onclick="changeImage(this)" src="cook.png" width="50" height="50">
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Mexicana</td>
							<td>
								Pizza mexicana mediana, masa tradicional con orilla de queso.
							</td>
							<td>2</td>
							<td>
								<img class="toggle" onclick="changeImage(this)" src="cook.png" width="50" height="50">
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Personalizada</td>
							<td>Pizza de peperoni con champiñones, masa crujiente.</td>
							<td>1</td>
							<td>
								<img class="toggle" onclick="changeImage(this)" src="cook.png" width="50" height="50">
							</td>
						</tr>
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
