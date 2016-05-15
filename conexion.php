<html>
<head>
	<?php
		if(!isset($pendientes))
			$pendientes = new SplDoublyLinkedList();
		if(!isset($moto))
			$moto = new SplDoublyLinkedList();
		if(!isset($hora))
			$hora = time();
	?>
</head>
<body id = "cuerpo">
		Ah, camara. Ya funciona <br/>
		Si entro aqui es que o llego una moto o que hay una pizza lista... <br/>
		Entonces, conectamos con la BD: 
		<?php
			// Conectando, seleccionando la base de datos
			$link = mysql_connect('localhost', 'root', '')
			    or die('No se pudo conectar: ' . mysql_error());
			echo 'Connected successfully. ';
			$id_suc = $_GET["sucursal"];
			echo '<br/>El id de la sucursal es: '.$id_suc;
			mysql_select_db('l_u') or die('No se pudo seleccionar la base de datos');
			echo "<br/>";

			// Realizar una consulta MySQL
			$other_query = 'SELECT num_repartidores from sucursal where id_sucursal = '.$id_suc;
			$other_result = mysql_query($other_query) or die('Consulta fallida: ' . mysql_error());
			$num_rep = mysql_fetch_array($other_result, MYSQL_ASSOC);
			echo 'Tengo '.$num_rep["num_repartidores"].' repartidores disponibles';
			echo "<br/>";

			if($num_rep["num_repartidores"] == 0){ // Si no hay repartidores disponibles 
				echo "<br/> No hay repartidores";
				if($_GET["pedido"] == 0){ //Llego una moto y no hay pedidos listos aun, por eso el 0.
					echo "<br/> No hay pedidos, llego una moto";
					$nuevos = $num_rep["num_repartidores"] + 1; //Se suma uno al num de repartidores
					$my_query = "UPDATE sucursal SET num_repartidores = '".$nuevos."' WHERE id_sucursal = '".$id_suc."';";
					$r = mysql_query($my_query) or die('Update fallido: '.mysql_error()); //Se ejecuta el Query
					echo "<br/> Se sumo uno a los repartidores";
				}
				else{ //Pedido distinto a 0, es decir, es un pedido en espera, porque no hay repartidores 
					$pendientes->push($_GET["pedido"]); //Se guarda el id del pedido
					echo "<br/> Se encolo el pedido";
				}
			}
			if($num_rep["num_repartidores"] != 0){ //Si hay repartidores disponibles
				echo "<br/> Si hay repartidores";
				if($_GET["pedido"] == 0){ //Llego una moto
					echo "<br/> Llego una moto";
					$nuevos = $num_rep["num_repartidores"] + 1; //Se suma uno al num de repartidores
					$my_query = "UPDATE sucursal SET num_repartidores = '".$nuevos."' WHERE id_sucursal = '".$id_suc."';";
					$r = mysql_query($my_query) or die('Update fallido: '.mysql_error()); //Se ejecuta el Query
					echo "<br/> Se sumo uno a los repartidores";
				}
				else { //Pedido distinto a 0, es decir, hay una pizza lista para salir
					echo "Pendientes, hay: ".$pendientes->count();
					if($pendientes->count() > 0){ //Quiere decir que hay al menos un pedido en espera
						while ($moto->count() < 10 or $pendientes->count() > 0) { //Mientras moto no llena o haya pedidos pendientes
							$moto->push($pendientes->bottom()); //Se pasan a la moto
							$pendientes->shift(); //Se quita el pedido de los pendientes, porque ya esta encolado
						}
						echo "<br/>Moto tiene ".$moto->count()." pedidos encolados";
						$query = 'SELECT hora_pedido FROM pedidos WHERE id_pedido ='.$moto->bottom().';';
						echo "<br/> El query para sacar la hora: ".$query;
						$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
						$hora_ped = mysql_fetch_array($result, MYSQL_ASSOC);
						echo "<br/> El pedido fue ordenado a las : ".$hora_ped["hora_pedido"];
  
  						//$hora = time();
						//$hora = date('H:s:i',$Hora).""; 
						//$TME = date('H:s:i', strtotime(''.$hora_ped["hora_pedido"].' + 30 minutes'));
// ***********************************************************************************************************************************************
						if($moto->count() < 10 ){ //Si la moto no esta llena o ni es hora de salir
							$moto->push($_GET["pedido"]); //Ya que recibi un pedido, pero le di prioridad a los encolados
							echo "<br/> Se vaciaron los pendientes y se añadio el pedido a la moto";
						}
						else {
							$pendientes->push($_GET["pedido"]); //Se guarda el id del pedido
							echo "<br/> Se vaciaron los pendientes y se encolo el pedido a la moto";
							$moto = new SplDoublyLinkedList();
							echo "<br/> Salida de la moto. Ir a BD y agarrar un id de repartidor, mandarlo a ruta.php?id_emp=VAL";
						}

						mysql_free_result($result);
					}
					else{ //No hay pedidos pendientes
// ***********************************************************************************************************************************************
						if($moto->count() < 10 ){ //Si la moto no esta llena o ni es hora de salir
							$moto->push($_GET["pedido"]);
							echo "No habia pendientes, pedido en moto";
						}
						else{
							$pendientes->push($_GET["pedido"]); //Se guarda el id del pedido
							echo "<br/> No habia pendientes, pero moto llena. Pedido en espera";
							$moto = new SplDoublyLinkedList();
						}
					}
				}

			}

			/*
			// Imprimir los resultados en HTML
			echo "<table>\n";
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
			    echo "\t<tr>\n";
			    foreach ($line as $col_value) {
			        echo "\t\t<td>$col_value</td>\n";
			    }
			    echo "\t</tr>\n";
			}
			echo "</table>\n";
			*/

			// Liberar resultados
			mysql_free_result($other_result);

			// Cerrar la conexión
			mysql_close($link);
		?>
	<p>&nbsp;</p>
	<div id = "bottom"> 
		Todos los derechos reservados. By Miaw & Lara. (Ya sabemos que esta culero, por eso no diseñamos ;)
	</div>
</body>

</html>