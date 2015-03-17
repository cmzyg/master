<?php
ob_start();
session_start();
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
require_once('core/bookings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);
$bookings   = new Bookings($db);


// delete booking
$bookings->declineBooking($_GET['id']);

?>