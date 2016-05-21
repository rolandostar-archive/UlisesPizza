<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Little Ulises Pizza&trade; - Sucursales</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="stylesheet" href="/css/styles.css">

		<style>
			html,
			body {
				height: 100%;
			}

			body {
				background: none;
			}

			#googleMap {
				width: 100%;
				height: calc(100vh - 138px);
			}
		</style>

		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script>
			var myCenter = new google.maps.LatLng(19.504372, -99.146722);

			function initialize() {
				var mapProp = {
					center: myCenter,
					zoom: 15,
					disableDefaultUI: true,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				};

				var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(19.507123, -99.150327)
				});
				marker.setMap(map);
				marker = new google.maps.Marker({
					position: myCenter
				});
				marker.setMap(map);
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(19.508861, -99.139589)
				});
				marker.setMap(map);
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(19.501084, -99.147646)
				});
				marker.setMap(map);
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(19.503703, -99.138494)
				});
				marker.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
	</head>

	<body>
		<header>
			<div class="nav-bar">
				<div class="container">
					<ul class="nav">
						<li><a href="/">Inicio</a></li>
						<li><a href="#">Sucursales</a></li>
						<li><a href="/usr/login.php">Login</a></li>
					</ul>
				</div>
			</div>
			<div class="header">
				<div class=container>
					<h1 class=header-heading>Sucursales</h1>
				</div>
			</div>
		</header>

		<main>
			<div id="googleMap"></div>
		</main>
	</body>

</html>

</html>
