<?php
require_once('core/class.geolocation.php');

use JeroenDesloovere\Geolocation\Geolocation;

// define result
$result = Geolocation::getCoordinates('45 Rutland Gardens, Dagenham, United Kingdom');

// dump result
echo 'Coordinates = ' . $result['latitude'] . ', ' . $result['longitude'] . '<br/>';
?>
