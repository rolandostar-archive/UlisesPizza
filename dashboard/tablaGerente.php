
                     <?php 
                     if(!isset($_POST["id"]))
                     	echo "puto";
 					  $id = $_POST["id"];
                     $db -> query('SELECT sucursales.id_sucursal, codigo, tiempoPedido, tiempoEntrega, empleados.nombre, apellido, calificacion, precio, estado FROM pedidos, empleados, sucursales WHERE pedidos.id_empleado = empleados.id_empleado AND empleados.id_sucursal = sucursales.id_sucursal AND sucursales.id_sucursal='.$id.' ORDER BY tiempoPedido DESC;');
                     $result = $db->resultset();

                     if (!empty($result)) {
                     ?>
 
                         <table class="tabla-gerente">
 
                             <thead>
                                 <tr>
                                     <th>Fecha</th>
                                     <th>Codigo</th>
                                     <th>Tiempo Pedido</th>
                                     <th>Tiempo Entrega</th>
                                     <th>Empleado</th>
                                     <th>Calificación</th>
                                     <th>Precio</th>
                                     <th>Estado</th>
                                 </tr>
                             </thead>
 
                             <tbody>
                                 <?php 
                                     foreach ($result as $index => $row) {
                                         $phpdate = strtotime( $row['tiempoPedido'] );
                                         $entrega = strtotime( $row['tiempoEntrega'] );
                                         echo "<tr>";
                                             echo "<td>".date('d/m/Y',$phpdate )."</td>";
                                             echo "<td>".$row['codigo']."</td>";
                                             echo "<td>".date('g:i A',$phpdate)."</td>";
                                             echo "<td>".date('g:i A',$entrega)."</td>";
                                             echo "<td>".$row['nombre']." ".$row['apellido']."</td>";
                                             echo "<td>".$row['calificacion']."</td>";
                                             echo "<td>$ ".$row['precio']."</td>";
                                             switch ($row['estado']) {
                                                 case '0': echo "<td> Pendiente </td>"; break;
                                                 case '1': echo "<td> Cocinando </td>"; break;
                                                 case '2': echo "<td> En Camino </td>"; break;
                                                 case '3': echo "<td> Entregada </td>"; break;
                                             }
                                         echo "</tr>";
                                     }
                                 ?>  
                             </tbody>
                         </table>
                     <?php
                     }else echo "Aún no hay información de pedidos para mostrar";
                     ?>
