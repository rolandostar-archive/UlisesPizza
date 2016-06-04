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
    <main class="container-narrow">

        <!-- Formulario General para la Página -->
        <form id="checkout" name="formulario" action="pago/checkoutAgregar.php" method=POST>

            <!-- Datos de Entrega -->
            <h3 class="header-secciones">Datos de Entrega</h3><hr>
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
                        <input type="text" name="apellido" value="'.$row['apellido'].'" required>
                        <br><br>
                        <label>Teléfono:</label>
                        <input type="text" name="telefono" value="'.$row['telefono'].'" required>
                        <br><br>
                        <label>Correo Electrónico:</label>
                        <input type="text" name="correo" value="'.$row['correo'].'" required>
                        ';
                        ?>
                        <br>
                    </div>
                </div>
            </div>

            <!-- Direccion de Entrega -->
            <h3 class="header-secciones">Direccion de Entrega</h3><hr>

            <div class="content-div">
                <div class="direccion-left">
                    <p>Introduce la dirección completa de entrega:</p>
                    <textarea class="text-area" name="direccion" id="addrArea" required></textarea>
                    <br><br>
                    <input type="submit" value="Actualizar Mapa" id="search" onclick="return false;"/>
                </div>
                <div class="direccion-right">
                    <div id='map_canvas' style="width:530px; height:200px;"></div>
                </div>
            </div>

            <h3 class="header-secciones">Comentarios</h3><hr>
            <div class="container-narrow comments">
                <textarea rows="6" cols="80" name="comment"></textarea>
                <br>
                <p>Sabor de tus refrescos, Catsup/Salsa Extra, etc...</p>
            </div>

            <!-- Forma de Pago -->
            <h3 class="header-secciones">Forma de Pago</h3><hr>
            <div style="margin: 30px 25%;">
                <i class="fa fa-money" style="font-size:28px;"></i>
                <input type="radio" name="pago" value=0 checked>
                Efectivo (Pago a la entrega)<br><br>
                <i class="fa fa-credit-card" style="font-size:28px;"></i>
                <input type="radio" name="pago" value=1> 
                Tarjeta de Crécito (Pago a la entrega)<br><br>
                <i class="fa fa-cc-paypal" style="font-size:24px;"></i>
                <input type="radio" name="pago" value=2> 
                Paypal (Proceder a pantalla de pago)<br><br>
            </div>
            <input type="hidden" name="addr1">
            <input type="hidden" name="city">
            <input type="hidden" name="state">
            <input type="hidden" name="post">
            <input type="hidden" name="country">
        </form>
        <div class="submit-checkout">
            <button class="btn" id="myBtn" onclick="return false;">Confirmar</button>
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
                  <label>Comentario:</label><br><br>
                  <b><label>Forma de Pago:</label></b>
              </div>
              <div class="finalizar-right">
                  <label name="confirmar">Introduce tu nombre</label><br><br>
                  <label name="confirmar">Introduce tu apellido</label><br><br>
                  <label name="confirmar">Introduce un teléfono</label><br><br>
                  <label name="confirmar">Introduce un correo electrónico</label><br><br>
                  <label name="confirmar">Introduce una dirección de entrega</label><br><br>
                  <label name="confirmar">Ningun Comentario</label><br><br>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCLdTxC6rEdV5tt8qoEJnfV_JfhJgaDXwo"></script>
<script>



/*
google.maps.event.addListener(map, "click", function () {
    var lat = map.data.map.center.lat();
    var lng = map.data.map.center.lng();
});

*/


    var modal = document.getElementById('myModal');
    var form = document.getElementById("checkout");
    var label = document.getElementsByName("confirmar");
    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker();

    $(document).ready(function(){
        initialize();
    });

    document.getElementById("ordenar").onclick = function() {
        document.forms["formulario"].submit();
    }

    // When the user clicks the button, open the modal 
    document.getElementById("myBtn").onclick = function() {
        array = ["nombre","apellido","telefono","correo","direccion","comment"];
        for(i=0;i<5;i++){
            if(form.elements[array[i]].value) label[i].innerHTML = form.elements[array[i]].value;
            else {
                alert("Campo "+array[i]+" no puede estar vacio.");
                return false;
            }
        }
        if(form.elements[array[5]].value) label[5].innerHTML = form.elements[array[5]].value; // Comentarios
            switch(form.elements["pago"].value){
                case "0": label[6].innerHTML = "Efectivo"; break;
                case "1": label[6].innerHTML = "Credito"; break;
                case "2": label[6].innerHTML = "Paypal - Sera Redirigido"; break;
            }
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

    $("#search").click(function(){
        // Obtenemos la dirección y la asignamos a una variable
        var address = $('#addrArea').val();
        if(!address){
            alert("Introduce una direccion!");
            return false;
        }
        // Creamos el Objeto Geocoder
        var geocoder = new google.maps.Geocoder();
        // Hacemos la petición indicando la dirección e invocamos la función
        // geocodeResult enviando todo el resultado obtenido
        geocoder.geocode({ 'address': address}, geocodeResult);
    });

    function closeInfoWindow() {
        infowindow.close();
    }

    function initialize() {
        geocoder = new google.maps.Geocoder();
        var mapLatlng = new google.maps.LatLng(19.5051858,-99.1480365);
        var mapOptions = {
        zoom: 8,
        center: mapLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map($("#map_canvas").get(0), mapOptions);

    google.maps.event.addListener(map, 'click', function(){
        closeInfoWindow();
        });
    }


    function codeLatLng(x,y) {
        var lat = parseFloat(x);
        var lng = parseFloat(y);
        var latlng = new google.maps.LatLng(lat, lng);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
      geocoder.geocode({'latLng': latlng}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            map.fitBounds(results[0].geometry.viewport);
                    marker.setMap(map);
                    marker.setPosition(latlng);
            console.log(results);
            form.elements["addr1"].value = results[0].address_components[1].short_name+" "+results[0].address_components[0].short_name+", "+results[0].address_components[2].short_name;
            form.elements["state"].value = results[0].address_components[5].short_name;
            form.elements["city"].value = results[0].address_components[3].short_name;
            form.elements["post"].value = results[0].address_components[7].short_name;
            form.elements["country"].value = results[0].address_components[6].short_name;
            $('#addrArea').val(results[0].formatted_address);
          } else {
            alert('No results found');
          }
        } else {
          alert('Geocoder failed due to: ' + status);
        }
      });
    }

    function geocodeResult(results, status) {
        // Verificamos el estatus
        if (status == 'OK') {
            // Si hay resultados encontrados, centramos y repintamos el mapa
            // esto para eliminar cualquier pin antes puesto
            var mapOptions = {
                center: results[0].geometry.location,
                mapTypeId: google.maps.MapTypeId.ROADMAP

            };
            codeLatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng());
        } else {
            // En caso de no haber resultados o que haya ocurrido un error
            // lanzamos un mensaje con el error
            alert("Geocoding no tuvo éxito debido a: " + status);
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