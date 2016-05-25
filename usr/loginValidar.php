<?php
	session_start();
	require_once('db.class.php');
	require_once('carrito.class.php');
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
					$_SESSION["email"] = $result[0]['correo']; 
					$_SESSION["nombre"] = $result[0]['nombre'];
					$_SESSION["carrito"] = serialize(new carrito());
					echo 'Iniciando sesión para '.$_SESSION['correo'].' <p>';
					echo '<script> window.location="resumen.php"; </script>';
				}
				
				else{
					echo '<script> alert("El correo electrónico y/o la contraseña que ingresaste no coinciden con niguna cuenta. Regístrate para crear una cuenta.");</script>';
					echo '<script> window.location="login.php"; </script>';
				}
			}
		?>	
</body>
</html>