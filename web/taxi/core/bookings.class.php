<?php

class Bookings extends Controller {

    public $booking_id, $booking_type, $booking_date, $pickup, $destination, $return_date, $payment, $note, $fullname, $telephone, $email, $actual_pickup, $actual_destination, $meet_and_greet, $vehicles;

    public function insertBooking()
    {
        $this->select('SELECT * FROM settings');
        $array = $this->fetch();

        // validate email address format
        if(!$this->validate_email($_POST['email']))
        {
            $this->set_flashdata('Error', 'Incorrect Email Address Format');
            $this->redirect('book');
        }

        // get last booking_id
        $this->select('SELECT booking_id FROM bookings ORDER BY id DESC LIMIT 1');
        $last_booking_id = $this->fetch();
        $booking_id = $last_booking_id['booking_id'] + 5;

        // booking fee
        if(isset($_SESSION['booking_fee'])) { $booking_fee = $_SESSION['booking_fee']; } else { $booking_fee = 0; }
        if(isset($_SESSION['percentage_credit_card_fee'])) { $percentage_credit_card_fee = $_SESSION['percentage_credit_card_fee']; } else { $percentage_credit_card_fee = 0; }


        $array_bookings = array(
            'fullname'               => $this->filter($_POST['fullname']),
            'email'                  => $this->filter($_POST['email']),
            'telephone'              => $this->filter($_POST['telephone']),
            'note'                   => nl2br($this->filter($_POST['note'])),
            'booking_date'           => date('Y-m-d', strtotime($_POST['booking_date'])) . ' ' . $_POST['hour'] . ':' . $_POST['minute'] . ':00',
            'status'                 => 'new',
            'payment'                => $_POST['payment'] + $booking_fee + $percentage_credit_card_fee,
            'pickup'                 => $_POST['start'],
            'destination'            => $_POST['end'],
            'booking_type'           => $_SESSION['booking_type'],
            'payment_received'       => '1',
            'saloon'                 => $_SESSION['saloon'],
            'estate'                 => $_SESSION['estate'],
            'executive'              => $_SESSION['executive'],
            'mpv'                    => $_SESSION['mpv'],
            'minibus'                => $_SESSION['minibus'],
            'minicoach'              => $_SESSION['minicoach'],
            'booking_id'             => $booking_id,
            'received'               => date('Y-m-d H:i:s'),
            'airport_name'           => $this->filter($_POST['airport_name']),
            'flight_number'          => $this->filter($_POST['flight_number']),
            'terminal'               => $this->filter($_POST['terminal']),
            'actual_pickup'          => $_POST['actual_pickup'],
            'actual_destination'     => $_POST['actual_destination'],
            'meet_and_greet_service' => $_POST['meet_and_greet_service']
        );

        $this->insert('INSERT INTO bookings (fullname, email, telephone, note, booking_date, status, payment, pickup, destination, booking_type, payment_received, saloon, estate, executive, mpv, minibus, minicoach, booking_id, received, airport_name, flight_number, terminal, actual_pickup, actual_destination, meet_and_greet_service) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $array_bookings);
        
        if($_POST['return_date'] !== '')
        {
            $last_id = $this->lastId();
            $array_return = array(
                'return_date' => date('Y-m-d', strtotime($_POST['return_date'])) . ' ' . $_POST['return_hour'] . ':' . $_POST['return_minute'] . ':00',
                'id'          => $last_id
            );
            $this->update('UPDATE bookings SET return_date = ? WHERE id = ?', $array_return);
        }
 
        // calendar
        $array_booking_date = array(
            'booking_date' => date('Y-m-d', strtotime($_POST['booking_date']))
        );
        
        $numrows = $this->rowCount('SELECT id FROM bookings_calendar WHERE booking_date = ?', $array_booking_date);

        if($numrows > 0)
        {
            $this->update('UPDATE bookings_calendar SET new = new + 1 WHERE booking_date = ?', $array_booking_date);
        }
        else
        {
            $array_booking_new = array(
                'booking_date' => date('Y-m-d', strtotime($_POST['booking_date'])),
                'new'          => 1
            );

            $this->insert('INSERT INTO bookings_calendar (booking_date, new) VALUES (?, ?)', $array_booking_new);
        }




        $this->booking_id         = $booking_id;
        $this->booking_type       = $_SESSION['booking_type'];
        $this->booking_date       = date('Y-m-d', strtotime($_POST['booking_date'])) . ' ' . $_POST['hour'] . ':' . $_POST['minute'] . ':00';
        $this->pickup             = $_POST['start'];
        $this->destination        = $_POST['end'];
        $this->payment            = $_POST['payment'] + $booking_fee + $percentage_credit_card_fee;
        $this->note               = $_POST['note'];
        $this->fullname           = $_POST['fullname'];
        $this->telephone          = $_POST['telephone'];
        $this->email              = $_POST['email'];
        $this->actual_pickup      = $_POST['actual_pickup'];
        $this->actual_destination = $_POST['actual_destination'];



        if($_POST['return_date'] !== '')
        {
            $this->return_date = date('Y-m-d', strtotime($_POST['return_date'])) . ' ' . $_POST['return_hour'] . ':' . $_POST['return_minute'] . ':00';
        }
        else
        {
            $this->return_date = 'No return';
        }

        if($_POST['meet_and_greet_service'] != 0)
        {
            $this->meet_and_greet = 'Yes';
        }
        else
        {
            $this->meet_and_greet = 'No';
        }

                  if($_SESSION['saloon'] == 1) { $this->vehicles = '<li>Saloon</li>'; }
                  if($_SESSION['estate'] == 1) { $this->vehicles .= '<li>Estate</li>'; }
                  if($_SESSION['executive'] == 1) { $this->vehicles .= '<li>Executive</li>'; }
                  if($_SESSION['mpv'] == 1) { $this->vehicles .= '<li>MPV</option>'; }
                  if($_SESSION['minibus'] == 1) { $this->vehicles .= '<li>Minibus</li>'; }
                  if($_SESSION['minicoach'] == 1) { $this->vehicles .= '<li>Minicoach</li>'; }



        // email content
        $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CompanyXXX</title>
        </head>

        <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
        <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
        <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="393"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        </table></td>
        </tr>
        </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%">&nbsp;</td>
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, "Times New Roman", Times, serif; color:#010101; font-size:24px"></font>
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><br /><br />
                  <p>Dear ' . $this->fullname .',</p><br />
                  <p>Thank you for your booking request. </p><br />
                  <p>Our team will review your request and send an email soon to confirm the status of your booking. If you need to amend your booking, have any queries or need to call us, please call ' . $array['company_name'] . ' on ' . $array['website_phone'] . '.</p>
                  <br />

                  <p><strong>Booking Details</strong></p>
                  <p>Booking ID: ' . $this->booking_id . '</p>
                  <p>Booking type: ' . $this->booking_type . '</p>
                  <p>Booking made on: ' . date('d-m-Y H:i:s') . '</p>
                  <br />
                  <p><strong>Journey Quoted</strong></p>
                  <p>Pickup date and time: ' . $this->booking_date . '</p>
                  <p>Pickup: ' . $this->pickup . '</p>
                  <p>Destination: ' . $this->destination . '</p>
                  <p>Vehicles: <ul>' . $this->vehicles . '</ul></p>
                  <p>Meet and Greet: ' . $this->meet_and_greet . '</p>
                  <p>Return Date: ' . date('d-m-Y H:i:s', strtotime($this->return_date)) . '</p>
                  <p>Total Cost: &pound;' . $this->payment . '</p>
                  <p>Comments: ' . $this->note . '</p>
                  <br />
                  <p><strong>Customer Detalis</strong></p>
                  <p>Name: ' . $this->fullname . '</p>
                  <p>Tel no: ' . $this->telephone . '</p>
                  <p>Email: ' . $this->email . '</p>
                  <br />
                  <p>Pickup address: ' . $this->actual_pickup . '</p>
                  <p>Destination address: ' . $this->actual_destination . '</p>
                  <br />
                  <p>We appreciate your business and look forward to being at your service. Thank you.</p>
                  <br /><br />
                  <p><strong>The Team,</strong></p>
                  <p><strong>' . $array['company_name'] . '</strong></p><br />
                  <p>Tel: ' . $array['website_phone'] . '</p>
                  <p>Email: ' . $array['website_email_address'] . '</p>
                  <p>Web: <a href="' . $array['site_url'] . '">' . $array['site_url'] .'</a></p>


                  </font></td>

                <td width="10%">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                


                  <tr>
                    <td height="10" align="left" valign="left"></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
';


 
        // send an email to customer
        require("mailer/class.phpmailer.php");
        $mail = new PHPMailer();

        $mail->From = $array['backend_email_address'];
        $mail->FromName = $array['company_name'];
        $mail->AddAddress($_POST['email'], $_POST['fullname']);
        $mail->AddReplyTo($array['website_email_address'], "Information");

        $mail->WordWrap = 50;
        $mail->IsHTML(true);                                  

        $mail->Subject = "Booking Request Received.";
        $mail->Body    = $message;
        $mail->AltBody = "We have received your payment. Our team will review the booking and confirm it. You will receive a confirmation email once your booking is confirmed.";

        if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }
        
    }


