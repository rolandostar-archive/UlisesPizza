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
            <form id="checkout" name="formulario" action="" method=POST>
                
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
                    <h2 class="header-checkout">Dirección de Entrega</h2>
                </div>

                <div class="content-div">
                    <div class="direccion-left">
                        <p>Introduce la dirección completa de entrega:</p>
                        <textarea class="text-area" name="direccion"></textarea>
                        <br><br>
                        <input type="submit" value="Actualizar Mapa" />
                    </div>
                    <div class="direccion-right">
                        <i>Aquí se colocará el mapa de ubicación de google maps</i>
                    </div>
                </div>

                <div class="header">
                    <h2 class="header-checkout">Comentarios</h2>
                </div>
                <div class="container-narrow comments">
                    <textarea rows="6" cols="80"></textarea>
                </div>

                <!-- Forma de Pago -->
                <div class="header">
                    <h2 class="header-checkout">Forma de Pago</h2>
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
                        </div>
                    </div>
                </div>
            </form>

            <div class="submit-checkout">
              <button class="btn" id="myBtn">Confirmar</button>
            </div>
            
            <!-- The Modal -->
            <div id="myModal" class="modal">

              <!-- Modal content -->
              <div class="modal-content">
                <span class="close">x</span>

                <!-- Confirmación de Información de Pago -->
                  <h3 class="header-secciones">Confirma tu Información</h3><hr>
                  <div class="content-div-finalizar">
                    <div class="finalizar-left">
                      <label>Nombre:</label><br><br>
                      <label>Apellido:</label><br><br>
                      <label>Teléfono:</label><br><br>
                      <label>Correo Electrónico:</label><br><br>
                      <label>Dirección de Entrega:</label><br><br>
                      <b><label>Forma de Pago:</label></b>
                    </div>
                    <div class="finalizar-right">
                      <label name="confirmar">Introduce tu nombre</label><br><br>
                      <label name="confirmar">Introduce tu apellido</label><br><br>
                      <label name="confirmar">Introduce un teléfono</label><br><br>
                      <label name="confirmar">Introduce un correo electrónico</label><br><br>
                      <label name="confirmar">Introduce una dirección de entrega</label><br><br>
                      <b><label name="confirmar">Elige una forma de pago</label></b>
                    </div>
                  </div>
                  <div class="submit-pedido">
                    <button class="btn" id="ordenar">Ordenar pedido</button>
                </div>
              </div>

            </div>    
        </main>
        <div class="footer">
            &copy; Sindral Software 2016
        </div>
    
<script>
    var modal = document.getElementById('myModal');
    var form = document.getElementById("checkout");
    var label = document.getElementsByName("confirmar");

    document.getElementById("ordenar").onclick = function() {
      document.forms["formulario"].submit();
    }

    // When the user clicks the button, open the modal 
    document.getElementById("myBtn").onclick = function() {
      label[0].innerHTML = form.elements["nombre"].value;
      label[1].innerHTML = form.elements["apellido"].value;
      label[2].innerHTML = form.elements["direccion"].value;
      label[3].innerHTML = form.elements["correo"].value;
      label[4].innerHTML = form.elements['direccion'].value;
      label[5].innerHTML = form.elements['pago'].value;
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    document.getElementsByClassName("close")[0].onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
</body>
</html>

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>