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

$lat = $general_settings['latitude'];
$longitude = $general_settings['longitude'];

$page = 'contact';

// grab SEO
$settings->select('SELECT * FROM seo');
$seo = $settings->fetch();

$settings->select('SELECT contact_get_in_touch_text FROM other_pages');
$touch = $settings->fetch();

?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Basic metas -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Contact Us | <?php echo $seo['meta_title_contact_us']; ?></title>
<meta name="keywords" content="<?php echo $seo['meta_keywords_contact_us']; ?>" />
<meta name="description" content="<?php echo $seo['meta_description_contact_us']; ?>">
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
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/font-awesome.min.css" />

<!-- JS Files -->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $base_url; ?>js/uniform.js"></script>
<script src="<?php echo $base_url; ?>js/template.js"></script>
<script src="<?php echo $base_url; ?>js/jquery.flexslider-min.js"></script>
<script src="<?php echo $base_url; ?>js/jquery.isotope.min.js"></script>
<script src="<?php echo $base_url; ?>vendor/rs-plugin/jquery.themepunch.plugins.min.js"></script>
<script src="<?php echo $base_url; ?>vendor/rs-plugin/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.ui.core.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.ui.datepicker.js"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery.geocomplete.js"></script>
<script src="<?php echo $base_url; ?>assets/js/scripts.js"></script>
  
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
    var lat = "<?php echo $lat; ?>";
    var longitude = "<?php echo $longitude; ?>";
function initialize() {
  var myLatlng = new google.maps.LatLng(lat,longitude);
  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
   
  <div class="extra-space"></div>
  <body>
  <div id="layout-mode" class="boxed"> 

<?php include('includes/header.php'); ?>

          <!--Page title & breadcrumb-->
          <div id="pre-content">
    <div class="row"> 
              <!--start breadcrumb -->
              <div id="breadcrumb">
        <div class="breadcrumb"> <span class="crumbs"><a href="<?php echo $base_url; ?>">Home</a></span> <span class="crumbs-current">>
          Contact </span> </div>
      </div>
              <!-- end breadcrumb -->
              <div class="page-title">Contact</div>
            </div>
    <div class="pre-content-overlay"></div>
  </div>
   
          <!--Content page-->
          
  <div id="content-wrap" class="row">
    <div id="content" class="twelve columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system">
          <div class="content">
            <div class='contact-items-wrap'>
                  <h2 class='lead'><strong>Get in Touch</strong></h2>
                  <p><?php echo nl2br($touch['contact_get_in_touch_text']); ?></p>
            </div>
            <form id="contact-site-form" class="user-info-from-cookie contact-form" action="process-contact" method="post" name="contact_form" onsubmit="validateBookingForm()">

                      <div class="desktop-contact-details">
                      <ul class='contact-items' style='padding-left:40px'>
                        <li><i class='icon-location mobile-icon' style="font-size: 2em; width: 30px; text-align: left"></i> <strong>Location: </strong><?php echo $general_settings['main_area']; ?></li><br />
                        <li><i class='icon-phone mobile-icon' style="width: 30px; text-align: left"></i> <strong>Phone: </strong><?php echo $general_settings['website_phone']; ?></li>
                      </ul>
                      <br />

                      <div id="map-canvas" style="width:90%; float:right; height:350px;" class="mobile-map"></div>
                      </div>


                      <div id="response"></div>
                      <div class="clear"></div>
            </form>
          </div>

                </div>








        <div id="block-system-main" class="block block-system">
          <div class="content">
            <form id="contact-site-form" class="user-info-from-cookie contact-form" action="process-contact" method="post" name="contact_form" onsubmit="validateBookingForm()">
              
              <div class="form-item form-type-textfield form-item-name">
                <br /><br /><label style="margin-bottom:-3px" class="required">Your name <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="contact_name" name="name" value="" size="60" maxlength="255" class="valid form-text required" />
              </div><br />
                      <div class="form-item form-type-textfield form-item-mail">
                <label style="margin-bottom:-3px" class="required">Your e-mail address <span class="form-required" title="This field is required.">*</span></label>
                <input type="email" id="contact_email" name="email" value="" size="60" maxlength="255" class="form-text required" />
              </div><br />
              
              <div class="form-item form-type-textfield form-item-subject">
                <label style="margin-bottom:-3px">Subject <span class="form-required" title="This field is required.">*</span></label>
                <input type="text" id="edit-subject" name="subject" value="" size="60" maxlength="255" class="form-text required" />
              </div><br />



              <div class="form-item form-type-textarea form-item-message">
                <label style="margin-bottom:-3px">Message <span class="form-required" title="This field is required.">*</span></label>
                <div class="form-textarea-wrapper resizable">
                          <textarea id="contact_message" name="message" cols="60" rows="5" class="form-textarea required"></textarea>
                        </div>
              </div>
              
              <div class="form-actions form-wrapper" id="submit-edit-actions">
                <input type="submit" id="submit-contact" value="Send message" class="form-submit" />
              </div>

                      <div id="response"></div>
                      <div class="clear"></div>
                    </form>

                       
          </div>

                </div>
      </div>
              <!-- /.region --> 
            </div>
  </div>
          
          <!-- javascript--> 
        
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