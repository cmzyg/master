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

$settings->select('SELECT * FROM seo');
$seo = $settings->fetch();

$settings->select('SELECT * FROM settings');
$areas = $settings->fetch();


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

<title>Search Engine Optimization</title>

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
<h2>Search Engine Optimization</h2>

<form method="post" action="<?php echo $admin_url; ?>process-seo">

<table class="form-table">


<?php echo $settings->flashdata('Success'); ?>

<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>


<tr valign="top">
<th scope="row"><h3>Home Page</h3></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Title</label></th>
<td><input name="meta_title" type="text" id="blogname" value="<?php echo $seo['meta_title']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Keywords</label></th>
<td><input name="meta_keywords" type="text" id="blogname" value="<?php echo $seo['meta_keywords']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Description</label></th>
<td><textarea name="meta_description" cols="60" rows="10"><?php echo $seo['meta_description']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>



<!-- BOOKING PAGE SEO -->
<tr valign="top">
<th scope="row"><h3>Booking Page</h3></th>
<td></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Meta Title</label></th>
<td><input name="meta_title_booking" type="text" id="blogname" value="<?php echo $seo['meta_title_booking']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Keywords</label></th>
<td><input name="meta_keywords_booking" type="text" id="blogname" value="<?php echo $seo['meta_keywords_booking']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Description</label></th>
<td><textarea name="meta_description_booking" cols="60" rows="10"><?php echo $seo['meta_description_booking']; ?></textarea></td>
</tr>
<!-- END -->


<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>


<!-- ABOUT US PAGE SEO -->
<tr valign="top">
<th scope="row"><h3>About Us Page</h3></th>
<td></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Meta Title</label></th>
<td><input name="meta_title_about_us" type="text" id="blogname" value="<?php echo $seo['meta_title_about_us']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Keywords</label></th>
<td><input name="meta_keywords_about_us" type="text" id="blogname" value="<?php echo $seo['meta_keywords_about_us']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Description</label></th>
<td><textarea name="meta_description_about_us" cols="60" rows="10"><?php echo $seo['meta_description_about_us']; ?></textarea></td>
</tr>
<!-- END -->


<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>


<!-- ABOUT US PAGE SEO -->
<tr valign="top">
<th scope="row"><h3>FAQ Page</h3></th>
<td></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Meta Title</label></th>
<td><input name="meta_title_faq" type="text" id="blogname" value="<?php echo $seo['meta_title_faq']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Keywords</label></th>
<td><input name="meta_keywords_faq" type="text" id="blogname" value="<?php echo $seo['meta_keywords_faq']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Description</label></th>
<td><textarea name="meta_description_faq" cols="60" rows="10"><?php echo $seo['meta_description_faq']; ?></textarea></td>
</tr>
<!-- END -->


<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>


<!-- ABOUT US PAGE SEO -->
<tr valign="top">
<th scope="row"><h3>Contact Us Page</h3></th>
<td></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Meta Title</label></th>
<td><input name="meta_title_contact_us" type="text" id="blogname" value="<?php echo $seo['meta_title_contact_us']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Keywords</label></th>
<td><input name="meta_keywords_contact_us" type="text" id="blogname" value="<?php echo $seo['meta_keywords_contact_us']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Description</label></th>
<td><textarea name="meta_description_contact_us" cols="60" rows="10"><?php echo $seo['meta_description_contact_us']; ?></textarea></td>
</tr>
<!-- END -->


<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>



<!-- OTHER PAGES SEO -->
<tr valign="top">
<th scope="row"><h3>Other Pages</h3></th>
<td></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Meta Title</label></th>
<td><input name="meta_title_other" type="text" id="blogname" value="<?php echo $seo['meta_title_other']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Keywords</label></th>
<td><input name="meta_keywords_other" type="text" id="blogname" value="<?php echo $seo['meta_keywords_other']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Meta Description</label></th>
<td><textarea name="meta_description_other" cols="60" rows="10"><?php echo $seo['meta_description_other']; ?></textarea></td>
</tr>
<!-- END -->



<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>



<!-- OTHER PAGES SEO -->
<tr valign="top">
<th scope="row"><h3>Local Areas</h3></th>
<td></td>
</tr>


<tr valign="top">
<th scope="row"><label for="blogname">Main Area</label></th>
<td><input name="main_area" type="text" id="blogname" value="<?php echo $areas['main_area']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Other Areas</label></th>
<td><input name="area2" type="text" id="blogname" value="<?php echo $areas['area2']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"></label></th>
<td><input name="area3" type="text" id="blogname" value="<?php echo $areas['area3']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"></label></th>
<td><input name="area4" type="text" id="blogname" value="<?php echo $areas['area4']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"></label></th>
<td><input name="area5" type="text" id="blogname" value="<?php echo $areas['area5']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"></label></th>
<td><input name="area6" type="text" id="blogname" value="<?php echo $areas['area6']; ?>" class="regular-text" /></td>
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
		<strong><a href=""></a></strong>	</p>
	<div class="clear"></div>
</div>

	<link rel='stylesheet' id='wpcom-notes-admin-bar-css'  href='http://s0.wp.com/wp-content/mu-plugins/notes/admin-bar-v2.css?ver=2.9.3-201417' type='text/css' media='all' />
<link rel='stylesheet' id='noticons-css'  href='http://s0.wp.com/i/noticons/noticons.css?ver=2.9.3-201417' type='text/css' media='all' />


<script type='text/javascript' src='http://sexdirectoryuk.com/wp-admin/load-scripts.php?c=1&amp;load%5B%5D=hoverIntent,common,admin-bar,svg-painter,heartbeat,wp-auth-check,underscore,backbone&amp;ver=3.8.3'></script>



<div class="clear"></div></div><!-- wpwrap -->

</body>
</html>
