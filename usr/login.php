<?php
	session_start();
	$title = "Little Ulises Pizza&trade; - Iniciar Sesi&oacute;n";
	$css = "/css/login.css";
	if(isset($_SESSION['email'])){
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
						<h1>Login Cliente</h1>
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
						<button type="submit" class="btn" name="login" >Iniciar Sesi&oacute;n</button>
				</div>
				<hr>
				<a href="#" class="form-forgotten-password">¿Olvidaste tu Contrase&ntilde;a? &middot;</a>
				<a href="/usr/registrar.php" class="form-create-an-account">Registro &rarr;</a>
			</div>
		</form>
	</body>

</html>
