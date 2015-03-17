<?php
// grab title image
$settings->select('SELECT * FROM web_design');
$design = $settings->fetch();
?>

<style>
#pre-content {
  background-image: url('<?php echo $design["title_image"]; ?>') !important;
}
</style>