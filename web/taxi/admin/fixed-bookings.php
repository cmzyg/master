<?php
date_default_timezone_set('Europe/London');

require_once('core/settings.php');
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/geolocation.class.php');
require_once('core/price.class.php');
require_once('core/settings.class.php');

$database   = new Database($db);
$controller = new Controller($db);
$price      = new Price($db);
$settings   = new Settings($db);

$general_settings = $settings->getGeneralSettings();


// get vehicles, types, prices
$database->select('SELECT * FROM vehicles WHERE type = "Saloon"');
$saloon = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Estate"');
$estate = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Executive"');
$executive = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "MPV"');
$mpv = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Minibus"');
$minibus = $database->fetch();

$database->select('SELECT * FROM vehicles WHERE type = "Minicoach"');
$minicoach = $database->fetch();

if($saloon['status']    == 'inactive') { $saloon_visibility    = 'style="display:none"'; } else { $saloon_visibility    = ''; }
if($estate['status']    == 'inactive') { $estate_visibility    = 'style="display:none"'; } else { $estate_visibility    = ''; }
if($executive['status'] == 'inactive') { $executive_visibility = 'style="display:none"'; } else { $executive_visibility = ''; }
if($mpv['status']       == 'inactive') { $mpv_visibility       = 'style="display:none"'; } else { $mpv_visibility       = ''; }
if($minibus['status']   == 'inactive') { $minibus_visibility   = 'style="display:none"'; } else { $minibus_visibility   = ''; }
if($minicoach['status'] == 'inactive') { $minicoach_visibility = 'style="display:none"'; } else { $minicoach_visibility = ''; }


$home = $settings->getHomepageSettings();

$fixed_prices     = $settings->getFixedPrices();

$page = 'book';

$seo = $settings->getBookingsSEO();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic metas -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $seo['meta_title_booking']; ?></title>
<meta name="keywords" content="<?php echo $seo['meta_keywords_booking']; ?>" />
<meta name="description" content="<?php echo $seo['meta_description_booking']; ?>">
<meta name="author" content="Zygimantas Simkus">
<!-- Mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Web Fonts -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700&amp;subset=latin,cyrillic,latin-ext,vietnamese,greek,greek-ext,cyrillic-ext" rel="stylesheet" type="text/css">


<!-- CSS FILES -->
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/menus.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/responsive.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/default.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>vendor/rs-plugin/css/font-style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/styles.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/slider.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/map.css" />


<!-- JS Files -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
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


   <script>


           $(function(){
        
        $("#geocomplete").geocomplete()
          .bind("geocode:result", function(event, result){
            $.log("Result: " + result.formatted_address);
          })
          .bind("geocode:error", function(event, status){
            $.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            $.log("Multiple: " + results.length + " results found");
          });


          $("#geocomplete2").geocomplete()
          .bind("geocode:result", function(event, result){
            $.log("Result: " + result.formatted_address);
          })
          .bind("geocode:error", function(event, status){
            $.log("ERROR: " + status);
          })
          .bind("geocode:multiple", function(event, results){
            $.log("Multiple: " + results.length + " results found");
          });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        });
        
        
        $("#examples a").click(function(){
          $("#geocomplete").val($(this).text()).trigger("geocode");
          return false;
        });
        
      });


    </script>

    <style>
    a:link .fixed-bookings {
      color: #dd9f42 !important;
    }
    a:visited .fixed-bookings {
      color: #dd9f42 !important;
    }
    a:active .fixed-bookings {
      color: #dd9f42 !important;
    }
    a:hover .fixed-bookings {
      color: #dd9f42 !important;
    }

    a:link .regular-bookings {
      color: #FFFFFF !important;
    }
    a:visited .regular-bookings {
      color: #FFFFFF !important;
    }
    a:active .regular-bookings {
      color: #FFFFFF !important;
    }
    a:hover .regular-bookings {
      color: #dd9f42 !important;
    }
    </style>


  </head>



  <body>


