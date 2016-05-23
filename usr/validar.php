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
				$correo = 
				$password = $_POST['password'];
				$db -> query("SELECT * FROM usuarios WHERE correo=:correo AND pass=:pass");
				$db->bind(':correo', $_POST['email']);
				$db->bind(':pass', $_POST['password']);
				$result = $db->resultset();
				if (!empty($result)) {
					echo 'Success';
					$_SESSION["email"] = $result[0]['correo']; 
				  	echo 'Iniciando sesión para '.$_SESSION['correo'].' <p>';
					echo '<script> window.location="resumen.php"; </script>';
				
				}
				
				else{
					echo 'Failure';
				}
			}
		?>	
</body>
</html>