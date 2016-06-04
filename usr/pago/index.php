<?php
 
require_once('paypal-wps.class.php');
 
$ppWPS = new PayPalWPS();
$ppWPS->setInvoiceNumber(1569);
$ppWPS->setAddress("345 Lark Ave",NULL,"San Jose","CA","95121","US");
$ppWPS->setContact("John","Doe");
//$ppWPS->setCustomInfo(<your_custom_info>); // optional


$cart = array(
    array("Item 1",1,10), //Desc, Cant, Price
    array("Item 2",1,20),
    );


foreach ($cart as $index=>$item) {
      $ppCartItem = new PayPalCartItem();
 
      $ppCartItem->item_name = $cart[$index][0];
      $ppCartItem->amount = $cart[$index][2];
      //$ppCartItem->item_number = <your_internal_item_id>; // optional
      $ppCartItem->quantity = $cart[$index][1];
 
      $ppWPS->addCartItem($ppCartItem);
}
 
$ppWPS->processPayment();
 
?>