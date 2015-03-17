<?php
ob_start();
session_start();
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/bookings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$bookings   = new Bookings($db);

$database->select('SELECT * FROM payment_options');
$payments  = $database->fetch();
$fee       = $database->fetch();

$database->select('SELECT company_name FROM settings');
$site_info = $database->fetch();



// set up an account number
$accountno = md5(rand(1, 300000)) . rand(1, 400);


if($_POST['payment_method'] == 'book_pay_on_day')
{
  $payment                  = $_POST['payment'] * 100;
  $_SESSION['booking_type'] = 'Cash Booking';
  $bookings->insertBooking();
  $bookings->send_admin_email();
}
else
{
  // paypal
  $fixed_percentage = $_POST['payment'] * $fee['percentage_credit_card_fee'] / 100;
  $payment   = $_POST['payment'] + $fee['fixed_booking_fee'] + $fixed_percentage;
  $payment   = number_format($payment, 2);
  $accountno = md5(rand(1, 3000000));
  $_SESSION['booking_type'] = 'Credit Card Booking';
  $_SESSION['booking_fee']  = $fee['fixed_booking_fee'];
  $_SESSION['percentage_credit_card_fee'] = $_POST['percentage_credit_card_fee'];


  // get last booking_id
  $database->select('SELECT booking_id FROM bookings ORDER BY id DESC LIMIT 1');
  $last_booking_id = $database->fetch();
  $booking_id = $last_booking_id['booking_id'] + 5;
  ?>
  <!DOCTYPE HTML>
  <head>
    <script>
    function submit_paypal_form()
    {
      document.getElementById("frmpaypal").submit();
    }   
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="assets/js/spin.min.js"></script>
<script src="assets/js/prettify.js"></script>


<script>
  $.fn.spin = function(opts) {
    this.each(function() {
      var $this = $(this),
          data = $this.data();

      if (data.spinner) {
        data.spinner.stop();
        delete data.spinner;
      }
      if (opts !== false) {
        data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
      }
    });
    return this;
  };
  //$('#dot').spin();
  prettyPrint();
  function update() {
    var opts = {
  lines: 8, // The number of lines to draw
  length: 30, // The length of each line
  width: 5, // The line thickness
  radius: 30, // The radius of the inner circle
  corners: 1, // Corner roundness (0..1)
  rotate: 63, // The rotation offset
  direction: 1, // 1: clockwise, -1: counterclockwise
  color: '#000', // #rgb or #rrggbb or array of colors
  speed: 1.6, // Rounds per second
  trail: 60, // Afterglow percentage
  shadow: false, // Whether to render a shadow
  hwaccel: false, // Whether to use hardware acceleration
  className: 'spinner', // The CSS class to assign to the spinner
  zIndex: 2e9, // The z-index (defaults to 2000000000)
  top: '50%', // Top position relative to parent
  left: '50%' // Left position relative to parent
};
    
    $('#foo').spin(opts);
    
  }
  $(function() {    
    update();
  });
  </script>
  </head>
  <body onload="submit_paypal_form()">
   
  <?php if($payments['paypal_status'] == 'Live') { ?>
  <form action="https://www.paypal.com/cgi-bin/webscr" method="POST" id="frmpaypal" name="frmpaypal">
  <?php } else { ?>
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="frmpaypal" name="frmpaypal">
  <?php } ?>
    <input name="cmd" value="_xclick" type="hidden">
    <?php if($payments['paypal_status'] == 'Live') { ?>
    <input type="hidden" name="business" value="<?php echo $payments['paypal_account']; ?>">
    <?php } else { ?>
    <input type="hidden" name="business" value="zyg.simkus-facilitator@gmail.com">
    <?php } ?>
    <input type="hidden" name="item_name" value="<?php echo $base_url; ?>">
    <input type="hidden" name="item_number" value="<?php echo $booking_id; ?>">
    <input type="hidden" name="payment_date" value="">
    <input type="hidden" name="amount" value="<?php echo $payment; ?>">
    <input type="hidden" name="custom" value="">
    <input type="hidden" name="payer_email" value="">
    <input type="hidden" name="currency_code" value="GBP">
    <input type="hidden" name="shipping" value="0.00">
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="no_shipping" value="0">
    <input type="hidden" name="return" value="<?php echo $base_url; ?>success">
    <input type="hidden" name="cancel_return" value="<?php echo $base_url; ?>booking-cancelled">
    <input type="hidden" name="notify_url" value="<?php echo $base_url; ?>notify">
    <input type="hidden" name="cpp_header_image" value="">
    <input type="hidden" name="image_url" value="">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <input type="hidden" name="rm" value="2">
    <input type="submit" name="pay" style="display:none" />
  </form>
 <div id='foo'></div>
  </body>
  </html>

  <?php

  $bookings->insert_paypal_booking();

}

?>