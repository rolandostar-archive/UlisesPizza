<?php

/**

GET: http://localhost/claseTest/?username=Rolando


ARCHIVO EJEMPLO PARA USAR CLASE database()

Usuarios
+----+---------+--------------+----------+-----------------+
| ID | Nombre  | username     | password | correo          |
+----+---------+--------------+----------+-----------------+
| 0  | Rolando | rolandostar  | yoloo    | rolando@aol.net |
+----+---------+--------------+----------+-----------------+
| 1  | Ricardo | soyunmanco   | swagg    | manco@hi5.org   |
+----+---------+--------------+----------+-----------------+
| 2  | Miaw    | challenjer16 | mainzed  | faker@skt.com   |
+----+---------+--------------+----------+-----------------+
**/


require_once('db.class.php'); // Implementacion de la clase - Obligatorio

$db = new database(); // Crea nuevo objeto llamado $db a partir de la clase


/** SELECT RESULTADO UNICO **/

$db -> query('SELECT * FROM usuarios WHERE nombre=:nombre'); // Prepara Query con query()
$db->bind(':nombre', $_GET['username']); // Utiliza bind() para reemplazar :variables y evitar SQL Injection
$row = $db->single(); // Ejecuta Query con single() para regresar un resultado unico (O el primero en caso de ser varios)

echo "<pre>Unico:";
print_r($row); // Imprime Arreglo

/** Aqui tienes accesso a la fila usando
        $row['ID']
        $row['Nombre']
        .
        .
        .
        $row['COLUMNA']
**/

echo "</pre>";

/** SELECT VARIOS RESULTADOS **/

$db -> query('SELECT * FROM usuarios'); // Prepara Query con query()
$result = $db->resultset(); // Ejecuta Query con resultset() para regresar un conjunto de resultados

echo "<pre>Varios:";
print_r($result);
echo "</pre>Tabla:<table>";
foreach ($result as $index => $row) { 
        /** Esto se repite 1 vez por fila obtenida
            Aqui tienes acceso a row['COLUMNA'] donde columna son las columnas que pediste en el select
            row['columna'] te va a regresar el valor de la fila en esa columna de la iteracion $index
        **/
      echo '<td width="150" align=center>'. $index."=".$row['nombre'] . '</td>';
}
echo '</tr></table>';

/*** INSERTAR EN LA BASE DE DATOS 

$db->query('INSERT INTO usuarios VALUES (3, :fname, :user, :pass, :mail)');
$db->bind(':fname', 'Jorge');
$db->bind(':user', 'jacc0312');
$db->bind(':pass', 'chavacarreame');
$db->bind(':mail', 'bronza4laif@myspace.net');

$db->execute();

echo $db->lastInsertId(); // El ultimo ID insertado, no he hecho preubas con este. Probablemente lo quite.

***/




// Imagen de como se ve la salida: http://i.imgur.com/nOxOFgY.png

?>
