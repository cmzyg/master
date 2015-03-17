<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
ob_start();
session_start();
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/bookings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$bookings   = new Bookings($db);


// stripe
$stripe = array(
  "secret_key"      => "sk_test_IePQJycHdO4UYPQcbYBUGZHw",
  "publishable_key" => "pk_test_IxkiisgtI3dNUJ82Z0NxkRXK"
);

/*
$stripe = array(
  "secret_key"      => "sk_live_2Okha9ePcToCnMPJB2MKowJk",
  "publishable_key" => "pk_live_nBfTynYqWdMp1j9s2sBOwITe"
);
*/


Stripe::setApiKey($stripe['secret_key']);


$payment   = $_POST['total'] * 100;
$accountno = md5(rand(1, 300000));
$token     = $_POST['stripeToken'];

  $customer = Stripe_Customer::create(array(
      'email' => 'customer@example.com',
      'card'  => $token
  ));

  $charge = Stripe_Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $payment,
      'currency' => 'gbp'
  ));

$bookings->insertBooking();

?>