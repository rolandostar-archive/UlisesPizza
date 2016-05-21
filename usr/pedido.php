<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Little Ulises Pizza&trade; - Pedido</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="shortcut icon" href="/favicon.ico">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="/css/styles.css">

        <!-- Estilos agregados --> 
		<style type="text/css">
        
            .content-pedido {
                flex: 1;
            }
            
            .header-pedido {
                text-align: center;
                margin: 0;
            }
            
            .header-secciones {
                text-align: center;
                padding-top: 1.5em;
            }
            
            .content-div {
                width: 100%;
                display: flex;
            }
            
            .tamaño-left {
                flex: 1;
                width: 50%;
                min-width: 20em;
                padding-left: 5em;
                margin-right: 5em;
                text-align: right;
            }
            
            .tamaño-right {
                flex: 1;
                width: 50%;
                min-width: 10em;
                padding-right: 5em;
                margin-left: 5em;
                text-align: left;
            }
            
            .base-left {
                flex: 1;
                width: 60%;
                min-width: 20em;
                margin-right: 5em;
                text-align: right;
            }
            
            .base-right {
                flex: 1;
                width: 10em;
                min-width: 10em;
                padding-right: 5em;
                margin-left: 5em;
                text-align: left;
            }
            
            .extras-left {
                flex: 1;
                width: 30%;
                min-width: 10em;
                padding-left: 5em;
                margin-right: 2.5em;
                text-align: right;
            }
            
            .extras-center {
                flex: 1;
                width: 30%;
                min-width: 10em;
                padding left: 0;
                padding-right: 0;
                text-align: center;
            }
            
            .extras-right {
                flex: 1;
                width: 30%;
                min-width: 10em;
                padding-right: 5em;
                margin-left: 2.5em;
                text-align: left;
            }
            
            .content-div-finalizar {
                width: 100%;
                padding-bottom: 2em;
                display: flex;
            }
            
            .finalizar-left{
                flex: 1;
                width: 60%;
                min-width: 20em;
                padding-left: 5em;
                margin-right: 1.25em;
                text-align: right;
            }
            
            .finalizar-right{
                flex: 1;
                width: 10em;
                min-width: 10em;
                padding-right: 5em;
                margin-left: 1.25em;
                text-align: left;
            }
            
            .submit-pedido {
                width: 100%;
                margin-bottom: 2em;
                text-align: center;
            }
            
            .submit-pedido input{
                width: 10em;
                height: 2em;
            }

		</style>

	</head>

	<body>
        
		<header>
			<div class="nav-bar">
				<div class="container">
					<ul class="nav">
						<li><a href="/usr/resumen.php">¡Hola Ulises!</a></li>
						<li><a href="/">Inicio</a></li>
						<li><a href="/">Carrito</a></li>
						<li><a href="/">Logout</a></li>
					</ul>
				</div>
			</div>
		</header>
        
		<main class="content-pedido">
            <div class="header">
                <h2 class=header-pedido>¡Arma tu Pizza!</h2>
            </div>
            
            <!-- Formulario General para la Página -->
            <form>
                
                <!-- Sección Tamaño -->
                <h3 class="header-secciones">Tamaño</h3><hr>      
                <div class="content-div">
                    <div class="tamaño-left">
                        <label>Tamaño:</label>
                        <select name="tamaño">
                            <option value="personal">Personal</option>
                            <option value="mediana">Mediana</option>
                            <option value="familiar">Familiar</option>
                        </select>
                    </div>
                    <div class="tamaño-right">
                        <label>Tipo de Masa:</label>
                        <select name="tipo-masa">
                            <option value="harina-trigo">Harina de Trigo</option>
                            <option value="harina-sal">Harina sin Sal</option>
                            <option value="piedra">A la Piedra</option>
                            <option value="dulce">Masa Dulce</option>
                            <option value="crunch">Crunch</option>
                        </select>
                    </div>
                </div>
                
                <!-- Sección Base -->
                <h3 class="header-secciones">Elige una base para tu pizza</h3><hr>
                <div class="content-div">
                    <div class="base-left">
                        <input type="radio" name="base" value="pepperoni">Pepperoni<br>
                        <input type="radio" name="base" value="hawaiiana" checked>Hawaiiana<br>
                        <input type="radio" name="base" value="mexicana">Mexicana<br>
                        <input type="radio" name="base" value="americana">Americana<br>
                        <input type="radio" name="base" value="vegana">Vegana<br>
                        <input type="radio" name="base" value="le-pizza">Le Pizza 
                    </div>
                        
                    <div class="base-right">
                        <i>Aquí se introducirá la descripción de la pizza seleccionada por el usuario</i>
                    </div>
                </div>
                                
                <!-- Sección Extras -->
                <h3 class="header-secciones">¿Deseas añadir ingredientes?</h3><hr>
                
                <div class="content-div">
                    <div class="extras-left">
                        <label>Básicos:</label><br/><br/>
                        <input type="checkbox" name="ingrediente" value="jamon" checked> Jamón<br>
                        <input type="checkbox" name="ingrediente" value="salami"> Salami<br>
                        <input type="checkbox" name="ingrediente" value="piña" checked> Piña<br>
                        <input type="checkbox" name="ingrediente" value="pepperoni"> Pepperoni<br>
                        <input type="checkbox" name="ingrediente" value="salsa" checked> Salsa<br>
                        <input type="checkbox" name="ingrediente" value="piña-roja"> Piña Roja<br>
                    </div>
                    
                    <div class="extras-center">
                        <label>Especiales:</label><br/><br/> 
                        <!-- Falta definir cuáles son los ingredientes especiales y cuántos tendremos -->
                        <input type="checkbox" name="ingrediente" value="especial-1"> Especial 1<br>
                        <input type="checkbox" name="ingrediente" value="especial-2"> Especial 2<br>
                        <input type="checkbox" name="ingrediente" value="especial-3"> Especial 3<br>
                        <input type="checkbox" name="ingrediente" value="especial-4"> Especial 4<br>
                        <input type="checkbox" name="ingrediente" value="especial-5"> Especial 5<br>
                        <input type="checkbox" name="ingrediente" value="especial-6"> Especial 6<br>
                    </div>
                    
                    <div class="extras-right">
                          <label>Extravagantes:</label><br/><br/>
                        <input type="checkbox" name="ingrediente" value="chocolate"> Chocolate<br>
                        <input type="checkbox" name="ingrediente" value="durazno"> Durazno<br>
                        <input type="checkbox" name="ingrediente" value="especias"> Especias<br>
                        <input type="checkbox" name="ingrediente" value="chicle"> Chicle<br>
                        <input type="checkbox" name="ingrediente" value="rockaleta"> Rockaleta<br>
                        <input type="checkbox" name="ingrediente" value="habanero"> Habanero<br>
                    </div>
                </div>
                
                <!-- Sección Finalizar -->
                <h3 class="header-secciones">Confirmación de Orden</h3><hr>
                <div class="content-div-finalizar">
                    <div class="finalizar-left">
                        <label>Pizza:</label><br><br>
                        <label>Tamaño:</label><br><br>
                        <label>Tipo de Masa:</label><br><br>
                        <label>Cantidad:</label><br><br>
                        <label>Extras:</label><br><br>
                        <b><label>Precio Total:</label></b>
                    </div>
                    <div class="finalizar-right">
                        <label>Hawaiiana</label><br><br>
                        <label>Personal</label><br><br>
                        <label>Harina de Trigo</label><br><br>
                        <label>2</label><br><br>
                        <label>Especial 1, Especial 3, Habanero</label><br><br>
                        <b><label>$ 299</label></b>
                    </div>
                </div>
                <div class="submit-pedido">
                    <input type="submit" value="Añadir Pedido">
                </div>
                
            </form>
		</main>
		<div class="footer">
			&copy; Sindral Software 2016
		</div>
	</body>
</html>