<div id="layout-mode" class="boxed"><!-- Use classes Wide: wide, Boxed: boxed -->
  <div id="header" class="container">
    <div id="header_line" class="container header_line"> 
      <!-- features top -->
      <div class="row">
        <div class="six columns right"> 
          <!-- Phone number -->
          <ul><li class="right"> <i class='icon-phone'></i><span style="font-size:2em"><?php echo $general_settings['website_phone']; ?></span></li></ul>
          <!-- End of Phone number --> 
          <!-- Social Icons -->
          <div class="social_icons">
            <ul>
              <li class="right"> <a href="http://www.facebook.com/#" target="_blank"> <img alt="" src="images/facebook.png" /> </a> </li>
              <li class="right"> <a href="http://www.twitter.com/twitter" target="_blank"> <img alt="" src="images/twitter.png" /> </a> </li>
              <li class="right"> <a href="#" target="_blank"> <img alt="" src="images/linkedin.png" /> </a> </li>
              <li class="right"> <a href="https://plus.google.com/#" target="_blank" rel="me"> <img alt="" src="images/googleplus.png" /> </a> </li>
              <li class="right"> <a href="#" target="_blank" rel="me"> <img alt="" src="images/youtube.png" /> </a> </li>
            </ul>
          </div>
          <!-- end of Social Icons --> 
        </div>
      </div>
      <!-- end .features top --> 
    </div>
    <div class="row">
      <div id="logo" class="four columns logo"> 
        <!-- logo & slogan --> 
        <?php include('includes/logo.php'); ?>
        <!-- end. logo & slogan --> 
      </div>
      <div class="eight columns"> 
        <!--Site menu-->
          <?php include('includes/navigation.php'); ?>
        <!--end of Site menu--> 
      </div>
    </div>
  </div>


  <!--Revolution Slider-->
  <div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
    
    <div id="wowslider-container1" style="width:100%">

    <!-- get active banners -->
    <div class="ws_images">
      <ul>
        <?php if($home['banner_1_status'] == 'Active') { ?><li><img src="<?php echo $home['banner_1']; ?>" alt="" title="" id="wows1_0"/></li><?php } ?>
        <?php if($home['banner_2_status'] == 'Active') { ?><li><img src="<?php echo $home['banner_2']; ?>" alt="" title="" id="wows1_3"/></li><?php } ?>
        <?php if($home['banner_3_status'] == 'Active') { ?><li><img src="<?php echo $home['banner_3']; ?>" alt="" title="" id="wows1_0"/></li><?php } ?>
        <?php if($home['banner_4_status'] == 'Active') { ?><li><img src="<?php echo $home['banner_4']; ?>" alt="" title="" id="wows1_0"/></li><?php } ?>
        <?php if($home['banner_5_status'] == 'Active') { ?><li><img src="<?php echo $home['banner_5']; ?>" alt="" title="" id="wows1_0"/></li><?php } ?>
      </ul>
    </div>
    <!-- -->

    <div class="ws_shadow"></div>
    </div>

    <script src="<?php echo $base_url; ?>assets/js/wowslider.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/wowslider-script.js"></script>

    <div class='tp-bannertimer tp-bottom'></div>
    </div>
  </div>
  <!--End of Revolution Slider--> 

   <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div style="text-align:center" id="" class="block block-rooms-booking-manager contextual-links-region">
            <h2> <a href='fixed-bookings'><span class='fixed-bookings'>Fixed Bookings</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='bookings'><span class='regular-bookings'>Regular Bookings</span></a></h2>
            <div class="content">
                  

            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>
  </div>




  <!--Content page-->
  <div id="content-wrap" class="row">
    <div id="content" class="twelve columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">








<div id="block-system-main" class="block block-system">
  <div class="content">
<!--Carousel Slider -->
  <div id="content-bottom">
    <div class="row">
      <div>
        <div class="region region-content-bottom">
          <div id="block-views-aba6fc0651a70555fe194f16d93de3d1" class="block block-views contextual-links-region">
            <h2 style="text-align:center"> <span><?php echo $fixed_prices['fixed_price_intro']; ?></span> </h2>
            <div class="content">
           
                <ul class="slides" style="width:120%;">
                  <?php if($fixed_prices['fixed_1_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-1"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_1_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-1"><?php echo $fixed_prices['fixed_location_1']; ?></a> </div>
                     
                        <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_1']; ?></div>
                      
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_2_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-2"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_2_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-2"><?php echo $fixed_prices['fixed_location_2']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_2']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_3_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-3"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_3_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-3"><?php echo $fixed_prices['fixed_location_3']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_3']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_4_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-4"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_4_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-4"><?php echo $fixed_prices['fixed_location_4']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_4']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_5_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-5"> <img alt="fixed-journey-5" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_5_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-5"><?php echo $fixed_prices['fixed_location_5']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_5']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_6_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-6"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_6_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-6"><?php echo $fixed_prices['fixed_location_6']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_6']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_7_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-7"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_7_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-7"><?php echo $fixed_prices['fixed_location_7']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_7']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_8_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-8"> <img alt="fixed-journey-8" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_8_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-8"><?php echo $fixed_prices['fixed_location_8']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_8']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_9_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-9"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_9_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-9"><?php echo $fixed_prices['fixed_location_9']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_9']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_10_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-10"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_10_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-10"><?php echo $fixed_prices['fixed_location_10']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_10']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_11_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-11"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_11_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-11"><?php echo $fixed_prices['fixed_location_11']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_11']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_12_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-12"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_12_img']; ?>" width="300" height="200" /> </a>
                      <div class="title"> <a href="fixed-journey-12"><?php echo $fixed_prices['fixed_location_12']; ?></a> </div>
                       <div class='starting-from'>Starting from &pound;<?php echo $fixed_prices['fixed_price_12']; ?></div>
                      <div class="title_bg"></div>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
           
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>
  </div>
  <!--End of Carousel Slider --> 
  </div>
</div>



        
    </div>
        
        </div>
        <!-- end of Content --> 
        
      </div>
    </div>

  </div>
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