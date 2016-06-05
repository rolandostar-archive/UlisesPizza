<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Little Ulises Pizza&trade; - Menu</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="shortcut icon" href="/favicon.ico">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="styles.css">
		<link rel="stylesheet" href="landing.css">

		<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="engine0/style.css" />
		<script type="text/javascript" src="engine0/jquery.js"></script>
		<!-- End WOWSlider.com HEAD section -->

		<!-- Start WOWSlider.com HEAD section -->
		<link rel="stylesheet" type="text/css" href="engine1/style.css" />
		<script type="text/javascript" src="engine1/jquery.js"></script>
		<!-- End WOWSlider.com HEAD section -->
		
		<style>
			body {
				background: transparent url("/img/photo-montage1.png") no-repeat center bottom;
                background-position: bottom center;
			}

			.pedidos-act {
				flex-grow: 1;
			}

			.tabla-pedido {
				margin: 0 auto;
				width: 100%;
			}

			.tabla-pedido th {
				background: #E38F27;
			}

			tr:nth-child(odd) {
				background-color: #f2f2f2
			}

			.flex-wrapper {
				display: flex;
			}

			.cooking {
				width: 50px;
				height: 50px;
				background-color: red;
			}

			.ready {
				width: 50px;
				height: 50px;
				background-color: green;
			}

			.toggle {
				cursor: pointer;
			}
		</style>

</head>

	<body>
        <header>
            <div class="nav-bar">
                <div class="container">
                    <ul class="nav">
                        <?php if(isset($_SESSION['email'])): ?>
                            <li><a href="/usr/resumen.php">¡Hola <?php echo $_SESSION["nombre"];?>!</a></li>';
                            <li><a href="/">Inicio</a></li>
                            <li><a href="/menu/">Menú</a></li>
                            <li><a href="/sucursales.php">Sucursales</a></li>
                            <li><a href="/usr/carrito.php">Carrito</a></li>
                            <li><a href="/usr/logout.php">Logout</a></li>
                        <?php else: ?>
                            <li><a href="/">Inicio</a></li>
                            <li><a href="/menu/">Menú</a></li>
                            <li><a href="/sucursales.php">Sucursales</a></li>
                            <li><a href="/usr/login.php">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </header>

		
		<main class="content">
			<div class="container">
				<!-- Tabla de paquetes -->
				
	<center>
			<h3>Paquetes</h3>
			<hr>
	</center>

<main class="content">
			<div class="tabla-precios">
				<column>
					<div class="paquete">
						<div class="paq-head" style="background: #212121;">
							<h2>Paquete 1</h2>
							<span class="precio">
								$125 <span>Para compartir</span>
							</span>
						</div>
						<ul class="lista-productos">
							<li>2 Pizzas Grandes
								<br/>(1 Ingrediente)</li>
							<li>Refresco Cualquier Sabor</li>
						</ul>
						<a class="btn-pedir" href="#" role="button">Pedir</a>
					</div>
				</column>
				<column>
					<div class="paquete">
						<div class="paq-head" style="background: blue;">
							<h2>Paquete 2</h2>
							<span class="precio">
								$125 <span>Para compartir</span>
							</span>
						</div>
						<ul class="lista-productos">
							<li>2 Pizzas Grandes
								<br/>(1 Ingrediente)</li>
							<li>Refresco Cualquier Sabor</li>
						</ul>
						<a class="btn-pedir" href="#" role="button">Pedir</a>
					</div>
				</column>
				<column>
					<div class="paquete">
						<div class="paq-head" style="background: red;">
							<h2>Paquete 3</h2>
							<span class="precio">
								$125 <span>Para compartir</span>
							</span>
						</div>
						<ul class="lista-productos">
							<li>2 Pizzas Grandes
								<br/>(1 Ingrediente)</li>
							<li>Refresco Cualquier Sabor</li>
						</ul>
						<a class="btn-pedir" href="#" role="button">Pedir</a>
					</div>
				</column>
				<column>
					<div class="paquete">
						<div class="paq-head" style="background: green;">
							<h2>Paquete 4</h2>
							<span class="precio">
								$125 <span>Para compartir</span>
							</span>
						</div>
						<ul class="lista-productos">
							<li>2 Pizzas Grandes
								<br/>(1 Ingrediente)</li>
							<li>Refresco Cualquier Sabor</li>
						</ul>
						<a class="btn-pedir" href="#" role="button">Pedir</a>
					</div>
				</column>
			</div>
			</main>



			<br>
			<br>




			

	
<center>
		<h3>Especialidades</h3>
		<hr>
</center>


<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container0">
<div class="ws_images"><ul>
		<li><img src="data0/images/descarga.jpg" alt="Hawaiana" title="Hawaiana" id="wows0_0"/></li>
		<li><img src="data0/images/brava.jpg" alt="brava" title="brava" id="wows0_1"/></li>
		<li><img src="data0/images/descarga_2.jpg" alt="Mexicana" title="Mexicana" id="wows0_2"/></li>
		<li><img src="data0/images/descarga_3.jpg" alt="Pepperonni" title="Pepperonni" id="wows0_3"/></li>
		<li><img src="data0/images/descarga_4.jpg" alt="4 Quesos" title="4 Quesos" id="wows0_4"/></li>
		<li><img src="data0/images/descarga_5.jpg" alt="Frutos Secos" title="Frutos frecos" id="wows0_5"/></a></li>
		<li><img src="data0/images/frutos_secos.jpg" alt="Carnes Frias" title="Carnes Frias" id="wows0_6"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="Hawaiana"><span><img src="data0/tooltips/descarga.jpg" alt="Hawaiana"/>1</span></a>
		<a href="#" title="brava"><span><img src="data0/tooltips/brava.jpg" alt="brava"/>2</span></a>
		<a href="#" title="Mexicana"><span><img src="data0/tooltips/descarga_2.jpg" alt="Mexicana"/>3</span></a>
		<a href="#" title="Pepperonni"><span><img src="data0/tooltips/descarga_3.jpg" alt="Pepperonni"/>4</span></a>
		<a href="#" title="4 Quesos"><span><img src="data0/tooltips/descarga_4.jpg" alt="4 Quesos"/>5</span></a>
		<a href="#" title="Frutos frecos"><span><img src="data0/tooltips/descarga_5.jpg" alt="Frutos frecos"/>6</span></a>
		<a href="#" title="Carnes Frias"><span><img src="data0/tooltips/frutos_secos.jpg" alt="Carnes Frias"/>7</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">bootstrap carousel</a> by WOWSlider.com v8.7</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine0/wowslider.js"></script>
