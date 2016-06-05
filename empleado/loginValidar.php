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
				$correo = $_POST['email'];
				$password = $_POST['password'];
				$db -> query("SELECT * FROM empleados WHERE correo=:correo AND pass=:pass");
				$db->bind(':correo', $_POST['email']);
				$db->bind(':pass', $_POST['password']);
				$result = $db->single();
				if (!empty($result)) {
					$_SESSION["email"] = $result['correo']; 
					$_SESSION["nombre"] = $result['nombre'];
                    $_SESSION["cargo"] = $result['cargo'];
					echo 'Iniciando sesión para '.$_SESSION['email'].' <p>';
                    // Validación del tipo de cargo de cada empleado para redireccionarlos a sus pantallas correspondientes
                    if ($_SESSION["cargo"]==0){
					echo '<script> window.location="/dashboard/dashboard_gerente.php"; </script>';
                    }
                    else if ($_SESSION["cargo"]==1){
					echo '<script> window.location="/repartidor/index.php"; </script>';
                    }
                    else if ($_SESSION["cargo"]==2){
					echo '<script> window.location="/dashboard/dashboard_Empleado.php"; </script>';
                    }
				}
				else{
					echo '<script> alert("El correo electrónico y/o la contraseña que ingresaste no coinciden con niguna cuenta. Regístrate para crear una cuenta.");</script>';
					echo '<script> window.location="login.php"; </script>';
				}
			}
		?>	
</body>
</html>