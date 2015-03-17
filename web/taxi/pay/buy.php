<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once('config.php');

// 200 = £2
$payment = '1000';
$accountno = '27287282';

?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-amount="<?php echo $payment; ?>" data-description="One year's subscription"></script>
  <input type="hidden" name="accountno" value="<?php echo $accountno; ?>" />
  <input type="hidden" name="payment" value="<?php echo $payment; ?>" />
</form>