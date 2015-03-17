<?php
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/geolocation.class.php');
require_once('core/price.class.php');
use JeroenDesloovere\Geolocation\Geolocation;

$database   = new Database($db);
$controller = new Controller($db);
$price      = new Price($db);

$pickup      = $_POST['pickup'];
$destination = $_POST['destination'];

$result  = Geolocation::getCoordinates($pickup);
$result2 = Geolocation::getCoordinates($destination);



$latitude_pickup  = (string)$result['latitude'];
$longitude_pickup = (string)$result['longitude'];
$latitude_destination  = (string)$result2['latitude'];
$longitude_destination = (string)$result2['longitude'];


/*function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}*/

//$miles = distance($latitude_pickup, $longitude_pickup, $latitude_destination, $longitude_destination, "M") . " Miles<br>";
//$miles = number_format($miles, 1);





function get_driving_information($start, $finish, $raw = false)
{
  if(strcmp($start, $finish) == 0)
  {
    $time = 0;
    if($raw)
    {
      $time .= ' seconds';
    }
 
    return array('distance' => 0, 'time' => $time);
  }
 
  $start  = urlencode($start);
  $finish = urlencode($finish);
 
  $distance   = 'unknown';
  $time   = 'unknown';
 
  $url = 'http://maps.googleapis.com/maps/api/directions/xml?origin='.$start.'&destination='.$finish.'&sensor=false';
  if($data = file_get_contents($url))
  {
    $xml = new SimpleXMLElement($data);
 
    if(isset($xml->route->leg->duration->value) AND (int)$xml->route->leg->duration->value > 0)
    {
      if($raw)
      {
        $distance = (string)$xml->route->leg->distance->text;
        $time   = (string)$xml->route->leg->duration->text;
      }
      else
      {
        $distance = (int)$xml->route->leg->distance->value / 1000 / 1.609344; 
        $time   = (int)$xml->route->leg->duration->value;
      }
    }
    else
    {
      throw new Exception('Could not find that route');
    }
 
    return array('distance' => $distance, 'time' => $time);
  }
  else
  {
    throw new Exception('Could not resolve URL');
  }
}


$info = get_driving_information($pickup, $destination);
$miles = $info['distance'];
$miles = number_format($miles, 2);



$_SESSION['miles'] = $miles;
$_SESSION['total'] = $price->getPrice($miles);

$_SESSION['pickup']       = $_POST['pickup'];
$_SESSION['destination']  = $_POST['destination'];
$_SESSION['booking_date'] = $_POST['booking_date']; 
$_SESSION['hour']         = $_POST['hour']; 
$_SESSION['minute']       = $_POST['minute']; 

$_SESSION['latitude_pickup']  = $latitude_pickup;
$_SESSION['longitude_pickup'] = $longitude_pickup;

$_SESSION['latitude_destination']  = $latitude_destination;
$_SESSION['longitude_destination'] = $longitude_destination;

header('location: book');

?>