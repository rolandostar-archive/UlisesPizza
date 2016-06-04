<?php 
require_once('db.class.php');
$db = new database();

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