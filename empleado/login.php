<?php
	session_start();
	$title = "Iniciar Sesi&oacute;n - Little Ulises Pizza&trade;";
	$css = "/css/login.css";

// Validación del tipo de cargo de cada empleado para redireccionarlos a sus pantallas correspondientes
	if(isset($_SESSION['email'])){
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
?>

<!DOCTYPE html>
<html lang="en">
<!-- Saqué esto de header.php para cambiarlo en caso de no querer mostrar la misma barra de navegación a los empleados que se le muestra a los clientes -->
    <body>
    <header>
        <div class="nav-bar">
            <div class="container">
                <ul class="nav">
                    <li><a href="/">Inicio</a></li>
                </ul>
            </div>
        </div>
    </header>
        
		<form class="form-login" method="post" action="loginValidar.php">
			<div class="login">
				<div class="form-white-background">
					<div class="form-title-row">
						<h1>Login Empleado</h1>
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
			</div>
		</form>
	</body>

</html>

<head>
  <meta charset="utf-8">
  <title><?php
    if(isset($title)) echo $title;
    else echo "Little Ulises Pizza&trade;";
    ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

    <!-- favicon -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="/css/styles.css">
    <?php if(isset($css)) echo '<link rel="stylesheet" href="'.$css.'">'?>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
