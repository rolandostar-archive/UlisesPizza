<?php
//Dashboard Empleado -> Pantalla que ven los empleados

//Voy a suponer que recibo el id del empleado con _get
require_once('db.class.php');
$db = new database();

//Buscar la sucursal el empleado
$db -> query('SELECT id_sucursal from empleados where id_empleado=:emp');
$db -> bind(':emp', $_GET['id_empleado']);
$row = $db->single(); //Solo va a ser uno
//Buscar los pedidos de esa sucursal
$db -> query('SELECT * FROM pedidos where id_sucursal=:id_suc');
$db -> bind(':id_suc', $row['id_sucursal'];);

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

<?php
//Resumen Cliente -> Suponiendo que id_usr se pasa por get

//Pedidos actuales
require_once('db.class.php');
$db = new database();

$db -> query('SELECT * from pedidos where id_usuario=:user and estado<>3');
$db -> bind(':user', $_GET['id_usuario']);
$result = $db->resultset();
echo 'Pedidos Actuales:';
foreach ($result as $index => $row) { 
	echo "<tr>";
	echo "<td>".$row['tiempoPedido']."</td>";
	echo "<td>".$row['tiempoPedido']."</td>";
	echo "<td>".$row['precio']."</td>";
	echo "<td>".$row['direccion']."</td>";
	echo "<td>".$row['descripcion']."</td>";
	echo "<td> Hora de Pedido + 30 </td>";
	switch ($row['estado']) {
		case '0': echo "<td> Pendiente </td>"; break;
		case '1': echo "<td> Cocinando </td>"; break;
		case '2': echo "<td> En Camino </td>"; break;
	}
	echo "</tr>";
}

//Historial de Pedidos
require_once('db.class.php');
$db = new database();

$db -> query('SELECT * from pedidos where id_usuario=:user and estado=3');
$db -> bind(':user', $_GET['id_usuario']);
$result = $db->resultset();
echo 'Historial de Pedidos:';
foreach ($result as $index => $row) { 
	echo "<tr>";
	echo "<td>".$row['tiempoPedido']."</td>";
	echo "<td>".$row['tiempoEntrega']."</td>";
	echo "<td>".$row['tiempoPedido']."</td>";
	echo "<td>".$row['precio']."</td>";
	echo "<td>".$row['direccion']."</td>";
	echo "<td>".$row['descripcion']."</td>";
	echo "<td> Entregada </td>";
	echo "<td>".$row['calificacion']."</td>";
	echo "</tr>";
}
?>

<?php
//Dashboard Gerente -> Suponiendo que se pasa id_suc por get
require_once('db.class.php');
$db = new database();
$db -> query('SELECT * from pedidos where id_sucursal=:id_suc');
$db -> bind(':id_suc', $_GET['id_sucursal']);
$result = $db->resultset();
echo 'Dashboard Gerente:';
foreach ($result as $index => $row) { 
	echo "<tr>";
	echo "<td>".$row['id_usuario']."</td>";
	//Buscar al empleado para mostrar el nombre del mismo
	$db -> query('SELECT nombre from empleados where id_empleado=:emp');
	$db -> bind(':emp', $row['id_empleado']);
	$aux = $db->single();
	echo "<td>".$aux['nombre']."</td>";
	echo "<td>".$row['tiempoPedido']."</td>";
	echo "<td>".$row['tiempoEntrega']."</td>";
	echo "<td>".$row['tiempoPedido']."</td>";
	echo "<td>".$row['precio']."</td>";
	echo "<td>".$row['direccion']."</td>";
	echo "<td>".$row['descripcion']."</td>";
	switch ($row['estado']) {
		case '0': echo "<td> Pendiente </td>"; break;
		case '1': echo "<td> Cocinando </td>"; break;
		case '2': echo "<td> En Camino </td>"; break;
		default:  echo "<td> Entregada </td>"; break;
	}
	echo "</tr>";
}
?>