    public function send_admin_email()
    {
        // get website email address
        $this->select('SELECT * FROM settings');
        $array = $this->fetch();

        // admin email content
        $message_2 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>CompanyXXX</title>
        </head>

        <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
        <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
        <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="393"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        </table></td>
        </tr>
        </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%">&nbsp;</td>
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, "Times New Roman", Times, serif; color:#010101; font-size:24px"></font><br /><br />
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><br /><br />

                  <p><strong>Booking Details</strong></p>
                  <p>Booking ID: ' . $this->booking_id . '</p>
                  <p>Booking type: ' . $this->booking_type . '</p>
                  <p>Booking made on: ' . date('d-m-Y H:i:s') . '</p>
                  <br />
                  <p><strong>Journey Quoted</strong></p>
                  <p>Pickup date and time: ' . $this->booking_date . '</p>
                  <p>Pickup: ' . $this->pickup . '</p>
                  <p>Destination: ' . $this->destination . '</p>
                  <p>Vehicles: <ul>' . $this->vehicles . '</ul></p>
                  <p>Meet and Greet: ' . $this->meet_and_greet . '</p>
                  <p>Return Date: ' . $this->return_date . '</p>
                  <p>Total Cost: &pound;' . $this->payment . '</p>
                  <p>Comments: ' . $this->note . '</p>
                  <br />
                  <p><strong>Customer Detalis</strong></p>
                  <p>Name: ' . $this->fullname . '</p>
                  <p>Tel no: ' . $this->telephone . '</p>
                  <p>Email: ' . $this->email . '</p>
                  <br />
                  <p>Pickup address: ' . $this->actual_pickup . '</p>
                  <p>Destination address: ' . $this->actual_destination . '</p>
               </font></td>

                <td width="10%">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                


                  <tr>
                    <td height="10" align="left" valign="left"></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
';


        // send an email to admin
        $mail = new PHPMailer();
        $mail->From = $array['backend_email_address'];
        $mail->FromName = $array['company_name'];
        $mail->AddAddress($array['website_email_address'], "Information");
        $mail->AddAddress($array['backend_email_address'], "Information");

        $mail->WordWrap = 50;
        $mail->IsHTML(true);                                  

        $mail->Subject = "You Have a New Booking!";
        $mail->Body    = $message_2;
        $mail->AltBody = "New booking request has been made. <br />Please check admin control panel for more info on the booking.";

        if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

        // unset session variables
        unset($_SESSION['pickup']);
        unset($_SESSION['destination']);
        unset($_SESSION['booking_date']);
        unset($_SESSION['hour']);
        unset($_SESSION['minute']);
        unset($_SESSION['saloon']);
        unset($_SESSION['estate']);
        unset($_SESSION['executive']);
        unset($_SESSION['mpv']);
        unset($_SESSION['minibus']);
        unset($_SESSION['minicoach']);
        unset($_SESSION['actual_pickup']);
        unset($_SESSION['actual_destination']);
        unset($_SESSION['meet_and_greet_service']);
         
        $this->redirect('success');
    }
    


// ======================================================== >>
// PAYPAL SECTION ========================================= >>



