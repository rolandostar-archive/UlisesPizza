<?php
//set_include_path(get_include_path() . PATH_SEPARATOR . ""php);
session_start();
require_once('db.class.php');

$db = new database();
//if(isset($_SESSION['user'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Little Ulises Pizza&trade; - Pedido</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="index, follow">

  <!-- CSS -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="stylesheet" href="/css/styles.css">
  <link rel="stylesheet" href="./css/pedido.css">
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
    <form id="pedido" name="formulario" action="carrito.php" method=POST>
      <!-- Sección Tamaño -->
      <h3 class="header-secciones">Tamaño</h3><hr>
      <div class="content-div">
      <img src="./img/size_chart.png" style="margin: 0 auto 30px auto;">
      </div>
      <div class="content-div">
        <div class="tamaño-left">
          <label>Tamaño:</label>
          <select name="tamaño">
            <option value="0">Personal</option>
            <option value="1">Mediana</option>
            <option value="2">Familiar</option>
          </select>
        </div>
        <div class="tamaño-right">
          <label>Tipo de Masa:</label>
          <select name="tipo-masa">
            <option value="0">Harina de Trigo</option>
            <option value="1">Harina sin Sal</option>
            <option value="2">A la Piedra</option>
            <option value="3">Masa Dulce</option>
            <option value="4">Crunch</option>
          </select>
        </div>
      </div>

      <!-- Sección Base -->
      <h3 class="header-secciones">Elige una base para tu pizza</h3><hr>
      <div class="content-div">
        <div class="base-left">
          <?php
          $db -> query('SELECT nombre FROM especialidad');
          $result = $db->resultset();
          echo "<input type=\"radio\" name=\"base\" value=\"0\"><span>Personalizada</span><br>\n\r";
          foreach ($result as $index => $row) {
            echo "\t\t\t<input type=\"radio\" name=\"base\" value=\"".++$index.'"><span>'.$row['nombre']."</span><br>\r\n";
          }?>
        </div>
        <div class="base-right">
          <b id="base-desc">Selecciona una opcion</b>
        </div>
      </div>

      <!-- Sección Extras -->
      <h3 class="header-secciones">¿Deseas añadir ingredientes?</h3><hr>

      <div class="container-narrow">
        <table style="width:80%; text-align: left; margin-left: 20%;">
          <?php
          $db -> query('SELECT * FROM ingrediente');
          $result = $db->resultset();
          $count = count($result);
          $loop = ceil($count/3);

          for($i = 0;$i<$loop;$i++){
            echo "\t<tr>\r\n";
            for($j=0;$j<3;$j++){
              $current = $i+($j*$loop);
              if ($current < $count)
                echo "\t".'<td><input type="checkbox" name="ingrediente" value="'.($current+1).'"><span>'.$result[$current]['nombre']."</span> - $<span>".$result[$current]['precioUnit']."</span></td>\r\n";
            }
            echo "\t</tr>\r\n";
          }
          ?>
        </table>
      </div>

      
    </form>
    <hr>
    <div class="submit-pedido">
      <button class="btn" id="myBtn">Confirmar</button>
    </div>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">x</span>
    <!-- Sección Finalizar -->
      <h3 class="header-secciones">Confirmación de Orden</h3><hr>
      <div class="content-div-finalizar">
        <div class="finalizar-left">
          <label>Pizza:</label><br><br>
          <label>Tamaño:</label><br><br>
          <label>Tipo de Masa:</label><br><br>
          <label>Ingredientes:</label><br><br>
          <b><label>Precio Total:</label></b>
        </div>
        <div class="finalizar-right">
          <label name="confirmar">Selecciona una Base.</label><br><br>
          <label name="confirmar">Selecciona un Tamaño</label><br><br>
          <label name="confirmar">Selecciona un Tipo de Masa</label><br><br>
          <label name="confirmar">-</label><br><br>
          <b><label name="confirmar">$ -</label></b>
        </div>
      </div>
      <div class="submit-pedido" action="carrito.php">
      <button class="btn" id="carrito">Agregar al Carrito</button>
    </div>
  </div>

</div>

  </main>
  <div class="footer">
   &copy; Sindral Software 2016
 </div>

 <script>
var modal = document.getElementById('myModal');

var form = document.getElementById("pedido");
var label = document.getElementsByName("confirmar");

document.getElementById("carrito").onclick = function() {
  document.forms["formulario"].submit();
}

// When the user clicks the button, open the modal 
document.getElementById("myBtn").onclick = function() {
  label[0].innerHTML = form.elements['base'][form.elements['base'].value].nextSibling.innerHTML;
  label[1].innerHTML = form.elements['tamaño'].options[form.elements['tamaño'].selectedIndex].innerHTML;
  label[2].innerHTML = form.elements['tipo-masa'].options[form.elements['tipo-masa'].selectedIndex].innerHTML;
  var ingredientes = "";
  var precio = 0;
  for (var i in form.elements['ingrediente']) {
    if (form.elements['ingrediente'][i].checked){
      ingredientes += form.elements['ingrediente'][i].nextSibling.innerHTML+", ";
      precio += parseInt(form.elements['ingrediente'][i].nextSibling.nextSibling.nextSibling.innerHTML);
    }
  }
  switch(parseInt(form.elements['tamaño'].value)){
    case 0: precio += 30; console.log("case 0"); break;
    case 1: precio += 60; console.log("case 1"); break;
    case 2: precio += 90; console.log("case 2"); break;
  }
  label[3].innerHTML = ingredientes.substring(0,(ingredientes.length-2));
  label[4].innerHTML = "$"+(precio+20); //TODO: Falta agregar precio de tamaño
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 <script>
  <?php
  $db -> query('SELECT descripcion FROM especialidad');
  $result = $db->resultset();
  echo "var desc = [\"Personaliza tu pizza con los ingredientes que quieras!\",";
  foreach ($result as $index => $row) {
    echo '"'.$row['descripcion'].'"';
    if ($row !== end($result)) echo ",";
  }
  echo "];"
  ?>

  $(document).ready(function () {
    $("[name='base']").click(function(){
      document.getElementById("base-desc").innerHTML = desc[this.value];
      checkBoxes(this.value);
    });
    $("[name='ingrediente']").click(function(){
      if (form.elements['base'].value != 0)
      alert("Advertencia: Elejir un ingrediente extra cambiara el tipo de Pizza a PERSONALIZADA.");
      $("input:radio[value='0']").prop("checked", true);
    });
  });

  function clearBoxes(){
    $("input:checkbox[name='ingrediente']").prop("checked", false);
  }

  function checkBoxes(value){
    var relaciones = [[null],[<?php
      $db -> query('SELECT * FROM ingredientes_especialidad ORDER BY id_especialidad ASC');
      $result = $db->resultset();
      foreach ($result as $index => $row) {
        if ($index === 0) echo $row['id_ingrediente'];
        else if($previous != $row['id_especialidad']) echo "],[".$row['id_ingrediente'];
        else echo ",".$row['id_ingrediente'];
        $previous = $row['id_especialidad'];
      }
    ?>]];
    clearBoxes();
    relaciones[value].forEach(function(item,index){
      $("input:checkbox[value=\"" + item + "\"]").prop("checked", true);
    });
  }


</script>
</body>
</html>
