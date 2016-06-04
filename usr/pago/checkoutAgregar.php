<?php
    session_start();
    require("db.class.php");
    require_once('carrito.class.php');
    require_once('paypal-wps.class.php');
    $db = new database();
    $c = unserialize($_SESSION['carrito']);
    if($_POST["pago"] == 2){//Metodo Paypal
        $db -> query('SELECT MAX(id_pedido) FROM pedidos');
        $row = $db->single();
        $ppWPS = new PayPalWPS();
        $num = $row["MAX(id_pedido)"]+1;
        $ppWPS->setInvoiceNumber($num);
        $ppWPS->setAddress($_POST["addr1"],NULL,$_POST["state"],$_POST["city"],$_POST["post"],$_POST["country"]);
        $ppWPS->setContact($_POST["nombre"],$_POST["apellido"]);
        //$ppWPS->setCustomInfo(<your_custom_info>); // optional

        $cart = $c->returnProductArray();
        foreach ($cart as $index=>$item) {
              $ppCartItem = new PayPalCartItem();
              $ppCartItem->item_name = $cart[$index][0];
              $ppCartItem->amount = $cart[$index][2];
              //$ppCartItem->item_number = <your_internal_item_id>; // optional
              $ppCartItem->quantity = $cart[$index][1];
         
              $ppWPS->addCartItem($ppCartItem);
        }
         
        $ppWPS->processPayment();
    }else{
        echo "Agregando pedido a BD...";
    }
?>