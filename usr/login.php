<?php
	session_start();
	if(isset($_SESSION['email'])){
	echo '<script> window.location="resumen.php"; </script>';
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Little Ulises Pizza&trade; - Iniciar Sesi&oacute;n</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="shortcut icon" href="/favicon.ico">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="/css/styles.css">
		<link rel="stylesheet" href="/css/login.css">
	</head>

	<body>
		<header>
			<div class="nav-bar">
				<div class="container">
					<ul class="nav">
						<li><a href="/">Regresar a Inicio</a></li>
					</ul>
				</div>
			</div>
		</header>
		<form class="form-login" method="post" action="validar.php">
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
				<a href="#" class="form-create-an-account">Registro &rarr;</a>
			</div>
		</form>
	</body>

</html>
