<?php

require_once('carrito.class.php');
require_once('db.class.php');

session_start();
if(isset($_SESSION['email'])) {
        print_r($_POST);
        $db = new database();
        $c = unserialize($_SESSION['carrito']); //mapeamos carrito a $c
        $precioCalc = 0;
            
    
        for($i=0; $i < count($_POST["ingrediente"]); $i++){
        	echo "ENTRÉ<br/>";
            $db -> query('SELECT precioUnit from ingrediente where nombre like :ing');
        	$db -> bind(':ing', $_POST['ingrediente'][$i]);
			$row = $db->single(); //Solo va a ser uno
			$precioCalc += $row['precioUnit'];
        }
        $precioCalc += 20;
        switch($_POST['tamaño']){
		  case 'Personal': $precioCalc += 30; break;
		  case 'Mediana': $precioCalc += 60; break;
		  case 'Grande': $precioCalc += 90; break;
		}
        echo 'El precio calculado de tu pizza es $'.$precioCalc.'<br/>';



        echo 'ESTA PAGINA ESTA AQUI PORQUE FALTA VALIDAR EL PRECIO DEL LADO SERVIDOR';


        $c->add("Base:".$_POST["base"]." Tamaño: ".$_POST["tamaño"]." Tipo-Masa: ".$_POST["tipo-masa"],1,120);
        $_SESSION['carrito'] = serialize($c);
        //echo '<script> window.location="carrito.php"; </script>';    
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>