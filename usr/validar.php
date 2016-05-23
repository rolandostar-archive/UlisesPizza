<?php
	session_start();
	require_once('db.class.php');
	$db = new database();
?>

<!DOCTYPE html>
<html>
<head>
<head>
	<title>Validando...</title>
	<meta charset="utf-8">
</head>
</head>
<body>
		<?php
			if(isset($_POST['login'])){
				$correo = $_POST['email'];
				$password = $_POST['password'];
				$db -> query("SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'");

				$res = $db->query('SELECT COUNT(*) FROM usuarios');
				//$num_rows = $res->fetchColumn();

				if ($res->fetchColumn() > 0 ) {
					echo 'Success';
				/*
					$row = mysql_fetch_array($log);
					$_SESSION["correo"] = $row['correo']; 
				  	echo 'Iniciando sesión para '.$_SESSION['correo'].' <p>';
					echo '<script> window.location="resumen.php"; </script>';
				*/
				}
				
				else{
					echo 'Failure';
					/*
					echo '<script> alert("Usuario o contraseña incorrectos.");</script>';
					echo '<script> window.location="login.php"; </script>';
					*/
				}
			}
		?>	
</body>
</html>
/*
Querys

$db -> query('SELECT * FROM usuarios'); // Prepara Query con query()

$result = $db->resultset(); // Ejecuta Query con single() para regresar un resultado unico (O el primero en caso de ser varios)

El query se hace con $db -> query(), no con mysql_query

Lo mismo para mysql_fetch_array y mysql_num_rows
*/