    public function insert_paypal_booking()
    {
        // validate email address format
        if(!$this->validate_email($_POST['email']))
        {
            $this->set_flashdata('Error', 'Incorrect Email Address Format');
            $this->redirect('book');
        }

        // get last booking_id
        $this->select('SELECT booking_id FROM bookings ORDER BY id DESC LIMIT 1');
        $last_booking_id = $this->fetch();
        $booking_id = $last_booking_id['booking_id'] + 5;

        // booking fee
        if(isset($_SESSION['booking_fee'])) { $booking_fee = $_SESSION['booking_fee']; } else { $booking_fee = 0; }
        if(isset($_SESSION['percentage_credit_card_fee'])) { $percentage_credit_card_fee = $_SESSION['percentage_credit_card_fee']; } else { $percentage_credit_card_fee = 0; }


        $array_bookings = array(
            'fullname'               => $this->filter($_POST['fullname']),
            'email'                  => $this->filter($_POST['email']),
            'telephone'              => $this->filter($_POST['telephone']),
            'note'                   => nl2br($this->filter($_POST['note'])),
            'booking_date'           => date('Y-m-d', strtotime($_POST['booking_date'])) . ' ' . $_POST['hour'] . ':' . $_POST['minute'] . ':00',
            'status'                 => 'new',
            'payment'                => $_POST['payment'] + $booking_fee + $percentage_credit_card_fee,
            'pickup'                 => $_POST['start'],
            'destination'            => $_POST['end'],
            'booking_type'           => $_SESSION['booking_type'],
            'payment_received'       => '0',
            'saloon'                 => $_SESSION['saloon'],
            'estate'                 => $_SESSION['estate'],
            'executive'              => $_SESSION['executive'],
            'mpv'                    => $_SESSION['mpv'],
            'minibus'                => $_SESSION['minibus'],
            'minicoach'              => $_SESSION['minicoach'],
            'booking_id'             => $booking_id,
            'received'               => date('Y-m-d H:i:s'),
            'airport_name'           => $this->filter($_POST['airport_name']),
            'flight_number'          => $this->filter($_POST['flight_number']),
            'terminal'               => $this->filter($_POST['terminal']),
            'actual_pickup'          => $_POST['actual_pickup'],
            'actual_destination'     => $_POST['actual_destination'],
            'meet_and_greet_service' => $_POST['meet_and_greet_service']
        );

        $this->insert('INSERT INTO bookings (fullname, email, telephone, note, booking_date, status, payment, pickup, destination, booking_type, payment_received, saloon, estate, executive, mpv, minibus, minicoach, booking_id, received, airport_name, flight_number, terminal, actual_pickup, actual_destination, meet_and_greet_service) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $array_bookings);


        if($_POST['return_date'] !== '')
        {
            $last_id = $this->lastId();
            $array_return = array(
                'return_date' => date('Y-m-d', strtotime($_POST['return_date'])) . ' ' . $_POST['return_hour'] . ':' . $_POST['return_minute'] . ':00',
                'id'          => $last_id
            );
            $this->update('UPDATE bookings SET return_date = ? WHERE id = ?', $array_return);
        }
 
    }

    public function complete_paypal_booking($booking_id)
    {
        $select_array = array('payment_received' => 1, 'booking_id' => $booking_id);
        $this->update('UPDATE bookings SET payment_received = ? WHERE booking_id = ?', $select_array);

        // calendar (needs to be fixed)
        $calendar_array = array('booking_id' => $booking_id);
        $this->select('SELECT * FROM bookings WHERE booking_id = ?', $calendar_array);
        $booking_info = $this->fetch();
        $array_booking_date = array(
            'booking_date' => $booking_info['booking_date']
        );
        
        $numrows = $this->rowCount('SELECT id FROM bookings_calendar WHERE booking_date = ?', $array_booking_date);

        if($numrows > 0)
        {
            $this->update('UPDATE bookings_calendar SET new = new + 1 WHERE booking_date = ?', $array_booking_date);
        }
        else
        {
            $array_booking_new = array(
                'booking_date' => $booking_info['booking_date'],
                'new'          => 1
            );

            $this->insert('INSERT INTO bookings_calendar (booking_date, new) VALUES (?, ?)', $array_booking_new);
        }



        // get website email address
        $this->select('SELECT * FROM settings');
        $array = $this->fetch();


                  if($booking_info['saloon'] == 1) { $vehicles = '<li>Saloon</li>'; }
                  if($booking_info['estate'] == 1) { $vehicles .= '<li>Estate</li>'; }
                  if($booking_info['executive'] == 1) { $vehicles .= '<li>Executive</li>'; }
                  if($booking_info['mpv'] == 1) { $vehicles .= '<li>MPV</option>'; }
                  if($booking_info['minibus'] == 1) { $vehicles .= '<li>Minibus</li>'; }
                  if($booking_info['minicoach'] == 1) { $vehicles .= '<li>Minicoach</li>'; }

        if($booking_info['meet_and_greet_service'] == 1)
        {
            $meet_and_greet = 'Yes';
        }
        else
        {
            $meet_and_greet = 'No';
        }

        if($booking_info['return_date'] !== '0000-00-00 00:00:00')
        {
          $booking_info['return_date'] =  '<p>Return Date: ' . date('d-m-Y H:i:s', strtotime($booking_info['return_date'])) . '</p>';
        }
        else
        {
          $booking_info['return_date'] = '';
        }

        // admin email content
        $message_2 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        </head>

        <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
        <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
        <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="393"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        </table></td>
        </tr>
        </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%">&nbsp;</td>
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, "Times New Roman", Times, serif; color:#010101; font-size:24px"></font><br /><br />
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><br /><br />

                  <p>Dear ' . $booking_info['fullname'] .',</p><br />
                  <p>Thank you for your booking request. </p><br />
                  <p>Our team will review your request and send an email soon to confirm the status of your booking. If you need to amend your booking, have any queries or need to call us, please call ' . $array['company_name'] . ' on ' . $array['website_phone'] . '.</p>
                  <br />

                  <p><strong>Booking Details</strong></p>
                  <p>Booking ID: ' . $booking_info['booking_id'] . '</p>
                  <p>Booking type: ' . $booking_info['booking_type'] . '</p>
                  <p>Booking made on: ' . date('d-m-Y H:i:s') . '</p>
                  <br />
                  <p><strong>Journey Quoted</strong></p>
                  <p>Pickup date and time: ' . $booking_info['booking_date'] . '</p>
                  <p>Pickup: ' . $booking_info['pickup'] . '</p>
                  <p>Destination: ' . $booking_info['destination'] . '</p>
                  <p>Vehicles: <ul>' . $vehicles . '</ul></p>
                  <p>Meet and Greet: ' . $meet_and_greet . '</p>
                  
                  ' . $booking_info['return_date'] . '                  
    
                  <p>Total Cost: &pound;' . $booking_info['payment'] . '</p>
                  <p>Comments: ' . $booking_info['note'] . '</p>
                  <br />
                  <p><strong>Customer Detalis</strong></p>
                  <p>Name: ' . $booking_info['fullname'] . '</p>
                  <p>Tel no: ' . $booking_info['telephone'] . '</p>
                  <p>Email: ' . $booking_info['email'] . '</p>
                  <br />
                  <p>Pickup address: ' . $booking_info['actual_pickup'] . '</p>
                  <p>Destination address: ' . $booking_info['actual_destination'] . '</p>
                  <br />
                  <p>We appreciate your business and look forward to being at your service. Thank you.</p>
                  <br /><br />
                  <p><strong>The Team,</strong></p>
                  <p><strong>' . $array['company_name'] . '</strong></p><br />
                  <p>Tel: ' . $array['website_phone'] . '</p>
                  <p>Email: ' . $array['website_email_address'] . '</p>
                  <p>Web: <a href="' . $array['site_url'] . '">' . $array['site_url'] .'</a></p>
</font></td>

                <td width="10%">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                


                  <tr>
                    <td height="10" align="left" valign="left"></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
';


 
        // send an email to customer
        require("mailer/class.phpmailer.php");
        $mail = new PHPMailer();

        $mail->From = $array['backend_email_address'];
        $mail->FromName = $array['company_name'];
        $mail->AddAddress($booking_info['email'], $booking_info['fullname']);
        $mail->AddReplyTo($array['website_email_address'], "Information");

        $mail->WordWrap = 50;
        $mail->IsHTML(true);                                  

        $mail->Subject = "Booking Request Received.";
        $mail->Body    = $message_2;
        $mail->AltBody = "We have received your payment. Our team will review the booking and confirm it. You will receive a confirmation email once your booking is confirmed.";

        if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

        // unset session variables
        unset($_SESSION['pickup']);
        unset($_SESSION['destination']);
        unset($_SESSION['booking_date']);
        unset($_SESSION['hour']);
        unset($_SESSION['minute']);
        unset($_SESSION['saloon']);
        unset($_SESSION['estate']);
        unset($_SESSION['executive']);
        unset($_SESSION['mpv']);
        unset($_SESSION['minibus']);
        unset($_SESSION['minicoach']);
        unset($_SESSION['actual_pickup']);
        unset($_SESSION['actual_destination']);
        unset($_SESSION['meet_and_greet_service']);

    }



    public function send_admin_email_paypal($booking_id)
    {
        // get website email address
        $this->select('SELECT* FROM settings');
        $array = $this->fetch();

        $arr = array('booking_id' => $booking_id);
        $this->select('SELECT * FROM bookings WHERE booking_id = ?', $arr);
        $booking_info = $this->fetch();

        if($booking_info['return_date'] !== '0000-00-00 00:00:00')
        {
          $booking_info['return_date'] =  '<p>Return Date: ' . date('d-m-Y H:i:s', strtotime($booking_info['return_date'])) . '</p>';
        }
        else
        {
          $booking_info['return_date'] = '';
        }


        if($booking_info['saloon'] == 1) { $vehicles = '<li>Saloon</li>'; }
        if($booking_info['estate'] == 1) { $vehicles .= '<li>Estate</li>'; }
        if($booking_info['executive'] == 1) { $vehicles .= '<li>Executive</li>'; }
        if($booking_info['mpv'] == 1) { $vehicles .= '<li>MPV</option>'; }
        if($booking_info['minibus'] == 1) { $vehicles .= '<li>Minibus</li>'; }
        if($booking_info['minicoach'] == 1) { $vehicles .= '<li>Minicoach</li>'; }

        // admin email content
        $message_2 = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        </head>

        <body bgcolor="#8d8e90">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#8d8e90">
        <tr>
        <td><table width="600" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" align="center">
        <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <td width="393"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        </table></td>
        </tr>
        </table></td>
        </tr>
        <tr>
          <td align="center">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="10%">&nbsp;</td>
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, "Times New Roman", Times, serif; color:#010101; font-size:24px"></font><br /><br />
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><br /><br />

                  <p><strong>Journey Quoted</strong></p>
                  <p>Pickup date and time: ' . $booking_info['booking_date'] . '</p>
                  <p>Pickup: ' . $booking_info['pickup'] . '</p>
                  <p>Destination: ' . $booking_info['destination'] . '</p>
                  <p>Vehicles: <ul>' . $vehicles . '</ul></p>
                  <p>Meet and Greet: ' . $meet_and_greet . '</p>
                  ' . $return_date . '
                  <p>Total Cost: &pound;' . $booking_info['payment'] . '</p>
                  <p>Comments: ' . $booking_info['note'] . '</p>
                  <br />
                  <p><strong>Customer Detalis</strong></p>
                  <p>Name: ' . $booking_info['fullname'] . '</p>
                  <p>Tel no: ' . $booking_info['telephone'] . '</p>
                  <p>Email: ' . $booking_info['email'] . '</p>
                  <br />
                  <p>Pickup address: ' . $booking_info['actual_pickup'] . '</p>
                  <p>Destination address: ' . $booking_info['actual_destination'] . '</p>
                  <br />
                  </font></td>

                <td width="10%">&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align="right" valign="top"><table width="108" border="0" cellspacing="0" cellpadding="0">
                


                  <tr>
                    <td height="10" align="left" valign="left"></td>
                  </tr>
                </table></td>
                <td>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          </table></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
';


        // send an email to admin
        $mail = new PHPMailer();
        $mail->From = $array['backend_email_address'];
        $mail->FromName = $array['company_name'];
        $mail->AddAddress($array['website_email_address'], "Information");
        $mail->AddAddress($array['backend_email_address'], "Information");

        $mail->WordWrap = 50;
        $mail->IsHTML(true);                                  

        $mail->Subject = "You Have a New Booking!";
        $mail->Body    = $message_2;
        $mail->AltBody = "New booking request has been made. <br />Please check admin control panel for more info on the booking.";

        if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

        // unset session variables
        unset($_SESSION['pickup']);
        unset($_SESSION['destination']);
        unset($_SESSION['booking_date']);
        unset($_SESSION['hour']);
        unset($_SESSION['minute']);
        unset($_SESSION['saloon']);
        unset($_SESSION['estate']);
        unset($_SESSION['executive']);
        unset($_SESSION['mpv']);
        unset($_SESSION['minibus']);
        unset($_SESSION['minicoach']);
        unset($_SESSION['actual_pickup']);
        unset($_SESSION['actual_destination']);
        unset($_SESSION['meet_and_greet_service']);
         
        $this->redirect('success');
    }

}

?>