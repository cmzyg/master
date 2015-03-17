<?php

class Price extends Controller {

    public function getPrice($miles)
    {
        date_default_timezone_set('Europe/London');
        
        // get time and day of the week
        $date    = date('Y/m/d', strtotime($_POST['booking_date']));
        $weekday = date('l', strtotime($date));

        // get selected time
        $hour   = $_POST['hour'];
        $minute = $_POST['minute'];
        $currentTime  = $hour . $minute . '00';
             

        // get all rates from the database
        $this->select('SELECT * FROM rates');
        $results = $this->fetch();


        // standard rate
        $minimum_fare_miles        = $results['minimum_fare_miles'];
        $minimum_fare_amount       = $results['minimum_fare_amount'];
        $long_distance_fare_miles  = $results['long_distance_fare_miles'];
        $long_distance_fare_amount = $results['long_distance_fare_amount'];

        $miles < 1 ? $miles = 1 : $miles = $miles;


        if($miles < $long_distance_fare_miles)
        {
            if($miles <= $minimum_fare_miles)
            {
                $miles = $minimum_fare_amount;
            }
            else
            {
                $miles_left     = $miles - $minimum_fare_miles;
                $standard_price = $miles_left * $results['standard_day_rate']; 
                $miles          = $minimum_fare_amount;
                $miles          = $miles + $standard_price;
            }
        }
        else
        {
            $miles_after  = $miles - $long_distance_fare_miles;
            $miles_before = $miles - $miles_after;

            $miles_after_price  = $miles_after * $long_distance_fare_amount;

            $miles_left         = $miles_before - $minimum_fare_miles;
            $standard_price     = $miles_left * $results['standard_day_rate']; 
            $miles_before_price = $minimum_fare_amount;
            $miles              = $miles_before_price + $miles_after_price + $standard_price;
        }


        // $miles = $miles * $results['standard_day_rate'];


        // night rate uplift
        
        $from = str_replace(':', '', $results['day_rate_hour_start']);
        $to   = str_replace(':', '', $results['day_rate_hour_end']);
        
        if($currentTime > $from && $currentTime < $to )
        {
            $results['night_rate_uplift'] = 0;
        }
        else
        {
            // if the admin is charging a fixed price in pounds
            if($results['night_rate_uplift_units'] == 'Pounds')
            {
                $results['night_rate_uplift'] = $results['night_rate_uplift'];
            }
            // otherwise calculate percentage
            else
            {
                $results['night_rate_uplift']   = $miles * $results['night_rate_uplift'] / 100;  
            }       
        }



        // sunday rate uplift   
        if($weekday == 'Sunday')
        {
            // if the admin is charging a fixed price in pounds
            if($results['sunday_rate_uplift_units'] == 'Pounds')
            {
                 $results['sunday_rate_uplift'] =  $results['sunday_rate_uplift'];
            }
            // otherwise calculate percentage
            else
            {
                $results['sunday_rate_uplift']  = $miles * $results['sunday_rate_uplift'] / 100;
            }              
        }
        else
        {
            $results['sunday_rate_uplift'] = 0;
        }
        

        // bank holiday rate uplift
        $bank_holidays = array(
           '05/12/2014', '26/12/2014', '01/01/2015', '03/04/2015', '05/04/2015', '06/04/2015', '04/05/2015', '25/05/2015', '31/08/2015',
           '25/12/2015', '28/12/2015', '01/01/2016', '25/03/2016', '28/03/2016', '02/05/2016', '30/05/2016', '29/08/2016', '26/12/2016',
           '02/01/2017', '14/04/2017', '17/04/2017', '01/05/2017', '29/05/2017', '28/08/2017', '25/12/2017', '26/12/2017', '01/01/2018',
           '30/03/2018', '02/04/2018', '07/05/2018', '28/05/2018', '27/08/2018', '25/12/2018', '26/12/2018', '01/01/2019', '19/04/2019',
           '22/04/2019', '06/05/2019', '27/05/2019', '26/08/2019', '25/12/2019', '26/12/2019', '01/01/2020', '10/04/2020', '13/04/2020',
           '04/05/2020', '25/05/2020', '31/08/2020', '25/12/2020', '28/12/2020'
        );
        
        $bank_holiday_date = $_POST['booking_date'];
        if(in_array($bank_holiday_date, $bank_holidays))
        {
            // if the admin is charging a fixed price in pounds
            if($results['bank_holiday_uplift_units'] == 'Pounds')
            {
                 $results['bank_holiday_uplift'] =  $results['bank_holiday_uplift'];
            }
            // otherwise calculate percentage
            else
            {
                $results['bank_holiday_uplift'] = $miles * $results['bank_holiday_uplift'] / 100;
            }   
        }
        else
        {
            $results['bank_holiday_uplift'] = 0;
        }    


        // finish calculations
        $miles = $miles + $results['night_rate_uplift'] + $results['sunday_rate_uplift'] + $results['bank_holiday_uplift'];
        //$miles = number_format($miles, 2);
        $miles = round($miles, 1);
        $miles = number_format($miles, 2);

        // return
        return $miles;
    }


