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
					<select id="sucursal">
			          <?php
				          $db -> query('SELECT id_sucursal, nombre FROM sucursales');
				          $result = $db->resultset();
				          foreach ($result as $index => $row) {
						  	echo "<option value=\"".$row['id_sucursal'].'">'.$row['nombre']."</option>\n\r";
				          }
			          ?>
					</select>
				</div>

				<!-- Botón Agregar Empleado -->
				<div class="boton">
					<a class="btn" href="">Agregar Empleado</a>
				</div>
                
                <!-- Div donde se introduce la tabla generada con la información de la sucursal seleccionada -->
				<div id="info-sucursal">
                
                <script>
                    <?php 
                    $db -> query('SELECT sucursales.id_sucursal, codigo, tiempoPedido, tiempoEntrega, empleados.nombre, apellido, calificacion, precio, estado FROM pedidos, empleados, sucursales WHERE pedidos.id_empleado = empleados.id_empleado AND empleados.id_sucursal = sucursales.id_sucursal AND sucursales.id_sucursal LIKE "3" ORDER BY tiempoPedido DESC;');
                    $result = $db->resultset();
                    if (!empty($result)) {
                    ?>
                </script>
                        <table class="tabla-gerente">

                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Codigo</th>
                                    <th>Tiempo Pedido</th>
                                    <th>Tiempo Entrega</th>
                                    <th>Empleado</th>
                                    <th>Calificación</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    foreach ($result as $index => $row) {
                                        $phpdate = strtotime( $row['tiempoPedido'] );
                                        $entrega = strtotime( $row['tiempoEntrega'] );
                                        echo "<tr>";
                                            echo "<td>".date('d/m/Y',$phpdate )."</td>";
                                            echo "<td>".$row['codigo']."</td>";
                                            echo "<td>".date('g:i A',$phpdate)."</td>";
                                            echo "<td>".date('g:i A',$entrega)."</td>";
                                            echo "<td>".$row['nombre']." ".$row['apellido']."</td>";
                                            echo "<td>".$row['calificacion']."</td>";
                                            echo "<td>$ ".$row['precio']."</td>";
                                            switch ($row['estado']) {
                                                case '0': echo "<td> Pendiente </td>"; break;
                                                case '1': echo "<td> Cocinando </td>"; break;
                                                case '2': echo "<td> En Camino </td>"; break;
                                                case '3': echo "<td> Entregada </td>"; break;
                                            }
                                        echo "</tr>";
                                    }
                                ?>  
                            </tbody>
                        </table>
                    <?php
                    }else echo "Aún no hay información de pedidos para mostrar";
                    ?>
                    
                </div>
                
			 </div>
		</main>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<script>
		$(document).ready(function () {
			$('#sucursal').change(function() {
				console.log(this.options[this.selectedIndex].value);
				//alert('The option with value ' + $(this).val() + ' and text ' + $(this).text() + ' was selected.');
			});
		});

		function submitForm() {
		    var url = "tablaGerente.php"; // the script where you handle the form input.
		    $.ajax({
		    	type: "POST",
		    	url: url,
		        data: $("#tabla-gerente").serialize(), // serializes the form's elements.
		        success: function(data)
		        {
                    document.getElementById("info-sucursal").innerHTML = data;
		        }
		    });

		    return false; // avoid to execute the actual submit of the form.
		};
		</script>
	</body>
</html>
