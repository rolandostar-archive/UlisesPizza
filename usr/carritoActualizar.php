<?php
    require("carrito.class.php");
    session_start();
    $c = unserialize($_SESSION['carrito']); //mapeamos carrito a $c
    if($_POST["cant"] == 0){
        $c->remove($_POST["index"]);
    }else{
        $c->update($_POST["index"],$_POST["cant"]);
    }
    $_SESSION["carrito"] = serialize($c);
    echo '<script> window.location="carrito.php"; </script>';
?>