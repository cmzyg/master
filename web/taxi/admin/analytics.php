<?php
$page_label = 'social';
require_once('core/connect.php');
require_once('includes/settings.php');

require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
require_once('core/gapi.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);

// get social media from the database
$database->selectAll('SELECT * FROM social_media');
$social_media = $database->fetchAll();

$database->select('SELECT * FROM analytics');
$analytics = $database->fetch();

define('ga_email',      $analytics['gapi_email']);
define('ga_password',   $analytics['gapi_password']);
define('ga_profile_id', $analytics['gapi_id']);


$ga = new gapi(ga_email,ga_password);

$ga->requestReportData(ga_profile_id,array('country','city'),array('pageviews','visits', 'visitors'));

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

<title>Analytics</title>

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

</head>


<body class="wp-admin wp-core-ui no-js  jetpack-connected options-general-php auto-fold admin-bar branch-3-8 version-3-8-3 admin-color-fresh locale-en-us no-customize-support no-svg">
<script type="text/javascript">
	document.body.className = document.body.className.replace('no-js','js');
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
<h2>Google Analytics</h2>


<table class="form-table">



<tr valign="top">
	<th scope="row"><label for="blogname">Visits</label></th>
	<td><input style='width:60px; text-align: center;' type="text" id="blogname" value="<?php echo $ga->getVisits(); ?>" class="regular-text" readonly /></td>
</tr>

<tr valign="top">
	<th scope="row"><label for="blogname">Pageviews</label></th>
	<td><input style='width:60px; text-align: center;' type="text" id="blogname" value="<?php echo $ga->getPageviews(); ?>" class="regular-text" readonly /></td>
</tr>

<tr valign="top">
	<th scope="row"><label for="blogname">Unique Visitors</label></th>
	<td><input style='width:60px; text-align: center;' type="text" id="blogname" value="<?php echo $ga->getVisitors(); ?>" class="regular-text" readonly /></td>
</tr>





</table>


</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

<div id="wpfooter">
		<p id="footer-left" class="alignleft">
		<span id="footer-thankyou"></span>	</p>
	<p id="footer-upgrade" class="alignright">
		<strong></strong>	</p>
	<div class="clear"></div>
</div>

	<link rel='stylesheet' id='wpcom-notes-admin-bar-css'  href='http://s0.wp.com/wp-content/mu-plugins/notes/admin-bar-v2.css?ver=2.9.3-201417' type='text/css' media='all' />
<link rel='stylesheet' id='noticons-css'  href='http://s0.wp.com/i/noticons/noticons.css?ver=2.9.3-201417' type='text/css' media='all' />

<script type='text/javascript' src='http://sexdirectoryuk.com/wp-admin/load-scripts.php?c=1&amp;load%5B%5D=hoverIntent,common,admin-bar,svg-painter,heartbeat,wp-auth-check,underscore,backbone&amp;ver=3.8.3'></script>


<div class="clear"></div></div><!-- wpwrap -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
