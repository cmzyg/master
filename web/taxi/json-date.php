<?php

date_default_timezone_set('Europe/London');

require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/bookings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$bookings   = new Bookings($db);

$database->select('SELECT minimum_booking_notice FROM rates');
$rates = $database->fetch();
$notice_db = $rates['minimum_booking_notice'];

$booking_date = $_POST['booking_date'];
$hour = $_POST['hour'];
$minute = $_POST['minute'];

$booking = $booking_date . ' ' . $hour . ':' . $minute . ':00';

$date = date('d-m-Y H:i:s');

if(strtotime($date) > strtotime($booking))
{
  $response = false;
}
else
{
  $response = true;
}



$notice_date = date('d-m-Y H:i:s', strtotime($date . "+$notice_db hours"));

if(strtotime($booking) > strtotime($notice_date))
{
    
  $notice = true;

}
else 
{
  $notice_hours = $notice_db;
  $notice = false;
}




$array = array('date' => $response, 'notice' => $notice, 'notice_hours' => $notice_hours);
echo json_encode($array);

?>