<script type="text/javascript" src="engine0/script.js"></script>
<!-- End WOWSlider.com BODY section -->

<center>
<a class="btn-pedir" href="#" role="button">Pedir</a>
</center>

			<br>
			<br>

			<br>
			<br>

			<br>
			<br>


<center>
		<h3>Ingredientes</h3>
		<hr>
</center>


<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><img src="data1/images/chedar.jpg" alt="Chedar" title="Chedar" id="wows1_0"/></li>
		<li><img src="data1/images/chorizo.jpg" alt="Chorizo" title="Chorizo" id="wows1_1"/></li>
		<li><img src="data1/images/crema.jpg" alt="Queso crema" title="Queso crema" id="wows1_2"/></li>
		<li><img src="data1/images/jamon.jpg" alt="Jamon" title="Jamon" id="wows1_3"/></li>
		<li><img src="data1/images/manzana.jpg" alt="Manzana" title="Manzana" id="wows1_4"/></li>
		<li><img src="data1/images/molida.jpg" alt="Carne Molida" title="Carne Molida" id="wows1_5"/></li>
		<li><img src="data1/images/mozaa.jpg" alt="Queso mozzarella" title="Queso mozzarella" id="wows1_6"/></li>
		<li><img src="data1/images/parme.jpg" alt="Queso parmesano" title="Queso parmesano" id="wows1_7"/></li>
		<li><img src="data1/images/pepe.jpg" alt="Pepperonni" title="Pepperonni" id="wows1_8"/></li>
		<li><img src="data1/images/picante.jpg" alt="Picante" title="Picante" id="wows1_9"/></li>
		<li><img src="data1/images/pia.jpg" alt="Piña" title="Piña" id="wows1_10"/></li>
		<li><img src="data1/images/pollo.jpg" alt="Pollo" title="Pollo" id="wows1_11"/></li>
		<li><img src="data1/images/salchicha.jpg" alt="Salchicha" title="Salchicha" id="wows1_12"/></li>
		<li><img src="data1/images/salsa.jpg" alt="Salsa brava" title="Salsa brava" id="wows1_13"/></li>
		<li><img src="data1/images/uva.jpg" alt="Uva" title="Uva" id="wows1_14"/></li>
		<li><img src="data1/images/aceitunas.jpg" alt="Aceitunas" title="Aceitunas" id="wows1_15"/></li>
		<li><img src="data1/images/almejas.jpg" alt="Almejas" title="Almejas" id="wows1_16"/></li>
		<li><img src="data1/images/arandano.jpg" alt="Arandano" title="Arandano" id="wows1_17"/></li>
		<li><a href="http://wowslider.com/vi"><img src="data1/images/cebolla.jpg" alt="bootstrap carousel" title="Cebolla" id="wows1_18"/></a></li>
		<li><img src="data1/images/champ.jpg" alt="Champiñones" title="Champiñones" id="wows1_19"/></li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="Chedar"><span><img src="data1/tooltips/chedar.jpg" alt="Chedar"/>1</span></a>
		<a href="#" title="Chorizo"><span><img src="data1/tooltips/chorizo.jpg" alt="Chorizo"/>2</span></a>
		<a href="#" title="Queso crema"><span><img src="data1/tooltips/crema.jpg" alt="Queso crema"/>3</span></a>
		<a href="#" title="Jamon"><span><img src="data1/tooltips/jamon.jpg" alt="Jamon"/>4</span></a>
		<a href="#" title="Manzana"><span><img src="data1/tooltips/manzana.jpg" alt="Manzana"/>5</span></a>
		<a href="#" title="Carne Molida"><span><img src="data1/tooltips/molida.jpg" alt="Carne Molida"/>6</span></a>
		<a href="#" title="Queso mozzarella"><span><img src="data1/tooltips/mozaa.jpg" alt="Queso mozzarella"/>7</span></a>
		<a href="#" title="Queso parmesano"><span><img src="data1/tooltips/parme.jpg" alt="Queso parmesano"/>8</span></a>
		<a href="#" title="Pepperonni"><span><img src="data1/tooltips/pepe.jpg" alt="Pepperonni"/>9</span></a>
		<a href="#" title="Picante"><span><img src="data1/tooltips/picante.jpg" alt="Picante"/>10</span></a>
		<a href="#" title="Piña"><span><img src="data1/tooltips/pia.jpg" alt="Piña"/>11</span></a>
		
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">http://wowslider.com/</a> by WOWSlider.com v8.7</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

<center>
<a class="btn-pedir" href="#" role="button">Arma tu Pedido</a>
</center>





<br>
			<br>

			<br>
			<br>

			<br>
			<br>





			


			

			
			
		</main>
			<div class="footer ">
				&copy; Sindral Software 2016
			</div>

		
	</body>


</html>
