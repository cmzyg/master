<?php 
require_once('core/settings.class.php'); 
$settings = new Settings($db);
$logo = $settings->getLogo();
?>

<!-- if the admin uses logo then display a logo -->
<?php if($logo['header_status'] == 'Logo') { ?>
<a href="<?php echo $base_url; ?>" title="Home"> <img alt="" src="<?php echo $base_url; ?><?php echo $logo['logo']; ?>" style="width:<?php echo $logo['logo_width']; ?>px; height:<?php echo $logo['logo_height']; ?>px;" /> </a> 
<?php } else { ?>
<!-- otherwise display text from the backend -->
<br />
<h3 class='lead' style="margin-left: 6px;"><strong><a href="<?php echo $base_url; ?>" title="Home"><?php echo $logo['header_title']; ?></a></strong></h3>
<h5 class='lead' style="margin-left: 6px;"><a href="<?php echo $base_url; ?>" title="Home"><?php echo $logo['header_subtitle']; ?></a></h5>
<?php } ?>