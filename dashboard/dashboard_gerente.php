<?php
	require_once('db.class.php');
	$db = new database();
?>

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

			.sucursal {
				padding-top: 0.5em;
				float: left;
			}

			.boton {
				float: right;
				text-align: right;
			}

			.tabla-gerente {
				padding-top: 2em;
				margin: 0 auto;
				width: 100%;
			}

			.tabla-gerente th {
				background: #E38F27;
			}

			.tabla-gerente td{
				text-align: center;
			}

			tr:nth-child(odd) {
				background-color: #f2f2f2
			}

		</style>
	</head>

	<body>
		<header>
			<div class="nav-bar">
				<div class="container">
					<ul class="nav">
						<li>¡Bienvenido Juan!</li>
						<li><a href="./login.php">Salir</a></li>
					</ul>
				</div>
			</div>
		</header>

		<main class="content">
			<div class="container">

				<!-- Select de Sucursal -->
				<div class="sucursal">
                    <form id="serial" method=POST>
					<select id="sucursal" name="codigo">
			          <?php
				          $db -> query('SELECT id_sucursal, nombre FROM sucursales');
				          $result = $db->resultset();
				          foreach ($result as $index => $row) {
						  	echo "<option value=\"".$row['id_sucursal'].'">'.$row['nombre']."</option>\n\r";
				          }
			          ?>
					</select>
                    </form>
				</div>

				<!-- Botón Agregar Empleado -->
				<div class="boton">
					<a class="btn" href="">Agregar Empleado</a>
				</div>
                
                <!-- Div donde se introduce la tabla generada con la información de la sucursal seleccionada -->
				<div id="info-sucursal"></div>
                
			 </div>
		</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<script>
		$(document).ready(function () {
			$('#sucursal').change(function() {
                var url = "tablaGerente.php"; // the script where you handle the form input.
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#serial").serialize(), // serializes the form's elements.
                    success: function(data){
                        document.getElementById("info-sucursal").innerHTML = data;
                    }
                });
			});
		});
		</script>
	</body>
</html>
