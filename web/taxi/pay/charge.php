<?php
  require_once(dirname(__FILE__) . '/config.php');

  $payment   = $_POST['payment'];
  $accountno = $_POST['accountno'];
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

  $payment = $payment / 100;
  echo '<h1>Successfully charged &pound;' . $payment . '!</h1>';
  echo '<h2>We will send a confirmation email to account ' . $accountno . '</h2>';

?>