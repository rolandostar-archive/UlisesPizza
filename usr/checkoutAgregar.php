<?php
require("db.class.php");
session_start();
if(isset($_SESSION['email'])) {
    $db = new database();
	print_r($_POST);
	/*
	<label>Nombre:</label><br><br>
    <label>Apellido:</label><br><br>
    <label>Teléfono:</label><br><br>
    <label>Correo Electrónico:</label><br><br>
    <label>Dirección de Entrega:</label><br><br>
    <label>Comentario:</label><br><br>
    <b><label>Forma de Pago:</label></b>
	*/
	$db -> query('SELECT id_pedido from pedidos DESC');
	$aux = $db->resultset();
	$ultimoID = $aux[0]['id_pedido']; $ultimoID++;
	echo "Nombre del cliente: ".$_POST("nombre")." ".$_POST("apellido");
	$db -> query('SELECT id_user from usuarios where nombre=:n and apellido=:ap');
	$db -> bind(':n', $_POST("nombre"));
	$db -> bind(':ap', $_POST("apellido"));
	$id_u = $db->single();
	$id_s = 1;
	$db -> query('SELECT id_empleado from empleados where id_sucursal=:x');
	$db -> bind(':x', $id_s);
	$id_e = = $db->single();
	$cod = "AA".$ultimoID;
	$hoy = getdate();
	// Aqui
	
	
	
?>
<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>
