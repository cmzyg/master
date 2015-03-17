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


$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}
// post back to PayPal system to validate
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
//------------------- ---------------------Remove comment to test on sandbox-----------------------------------------------------//

$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30); 							//for sanbox testing paypal


// $fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);										//for online paypal 
 

// assign posted variables to local variables
$services = $_POST['item_name'];
$accountno = $_POST['item_number'];
$payment_currency = $_POST['currency_code'];
$amount = $_POST['custom'];
// $email = $_POST['payer_email'];
$payment_date = date("Y-m-d H:i:s");

$bookings->complete_paypal_booking($accountno);
$bookings->send_admin_email_paypal($accountno);
?>
