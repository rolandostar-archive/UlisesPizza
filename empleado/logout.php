<?php
session_start();
session_destroy();
echo '<script> alert("Has cerrado sesión exitosamente.");</script>';
echo '<script> window.location="/empleado/login.php"; </script>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Saliendo...</title>
	<meta charset="utf-8">
</head>
<body>
</body>
</html>