<?php
	session_start();
	$title = "Little Ulises Pizza&trade; - Sucursales";
	$css = "/css/sucursales.css";
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once("header.php");?>
		<div class="header">
			<div class=container>
				<h1 class=header-heading>Sucursales</h1>
			</div>
		</div>
		<main>
			<div id="googleMap"></div>
		</main>
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
	</body>

</html>

</html>
