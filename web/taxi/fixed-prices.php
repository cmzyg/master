<?php
$page_label = 'settings';
require_once('core/connect.php');
require_once('includes/settings.php');

require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
require_once('core/fixed.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);
$fixed      = new Fixed($db);

$value = $fixed->getFixedPrices();

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

<title>Fixed Prices</title>

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

	
<div id="wpwrap">

<div id="adminmenuback"></div>

<?php include('includes/admin_navigation.php'); ?>

<div id="wpcontent">

<?php include('includes/admin_bar.php'); ?>
		
<div id="wpbody">

<div id="wpbody-content" aria-label="Main content" tabindex="0">



<div class="wrap">
<h2>Fixed Prices</h2>

<form method="post" action="<?php echo $admin_url; ?>process-fixed-prices">

<table class="form-table">


<?php echo $settings->flashdata('Success'); ?>


<tr valign="top">
<th scope="row"><label for="blogname">Fixed Prices Intro</label></th>
<td><input name="fixed_price_intro" style="text-align: center" type="text" id="blogname" value="<?php echo $value['fixed_price_intro']; ?>" class="regular-text" /></td>
</tr>


<!-- destination 1 start -->

<tr valign="top">
<th scope="row"><label for="blogname">Destination 1</label></th>
<td>
	<input name="fixed_location_1" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_1']; ?>" class="regular-text" />&nbsp;&nbsp;
    <input name="fixed_price_1" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_1']; ?>" class="regular-text pound-icon" />
    <select name="fixed_1_status"><option value='Active' <?php if($value['fixed_1_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_1_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination 1 Image</label></th>
<td style="float:left"><img src="../../<?php echo $value['fixed_price_1_img']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file1" type="file" id="blogname" value="" class="regular-text" /></td>
</tr>

<!-- destination 1 end -->

<tr valign="top">
<th scope="row"><label for="blogname">Destination 2</label></th>
<td>
	<input name="fixed_location_2" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_2']; ?>" class="regular-text" />&nbsp;&nbsp;
    <input name="fixed_price_2" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_2']; ?>" class="regular-text pound-icon" />
    <select name="fixed_2_status"><option value='Active' <?php if($value['fixed_2_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_2_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination 2 Image</label></th>
<td style="float:left"><img src="../../<?php echo $value['fixed_price_2_img']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file2" type="file" id="blogname" value="" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td>
	<input name="fixed_location_3" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_3']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_3" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_3']; ?>" class="regular-text pound-icon" />
	<select name="fixed_3_status"><option value='Active' <?php if($value['fixed_3_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_3_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td><input name="fixed_location_4" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_4']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_4" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_4']; ?>" class="regular-text pound-icon" />
    <select name="fixed_4_status"><option value='Active' <?php if($value['fixed_4_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_4_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td><input name="fixed_location_5" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_5']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_5" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_5']; ?>" class="regular-text pound-icon" />
    <select name="fixed_5_status"><option value='Active' <?php if($value['fixed_5_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_5_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td><input name="fixed_location_6" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_6']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_6" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_6']; ?>" class="regular-text pound-icon" />
    <select name="fixed_6_status"><option value='Active' <?php if($value['fixed_6_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_6_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td>
	<input name="fixed_location_7" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_7']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_7" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_7']; ?>" class="regular-text pound-icon" />
    <select name="fixed_7_status"><option value='Active' <?php if($value['fixed_7_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_7_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td>
	<input name="fixed_location_8" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_8']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_8" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_8']; ?>" class="regular-text pound-icon" />
    <select name="fixed_8_status"><option value='Active' <?php if($value['fixed_8_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_8_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td>
	<input name="fixed_location_9" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_9']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_9" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_9']; ?>" class="regular-text pound-icon" />
    <select name="fixed_9_status"><option value='Active' <?php if($value['fixed_9_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_9_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td>
	<input name="fixed_location_10" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_10']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_10" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_10']; ?>" class="regular-text pound-icon" />
	<select name="fixed_10_status"><option value='Active' <?php if($value['fixed_10_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_10_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td>
	<input name="fixed_location_11" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_11']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_11" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_11']; ?>" class="regular-text pound-icon" />
	<select name="fixed_11_status"><option value='Active' <?php if($value['fixed_11_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_11_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Destination</label></th>
<td>
	<input name="fixed_location_12" type="text" id="blogname" style="text-align: center;" value="<?php echo $value['fixed_location_12']; ?>" class="regular-text" />&nbsp;&nbsp;
	<input name="fixed_price_12" type="text" id="blogname" style="text-align: center; width: 18%" value="<?php echo $value['fixed_price_12']; ?>" class="regular-text pound-icon" />
	<select name="fixed_12_status"><option value='Active' <?php if($value['fixed_12_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($value['fixed_12_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select>
</td>
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

<script type='text/javascript'>
/* <![CDATA[ */
var commonL10n = {"warnDelete":"You are about to permanently delete the selected items.\n  'Cancel' to stop, 'OK' to delete."};
var commonL10n = {"warnDelete":"You are about to permanently delete the selected items.\n  'Cancel' to stop, 'OK' to delete."};var heartbeatSettings = {"nonce":"406d9d2f5f"};
var heartbeatSettings = {"nonce":"406d9d2f5f"};var authcheckL10n = {"beforeunload":"Your session has expired. You can log in again from this page or go to the login page.","interval":"180"};
var authcheckL10n = {"beforeunload":"Your session has expired. You can log in again from this page or go to the login page.","interval":"180"};/* ]]> */
</script>
<script type='text/javascript' src='http://sexdirectoryuk.com/wp-admin/load-scripts.php?c=1&amp;load%5B%5D=hoverIntent,common,admin-bar,svg-painter,heartbeat,wp-auth-check,underscore,backbone&amp;ver=3.8.3'></script>
<script type='text/javascript' src='http://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201417'></script>
<script type='text/javascript' src='http://s1.wp.com/wp-content/js/mustache.js?ver=2.9.3-201417'></script>


<div class="clear"></div></div><!-- wpwrap -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
