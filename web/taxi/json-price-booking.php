<?php

date_default_timezone_set('Europe/London');

require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/bookings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$bookings   = new Bookings($db);


$database->select('SELECT * FROM vehicles WHERE type = "Saloon"');
$saloon = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Estate"');
$estate = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Executive"');
$executive = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "MPV"');
$mpv = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Minibus"');
$minibus = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Minibus"');
$minicoach = $database->fetch();


$payment = $_POST['payment'];

$cars = 0;

// calculate uplifts

if($_POST['saloon'] == "1")
{
  $saloon_uplift = $payment * $saloon['uplift'] / 100;
  $cars++;
}
else
{
  $saloon_uplift = 0;
}


// executive uplift
if($_POST['estate'] == "1")
{
    // if units are percentages....
    if($estate['uplift_units'] == 'Percentages')
    {
        $estate_uplift = $payment * $estate['uplift'] / 100;
        
    }
    // otherwise units are pounds
    else
    {
        $estate_uplift = $estate['uplift'];
    }

    $cars++;
}
else
{
    $estate_uplift = 0;
}


// executive uplift
if($_POST['executive'] == "1")
{
  $executive_uplift = $payment * $executive['uplift'] / 100;
  $cars++;
}
else
{
  $executive_uplift = 0;
}


// mpv uplift
if($_POST['mpv'] == "1")
{
  $mpv_uplift = $payment * $mpv['uplift'] / 100;
  $cars++;
}
else
{
  $mpv_uplift = 0;
}


// minibus uplift
if($_POST['minibus'] == "1")
{
  $minibus_uplift = $payment * $minibus['uplift'] / 100;
  $cars++;
}
else
{
  $minibus_uplift = 0;
}


// minicoach uplift
if($_POST['minicoachh'] == "1")
{
  $minicoach_uplift = $payment * $minicoach['uplift'] / 100;
  $cars++;
}
else
{
  $minicoach_uplift = 0;
}

// if no cars selected - keep $cars at 1
if($_POST['saloon'] !== "1" && $_POST['estate'] !== "1" && $_POST['executive'] !== "1" && $_POST['mpv'] !== "1" && $_POST['minicoach'] !== "1" && $_POST['minibus'] !== "1")
{
    $cars = 1;
}

// get final payment
$final_payment = $payment + $saloon_uplift + $estate_uplift + $executive_uplift + $mpv_uplift + $minibus_uplift + $minicoach_uplift;
$final_payment = number_format($final_payment, 2);

// get final payment for the return journey
$final_payment_return = $payment + $saloon_uplift + $estate_uplift + $executive_uplift + $mpv_uplift + $minibus_uplift + $minicoach_uplift;
$final_payment_return = number_format($final_payment, 2);


        // get all rates from the database
        $database->select('SELECT * FROM rates');
        $results_return = $database->fetch();


        // return journey

      if($_POST['return_date'] !== '')
      {  
        // sunday uplift
        // get selected time
        $hour   = $_POST['return_hour'];
        $minute = $_POST['return_minute'];
        $currentTime  = $hour . $minute . '00';
        if($results_return['apply_night_rate_uplift'] == '1') {
        $from = str_replace(':', '', $results_return['day_rate_hour_start']);
        $to   = str_replace(':', '', $results_return['day_rate_hour_end']);
        
        if($currentTime > $from && $currentTime < $to )
        {
            $results_return['night_rate_uplift'] = 0;
        }
        else
        {
            $results_return['night_rate_uplift'] = $final_payment_return * $results_return['night_rate_uplift'] / 100; 
            // $final_payment = $final_payment + $results['night_rate_uplift'];        
        }
        }
        else
        {
            $results_return['night_rate_uplift'] = 0;
        }


        // sunday rate uplift   
        // get time and day of the week
        if($results_return['apply_sunday_rate_uplift'] == '1') {
        $date    = date('Y/m/d', strtotime($_POST['return_date']));
        $weekday = date('l', strtotime($date));
        if($weekday == 'Sunday')
        {
            $results_return['sunday_rate_uplift']  = $final_payment_return * $results_return['sunday_rate_uplift'] / 100;
        }
        else
        {
            $results_return['sunday_rate_uplift'] = 0;
        }
        }
        else
        {
            $results_return['sunday_rate_uplift'] = 0;
        }


        $final_payment_return = $final_payment_return + $results_return['night_rate_uplift'] + $results_return['sunday_rate_uplift'];
        
      }
      else
      {
        $final_payment_return = 0;
      }


      // meet and greet service
      if(isset($_POST['meet_and_greet']))
      {
        // get meet and greet price
        $meet_and_greet = $results_return['meet_and_greet'];
      }
      else
      {
        $meet_and_greet = 0;
      }
 
        
      $final_payment = $final_payment + $final_payment_return + $meet_and_greet;
      $final_payment = $final_payment * $cars;

$array = array('price' => $final_payment);
echo json_encode($array);

?>