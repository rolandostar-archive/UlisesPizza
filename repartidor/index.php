<?php 
    require_once('db.class.php');
    $db = new database();
    session_start();
    if(isset($_SESSION['cargo'])){ 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title> Repartidor - Little Ulises Pizza&trade;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="stylesheet" href="css/repartidor.css">
    
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script>
        $(function () {
          $("[data-role=panel]").enhanceWithin().panel();
        });
    </script>
</head>
    
<body>

<!--------------------------------------- PANEL LATERAL ----------------------------------------->
      <div data-role="panel" id="myPanel" data-display="overlay" data-theme="a"> 
        <div class="panel-separador"></div>
        <a href="/empleado/logout.php" data-role="button" data-icon="bars" data-iconpos="notext" data-theme="a" data-inline="true" class="ui-btn ui-shadow ui-corner-all entrega" role="button">Cerrar Sesión</a>
      </div> 

<!-------------------------------------- PANTALLA INICIAL --------------------------------------->
    
    <!----------- Top Menu ----------->
    <div data-role="page" id="pageone">   
      <div data-role="header" class="header">
          <a href="#myPanel" data-role="button" data-icon="bars" data-iconpos="notext" data-theme="a" data-inline="true" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-shadow ui-corner-all ui-btn-b" role="button">Panel</a>
          <p>¡Bienvenido <?php echo $_SESSION["nombre"];?>!</p>
      </div>
        
      <!-------------- Contenido  ------------>
      <div data-role="main" class="ui-content">
        <div class="inicial-separador"></div>
        <a href="#pagetwo" data-role="button" data-icon="bars" data-iconpos="notext" data-theme="a" data-inline="true" class="ui-btn ui-shadow ui-corner-all entrega" role="button">Comenzar a Entregar</a>
        <p class="aviso">¡Espera indicaciones y presiona actualizar antes de comenzar a entregar!</p>
        <div align="center">
            
            <!-- Botón de actualizar página -->  
            <script>
                document.write('<form><input type=button value="Actualizar" onClick="history.go()"></form>')
            </script>
        </div>
      </div>
        
    </div> 
    
<!-------------------------------------- PANTALLA PEDIDOS --------------------------------------->
    
    <!----------- Top Menu ----------->
    <div data-role="page" id="pagetwo">   
      <div data-role="header" class="header">
          <a href="#myPanel" data-role="button" data-icon="bars" data-iconpos="notext" data-theme="a" data-inline="true" class="ui-btn ui-icon-bars ui-btn-icon-notext ui-shadow ui-corner-all ui-btn-b" role="button">Panel</a>
          <p>¡Bienvenido <?php echo $_SESSION["nombre"];?>!</p>
      </div>

      <!-------------- Contenido  ------------>
      <div data-role="main" class="ui-content">    
        <?php
            $db -> query('SELECT p.descripcion, p.codigo, p.tiempoPedido, p.direccion, u.nombre, u.apellido, u.telefono FROM pedidos p, usuarios u WHERE p.id_usuario = u.id_user AND estado LIKE "2";');
            $result = $db->resultset();
            if (!empty($result)) {
        ?>
            <?php 
                foreach ($result as $index => $row) {
                    $phpdate = strtotime( $row['tiempoPedido'] );
                    echo'<div data-role="collapsible">';
                        echo "<h3>Código de Pedido: ".$row['codigo']."</h3>";
                        echo "<p>".$row['descripcion']."</p>";
                        echo "<p>".$row['codigo']."</p>";
                        echo "<p>".date('g:i A',$phpdate)."</p>";
                        echo "<p>".$row['direccion']."</p>";
                        echo "<p>".$row['nombre']." ".$row['apellido']."</p>";
                        echo "<p>".$row['telefono']."</p>";
                        echo "<br>";
                        echo'<a href="#pagetwo" data-role="button" data-icon="bars" data-iconpos="notext" data-theme="a" data-inline="true" class="ui-btn ui-shadow ui-corner-all entrega" style="font-size:0.6em;" role="button">Cómo llegar desde mi ubicación</a>';
                    echo'</div>';            
                }
            ?>
        <?php
        }else echo "No hay información para mostrar";
        ?>    
        <br>
        <a href="#pagetwo" data-role="button" data-icon="bars" data-iconpos="notext" data-theme="a" data-inline="true" class="ui-btn ui-shadow ui-corner-all entrega" style="font-size:0.8em;" role="button">Regresar a Sucursal</a>
        <br>
        <a href="#pageone">-Temporal- Regresar a pag 1</a>
      </div>    
    </div>
</body>
</html>
<?php
    }else{
      echo '<script> window.location="/empleado/login.php"; </script>';
    }
?>