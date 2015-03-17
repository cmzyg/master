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

$homepage   = $settings->getHomepageSettings();
$homepage_settings = $settings->getSettings();
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

<title>Homepage</title>

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
<h2>Homepage</h2>

<form method="post" action="<?php echo $admin_url; ?>process-homepage-settings" enctype="multipart/form-data">

<table class="form-table">


<?php echo $settings->flashdata('Success'); ?>

<tr valign="top">
<th scope="row"><label for="blogname"><h1>Homepage Text Title</h1></label></th>
<td><input name="homepage_title" type="text" id="blogname" value="<?php echo $homepage['homepage_title']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"><h2>Company Intro Text</h2></label></th>
<td><textarea name="homepage_subtitle" cols="60" rows="4" type="text" id="blogname" class="regular-text" /><?php echo $homepage['homepage_subtitle']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Homepage Main Text</label></th>
<td><textarea name="homepage_text" cols="60" rows="10"><?php echo $homepage['homepage_text']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Homepage Text Signature</label></th>
<td style="float:left"><select name="signature"><option value='Yes' <?php if($homepage['signature'] == 'Yes') { echo "selected='selected'"; } ?>>Show Signature</option><option value='No' <?php if($homepage['signature'] == 'No') { echo "selected='selected'"; } ?>>Hide Signature</option><select></td>
</tr>



<!--
<tr valign="top">
<th scope="row"><label for="blogname">Testimonial</label></th>
<td><textarea name="homepage_testimonial" cols="60" rows="10"><?php echo $homepage['homepage_testimonial']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Testimonial Author</label></th>
<td><input name="homepage_testimonial_author" type="text" id="blogname" value="<?php echo $homepage['homepage_testimonial_author']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Testimonial 2</label></th>
<td><textarea name="homepage_testimonial_2" cols="60" rows="10"><?php echo $homepage['homepage_testimonial_2']; ?></textarea></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Testimonial Author 2</label></th>
<td><input name="homepage_testimonial_author_2" type="text" id="blogname" value="<?php echo $homepage['homepage_testimonial_author_2']; ?>" class="regular-text" /></td>
</tr>
-->

<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"><h1>Header</h1> </label></th>
<td><span class="description" style="font-weight:normal; width:100%">You may use a logo or a free text in the header. 200x100 logo dimensions are advised.</span></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Logo</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['logo']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="logo" type="file" id="blogname" value="" class="regular-text" /></td>
<td style="float:left;"><span class="description">Width </span><input style="width:40px" name="logo_width" type="text" id="blogname" value="<?php echo $homepage['logo_width']; ?>" class="regular-text" /><span class="description"> px</span></td>
<td style="float:left;"><span class="description">Height </span><input style="width:40px" name="logo_height" type="text" id="blogname" value="<?php echo $homepage['logo_height']; ?>" class="regular-text" /><span class="description"> px</span></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Title</label></th>
<td><input name="header_title" type="text" id="blogname" value="<?php echo $homepage['header_title']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Subtitle</label></th>
<td><input name="header_subtitle" type="text" id="blogname" value="<?php echo $homepage['header_subtitle']; ?>" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Header Status</label></th>
<td><select name="header_status"><option value='Logo' <?php if($homepage['header_status'] == 'Logo') { echo "selected='selected'"; } ?>>Show Logo</option><option value='Text' <?php if($homepage['header_status'] == 'Text') { echo "selected='selected'"; } ?>>Show Free Text</option><select></td>
</td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Free Text</label></th>
<td><input name="header_freetext" type="text" id="blogname" value="<?php echo $homepage_settings['free_text']; ?>" class="regular-text" /></td>
</td>
</tr>



<tr valign="top">
<th scope="row"><hr /></th>
<td><hr /></td>
</tr>

<tr valign="top">
<th scope="row"><h1>Slider</h1></th>
<td></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Banner 1</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['banner_1']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file1" type="file" id="blogname" value="" class="regular-text" /></td>
<td style="float:left"><select name="banner_1_status"><option value='Active' <?php if($homepage['banner_1_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($homepage['banner_1_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Banner 2</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['banner_2']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file2" type="file" id="blogname" value="" class="regular-text" /></td>
<td style="float:left"><select name="banner_2_status"><option value='Active' <?php if($homepage['banner_2_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($homepage['banner_2_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Banner 3</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['banner_3']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file3" type="file" id="blogname" value="" class="regular-text" /></td>
<td style="float:left"><select name="banner_3_status"><option value='Active' <?php if($homepage['banner_3_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($homepage['banner_3_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Banner 4</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['banner_4']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file4" type="file" id="blogname" value="" class="regular-text" /></td>
<td style="float:left"><select name="banner_4_status"><option value='Active' <?php if($homepage['banner_4_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($homepage['banner_4_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Banner 5</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['banner_5']; ?>" width="200" height="100" /></td>
<td style="float:left"><input name="file5" type="file" id="blogname" value="" class="regular-text" /></td>
<td style="float:left"><select name="banner_5_status"><option value='Active' <?php if($homepage['banner_5_status'] == 'Active') { echo "selected='selected'"; } ?>>Active</option><option value='Inactive' <?php if($homepage['banner_5_status'] == 'Inactive') { echo "selected='selected'"; } ?>>Inactive</option><select></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname"><h1>Sidebar Images</h1> </label></th>
<td><span class="description" style="font-weight:normal; width:100%">300px width is advised</span></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Image 1</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['image_1']; ?>" width="300" /></td>
<td style="float:left"><input name="image1" type="file" id="blogname" value="" class="regular-text" /></td>
</tr>

<tr valign="top">
<th scope="row"><label for="blogname">Image 2</label></th>
<td style="float:left"><img src="../../<?php echo $homepage['image_2']; ?>" width="300" /></td>
<td style="float:left"><input name="image2" type="file" id="blogname" value="" class="regular-text" /></td>
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
	<div id="wp-auth-check-wrap" class="hidden">
	<div id="wp-auth-check-bg"></div>
	<div id="wp-auth-check">
	<div class="wp-auth-check-close" tabindex="0" title="Close"></div>
			

	</div>
	</div>
	<link rel='stylesheet' id='wpcom-notes-admin-bar-css'  href='http://s0.wp.com/wp-content/mu-plugins/notes/admin-bar-v2.css?ver=2.9.3-201417' type='text/css' media='all' />
<link rel='stylesheet' id='noticons-css'  href='http://s0.wp.com/i/noticons/noticons.css?ver=2.9.3-201417' type='text/css' media='all' />


<script type='text/javascript' src='http://sexdirectoryuk.com/wp-admin/load-scripts.php?c=1&amp;load%5B%5D=hoverIntent,common,admin-bar,svg-painter,heartbeat,wp-auth-check,underscore,backbone&amp;ver=3.8.3'></script>


<div class="clear"></div></div><!-- wpwrap -->
<script type="text/javascript">if(typeof wpOnload=='function')wpOnload();</script>
</body>
</html>
