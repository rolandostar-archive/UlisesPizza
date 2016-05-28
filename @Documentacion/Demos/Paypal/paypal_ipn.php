<?php
 
 require_once('paypal-wps.class.php');
 
 $ppIPN = new PayPalIPN();
 $result = $ppIPN->processConfirmation();
 
 if ($result != PayPalIPN::SUCCESS) {
     $wps_logger->logError("IPN confirmation failed");
     die();
 }
 
 $txn_id = $ppIPN->ipn_data['txn_id'];
 
 // check transaction having id=txn_id was already processed
 
 // get IPN data
 $status = $ppIPN->ipn_data['payment_status'];
 $total_amount = $ppIPN->ipn_data['mc_gross'];
 $fee = $ppIPN->ipn_data['mc_fee'];
 
 $email = $ppIPN->ipn_data['payer_email'];
 $phone = $ppIPN->ipn_data['contact_phone'];
 
 $fname = $ppIPN->ipn_data['first_name'];
 $lname = $ppIPN->ipn_data['last_name'];
 
 $fname = $ppIPN->ipn_data['address_name'];
 $street = $ppIPN->ipn_data['address_street'];
 $pcode = $ppIPN->ipn_data['address_zip'];
 $city = $ppIPN->ipn_data['address_city'];
 $state = $ppIPN->ipn_data['address_state'];
 $country = $ppIPN->ipn_data['address_country_code'];
 
 $shipping_cost = $ppIPN->ipn_data['mc_shipping'];
 $shipping_method = $ppIPN->ipn_data['shipping_method'];
 
 // update your order in database

 
 if ('Completed' == $status) {
     // send confirmation email
     
 }
 else {
     $wps_logger->logWarn("Order with txn_id=$txn_id is not completed. Status is $status.");
 }
 
?>