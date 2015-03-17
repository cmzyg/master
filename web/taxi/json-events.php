<?php

require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);

$database->selectAll('SELECT * FROM bookings_calendar');
$result = $database->fetchAll();

$count = 0;
$arr = array();
foreach($result as $row)
{
	$arr['booking_date'][$count] = $row['booking_date']; 
	$arr['new'][$count]          = $row['new']; 
	$arr['completed'][$count]    = $row['completed']; 
	$arr['accepted'][$count]     = $row['accepted']; 
	$arr['cancelled'][$count]    = $row['cancelled']; 
	$count++;
}

    
    header("content-type: application/json"); 
	$year = date('Y');
	$month = date('m');

	echo json_encode(array(
	
		array(
			'id' => 111,
			'title' => $arr['new'][0] . ' new',
			'start' => $arr['booking_date'][0],
			'url' => "bookings/new/1",
			'color' => '#F7F8E0',
			'textColor' => 'black'
		),

		array(
			'id' => 111,
			'title' => $arr['completed'][0] . ' completed',
			'start' => $arr['booking_date'][0],
			'url' => "bookings/completed/1",
			'color' => '#D8D8D8',
			'textColor' => 'black'
		),

		array(
			'id' => 111,
			'title' => $arr['accepted'][0] . ' accepted',
			'start' => $arr['booking_date'][0],
			'url' => "bookings/accepted/1",
			'color' => '#E0ECF8',
			'textColor' => 'black'
		),


		array(
			'id' => 111,
			'title' => $arr['cancelled'][0] . ' cancelled',
			'start' => $arr['booking_date'][0],
			'url' => "bookings/cancelled/1",
			'color' => '#F8E0E0',
			'textColor' => 'black'
		),




		array(
			'id' => 111,
			'title' => $arr['new'][1] . ' new',
			'start' => $arr['booking_date'][1],
			'url' => "bookings/new/1",
			'color' => '#F7F8E0',
			'textColor' => 'black'
		),

		array(
			'id' => 111,
			'title' => $arr['completed'][1] . ' completed',
			'start' => $arr['booking_date'][1],
			'url' => "bookings/completed/1",
			'color' => '#D8D8D8',
			'textColor' => 'black'
		),

		array(
			'id' => 111,
			'title' => $arr['accepted'][1] . ' accepted',
			'start' => $arr['booking_date'][1],
			'url' => "bookings/accepted/1",
			'color' => '#E0ECF8',
			'textColor' => 'black'
		),


		array(
			'id' => 111,
			'title' => $arr['cancelled'][1] . ' cancelled',
			'start' => $arr['booking_date'][1],
			'url' => "bookings/cancelled/1",
			'color' => '#F8E0E0',
			'textColor' => 'black'
		),




	
	));



?>
