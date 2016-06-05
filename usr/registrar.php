<?php
	session_start();
	$title = "Little Ulises Pizza&trade; - Iniciar Sesi&oacute;n";
	$css = "/css/login.css";
	if(isset($_SESSION['email'])){
    echo '<script> alert("Debes cerrar sesión para registrar un nuevo usuario.");</script>';
	echo '<script> window.location="resumen.php"; </script>';
	}
?>

<!DOCTYPE html>
<html lang="en">

	<?php require_once("header.php"); ?>
		<form class="form-login" method="post" action="loginValidar.php">
			<div class="login">
				<div class="form-white-background">
					<div class="form-title-row">
						<h1>Regístrate Ahora</h1>
					</div>
					<div class="form-row">
						<label>
							<span>Email</span>
							<input type="email" name="email" required>
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Password</span>
							<input type="password" name="password">
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Nombre</span>
							<input type="password" name="password">
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Apellidos</span>
							<input type="password" name="password">
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Fecha de Nacimiento</span>
							<input type="password" name="password">
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Género</span>
							<input type="password" name="password">
						</label>
					</div>
					<div class="form-row">
						<label>
							<span>Teléfono</span>
							<input type="password" name="password">
						</label>
					</div>
					<div class="form-row">
						<button type="submit" class="btn" name="login" >Registrarme</button>
				</div>
				<hr>
				<a href="/usr/login.php" class="form-forgotten-password">¿Ya tienes una cuenta?  Inica Sesión</a>
			</div>
		</form>
	</body>
</html>
