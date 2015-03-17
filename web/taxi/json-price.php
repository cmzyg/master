<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

date_default_timezone_set('Europe/London');

require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/bookings.class.php');
require_once('core/geolocation.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$bookings   = new Bookings($db);


use JeroenDesloovere\Geolocation\Geolocation;

$pickup      = $_POST['pickup'];
$destination = $_POST['destination'];


$result  = Geolocation::getCoordinates($pickup);
$result2 = Geolocation::getCoordinates($destination);

$latitude_pickup  = (string)$result['latitude'];
$longitude_pickup = (string)$result['longitude'];

$latitude_destination  = (string)$result2['latitude'];
$longitude_destination = (string)$result2['longitude'];


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


// calculate uplifts and number of cars

$cars = 0;

if($_POST['saloon'] == "1")
{
    $saloon_uplift = $payment * $saloon['uplift'] / 100;
    $cars++;
}
else
{
    $saloon_uplift = 0;
}


// estate uplift
if($_POST['estate'] == "1")
{
    $estate_uplift = $payment * $estate['uplift'] / 100;
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
if($_POST['saloon'] !== "1" && $_POST['estate'] !== "1" && $_POST['executive'] !== "1" && $_POST['mpv'] !== "1" && $_POST['minibus'] !== "1")
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
        $results = $database->fetch();

        // get all rates from the database (return)
        $database->select('SELECT * FROM rates');
        $results_return = $database->fetch();

        // bank holiday rate uplift
        $bank_holidays = array(
           '05/12/2014', '26/12/2014', '01/01/2015', '03/04/2015', '05/04/2015', '06/04/2015', '04/05/2015', '25/05/2015', '31/08/2015',
           '25/12/2015', '28/12/2015', '01/01/2016', '25/03/2016', '28/03/2016', '02/05/2016', '30/05/2016', '29/08/2016', '26/12/2016',
           '02/01/2017', '14/04/2017', '17/04/2017', '01/05/2017', '29/05/2017', '28/08/2017', '25/12/2017', '26/12/2017', '01/01/2018',
           '30/03/2018', '02/04/2018', '07/05/2018', '28/05/2018', '27/08/2018', '25/12/2018', '26/12/2018', '01/01/2019', '19/04/2019',
           '22/04/2019', '06/05/2019', '27/05/2019', '26/08/2019', '25/12/2019', '26/12/2019', '01/01/2020', '10/04/2020', '13/04/2020',
           '04/05/2020', '25/05/2020', '31/08/2020', '25/12/2020', '28/12/2020'
        );
        
        $bank_holiday_date = date('d/m/Y', strtotime($_POST['booking_date']));
        if($results['apply_bank_holiday_rate_uplift'] == '1') {
        if(in_array($bank_holiday_date, $bank_holidays))
        {
            $results['bank_holiday_uplift'] = $final_payment * $results['bank_holiday_uplift'] / 100;
            // $final_payment = $final_payment + $results['bank_holiday_uplift'];
        }
        else
        {
            $results['bank_holiday_uplift'] = 0;
            // $final_payment = $final_payment + $results['bank_holiday_uplift'];
        }
        }
        else
        {
            $results['bank_holiday_uplift'] = 0;
        }


        // sunday uplift
        // get selected time
        $hour   = $_POST['hour'];
        $minute = $_POST['minute'];
        $currentTime  = $hour . $minute . '00';
        if($results['apply_night_rate_uplift'] == '1') {
        $from = str_replace(':', '', $results['day_rate_hour_start']);
        $to   = str_replace(':', '', $results['day_rate_hour_end']);
        
        if($currentTime > $from && $currentTime < $to )
        {
            $results['night_rate_uplift'] = 0;
        }
        else
        {
            $results['night_rate_uplift'] = $final_payment * $results['night_rate_uplift'] / 100; 
            // $final_payment = $final_payment + $results['night_rate_uplift'];        
        }
        }
        else
        {
            $results['night_rate_uplift'] = 0;
        }

        // sunday rate uplift   
        // get time and day of the week
        if($results['apply_sunday_rate_uplift'] == '1') {
        $date    = date('Y/m/d', strtotime($_POST['booking_date']));
        $weekday = date('l', strtotime($date));
        if($weekday == 'Sunday')
        {
            $results['sunday_rate_uplift']  = $final_payment * $results['sunday_rate_uplift'] / 100;
        }
        else
        {
            $results['sunday_rate_uplift'] = 0;
        }
        }
        else
        {
            $results['sunday_rate_uplift'] = 0;
        }

        $final_payment = $final_payment + $results['bank_holiday_uplift'] + $results['sunday_rate_uplift'] + $results['night_rate_uplift'];



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