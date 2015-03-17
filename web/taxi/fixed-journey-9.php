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

// get vehicles

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


if($saloon['status'] == 'inactive') { $saloon_visibility = 'style="display:none"'; } else { $saloon_visibility = ''; }
if($estate['status'] == 'inactive') { $estate_visibility = 'style="display:none"'; } else { $estate_visibility = ''; }
if($executive['status'] == 'inactive') { $executive_visibility = 'style="display:none"'; } else { $executive_visibility = ''; }
if($mpv['status'] == 'inactive') { $mpv_visibility = 'style="display:none"'; } else { $mpv_visibility = ''; }
if($minibus['status'] == 'inactive') { $minibus_visibility = 'style="display:none"'; } else { $minibus_visibility = ''; }
if($minicoach['status'] == 'inactive') { $minicoach_visibility = 'style="display:none"'; } else { $minicoach_visibility = ''; }

$database->select('SELECT fixed_9_status, fixed_price_9, fixed_location_9, fixed_lat_9, fixed_lon_9, fixed_price_9_img, free_text_9 FROM fixed_prices');

$fixed = $database->fetch();

// if journey is inactive - redirect to homepage
if($fixed['fixed_9_status'] == 'Inactive')
{
  $controller->redirect($base_url);
}

$lat = $fixed['fixed_lat_9'];
$longitude = $fixed['fixed_lon_9'];

$page = 'book';

$seo = $settings->getBookingsSEO();

// uplifts for JS
$js_total            = $fixed['fixed_price_9'];
$js_saloon_uplift    = $saloon['uplift'];
$js_estate_uplift    = $estate['uplift'];
$js_executive_uplift = $executive['uplift'];
$js_mpv_uplift       = $mpv['uplift'];
$js_minibus_uplift   = $minibus['uplift'];
$js_minicoach_uplift = $minicoach['uplift'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Basic metas -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Fixed Journey to <?php echo $fixed['fixed_location_9']; ?></title>
<meta name="keywords" content="<?php echo $seo['meta_keywords_booking']; ?>" />
<meta name="description" content="<?php echo $seo['meta_description_booking']; ?>">
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
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/mobile.css" />

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
<script src="<?php echo $base_url; ?>assets/js/floating-price.js"></script>
<script>

     $(function(){
        
        $("#geocomplete").geocomplete({
          details: "form",
          country: "UK",
          types: ["geocode", "establishment"]
        })
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
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
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

  <body>
  <div class="extra-space"></div>
  <input type="text" id="js_hidden_total" name="js_hidden_total" value="Total: &pound;<?php echo number_format($fixed['fixed_price_9'], 2); ?>" readonly />
  <input type='text' id='error_div' style='display:none' />
  <input type='text' id='notice_hours' style='display:none' />


<div id="layout-mode" class="boxed"><!-- Use classes Wide: wide, Boxed: boxed -->
<?php include('includes/header.php'); ?>


  

  <!-- map -->
  <div class="cont" style="width:95%; height: 320px; border: 1px solid black; padding: 10px; border-radius: 8px; margin-left: 25px;">
  <div id="content-top" class='fixed-journey-details' style="background-color: white; color: black; width: 33%; height: 300px; float: left;">
    <h3 class='center'><strong>Your Journey Details</strong></h3>
    
    <div id="accomodation-slider" style="margin-top:0; margin-bottom:0; margin-left:auto; margin-right:auto; width:210px;">
    <ul class="slides">
      <li>
        <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-9"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed['fixed_price_9_img']; ?>" width="200" height="100" /> </a>
        <div class="title" style='font-size: 14pt'> <a href="fixed-journey-9"><?php echo $fixed['fixed_location_9']; ?><div class='freetext'><?php echo $fixed['free_text_9']; ?></div></a> </div>
        <div class="price">&pound;<?php echo $fixed['fixed_price_9']; ?>
          <div class='starting-from'>From</div>
        </div>
        </div>
      </li>
    </ul>
    </div>
    <br />
    <div>Please Complete Steps Below to Book this Journey</div>

  </div>
  <div id="map-canvas" class='fixed-journey-map' style="width:63%; height:300px; float: right"></div>
  </div>
  <!-- end of map -->






  <!--Content page-->
  <div id="content-wrap" class="row">


    <div id="content" class="twelve columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">

            <form action="calculate-fixed2.php" method="post" name="booking_details_form" id="fixed-journey-form" onsubmit="return validateFixedBookingDetailsForm()">




<!-- vehicles -->

<?php include('includes/vehicles.php'); ?>

<!-- end vehicles -->






                            
                     
                          </div>
                        </div>
                      </div>
                    </div>

         
  <div id="content" class="six columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">



      <?php include('includes/fixed-journey-form.php'); ?>
      
      <input type="hidden" name="free_text" value="<?php echo $fixed['fixed_location_9'] . ' ' . $fixed['free_text_9']; ?>" />
      <input type="hidden" name="destination" value="<?php echo $fixed['fixed_location_9']; ?>" style="width:100%" />
      <input type="hidden" name="payment" value="<?php echo $fixed['fixed_price_9']; ?>" />

      <div class="clear"></div>
    </form>
  </div>
</div>
        
      </div>
    </div>
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