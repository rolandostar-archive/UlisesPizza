<?php
require_once('paypal-wps-config.inc.php'); // Configuracion
require_once "log.class.php"; //Para logging
require_once('PPCrypto.php'); //Seguridad de paypal

define("PAYPAL_GATEWAY","https://www.sandbox.paypal.com/cgi-bin/webscr"); // Dominio de testing
// Dominio REAL - NO USAR SI NO QUIERES USAR DINERO DE VERDAD - https://www.paypal.com/cgi-bin/webscr
$log = new PHPLogger;

class PayPalCartItem { //Un objeto del carrito
  var $item_name;
  var $amount = 0;
  var $item_number;
  var $quantity = 1;
  var $handling = 0;
  var $shipping = 0;
  var $tax = 0;
  var $weight = 0;
  var $weight_unit = 'kgs';
}

class PayPalWPS { //Website Payment Standard

  private $fields = array();
  private $cartItemsCount = 0;
  private $businessEmail; 
  private $gatewayUrl = PAYPAL_GATEWAY;  
  private $paypalCertificatePath = PAYPAL_GATEWAY;
  
  function __construct() {
    global $config, $log;
    
    $log->d("PayPalWPS: test mode enabled");
    $this->businessEmail = $config['test_business_email'];
    $this->paypalCertificatePath = $config['test_paypal_certificate_path'];    
    $log->d("PayPalWPS: Gateway url is " . $this->gatewayUrl);
    $log->d("PayPalWPS: Business email is " . $this->businessEmail);
    $log->d("PayPalWPS: PayPal public certificate path is " . $this->paypalCertificatePath);
  }
  
  //NO permite cmd, upload o business
  function addField($fieldName, $fieldValue) {
    if ($fieldName != "cmd" && $fieldName != "upload" && $fieldName != "business") {
      $this->fields["$fieldName"] = $fieldValue;
    }
  }
  
  function setInvoiceNumber($invoice) {
    $this->fields['invoice'] = $invoice;
  }
  
  //repetir para direccion
  function setCustomInfo($info) {
    $this->fields['custom'] = $info;
  }

  /*
    $this->fields['address_override'] = '1';
    $this->fields['first_name'] = 'John';
    $this->fields['last_name'] = 'Doe';
    $this->fields['address1'] = '345 Lark Ave';
    $this->fields['city'] = 'San Jose';
    $this->fields['state'] = 'CA';
    $this->fields['zip'] = '95121';
    $this->fields['country'] = 'US';
    $this->fields['no_note'] = '1';
  */
  
  function addCartItem(PayPalCartItem $cartItem) {
   
    $item_idx = ++$this->cartItemsCount;
		
		// required fields
		$this->fields["item_name_$item_idx"] = $cartItem->item_name;
		$this->fields["amount_$item_idx"] = $cartItem->amount;
		
		// optional fields
		if ('' != $cartItem->item_number) {
      $this->fields["item_number_$item_idx"] = $cartItem->item_number;
    }

    if (0 < $cartItem->quantity) {
      $this->fields["quantity_$item_idx"] = $cartItem->quantity;
    }

    if (0 < $cartItem->handling) {
      $this->fields["handling_$item_idx"] = $cartItem->handling;
    }
    
    if (0 < $cartItem->shipping) {
      $this->fields["shipping_$item_idx"] = $cartItem->shipping;
    }
    
    if (0 < $cartItem->tax) {
      $this->fields["tax_$item_idx"] = $cartItem->tax;
    }
    
    if (0 < $cartItem->weight) {
      $this->fields["weight_$item_idx"] = $cartItem->weight;
    }
    
    if ('' != $cartItem->weight_unit) {
      $this->fields["weight_unit_$item_idx"] = $cartItem->weight_unit;
    }
  }
  
	function processPayment() {
    global $config, $log;
    
    // default fields
    $this->fields['cmd'] = '_cart';
    $this->fields['upload'] = '1';
    $this->fields['business'] = $this->businessEmail;
    $this->fields['cert_id'] = $config['public_certificate_id'];

    $this->fields['currency_code'] = 'MXN'; //dinero dinero dinero
    
    $log->i("PayPal request fields: " . $this->getFieldsAsString());
    
    $encryptedDataReturn = self::encryptRequest($this->fields,
                                                $config['public_certificate_path'],
                                                $config['private_key_path'],
                                                $config['private_key_password'],
                                                $this->paypalCertificatePath);
    
    $encryptedData = "-----BEGIN PKCS7-----${encryptedDataReturn['encrypted_data']}-----END PKCS7-----";
    
    $encryptedRequest=<<<PPHTML
      <html>
        <header>
        </header>
            
        <body onload="document.getElementById('paypal_form').submit();">
          <br/><br/><br/><br/>
          <center>
            <h2>Please wait, your order is being processed and you
                will be redirected to the paypal website.
            </h2>
          </center>
          <form id="paypal_form" method="POST" action="$this->gatewayUrl">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="$encryptedData">
          </form>
        </body>
      </html>
PPHTML;

    echo $encryptedRequest;
    die();
  }
  
