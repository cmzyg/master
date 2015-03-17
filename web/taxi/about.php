<?php
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);

$general_settings = $settings->getGeneralSettings();
$other_pages = $settings->getOtherPages();
$page = 'about';

// grab SEO
$settings->select('SELECT * FROM seo');
$seo = $settings->fetch();

$seo['meta_title_about_us'] == '' ? $seo['meta_title_about_us'] = 'About Us' : $seo['meta_title_about_us'] = $seo['meta_title_about_us'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic metas -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $seo['meta_title_about_us']; ?></title>
<meta name="keywords" content="<?php echo $seo['meta_keywords_about_us']; ?>" />
<meta name="description" content="<?php echo $seo['meta_description_about_us']; ?>">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Web Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700&amp;subset=latin,cyrillic,latin-ext,vietnamese,greek,greek-ext,cyrillic-ext" rel="stylesheet" type="text/css">

<!-- FAV ICON -->
<link rel="shortcut icon" href="assets/img/favicon.png">

<!-- CSS FILES -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/menus.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>css/responsive.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/default.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>vendor/rs-plugin/css/font-style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/styles.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/mobile.css" />

<!-- JS Files -->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $base_url; ?>js/uniform.js"></script>
<script src="<?php echo $base_url; ?>js/template.js"></script>
<script src="<?php echo $base_url; ?>js/responsive.js"></script>
<script src="<?php echo $base_url; ?>js/jquery.flexslider-min.js"></script>
<script src="<?php echo $base_url; ?>js/jquery.isotope.min.js"></script>
<script src="<?php echo $base_url; ?>vendor/rs-plugin/jquery.themepunch.plugins.min.js"></script>
<script src="<?php echo $base_url; ?>vendor/rs-plugin/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.ui.core.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.ui.datepicker.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.geocomplete.js"></script>
<script src="<?php echo $base_url; ?>assets/js/scripts.js"></script>

</head>

<body>
  <div class="extra-space"></div>
<div id="layout-mode" class="boxed"> 
  
<?php include('includes/header.php'); ?>

          <!--Page title & breadcrumb-->
          <div id="pre-content">
    <div class="row"> 
              <!--start breadcrumb -->
              <div id="breadcrumb">
      <div class="breadcrumb"> <span class="crumbs"><a href="<?php echo $base_url; ?>">Home</a></span> <span class="crumbs-current">>
          About Us </span> </div>
      </div>
              <!-- end breadcrumb -->
              <div class="page-title">About Us</div>
            </div>
    <div class="pre-content-overlay"></div>
  </div>
          <!--end of Page title & breadcrumb--> 
          
          <!--Content page-->
          <div id="#contact-map-wrap"></div>


          <div id="content-wrap" class="row">
            <div id="content" class="seven columns">
              <div class="region region-content">

               <h2 class='lead'><strong>About <?php echo $general_settings['company_name']; ?></strong></h2>
                <p><?php echo nl2br($other_pages['about_us_text']); ?></p>
          
              </div>
            </div>
 
            <div id="content" class="five columns" style="padding: 25px; margin-left: 20px; margin-top: 20px;">
              <div class="region region-content">

                <p><img style="width:90%" src="<?php echo $other_pages['about_us_image']; ?>" /></p>
          
              </div>
            </div>
          </div>
          

          <!-- javascript--> 
          <script src="vendor/contact-form/jquery.form.js"></script> 
          <script src="vendor/contact-form/jquery.validate.min.js"></script> 
          <script src="vendor/contact-form/custom.js"></script> 
          
          <!--End of content --> 

          <!--Footer region-->

          <?php include('includes/footer.php'); ?>
  
          <!-- /.region --> 
            </div>
  </div>
        </div>
</div>
<div class="row"></div>
<script type="text/javascript" src="js/jquery.vticker.min.js"></script> 

</body>
</html>
