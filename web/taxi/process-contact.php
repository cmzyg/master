<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/mail.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$mail       = new Mail($db);

$content  = $_POST['message'];
$subject  = nl2br($_POST['subject']);
$fullname = $_POST['name'];
$email    = $_POST['email'];

$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, "Times New Roman", Times, serif; color:#010101; font-size:24px"><strong><em>New query from '.$fullname.'</em></strong></font><br /><br />
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><br /><br />
                  "'.$content.'"<br /><br />
                  Email Address: '.$email.'
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
      </html>';


        // get website email address
        $database->select('SELECT * FROM settings');
        $array = $database->fetch();

 
        // send an email to customer
        require("core/mailer/class.phpmailer.php");
        $mail = new PHPMailer();

        $mail->From = $array['backend_email_address'];
        $mail->FromName = $array['company_name'];
        $mail->AddAddress($array['website_email_address'], '');
        $mail->AddAddress($array['backend_email_address'], '');

        $mail->WordWrap = 50;
        $mail->IsHTML(true);                                  

        $mail->Subject = "New Query";
        $mail->Body    = $message;
        $mail->AltBody = "New Query";

        if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

        header('location: mail-sent');
        
    

?>