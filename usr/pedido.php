<?php
//set_include_path(get_include_path() . PATH_SEPARATOR . ""php);
require_once('db.class.php');

$db = new database();

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
    <form action="carrito.php">
      <!-- Sección Tamaño -->
      <h3 class="header-secciones">Tamaño</h3><hr>      
      <div class="content-div">
        <div class="tamaño-left">
          <label>Tamaño:</label>
          <select name="tamaño">
            <option value="1">Personal</option>
            <option value="2">Mediana</option>
            <option value="3">Familiar</option>
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
          echo "<input type=\"radio\" name=\"base\" value=\"0\">Personalizada<br>\n\r";
          foreach ($result as $index => $row) {
            echo "\t\t\t<input type=\"radio\" name=\"base\" value=\"".++$index.'">'.$row['nombre']."<br>\r\n";
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
                echo "\t".'<td><input type="checkbox" name="ingrediente" value="'.($current+1).'">'.$result[$current]['nombre']." - <b>$".$result[$current]['precioUnit']."</b></td>\r\n";
            }
            echo "\t</tr>\r\n";
          }
          ?>
        </table>
      </div>

      <!-- Sección Finalizar -->
      <h3 class="header-secciones">Confirmación de Orden</h3><hr>
      <div class="content-div-finalizar">
        <div class="finalizar-left">
          <label>Pizza:</label><br><br>
          <label>Tamaño:</label><br><br>
          <label>Tipo de Masa:</label><br><br>
          <label>Extras:</label><br><br>
          <b><label>Precio Total:</label></b>
        </div>
        <div class="finalizar-right">
          <label>Hawaiiana</label><br><br>
          <label>Personal</label><br><br>
          <label>Harina de Trigo</label><br><br>
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

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 <script>
  <?php
  $db -> query('SELECT descripcion FROM especialidad');
  $result = $db->resultset();
  echo "var desc = [\"Personaliza tu pizza con los ingreidentes que quieras!\",";
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
