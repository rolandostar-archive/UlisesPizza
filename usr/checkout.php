<?php
require("db.class.php");

session_start();
$title = "Little Ulises Pizza&trade; - Checkout";
$css = "./css/checkout.css";
if(isset($_SESSION['email'])) {
    $db = new database();?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once("header.php"); ?>        
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
        <?php
          $db -> query('SELECT * FROM usuarios WHERE correo=:correo AND nombre=:nombre');
          $db->bind(':correo', $_SESSION['email']);
          $db->bind(':nombre', $_SESSION['nombre']);
          $row = $db->single();
          echo '
            <input type="text" name="nombre" value="'.$row['nombre'].'">
            <br><br>
            <label>Apellido:</label>
            <input type="text" name="apellido" value="'.$row['apellido'].'">
            <br><br>
            <label>Teléfono:</label>
            <input type="text" name="telefono" value="'.$row['telefono'].'">
            <br><br>
            <label>Correo Electrónico:</label>
            <input type="text" name="correo" value="'.$row['correo'].'">
          ';
        ?>
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

                <!-- Comentarios -->
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

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>