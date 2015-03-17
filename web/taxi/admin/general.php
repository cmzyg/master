<?php 
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
ob_start();
session_start();
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);

$values     = $settings->getSettings();

$page_title = 'General Settings';
include('includes/header.php'); 

?>

	  <!--
	  <div id="infobox">
		http://www.erichynds.com/examples/jquery-idle-timeout/example-dialog.htm
	  </div>
 	  -->
	<!-- Begin page content 12 col layout -->
	<div class="container">

		<?php echo $settings->flashdata('Success'); ?>


		
		<!-- messages -->
		
		 <div class="row">
		 	<div class="span12">
				<form class="form-horizontal" action="process-settings" method="post" enctype="multipart/form-data">
				<fieldset>

					<!-- Form Name -->
					<legend><?php echo $page_title; ?></legend>
					<input name="id" type="hidden" value="157" />
					<input name="lastupdatedby" type="hidden" value="bookings@rainbowtravel-ltd.co.uk" />
					<input name="lastupdatedbydate" type="hidden" value="1400634033" />
					
					<!-- Contact name - Text input-->
					<div class="control-group">
						<label class="control-label" for="contact_name">Contact name <span title="required" class="required">*</span></label>
						<div class="controls">
							<input id="contact_name" name="contact_name" placeholder="Contact name" class="input-xlarge" type="text" value="<?php echo $values['contact_name']; ?>">
							<!--<p class="help-block">help</p> -->
						</div>
					</div>

					<!-- Email address - Text input-->
					<div class="control-group">
						<label class="control-label" for="email_address">Email address <span title="required" class="required">*</span></label>
						<div class="controls">
							<input name="email" type="text" value="" size="1" class="hide" tabindex="1000" />
							<input id="email_address" name="email_address" placeholder="Email address" class="input-xlarge" type="text" value="<?php echo $values['email_address']; ?>">
							<p class="help-block">This is the email which users need in order to login to their admin area. 
							<br>All sites run by the same company should have the same email address here so that they can access all 
							their sites from one login.</p>
						</div>
					</div>
					
					<!-- Password - Text input-->
					<div class="control-group">
						<label class="control-label" for="newpassword">Change admin password</label>
						<div class="controls">
							<input id="newpassword" name="newpassword" placeholder="New password" class="input-xlarge" type="text">
							<p class="help-block">Only fill in this field to change your admin password. This will change the admin password for all your sites if you have more than one.</p>
						</div>
					</div>					
					
					<!--Phone (incorporating old "contact_phone" and "business_phone" field) - Text input-->
					<div class="control-group">
						<label class="control-label" for="website_phone">Website phone number <span title="required" class="required">*</span></label>
						<div class="controls">
							<input id="website_phone" name="website_phone" placeholder="Website phone number" class="input-xlarge" type="text" value="<?php echo $values['website_phone']; ?>">
							<!-- sets [business_phone] and [contact_phone] with same value -->
							<p class="help-block">This is the phone number which is displayed on the website</p>
						</div>
					</div>
					
					<!-- Email address - Text input-->
					<div class="control-group">
						<label class="control-label" for="website_email_address">Booking and Enquiry email address <span title="required" class="required">*</span></label>
						<div class="controls">
							<input id="website_email_address" name="website_email_address" placeholder="Email address" class="input-xlarge" type="text" value="<?php echo $values['website_email_address']; ?>">
							<p class="help-block">Bookings and enquires are sent to this address</p>
						</div>
					</div>
					
					<!-- Business name - Text input-->
					<div class="control-group">
						<label class="control-label" for="company_name">Company name</label>
						<div class="controls">
							<input id="company_name" name="company_name" placeholder="Company name" class="input-xlarge" type="text" value="<?php echo $values['company_name']; ?>">
							<p class="help-block">If supplied it will be used otherwise "main town" will be used.</p>
						</div>
					</div>
					
					<!-- Company logo - File Button --> 
					<div class="control-group">
						<label class="control-label" for="companylogo">Company logo</label>
						<div class="controls">
														<div><input id="companylogo" name="companylogo" class="input-file" type="file"></div>
							<p class="help-block">Images will be resized to 350px wide. Big files will take longer to upload, please be patient.</p>
						</div>
					</div>

					<!-- Operator Licence - Text input-->
					<div class="control-group">
						<label class="control-label" for="operator_licence">Operator Licence</label>
						<div class="controls">
							<input id="operator_licence" name="operator_licence" placeholder="Operator Licence" class="input-xlarge" type="text" value="<?php echo $values['operator_licence']; ?>">
							<p class="help-block">Text and license number, eg "PCO No.012345" - if blank logo will be hidden too</p>
						</div>
					</div>


<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="timezone">Local timezone <span title="Required" class="required">*</span></label>
  <div class="controls">
    <select id="timezone" name="timezone" class="input-medium">
      	  <option value="Europe/London" selected="selected">Europe/London</option>
	      </select>
	<p class="help-block">Please select your local timezone.</p>
  </div>
</div>
					
					<!-- Save-->
					<div class="control-group">
						<div class="controls">
							<input type="submit" value="Save" name="submit" class="btn btn-large btn-primary" />
						</div>
					</div>
					
				</fieldset>
				</form>
			</div><!-- /class_span -->
    	 </div><!-- /row ---------------------------------------------------------- -->




	</div><!-- /container -->
	<div id="push"></div>
</div><!-- /wrap -->




</body>
</html>
