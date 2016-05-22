<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Little Ulises Pizza&trade; - Checkout</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow">

		<!-- icons -->
		<link rel="shortcut icon" href="/favicon.ico">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="/css/styles.css">

        <!-- Estilos agregados --> 
		<style type="text/css">
            
           
            .header-checkout {
                text-align: center;
                margin: 0;
            }
            
            .content-div {
                width: 100%;
                padding: 3em 0em;
                display: flex;
            }
        
            
            .datos-entrega {
                width: 50%;
                min-width: 27em;
                margin-left: 10%;
            }
            
            .content-form {
                text-align: right;
                padding-right: 0.5em;
                margin: 0;
                flex: 1;

            }
            
            .content-form input {
                width: 20em;
            }

            .direccion-left {
                flex: 1;
                width: 50%;
                min-width: 20em;
                padding-left: 5em;
                margin-right: 5em;
                text-align: right;
            }
            
            .direccion-left p{
                padding-right: 0.5em;
            }
            
            .text-area {
                width: 22.75em;
                height: 5em;
            }
            
            .direccion-right {
                flex: 1;
                width: 50%;
                min-width: 10em;
                padding-right: 5em;
                margin-left: 5em;
                text-align: left;
            }
            
            .pago-left {
                width: 40%;
                min-width: 5em;
                margin-right: 0.5em;
            }
            
            .pago-right {
                flex: 1;
                width: 50%;
                min-width: 10em;
                text-align: left;
            }
            
            .forma-pago {
                text-align: left;
                width: 50%;
                min-width: 19em;
                flex: 1;
            }
            
            .submit-checkout {
                width: 22.25em;
                text-align: center;
            }

            .comments {
                padding: 10px auto;
                margin: 50px auto;
                text-align: center;
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
        
		<main>
            <!-- Formulario General para la Página -->
            <form>
                
                <!-- Datos de Entrega -->
                <div class="header">
                    <h2 class=header-checkout>Datos de Entrega</h2>
                </div>
                <div class="content-div">
                    <div class="datos-entrega">
                        <div class="content-form">
                            <label>Nombre:</label>
                            <input type="text" name="nombre">
                            <br><br>
                            <label>Apellido:</label>
                            <input type="text" name="apellido">
                            <br><br>
                            <label>Teléfono:</label>
                            <input type="text" name="telefono">
                            <br><br>
                            <label>Correo Electrónico:</label>
                            <input type="text" name="correo">
                            <br>
                        </div>
                    </div>
                </div>

                <!-- Direccion de Entrega -->
                <div class="header">
                    <h2 class=header-checkout>Dirección de Entrega</h2>
                </div>

                <div class="content-div">
                    <div class="direccion-left">
                        <p>Introduce la dirección completa de entrega:</p>
                        <textarea class="text-area"></textarea>
                        <br><br>
                        <input type="submit" value="Actualizar Mapa" />
                    </div>
                    <div class="direccion-right">
                        <i>Aquí se colocará el mapa de ubicación de google maps</i>
                    </div>
                </div>

                <div class="header">
                    <h2 class=header-checkout>Comentarios</h2>
                </div>
                <div class="container-narrow comments">
                    <textarea rows="6" cols="80"></textarea>
                </div>

                <!-- Forma de Pago -->
                <div class="header">
                    <h2 class=header-checkout>Forma de Pago</h2>
                </div>
                <div class="content-div">
                    <div class="pago-left"></div>
                    <div class="pago-right">
                        <div class="forma-pago">
                            <i class="fa fa-money" style="font-size:28px;"></i>
                            <input type="radio" name="pago" value="efectivo" checked>
                            Efectivo (Pago a la entrega)<br><br>
                            <i class="fa fa-credit-card" style="font-size:28px;"></i>
                            <input type="radio" name="pago" value="credito"> 
                            Tarjeta de Crécito (Pago a la entrega)<br><br>
                            <i class="fa fa-cc-paypal" style="font-size:24px;"></i>
                            <input type="radio" name="pago" value="paypal"> 
                            Paypal (Proceder a pantalla de pago)<br><br>
                            <div class="submit-checkout">
                            <input type="submit" value="Confirmar Pedido">
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
		</main>
		<div class="footer">
			&copy; Sindral Software 2016
		</div>
	</body>
</html>
