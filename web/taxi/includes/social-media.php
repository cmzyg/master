<?php 
// grab social media
$social_media = $settings->getSocialMedia(); 
?>
<div class="social_icons" style="margin-right:20px;">
  <ul>
    <?php foreach($social_media as $media) { ?>
    <li> <a href="<?php echo $media['url']; ?>" target="_blank"> <img alt="" src="<?php echo $media['image']; ?>" /> </a> </li>
    <?php } ?>
  </ul>
</div>