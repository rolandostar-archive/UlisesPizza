<?php
	session_start();
	$css = "/css/landing.css";
	$title = "Little Ulises Pizza&trade; - Inicio";
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once("header.php");?>
	<div class="banner">
		<img src="/img/Logo.png" class="img-responsive" width="600px" />
	</div>

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
		<!-- Choro -->
		<div class="container-narrow">
			<hr>
			<h3>Ingredientes de Alta calidad</h3>
			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.
				Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus
				lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor,
				facilisis luctus, metus</p>
				<hr>
				<h3>Una sucursal cerca de ti</h3>
				<p>You can make the list display inline using the <code>list-inline</code> class.</p>
				<ul class="list-inline">
					<li>One</li>
					<li>Two</li>
					<li>Three</li>
					<li>Four</li>
				</ul>
				<hr>

				<h3>Testimonios</h3>
				<p>The blockquote element is used to markup long quotations. Ideally, content inside should be wrapped in paragraph elements.</p>
				<blockquote>
					<p>Esta pizza es la pizza que mas fuertemente creo que posiblemente sea la figurativamente mejor pizza relativa a las demas. Literalmente.</p>
					<footer><a href="#">XxX_360NoScopeNinja_XxX</a></footer>
				</blockquote>
				<hr>
				<h3>Contactanos</h3>
				<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est.
					Mauris placerat eleifend leo.</p>
					<ending>
						&nbsp;
					</ending>
				</div>
			</main>
			<div class="footer ">
				&copy; Sindral Software 2016
			</div>
		</body>
		</html>
