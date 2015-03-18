<?php
$page_label = 'settings';
require_once('core/connect.php');
require_once('includes/settings.php');

require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);

$values     = $settings->getOtherPages();

$controller->select('SELECT * FROM faq');
$faq = $controller->fetch();

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

$database->select('SELECT * FROM vehicles WHERE type = "Minicoach"');
$minicoach = $database->fetch();
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

<title>Vehicles and Uplifts</title>

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
   var units         = document.getElementById('pound_or_percentage');
   var estate_uplift = document.getElementById('estate_uplift');

   if(units.selectedIndex == 0)
   {
      estate_uplift.className = "";
      estate_uplift.className = "pound-icon";
   }
   else if(units.selectedIndex == 1)
   {
      estate_uplift.className = "";
      estate_uplift.className = "percentage-icon";
   }
}
</script>

	
<div id="wpwrap">
<a tabindex="1" href="#wpbody-content" class="screen-reader-shortcut">Skip to main content</a>

<div id="adminmenuback"></div>

<?php include('includes/admin_navigation.php'); ?>

<div id="wpcontent">

<?php include('includes/admin_bar.php'); ?>
		
<div id="wpbody">

<div id="wpbody-content" aria-label="Main content" tabindex="0">



<div class="wrap">
<h2>Vehicles and Uplifts</h2>

<form method="post" action="<?php echo $admin_url; ?>process-vehicles-and-uplifts">
<input type='hidden' name='option_page' value='general' /><input type="hidden" name="action" value="update" /><input type="hidden" id="_wpnonce" name="_wpnonce" value="e32afa69af" /><input type="hidden" name="_wp_http_referer" value="/wp-admin/options-general.php" />
<table class="form-table">


<?php echo $settings->flashdata('Success'); ?>


