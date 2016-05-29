<?php
require("db.class.php");
session_start();
$title = "Little Ulises Pizza&trade; - Paquetes";
$css = "./css/paquetes.css";
if(isset($_SESSION['email'])) {
    $db = new database();
?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript">
		function parcear(){
			var enviar;
			//Si le pongo while, va a cambiar el elemento????
			// while ( document.getElementById("PG") ) ???
			if( document.getElementById("PG") )
				enviar = "Pizza Grande " + $( "#PG option:selected" ).text() + " ";
			if( document.getElementById("PG") )
				enviar += "Pizza Mediana " + $( "#PG option:selected" ).text() + " ";
			if( document.getElementById("PG") )
				enviar = "Pizza Personal " + $( "#PG option:selected" ).text() + " ";
			alert("Quiero mandar: "+enviar);
		}
		</script>
	</head>
	<body>
	<p> RECIBIR EL ID DEL PAQUETE. Modificar linea 22. Y linea 5 - 6. </p>
	<select>
	  <option value="MO">Masa Original</option>
	  <option value="MC">Masa Crunchy</option>
	  <option value="MR">Masa Rellena de Queso</option>
	</select>
	<?php
          $db -> query('SELECT nombre FROM paquetes WHERE id_paquete=:id_paq');
          //Estoy suponiendo que recibo el id del paquete con GET
          $db -> bind(':id_paq', $_GET['id_paquete']);
          $row = $db->single();
          
          //Para mostrar todas las pizzas grandes
          for ($i = 0; $i < $row['pizza_grande']; $i++) {
		    echo 'Pizza Grande: <br/>';
		    $db -> query('SELECT * FROM especialidad');
		    $result = $db->resultset();
		    echo '<select id="PG">';
		    foreach ($result as $index => $aux)
      			echo '<option>'.$aux['nombre'].'</option>';
      		echo '</select><br/>';
		  }

		  //Para mostrar todas las pizzas medianas
          for ($i = 0; $i < $row['pizza_mediana']; $i++) {
		    echo 'Pizza Mediana: <br/>';
		    $db -> query('SELECT * FROM especialidad');
		    $result = $db->resultset();
		    echo '<select id="PM">';
		    foreach ($result as $index => $aux)
      			echo '<option>'.$aux['nombre'].'</option>';
      		echo '</select><br/>';
		  }

		  //Para mostrar todas las pizzas chicas
          for ($i = 0; $i < $row['pizza_chica']; $i++) {
		    echo 'Pizza Personal: <br/>';
		    $db -> query('SELECT * FROM especialidad');
		    $result = $db->resultset();
		    echo '<select id="PC">';
		    foreach ($result as $index => $aux)
      			echo '<option>'.$aux['nombre'].'</option>';
      		echo '</select><br/>';
		  }

		  if($row['refrescos'] > 0)
		  	echo 'Este paquete incluye '.$row['refrescos'].' refrescos<br/>';
		  else
		  	echo 'Este paquete no incluye refrescos<br/>';
		  echo '<button type="button" onclick="parcear()">Agregar Paquete</button>'
    ?>
	</body>
</html>
<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>
