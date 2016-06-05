<?php
	session_start();
	$title = "Little Ulises Pizza&trade; - Iniciar Sesi&oacute;n";
	$css = "/css/login.css";
	if ( (isset($_SESSION['cargo'])) && ($_SESSION["cargo"]==0) ){
?>
<!DOCTYPE html>
<html lang="en">
    
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

    <body>
		<header>
			<div class="nav-bar">
				<div class="container">
					<ul class="nav">
                        <li><a href="/dashboard/dashboard_gerente.php">¡Hola <?php echo $_SESSION["nombre"];?>!</a></li>';
						<li><a href="/empleado/logout.php">Cerrar Sesión</a></li>
					</ul>
				</div>
			</div>
		</header>
		<form class="form-login" method="post" action="loginValidar.php">
			<div class="login">
				<div class="form-white-background">
					<div class="form-title-row">
						<h1>Agregar Empleado</h1>
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
							<span>Cargo</span>
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
						<button type="submit" class="btn" name="login" >Agregar</button>
				</div>
				<hr>
				<a href="/dashboard/dashboard_gerente.php" class="form-forgotten-password">Regresar a Dashboard</a>
			</div>
		</form>
	</body>
</html>
<?php
    }else{
      echo '<script> window.location="/empleado/login.php"; </script>';
    }
?>