<tr valign="top">
<th scope="row"><label for="blogname">Saloon Car</label></th>
<td>Uplift <input name="saloon_uplift_percentage" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $saloon['uplift']; ?>" class="regular-text percentage-icon" /></td>
<td>Seats <input name="saloon_seats" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $saloon['seats']; ?>" class="regular-text" /></td>
<td>Large Bags <input name="saloon_large_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $saloon['large_bags']; ?>" class="regular-text" /></td>
<td>Small Bags <input name="saloon_small_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $saloon['small_bags']; ?>" class="regular-text" /></td>
<td><select name="saloon_status"><option value='active' <?php if($saloon['status'] == 'active') { echo "selected='selected'"; } ?>>Active</option><option value='inactive' <?php if($saloon['status'] == 'inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Estate Car</label></th>
<td>Uplift <input name="estate_uplift_percentage" style="text-align:center; width:100px;" type="text" id="estate_uplift" value="<?php echo $estate['uplift']; ?>" class="regular-text <?php if($estate['uplift_units'] == 'Percentages') { echo "percentage-icon"; } else { echo "pound-icon"; } ?>" /></td>
<td>Seats <input name="estate_seats" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $estate['seats']; ?>" class="regular-text" /></td>
<td>Large Bags <input name="estate_large_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $estate['large_bags']; ?>" class="regular-text" /></td>
<td>Small Bags <input name="estate_small_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $estate['small_bags']; ?>" class="regular-text" /></td>
<td><select name="estate_status"><option value='active' <?php if($estate['status'] == 'active') { echo "selected='selected'"; } ?>>Active</option><option value='inactive' <?php if($estate['status'] == 'inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"></label></th>
<td>Units&nbsp; <select onchange="units()" name="pound_or_percentage" style="width:120px" id="pound_or_percentage"><option value='Pounds' <?php if($estate['uplift_units'] == 'Pounds') { echo "selected='selected'"; } ?>>Pounds</option><option value='Percentages' <?php if($estate['uplift_units'] == 'Percentages') { echo "selected='selected'"; } ?>>Percentages</option><select></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Executive Car</label></th>
<td>Uplift <input name="executive_uplift_percentage" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $executive['uplift']; ?>" class="regular-text percentage-icon" /></td>
<td>Seats <input name="executive_seats" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $executive['seats']; ?>" class="regular-text" /></td>
<td>Large Bags <input name="executive_large_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $executive['large_bags']; ?>" class="regular-text" /></td>
<td>Small Bags <input name="executive_small_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $executive['small_bags']; ?>" class="regular-text" /></td>
<td><select name="executive_status"><option value='active' <?php if($executive['status'] == 'active') { echo "selected='selected'"; } ?>>Active</option><option value='inactive' <?php if($executive['status'] == 'inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">MPV</label></th>
<td>Uplift <input name="mpv_uplift_percentage" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $mpv['uplift']; ?>" class="regular-text percentage-icon" /></td>
<td>Seats <input name="mpv_seats" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $mpv['seats']; ?>" class="regular-text" /></td>
<td>Large Bags <input name="mpv_large_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $mpv['large_bags']; ?>" class="regular-text" /></td>
<td>Small Bags <input name="mpv_small_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $mpv['small_bags']; ?>" class="regular-text" /></td>
<td><select name="mpv_status"><option value='active' <?php if($mpv['status'] == 'active') { echo "selected='selected'"; } ?>>Active</option><option value='inactive' <?php if($mpv['status'] == 'inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Minibus</label></th>
<td>Uplift <input name="minibus_uplift_percentage" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minibus['uplift']; ?>" class="regular-text percentage-icon" /></td>
<td>Seats <input name="minibus_seats" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minibus['seats']; ?>" class="regular-text" /></td>
<td>Large Bags <input name="minibus_large_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minibus['large_bags']; ?>" class="regular-text" /></td>
<td>Small Bags <input name="minibus_small_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minibus['small_bags']; ?>" class="regular-text" /></td>
<td><select name="minibus_status"><option value='active' <?php if($minibus['status'] == 'active') { echo "selected='selected'"; } ?>>Active</option><option value='inactive' <?php if($minibus['status'] == 'inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Mini Coach</label></th>
<td>Uplift <input name="minicoach_uplift_percentage" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minicoach['uplift']; ?>" class="regular-text percentage-icon" /></td>
<td>Seats <input name="minicoach_seats" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minicoach['seats']; ?>" class="regular-text" /></td>
<td>Large Bags <input name="minicoach_large_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minicoach['large_bags']; ?>" class="regular-text" /></td>
<td>Small Bags <input name="minicoach_small_bags" style="text-align:center; width:100px;" type="text" id="blogname" value="<?php echo $minicoach['small_bags']; ?>" class="regular-text" /></td>
<td><select name="minicoach_status"><option value='active' <?php if($minicoach['status'] == 'active') { echo "selected='selected'"; } ?>>Active</option><option value='inactive' <?php if($minicoach['status'] == 'inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
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
		<strong><a href="http://sexdirectoryuk.com/wp-admin/update-core.php"></a></strong>	</p>
	<div class="clear"></div>
</div>
	<div id="wp-auth-check-wrap" class="hidden">
	<div id="wp-auth-check-bg"></div>
	<div id="wp-auth-check">
	<div class="wp-auth-check-close" tabindex="0" title="Close"></div>
			<div id="wp-auth-check-form" data-src="http://sexdirectoryuk.com/wp-login.php?interim-login=1"></div>
			<div class="wp-auth-fallback">
		<p><b class="wp-auth-fallback-expired" tabindex="0">Session expired</b></p>
		<p><a href="http://sexdirectoryuk.com/wp-login.php" target="_blank">Please log in again.</a>
		The login page will open in a new window. After logging in you can close it and return to this page.</p>
	</div>
	</div>
	</div>
	<link rel='stylesheet' id='wpcom-notes-admin-bar-css'  href='http://s0.wp.com/wp-content/mu-plugins/notes/admin-bar-v2.css?ver=2.9.3-201417' type='text/css' media='all' />
<link rel='stylesheet' id='noticons-css'  href='http://s0.wp.com/i/noticons/noticons.css?ver=2.9.3-201417' type='text/css' media='all' />

<script type='text/javascript' src='http://sexdirectoryuk.com/wp-admin/load-scripts.php?c=1&amp;load%5B%5D=hoverIntent,common,admin-bar,svg-painter,heartbeat,wp-auth-check,underscore,backbone&amp;ver=3.8.3'></script>
<script type='text/javascript' src='http://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201417'></script>
<script type='text/javascript' src='http://s1.wp.com/wp-content/js/mustache.js?ver=2.9.3-201417'></script>


<div class="clear"></div></div><!-- wpwrap -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
