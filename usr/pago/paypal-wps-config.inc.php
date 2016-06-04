<?php
  /**
   *  PayPal business email account
   *
   *  @var string
   */
  $config['business_email'] = "your PayPal business email account";
  
  /**
   *  PayPal business test email account used with PayPal sandbox
   *
   *  @var string
   */
  $config['test_business_email'] = "negocio@ulisespizza.xyz";
  
  /**
   *  Public certificate path (relative to calling file location or absolute path)
   *
   *  @var string
   */
  $config['public_certificate_path'] = 'cert/f82b1e046c87cdc2114862d689413a1a-pubcert.pem';
  
  /**
   *  Public certificate id
   *
   *  @var string
   */
  //$config['public_certificate_id'] = ''; // used for testing with PayPal sandbox
  $config['public_certificate_id'] = '7MZJ934J6PGVJ';
  
  /**
   *  Private key path (relative to calling file location or absolute path)
   *
   *  @var string
   */
  $config['private_key_path'] = 'cert/f82b1e046c87cdc2114862d689413a1a-prvkey.pem';
  
  /**
   *  Private key password
   *
   *  @var string
   */
  $config['private_key_password'] = ''; // must match the one you set when you created the private key
  
  /**
   *  PayPal public certificate path (relative to calling file location or absolute path)
   *
   *  @var string
   */
  $config['paypal_certificate_path'] = 'cert/paypal_cert.pem';
  
  /**
   *  PayPal public certificate path used with PayPal sandbox (relative to calling file location or absolute path)
   *
   *  @var string
   */
  $config['test_paypal_certificate_path'] = 'cert/paypal_cert.pem';
  
  /**
   *  Enable logging of payment requests and IPN confirmations
   *  Loggin is done using KLogger class: http://codefury.net/projects/klogger/
   *
   *  @var boolean
   */
  $config['log_enabled'] = true;
  
  /**
   *  Defines log level
   *  EMERG = 0, ALERT = 1, CRIT = 2, ERR = 3, WARN = 4, NOTICE = 5, INFO = 6, DEBUG = 7, OFF = 8
   *
   *  @var int 
   */
  $config['log_level'] = 6;
  
  /**
   * PayPal log directory path  (relative to this file location or absolute path)
   * Default log directory is logs created in the same directory with the PayPalWPS class
   *
   *  @var string
   */
  $config['log_directory'] = 'logs';
  
  /**
   * Enable/disable test mode
   *
   *  @var boolean
   */
  $config['test_mode'] = true;
?>