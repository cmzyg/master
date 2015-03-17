<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
require_once('core/geolocation.class.php');
// get latitude and longitude of company address
use JeroenDesloovere\Geolocation\Geolocation;
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);

$company_address = $_POST['company_address'];

$result = Geolocation::getCoordinates($company_address);

$latitude  = (string)$result['latitude'];
$longitude = (string)$result['longitude'];

// update settings
$settings->updateSettings($latitude, $longitude);

foreach ($_POST as $key => $value)
 echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";


?>