<?php

require_once('carrito.class.php');
require_once('db.class.php');

session_start();
if(isset($_SESSION['email'])) {
        $ing = ""; $tm = "";
        $db = new database();
        $c = unserialize($_SESSION['carrito']); //mapeamos carrito a $c
        $precioCalc = 0;
        $aiuda = $_POST['ingrediente'];
    
        foreach($aiuda as $index => $row){
            $db -> query('SELECT * from ingrediente where id_ingrediente = :ing');
        	$db -> bind(':ing', $row);
			$row2 = $db->single(); //Solo va a ser uno
            $ing += $row2['nombre'];
            $ing += ", ";
			$precioCalc += $row2['precioUnit'];
        } $precioCalc += 20;
        switch($_POST['tamaño']){
		  case 0: $precioCalc += 30; $tm = "Personal"; break;
		  case 1: $precioCalc += 60; $tm = "Medina"; break;
		  case 2: $precioCalc += 90; $tm = "Familiar"; break;
		}
        //echo 'Precio Total: $'.$precioCalc.'<br/>';
        
        $d = "";
        switch($_POST["base"]){
            case 0: $d = "Personalizada con "; break;
            case 1: $d = "Mexicana"; break;
            case 2: $d = "Peperonni"; break;
            case 3: $d = "Hawaiiana"; break;
            case 4: $d = "Carnes Frias"; break;
            case 5: $d = "Cuatro Quesos"; break;
            case 6: $d = "Vegetariana"; break;
            case 7: $d = "Brava"; break;
            case 8: $d = "Frutos Frescos"; break;
        }
    
        $ti = "";
        switch($_POST["tipo-masa"]){
            case 0: $ti = "Harina de Trigo"; break;        
            case 1: $ti = "Harina sin Sal"; break;
            case 2: $ti = "A la piedra"; break;
            case 3: $ti = "Masa Dulce"; break;
            case 4: $ti = "Crunch"; break;
        }
    
        //if($_POST["base"] == 0) $d += $ing;
        
        $c->add("Base: ".$d.". Tamaño: ".$tm.". Tipo-Masa: ".$ti,1,$precioCalc);
        $_SESSION['carrito'] = serialize($c);
        echo '<script> window.location="carrito.php"; </script>';    
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>