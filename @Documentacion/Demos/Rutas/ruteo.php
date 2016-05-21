<html>
<head>
	<?php
		if(!isset($ruta))
			$ruta = $_GET["rutas"];
	?>

</head>
<body id = "cuerpo">
		Ah, camara. Ya funciona <br/>
		Si entro aqui es que un repartidor ya salió... Recibí como parametro la "rutas = moto" y "pv = 1" <br/>
		Entonces, conectamos con la BD: 
		<?php
			// Conectando, seleccionando la base de datos
			$link = mysql_connect('localhost', 'root', '')
			    or die('No se pudo conectar: ' . mysql_error());
			echo 'Connected successfully. ';
			// -> $ruta = new SplDoublyLinkedList();
			mysql_select_db('l_u') or die('No se pudo seleccionar la base de datos');
			echo "<br/>";
			$len_rutas = $ruta->count();
			echo "Hay ".$len_rutas." pedidos por entregar";

			if($len_rutas > 0){
				$mejor_destino = $ruta->bottom();
				//Sacas el id y la direccion del pedido siguiente;
				$query = 'SELECT * from pedidos WHERE id_pedido = '.$mejor_destino;
				$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
				$direccion = mysql_fetch_array($result, MYSQL_ASSOC);

				if($_GET["pv"] == 1){ //Si es el primer pedido
					//Para la direccion:
					echo "La direccion del pedido al que debo ir es: ".$direccion["direccion"];
					//Usar maps y marcar ruta
					echo "Aqui va el GMaps con dibujo desde la sucursal hasta la direccion de arriba";
					$ruta->shift();
					//Se modifica la var global para que al volver a usarla, este actualizada
					$_GET["rutas"] = $ruta;
					//Se cambia pv porque ya no es la primera vez
					$_GET["pv"] = 0;
				}
				else { //Si no es el primer pedido
					if($len_rutas > 1){
						$ruta->next(); //Te mueves al siguiente
						$index = 1; // O 2, revisar la documentacion
						$Time = 31;
						while($ruta->valid()){
							//Querys del current, del que puede ser opcion.
							$other_query = 'SELECT * from pedidos WHERE id_pedido = '.$ruta->current();
							$other_result = mysql_query($other_query) or die('Consulta fallida: ' . mysql_error());
							$aux_dir = mysql_fetch_array($other_result, MYSQL_ASSOC);

							$tiempo_aprox = tiempoEntre(pos_act_maps,$aux_dir["direccion"]);
							$tiempo_aprox += tiempoEntre($aux_dir["direccion"], $direccion["direccion"]);
							if( $tiempo_aprox < $Time ){ // Y hora_act + $tiempo_aprox < $direccion["hora_pedido"]
								$mejor_destino = $ruta->current();
								$Time = $tiempo_aprox;
							} 
							mysql_free_result($other_result);
						}
						if($mejor_destino != $ruta->bottom()){
							$ruta->unshift($mejor_destino);
						}
					}
					$o_query = 'SELECT * from pedidos WHERE id_pedido = '.$mejor_destino;
					$o_result = mysql_query($o_query) or die('Consulta fallida: ' . mysql_error());
					$m_d = mysql_fetch_array($o_result, MYSQL_ASSOC);
					echo "La direccion del pedido al que debo ir es: ".$m_d["direccion"];
					echo "Aqui va el GMaps con dibujo desde la sucursal hasta la direccion de arriba";
					$ruta->shift();
					//Se modifica la var global para que al volver a usarla, este actualizada
					$_GET["rutas"] = $ruta;
					//Se cambia pv porque ya no es la primera vez
					$_GET["pv"] = 0;
					mysql_free_result($o_result);
				}
				mysql_free_result($result);
			}
			mysql_close($link);
		?>
	<p>&nbsp;</p>
	<div id = "bottom"> 
		Todos los derechos reservados. By Miaw & Lara. (Ya sabemos que esta culero, por eso no diseñamos ;)
	</div>
</body>

</html>