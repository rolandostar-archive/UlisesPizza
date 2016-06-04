<?php

require_once('carrito.class.php');
require_once('db.class.php');

session_start();
if(isset($_SESSION['email'])) {
        print_r($_POST);
        $c = unserialize($_SESSION['carrito']); //mapeamos carrito a $c

        echo 'ESTA PAGINA ESTA AQUI PORQUE FALTA VALIDAR EL PRECIO DEL LADO SERVIDOR';


        $c->add("Base:".$_POST["base"]." Tamaño: ".$_POST["tamaño"]." Tipo-Masa: ".$_POST["tipo-masa"],1,120);
        $_SESSION['carrito'] = serialize($c);
        //echo '<script> window.location="carrito.php"; </script>';    
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>