  private function getFieldsAsString() {
    $fields_string = '';
    
    foreach ($this->fields as $key => $value) {
      $fields_string .= "$key=$value,";
    }
    $fields_string = rtrim($fields_string, ",");
    
    return $fields_string;
  }
  
  /**
   * Encrypt request
   * 
   * @access private
   * @return array with status/encrypted_data on success or status/error_msg on failue
   */
  private static function encryptRequest($params,
                                         $publicCertPath,
                                         $privateKeyPath,
                                         $privateKeyPassword,
                                         $paypalCertPath) {
    global $log;
    
    //print_r(func_get_args());die();
    
    // check input files
    if (!realpath($publicCertPath)) {
      return array('status' => false, 'error_msg' => "invalid public certificate file: $publicCertPath");
    }
    
    if (!realpath($privateKeyPath)) {
      return array('status' => false, 'error_msg' => "invalid private key file: $privateKeyPath");
    }
    
    if (!realpath($paypalCertPath)) {
      return array('status' => false, 'error_msg' => "invalid paypal certificate file: $paypalCertPath");
    }
    
    // prepare request params for encryption (one key=value per line)
    $data = array();
		foreach ($params as $name => $value) {
			$data[] = "$name=$value";
		}
    $data = implode("\n", $data);
    
    // sign and encrypt
    $encryptedDataReturn = PPCrypto::signAndEncrypt($data, 
                                                    realpath($publicCertPath),
                                                    realpath($privateKeyPath),
                                                    $privateKeyPassword,
                                                    realpath($paypalCertPath));
		if (!$encryptedDataReturn['status']) {
      $log->e("Error encrypting request. error_msg=${encryptedDataReturn['error_msg']}");
      return array('status' => false, 'error_msg' => $encryptedDataReturn['error_msg']);
		}
    
    return array('status' => false, 'encrypted_data' => $encryptedDataReturn['encryptedData']);
  }
}

/**
 * Class to handle PayPal IPN confirmation
 * 
 */
class PayPalIPN {
  
  const SUCCESS = 0;                  // operation successful
  const COMMUNICATION_ERROR = 1;      // curl call failed
  const INVALID_IPN = 2;              // Invalid IPN response
  const INVALID_EMAIL_ADDRESS = 3;    // Invalid email address in IPN data
  
  private $businessEmail;
  var $ipn_data = array();
  
  // test mode disabled by default; real PayPal payment gateway is used
  private $gatewayUrl = PAYPAL_PAYMENT_GATEWAY_URL;
  
  function __construct() {
    global $config, $log;
    
    $test_mode = ($config['test_mode'] == true)?true:false;
    
    if ($test_mode == true) {
      $log->d("PayPalIPN: test mode enabled");
      
      $this->businessEmail = $config['test_business_email'];
      $this->gatewayUrl = PAYPAL_SANDBOX_PAYMENT_GATEWAY_URL;
    }
    else {
      $this->businessEmail = $config['business_email'];
      $this->gatewayUrl = PAYPAL_PAYMENT_GATEWAY_URL;
    }
    
    $log->d("PayPalIPN: Gateway url is " . $this->gatewayUrl);
    $log->d("PayPalIPN: Business email is " . $this->businessEmail);
  }
  
  /**
   * Process IPN confirmation
   * 
   * @access public
   * @return error code
   */
  function processConfirmation() {
    global $log;
    
    $result = self::SUCCESS;
    
    $fields_string = ''; // log fields without urlencoding
    $post_string = 'cmd=_notify-validate';
    
    if (function_exists('get_magic_quotes_gpc')) {
      $get_magic_quotes_exists = true;
    }
    
    // create the POST string to be send back to PayPal and load the IPN data
    foreach ($_POST as $key => $value) {
      $fields_string .= "$key=$value,";
      $this->ipn_data["$key"] = $value;
      
      if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
        $value = urlencode(stripslashes($value));
      }
      else {
        $value = urlencode($value);
      }
      $post_string .= "&$key=$value";
    }
    $fields_string = rtrim($fields_string, ",");
    
    $log->i("PayPal IPN confirmation fields: $fields_string");
    
    // execute the HTTPS post via CURL
    $ch = curl_init($this->gatewayUrl);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string); 
    
    $response_string = curl_exec($ch);

    if (curl_errno($ch)) {
      $log->e("Error sending IPN confirmation: " . curl_error($ch));
      $result = self::COMMUNICATION_ERROR;
    }
    else {
      $log->i("PayPal IPN confirmation response: $response_string");
      
      if (strcmp($response_string, "VERIFIED") == 0) {
        $log->i("IPN confirmation was successfully verified");
        
        // check if the business email address received is the correct one
        if ($this->businessEmail != $this->ipn_data['business']) {
          $log->e("Invalid email address received in IPN data");
          $result = self::INVALID_EMAIL_ADDRESS;
        }
      }
      else {
        $log->e("IPN confirmation verification failed");
        $result = self::INVALID_IPN;
      }
    }
    
    curl_close ($ch);
    
    return $result;
  }
}