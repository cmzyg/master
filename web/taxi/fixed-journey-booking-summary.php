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


$latitude_pickup  = $_SESSION['latitude_pickup'];
$longitude_pickup = $_SESSION['longitude_pickup']; 

$latitude_destination  = $_SESSION['latitude_destination'];
$longitude_destination = $_SESSION['longitude_destination'];


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

$database->select('SELECT * FROM payment_options');
$pay_on_day = $database->fetch();
$fee        = $database->fetch();

$fee['percentage_credit_card_fee_total'] = $_SESSION['final_payment'] * $fee['percentage_credit_card_fee'] / 100;

$page = 'book';

// grab SEO
$seo = $settings->getBookingsSEO();

if(!isset($_SESSION['booking_date']))
{
  header("location: $base_url");
}

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
<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700&amp;subset=latin,cyrillic,latin-ext,vietnamese,greek,greek-ext,cyrillic-ext" rel="stylesheet" type="text/css">

<!-- FAV ICON -->
<link rel="shortcut icon" href="assets/img/favicon.png">

<!-- CSS FILES -->
<link rel="stylesheet" href="assets/css/main.css">
<!-- Site CSS -->
<link rel="stylesheet" href="assets/css/menus.css">
<!-- Menu CSS -->
<link rel="stylesheet" href="assets/css/responsive.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="assets/css/default.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="vendor/rs-plugin/css/font-style.css">
<!--Datepicker -->

<link rel="stylesheet" href="css/colorbox_style.css">
<!--ColorBox -->

<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/mobile.css" />



<!-- JS Files -->
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $base_url; ?>js/uniform.js"></script>
<script src="<?php echo $base_url; ?>js/template.js"></script>

<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/styles.css" />

<script type="text/javascript" src="js/gumby.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/jquery.ketchup.all.min.js" ></script>

<script type="text/javascript" src="js/jquery.colorbox-min.js" ></script>

<script src="<?php echo $base_url; ?>assets/js/jquery.geocomplete.js"></script>

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<link rel='stylesheet' href='<?php echo $base_url; ?>assets/css/map.css' />

<!-- JS Files -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

<script>

var lat = "<?php echo $latitude_destination; ?>";
var longitude = "<?php echo $longitude_destination; ?>";
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
      title: ''
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

