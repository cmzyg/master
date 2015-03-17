<?php

date_default_timezone_set('Europe/London');
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);

$database->selectAll("SELECT * FROM bookings_calendar WHERE declined NOT like 0");
$result = $database->fetchAll();

$database->selectAll("SELECT * FROM bookings_calendar WHERE cancelled NOT like 0");
$result2 = $database->fetchAll();

$database->selectAll("SELECT * FROM bookings_calendar WHERE accepted NOT like 0");
$result4 = $database->fetchAll();


$count = 0;

$arr_declined = array();
for($i=0; $i < count($result); $i++) {
	$arr_declined[$i]['id'] = 111;
    $arr_declined[$i]['title'] = $result[$i]['declined'] . ' declined';
    $arr_declined[$i]['start'] = $result[$i]['booking_date'];
    $arr_declined[$i]['url']   = 'bookings/ordered-by-date/' . str_replace('-','', $result[$i]['booking_date']);
    $arr_declined[$i]['color'] = '#E0ECF8';
    $arr_declined[$i]['textColor'] = 'black';
}

$arr_cancelled = array();
for($i=0; $i < count($result2); $i++) {
	$arr_cancelled[$i]['id'] = 111;
    $arr_cancelled[$i]['title'] = $result2[$i]['cancelled'] . ' cancelled';
    $arr_cancelled[$i]['start'] = $result2[$i]['booking_date'];
    $arr_cancelled[$i]['url']   = 'bookings/ordered-by-date/' . str_replace('-','', $result2[$i]['booking_date']);
    $arr_cancelled[$i]['color'] = '#F8E0E0';
    $arr_cancelled[$i]['textColor'] = 'black';
}


$arr_accepted = array();
for($i=0; $i < count($result4); $i++) {
	$arr_accepted[$i]['id'] = 111;
    $arr_accepted[$i]['title'] = $result4[$i]['accepted'] . ' accepted';
    $arr_accepted[$i]['start'] = $result4[$i]['booking_date'];
    $arr_accepted[$i]['url']   = 'bookings/ordered-by-date/' . str_replace('-','', $result4[$i]['booking_date']);
    $arr_accepted[$i]['color'] = '#DA81F5';
    $arr_accepted[$i]['textColor'] = 'black';
}

    
    header("content-type: application/json"); 
	$year = date('Y');
	$month = date('m');

$arr_merged = array_merge($arr_declined, $arr_cancelled, $arr_accepted);


echo json_encode($arr_merged);

?>