    public function getPrice2($miles)
    {
        date_default_timezone_set('Europe/London');
        
        // get time and day of the week
        $date    = date('Y/m/d', strtotime($_SESSION['booking_date']));
        $weekday = date('l', strtotime($date));

        // get selected time
        $hour   = $_SESSION['hour'];
        $minute = $_SESSION['minute'];
        $currentTime  = $hour . $minute . '00';
             

        // get all rates from the database
        $this->select('SELECT * FROM rates');
        $results = $this->fetch();


        // standard rate
        $miles = $miles * $results['standard_day_rate'];


        // night rate uplift
        
        $from = str_replace(':', '', $results['day_rate_hour_start']);
        $to   = str_replace(':', '', $results['day_rate_hour_end']);
        
        if($currentTime > $from && $currentTime < $to )
        {
            $results['night_rate_uplift'] = 0;
        }
        else
        {
            // if the admin is charging a fixed price in pounds
            if($results['night_rate_uplift_units'] == 'Pounds')
            {
                $results['night_rate_uplift'] = $results['night_rate_uplift'];
            }
            // otherwise calculate percentage
            else
            {
                $results['night_rate_uplift']   = $miles * $results['night_rate_uplift'] / 100;  
            }         
        }



        // sunday rate uplift   
        if($weekday == 'Sunday')
        {
            $results['sunday_rate_uplift']  = $miles * $results['sunday_rate_uplift'] / 100;
        }
        else
        {
            $results['sunday_rate_uplift'] = 0;
        }
        

        // bank holiday rate uplift
        $bank_holidays = array(
           '05/12/2014', '26/12/2014', '01/01/2015', '03/04/2015', '05/04/2015', '06/04/2015', '04/05/2015', '25/05/2015', '31/08/2015',
           '25/12/2015', '28/12/2015', '01/01/2016', '25/03/2016', '28/03/2016', '02/05/2016', '30/05/2016', '29/08/2016', '26/12/2016',
           '02/01/2017', '14/04/2017', '17/04/2017', '01/05/2017', '29/05/2017', '28/08/2017', '25/12/2017', '26/12/2017', '01/01/2018',
           '30/03/2018', '02/04/2018', '07/05/2018', '28/05/2018', '27/08/2018', '25/12/2018', '26/12/2018', '01/01/2019', '19/04/2019',
           '22/04/2019', '06/05/2019', '27/05/2019', '26/08/2019', '25/12/2019', '26/12/2019', '01/01/2020', '10/04/2020', '13/04/2020',
           '04/05/2020', '25/05/2020', '31/08/2020', '25/12/2020', '28/12/2020'
        );
        
        $bank_holiday_date = $_SESSION['booking_date'];
        if(in_array($bank_holiday_date, $bank_holidays))
        {
            $results['bank_holiday_uplift'] = $miles * $results['bank_holiday_uplift'] / 100;
        }
        else
        {
            $results['bank_holiday_uplift'] = 0;
        }    


        // finish calculations
        $miles = $miles + $results['night_rate_uplift'] + $results['sunday_rate_uplift'] + $results['bank_holiday_uplift'];


        // return
        return $miles;
    }
}

?>