function validateBookingDetailsForm()
{
var errors_count = 0;
var fullname  = document.forms["booking_details_form"]["fullname"].value;
var email     = document.forms["booking_details_form"]["email"].value;
var telephone = document.forms["booking_details_form"]["telephone"].value;
var saloon    = document.forms["booking_details_form"]["saloon"].selectedIndex;
var estate    = document.forms["booking_details_form"]["estate"].selectedIndex;
var executive = document.forms["booking_details_form"]["executive"].selectedIndex;
var mpv       = document.forms["booking_details_form"]["mpv"].selectedIndex;
var minibus   = document.forms["booking_details_form"]["minibus"].selectedIndex;


if (fullname == null || fullname == "") {
    document.forms["booking_details_form"]["fullname"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["fullname"].style.borderColor="red";
    document.forms["booking_details_form"]["fullname"].focus();
    errors_count++;
}

if (email == null || email == "") {
    document.forms["booking_details_form"]["email"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["email"].style.borderColor="red";
    document.forms["booking_details_form"]["email"].focus();
    errors_count++;
}

if (telephone == null || telephone == "") {
    document.forms["booking_details_form"]["telephone"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["telephone"].style.borderColor="red";
    document.forms["booking_details_form"]["telephone"].focus();
    errors_count++;
}

if (saloon == 0 && estate == 0 && executive == 0 && mpv == 0 && minibus == 0) {
    document.forms["booking_details_form"]["saloon"].focus();
    errors_count++;
}

return errors_count == 0;

}


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
    
    <script>

    function changeValue()
    {
      document.getElementById('payment_method').value='book_pay_on_day';
    }

    function changeValuePaypal()
    {
      document.getElementById('payment_method').value='paypal';
    }

    </script>

<style>
.btn-stripe {
  color: #fff;
  background: #008cdd;
  background-image: -webkit-linear-gradient(top, #7dc5ee, #008cdd 85%, #30a2e4);
  background-image: -moz-linear-gradient(top, #7dc5ee, #008cdd 85%, #30a2e4);
  background-image: -ms-linear-gradient(#7dc5ee, #008cdd 85%, #30a2e4);
  background-image: -o-linear-gradient(#7dc5ee, #008cdd 85%, #30a2e4);
  background-image: linear-gradient(#7dc5ee, #008cdd 85%, #30a2e4);     
  background: linear-gradient(top, #7dc5ee, #008cdd 85%, #30a2e4);      
  text-shadow: 0 1px 1px rgba(0,0,0,0.53);
  -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.25);
  -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.25);
  -ms-box-shadow: inset 0 1px 0 rgba(255,255,255,0.25);
  -o-box-shadow: inset 0 1px 0 rgba(255,255,255,0.25);
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.25);
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  -o-border-radius: 4px;
  border-radius: 4px;
  border-color: #008cdd;
  font-size: 10pt;
  height: 32px;
  cursor: pointer;
  margin-top: 2px;
  padding-left: -20px;
  width: 130px !important;
}
.btn-stripe:hover {
  color: #fff;
  background-position: 0;
}
.btn-stripe:active {
  background: #008cdd;
}

.stripe-replica-container {
  margin-top: 20px;
  margin-left: 2px;
}

.stripe_container {
  /*margin: 0 auto;
  width: 300px;*/
}

.stripe_container_2 {
  margin: 0 auto;
  width: 20%;
}

.button-1 {
  float: left;
  width: 150px;
}

.button-2 {
  width: 100px;
  float: left;
  margin-top: 2px;
}
</style>


  </head>



<body>
<div class="extra-space"></div>

<div id="layout-mode" class="boxed"><!-- Use classes Wide: wide, Boxed: boxed -->
<?php include('includes/header.php'); ?>


  <div class="cont" style="width:95%; height: 320px; border: 1px solid black; padding: 10px; border-radius: 8px; margin-left: 25px;">
  <div id="content-top" style="width: 33%; height: 300px; float: left; background-color: white; color: black">
        <h3><strong>Your Journey Details</strong></h3>
        <h5>Your Journey: <?php echo $_SESSION['free_text']; ?></h5>
        <h5>Date &amp; Time: <?php echo $_SESSION['booking_date'] . ' ' . $_SESSION['hour'] . ':' . $_SESSION['minute'] . ':00'; ?></h5>
        <h5>
          Vehicle Type(s): 
          <?php if($_SESSION['saloon'] > 0) { echo ' saloon'; } ?>
          <?php if($_SESSION['estate'] > 0) { echo '  estate'; } ?>
          <?php if($_SESSION['executive'] > 0) { echo '  executive'; } ?>
          <?php if($_SESSION['mpv'] > 0) { echo '  mpv'; } ?>
          <?php if($_SESSION['minibus'] > 0) { echo '  minibus'; } ?>
          <?php if($_SESSION['minicoach'] > 0) { echo '  minicoach'; } ?>
        </h5>
        <?php if($_SESSION['return_date'] !== '') { ?> <h5>Return Journey: <?php echo $_SESSION['return_date'] . ' ' . $_SESSION['return_hour'] . ':' . $_SESSION['return_minute'] . ':00'; ?></h5><?php } ?>
        <?php if($_SESSION['meet_and_greet_service'] == '1') { echo '<h5>Meet &amp; Greet: Yes</h5>'; } ?>   
        <h5>Total Cost: &pound;<?php echo number_format($_SESSION['final_payment'], 2); ?></h5>
        

  </div>
  <div id="map-canvas" class='fixed-journey-map' style="width:63%; height:300px; float: right"></div>
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
      <!--<p style='text-align: center'><i class="fa fa-gbp fa-lg"></i> <?php echo $_SESSION['final_payment']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar fa-lg"></i> <?php echo $_SESSION['booking_date'] . ' ' . $_SESSION['hour'] . ':' . $_SESSION['minute'] . ':00'; ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker fa-lg"></i> <?php echo $_SESSION['pickup']; ?> - <?php echo $_SESSION['destination']; ?></p>-->
    <h3><strong>Please Choose Method of Payment</strong></h3>
    <!-- if card bookings are allowed display transaction fee message -->
    <?php if($pay_on_day['pay_on_day'] == 'Cash_and_card' || $pay_on_day['pay_on_day'] == 'Cash') { echo '<p style="font-size: 0.8em">Transaction fee applies to card bookings</p>'; } ?>
    <!-- end of transaction fee message -->
    <br />
    <form action="charge.php" method="post" name="booking_details_form" onsubmit="return validateBookingDetailsForm()">
      



  <!-- payment container -->

  <div class='stripe_container'>
  
  <form action='charge' method='POST'>
  <?php if($pay_on_day['pay_on_day'] == 'Cash') { ?>
  <div class='button-1'>
        <button type="button" onclick="changeValue(); this.form.submit();" value="Pay with Cash" name="book_pay_on_day" style="width:170px; margin: 0 auto; text-align: center;" class="btn-stripe">Pay Cash to Driver</button>
  </div>
  <?php } ?>
  <?php if($pay_on_day['pay_on_day'] == 'Card') { ?>
  <div class='button-1'>
        <button type="button" onclick="changeValuePaypal(); this.form.submit();" name="book_pay_paypal" style="width:170px; margin: 0 auto; text-align: center;" class="btn-stripe">Pay With PayPal</button>
  </div>
  <?php } ?>


  <?php if($pay_on_day['pay_on_day'] == 'Cash_and_card') { ?>
  <div class='button-1'>
        <button type="button" onclick="changeValuePaypal(); this.form.submit();" name="book_pay_paypal" style="width:170px; margin: 0 auto; text-align: center;" class="btn-stripe">Pay With PayPal</button>
  </div>
  <div class='button-1'>
        <button type="button" onclick="changeValue(); this.form.submit();" value="Pay with Cash" name="book_pay_on_day" style="width:170px; margin: 0 auto; text-align: center;" class="btn-stripe">Pay Cash to Driver</button>
  </div>
  <?php } ?>

  <input type='hidden' name='payment_method' id='payment_method' value='' />
  </div>
  <!-- end of pay on day -->


      <!-- get variables from the previous page -->
      <input type="hidden" name="booking_date"       value="<?php echo $_SESSION['booking_date']; ?>" />
      <input type="hidden" name="hour"               value="<?php echo $_SESSION['hour']; ?>" />
      <input type="hidden" name="minute"             value="<?php echo $_SESSION['minute']; ?>" />
      <input type="hidden" name="payment"            value="<?php echo $_SESSION['final_payment']; ?>" />
      <input type="hidden" name="fullname"           value="<?php echo $_SESSION['fullname']; ?>" />
      <input type="hidden" name="email"              value="<?php echo $_SESSION['email']; ?>" />
      <input type="hidden" name="telephone"          value="<?php echo $_SESSION['telephone']; ?>" />
      <input type="hidden" name="note"               value="<?php echo $_SESSION['note']; ?>" />
      <input type="hidden" name="airport_name"       value="<?php echo $_SESSION['airport_name']; ?>" />
      <input type="hidden" name="terminal"           value="<?php echo $_SESSION['terminal']; ?>" />
      <input type="hidden" name="flight_number"      value="<?php echo $_SESSION['flight_number']; ?>" />
      <input type="hidden" name="actual_pickup"      value="<?php echo $_SESSION['pickup']; ?>" />
      <input type="hidden" name="return_date"        value="<?php echo $_SESSION['return_date']; ?>" />
      <input type="hidden" name="return_hour"        value="<?php echo $_SESSION['return_hour']; ?>" />
      <input type="hidden" name="return_minute"      value="<?php echo $_SESSION['return_minute']; ?>" />
      <input type="hidden" name="actual_destination" value="<?php echo $_SESSION['actual_destination']; ?>" />
      <input type="hidden" name="meet_and_greet_service" value="<?php echo $_SESSION['meet_and_greet_service']; ?>" />



    <div id="panel" style="display:none">
    <input type='text' name='start' id='start' value='<?php echo $_SESSION['pickup']; ?>' />
    <input type='text' name='end' id='end' value='<?php echo $_SESSION['destination']; ?>' />
    </div>
    <br /><br /><br />

    
    <!-- if payment method is not cash only then display payment methods image -->
    <?php if($pay_on_day['pay_on_day'] !== 'Cash') { ?>
    <br /><div><img alt="" src="assets/img/payment-methods-2.png" /></div>
    <?php } ?>
    <!-- -->
    <br />
    <script type="text/javascript" src="https://sealserver.trustwave.com/seal.js?style=invert"></script>




      <div class="clear"></div>
    </form>
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