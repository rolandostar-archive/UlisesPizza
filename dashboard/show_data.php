<?php
//Dashboard Empleado
require_once('db.class.php');
$db = new database();
$db -> query('SELECT * FROM pedidos');
$result = $db->resultset();
echo "Muestra de pedidos: <table>";
echo "<th>id_pedido</th> <th>Hora del Pedido</th> <th>Direccion</th> <th>Descripcion</th> <th>Accion</th>"
foreach ($result as $index => $row) { 
	echo "<tr><td>".$row['id_pedido']."</td>";
	echo "<td>".$row['tiempoPedido']."</td>";
	echo "<td>".$row['direccion']."</td>";
	echo "<td>".$row['descripcion']."</td>";
	echo "<td> NULL </td></tr>";
}
echo '</tr></table>';
?>