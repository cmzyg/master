<?php
require_once('stripe/lib/Stripe.php');

/*$stripe = array(
  "secret_key"      => "sk_test_IePQJycHdO4UYPQcbYBUGZHw",
  "publishable_key" => "pk_test_IxkiisgtI3dNUJ82Z0NxkRXK"
);*/


$stripe = array(
  "secret_key"      => "sk_live_4LJk5meAvDSZXGxPuITF7Cy3",
  "publishable_key" => "pk_live_4LJkaLvlSy1i8kAmz5pdWSdq"
);


Stripe::setApiKey($stripe['secret_key']);
?>