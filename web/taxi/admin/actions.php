<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/bookings.class.php');

$database   = new Database($db);
$controller = new Controller($db);
$bookings   = new Bookings($db);

// sort or delete bookings
$action = $_POST['action'];
if(isset($action))
{
	$bookings->performAction($action);
}
exit;
?>