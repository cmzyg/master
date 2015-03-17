<?php
$page_label = 'settings';
require_once('core/connect.php');
require_once('includes/settings.php');

require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
require_once('core/rates.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);
$rates      = new Rates($db);

$rate = $rates->getRates();

if($rate['apply_bank_holiday_rate_uplift'] == 1) { $bank_holiday_yes = 'checked="checked"'; } else { $bank_holiday_yes = ''; }
if($rate['apply_bank_holiday_rate_uplift'] == 0) { $bank_holiday_no  = 'checked="checked"'; } else { $bank_holiday_no  = ''; }

if($rate['apply_night_rate_uplift'] == 1) { $night_yes = 'checked="checked"'; } else { $night_yes = ''; }
if($rate['apply_night_rate_uplift'] == 0) { $night_no  = 'checked="checked"'; } else { $night_no  = ''; }

if($rate['apply_sunday_rate_uplift'] == 1) { $sunday_yes = 'checked="checked"'; } else { $sunday_yes = ''; }
if($rate['apply_sunday_rate_uplift'] == 0) { $sunday_no  = 'checked="checked"'; } else { $sunday_no  = ''; }

?>
<!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8 wp-toolbar"  lang="en-US">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar"  lang="en-US">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>Meter Rates</title>

<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/dashicons.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/admin-bar.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/wp-admin.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/buttons.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/colors.min.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/fancybox.css' />
<link rel='stylesheet' id='open-sans-css' href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=3.8.3' type='text/css' media='all' />

<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='<?php echo $admin_url; ?>assets/css/ie.min.css' type='text/css' media='all' />
<![endif]-->

<script src='<?php echo $admin_url; ?>assets/js/jquery-1.11.1.min.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/utils.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/json2.js'></script>
<style>
.invisible
{
	visibility: hidden;
}

.percentage-icon
{ 
   background-image:url('../../assets/img/percentage.png');
   background-repeat:no-repeat;
   background-position:left top;  
   padding-left:15px;
}

.pound-icon
{ 
   background-image:url('../../assets/img/pound.png');
   background-repeat:no-repeat;
   background-position:left top;  
   padding-left:15px;
}

.clock-icon
{ 
   background-image:url('../../assets/img/clock.png');
   background-repeat:no-repeat;
   background-position:left top;  
   padding-left:15px;
}
</style>
</head>


<body class="wp-admin wp-core-ui no-js  jetpack-connected options-general-php auto-fold admin-bar branch-3-8 version-3-8-3 admin-color-fresh locale-en-us no-customize-support no-svg">
<script type="text/javascript">
	document.body.className = document.body.className.replace('no-js','js');
</script>

<script>

function units()
{
   var units = document.getElementById('pound_or_percentage');
   var night_rate_uplift = document.getElementById('night_rate_uplift');

   if(units.selectedIndex == 1)
   {
      night_rate_uplift.className = "";
      night_rate_uplift.className = "pound-icon";
   }
   else if(units.selectedIndex == 2)
   {
      night_rate_uplift.className = "";
      night_rate_uplift.className = "percentage-icon";
   }
}

function sunday_units()
{
   var units = document.getElementById('sunday_pound_or_percentage');
   var sunday_rate_uplift = document.getElementById('sunday_rate_uplift');

   if(units.selectedIndex == 1)
   {
      sunday_rate_uplift.className = "";
      sunday_rate_uplift.className = "pound-icon";
   }
   else if(units.selectedIndex == 2)
   {
      sunday_rate_uplift.className = "";
      sunday_rate_uplift.className = "percentage-icon";
   }
}

function bank_units()
{
   var units = document.getElementById('bank_pound_or_percentage');
   var bank_rate_uplift = document.getElementById('bank_rate_uplift');

   if(units.selectedIndex == 1)
   {
      bank_rate_uplift.className = "";
      bank_rate_uplift.className = "pound-icon";
   }
   else if(units.selectedIndex == 2)
   {
      bank_rate_uplift.className = "";
      bank_rate_uplift.className = "percentage-icon";
   }
}

</script>

	
<div id="wpwrap">

<div id="adminmenuback"></div>

<?php include('includes/admin_navigation.php'); ?>

<div id="wpcontent">

<?php include('includes/admin_bar.php'); ?>
		
<div id="wpbody">

<div id="wpbody-content" aria-label="Main content" tabindex="0">



<div class="wrap">
<h2>Meter Rates</h2>

<form method="post" action="<?php echo $admin_url; ?>process-meter-rates">

<table class="form-table">


<?php echo $settings->flashdata('Success'); ?>

<tr valign="top">
<th scope="row" style="width:300px"><label for="blogname">Booking Notice (Hours)</label></th>
<td><input name="minimum_booking_notice" style="text-align: center; width:25%" type="text" id="blogname" value="<?php echo $rate['minimum_booking_notice']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Day Rate Starts</label></th>
<td><input name="day_rate_hour_start" style="text-align: center; width:25%" type="text" id="blogname" value="<?php echo $rate['day_rate_hour_start']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Day Rate Ends</label></th>
<td><input name="day_rate_hour_end" style="text-align: center; width:25%" type="text" id="blogname" value="<?php echo $rate['day_rate_hour_end']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Minimum Fare</label></th>
<td><input name="minimum_fare_amount" style="text-align:center; width:25%;" type="text" id="blogname" value="<?php echo $rate['minimum_fare_amount']; ?>" class="regular-text pound-icon" /></td>
<td>for first <input name="minimum_fare_miles" style="text-align:center; width:25%;" type="text" id="blogname" value="<?php echo $rate['minimum_fare_miles']; ?>" class="regular-text" /> miles</td>
</tr>



<tr valign="top">
<th scope="row"><label for="blogname">Standard Day Rate per Mile</label></th>
<td><input name="standard_day_rate" type="text" id="blogname" style="text-align: center; width:25%" value="<?php echo $rate['standard_day_rate']; ?>" class="regular-text pound-icon" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Long Distance Rate per Mile</label></th>
<td><input name="long_distance_fare_amount" style="text-align:center; width:25%;" type="text" id="blogname" value="<?php echo $rate['long_distance_fare_amount']; ?>" class="regular-text pound-icon" /></td>
<td>after <input name="long_distance_fare_miles" style="text-align:center; width:25%;" type="text" id="blogname" value="<?php echo $rate['long_distance_fare_miles']; ?>" class="regular-text" /> miles</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Night Rate Uplift</label></th>
<td><select onchange="units()" name="pound_or_percentage" id="pound_or_percentage"><option value='0'>Please select a unit</option><option value='Pounds' <?php if($rate['night_rate_uplift_units'] == 'Pounds') { echo "selected='selected'"; } ?>>Pounds</option><option value='Percentages' <?php if($rate['night_rate_uplift_units'] == 'Percentages') { echo "selected='selected'"; } ?>>Percentages</option><select></td>
<td><input name="night_rate_uplift" type="text" id="night_rate_uplift" style="text-align: center; width:25%" value="<?php echo $rate['night_rate_uplift']; ?>" class="regular-text <?php if($rate['night_rate_uplift_units'] == 'Pounds') { echo "pound-icon"; } else { echo "percentage-icon"; } ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Apply night rate uplift to fixed prices</label></th>
<td><input name="apply_night_rate_uplift" style="text-align: center;" type="radio" value="0" <?php echo $night_no; ?> />No &nbsp;&nbsp;<input name="apply_night_rate_uplift" style="text-align: center" type="radio" id="blogname" value="1" <?php echo $night_yes; ?> />Yes</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Sunday Rate Uplift</label></th>
<td><select onchange="sunday_units()" name="sunday_pound_or_percentage" id="sunday_pound_or_percentage"><option value='0'>Please select a unit</option><option value='Pounds' <?php if($rate['sunday_rate_uplift_units'] == 'Pounds') { echo "selected='selected'"; } ?>>Pounds</option><option value='Percentages' <?php if($rate['sunday_rate_uplift_units'] == 'Percentages') { echo "selected='selected'"; } ?>>Percentages</option><select></td>
<td><input name="sunday_rate_uplift" type="text" id="sunday_rate_uplift" style="text-align: center; width:25%" value="<?php echo $rate['sunday_rate_uplift']; ?>" class="regular-text <?php if($rate['sunday_rate_uplift_units'] == 'Pounds') { echo "pound-icon"; } else { echo "percentage-icon"; } ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Apply sunday rate uplift to fixed prices</label></th>
<td><input name="apply_sunday_rate_uplift" style="text-align: center;" type="radio" value="0" <?php echo $sunday_no; ?> />No &nbsp;&nbsp;<input name="apply_sunday_rate_uplift" style="text-align: center" type="radio" id="blogname" value="1" <?php echo $sunday_yes; ?> />Yes</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Bank Holiday Uplift</label></th>
<td><select onchange="bank_units()" name="bank_pound_or_percentage" id="bank_pound_or_percentage"><option value='0'>Please select a unit</option><option value='Pounds' <?php if($rate['bank_holiday_uplift_units'] == 'Pounds') { echo "selected='selected'"; } ?>>Pounds</option><option value='Percentages' <?php if($rate['bank_holiday_uplift_units'] == 'Percentages') { echo "selected='selected'"; } ?>>Percentages</option><select></td>
<td><input name="bank_holiday_uplift" type="text" id="bank_rate_uplift" style="text-align: center; width:25%" value="<?php echo $rate['bank_holiday_uplift']; ?>" class="regular-text <?php if($rate['bank_holiday_uplift_units'] == 'Pounds') { echo "pound-icon"; } else { echo "percentage-icon"; } ?>" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Apply bank holiday rate uplift to fixed prices</label></th>
<td><input name="apply_bank_holiday_rate_uplift" style="text-align: center;" type="radio" value="0" <?php echo $bank_holiday_no; ?> />No &nbsp;&nbsp;<input name="apply_bank_holiday_rate_uplift" style="text-align: center" type="radio" id="blogname" value="1" <?php echo $bank_holiday_yes; ?> />Yes</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meet and Greet</label></th>
<td><input name="meet_and_greet" style="text-align: center; width:25%" type="text" id="blogname" value="<?php echo $rate['meet_and_greet']; ?>" class="regular-text pound-icon" /></td>
</tr>


</table>


<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>

</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

<div id="wpfooter">
		<p id="footer-left" class="alignleft">
		<span id="footer-thankyou"></span>	</p>
	<p id="footer-upgrade" class="alignright">
		</p>
	<div class="clear"></div>
</div>

	<link rel='stylesheet' id='wpcom-notes-admin-bar-css'  href='http://s0.wp.com/wp-content/mu-plugins/notes/admin-bar-v2.css?ver=2.9.3-201417' type='text/css' media='all' />
<link rel='stylesheet' id='noticons-css'  href='http://s0.wp.com/i/noticons/noticons.css?ver=2.9.3-201417' type='text/css' media='all' />


<script src='<?php echo $admin_url; ?>assets/js/hoverIntent.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/common.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/wp-lists.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/jquery.fancybox.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/mousewheel.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/functions.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/admin-bar-v2.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/utils.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/json2.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/scripts.js'></script>


<div class="clear"></div></div>

</body>
</html>
