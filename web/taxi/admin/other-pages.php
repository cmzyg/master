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

<title>Other Pages</title>

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
<h2>Other Pages</h2>

<form method="post" action="<?php echo $admin_url; ?>process-other-pages" enctype="multipart/form-data">
<input type='hidden' name='option_page' value='general' /><input type="hidden" name="action" value="update" /><input type="hidden" id="_wpnonce" name="_wpnonce" value="e32afa69af" /><input type="hidden" name="_wp_http_referer" value="/wp-admin/options-general.php" />
<table class="form-table">


<?php echo $settings->flashdata('Success'); ?>

<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>

<tr valign="top">
<th scope="row"><h3>About Us Page</h3></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">About Us Page Text</label></th>
<td><textarea name="about_us_text" cols="60" rows="10"><?php echo $controller->new_line($values['about_us_text']); ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Image</label></th>
<td style="float:left"><img src="../../<?php echo $values['about_us_image']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file_about" type="file" id="blogname" value="" class="regular-text" /></td>
</tr>



<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>

<tr valign="top">
<th scope="row"><h3>Contact Us Page</h3></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Get In Touch Text</label></th>
<td><textarea name="contact_get_in_touch_text" cols="40" rows="10"><?php echo $values['contact_get_in_touch_text']; ?></textarea></td>
</tr>



<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>




<tr valign="top">
<th scope="row"><h3>FAQ Page</h3></th>
<td></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 1</label></th>
<td><input name="faqq1" type="text" id="blogname" value="<?php echo $faq['faqq1']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 1</label></th>
<td><textarea name="faqa1" cols="40" rows="10"><?php echo $faq['faqa1']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 2</label></th>
<td><input name="faqq2" type="text" id="blogname" value="<?php echo $faq['faqq2']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 2</label></th>
<td><textarea name="faqa2" cols="40" rows="10"><?php echo $faq['faqa2']; ?></textarea></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 3</label></th>
<td><input name="faqq3" type="text" id="blogname" value="<?php echo $faq['faqq3']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 3</label></th>
<td><textarea name="faqa3" cols="40" rows="10"><?php echo $faq['faqa3']; ?></textarea></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 4</label></th>
<td><input name="faqq4" type="text" id="blogname" value="<?php echo $faq['faqq4']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 4</label></th>
<td><textarea name="faqa4" cols="40" rows="10"><?php echo $faq['faqa4']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 5</label></th>
<td><input name="faqq5" type="text" id="blogname" value="<?php echo $faq['faqq5']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 5</label></th>
<td><textarea name="faqa5" cols="40" rows="10"><?php echo $faq['faqa5']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 6</label></th>
<td><input name="faqq6" type="text" id="blogname" value="<?php echo $faq['faqq6']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 6</label></th>
<td><textarea name="faqa6" cols="40" rows="10"><?php echo $faq['faqa6']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 7</label></th>
<td><input name="faqq7" type="text" id="blogname" value="<?php echo $faq['faqq7']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 7</label></th>
<td><textarea name="faqa7" cols="40" rows="10"><?php echo $faq['faqa7']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 8</label></th>
<td><input name="faqq8" type="text" id="blogname" value="<?php echo $faq['faqq8']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 8</label></th>
<td><textarea name="faqa8" cols="40" rows="10"><?php echo $faq['faqa8']; ?></textarea></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 9</label></th>
<td><input name="faqq9" type="text" id="blogname" value="<?php echo $faq['faqq9']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 9</label></th>
<td><textarea name="faqa9" cols="40" rows="10"><?php echo $faq['faqa9']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Question 10</label></th>
<td><input name="faqq10" type="text" id="blogname" value="<?php echo $faq['faqq10']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">FAQ Answer 10</label></th>
<td><textarea name="faqa10" cols="40" rows="10"><?php echo $faq['faqa10']; ?></textarea></td>
</tr>






<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>

<tr valign="top">
<th scope="row"><h3>Footer</h3></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">About Us Text</label></th>
<td><input name="footer_about_us_text" type="text" id="blogname" value="<?php echo $values['footer_about_us_text']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Fully Licenced Service Image</label></th>
<td style="float:left"><img src="../../<?php echo $values['footer_fully_licenced_service_image']; ?>" /></td>
<td style="float:left"><input name="file1" type="file" id="blogname" value="" class="regular-text" /></td>
</tr>





<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>


<tr valign="top">
<th scope="row"><h3>Terms Page</h3></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Terms Page Text</label></th>
<td><textarea name="terms_text" cols="60" rows="10"><?php echo $controller->new_line($values['terms_text']); ?></textarea></td>
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
