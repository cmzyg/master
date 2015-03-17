<?php
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


require_once('stripe/lib/Stripe.php');

$stripe = array(
  "secret_key"      => "sk_test_IePQJycHdO4UYPQcbYBUGZHw",
  "publishable_key" => "pk_test_IxkiisgtI3dNUJ82Z0NxkRXK"
);

/*
$stripe = array(
  "secret_key"      => "sk_live_2Okha9ePcToCnMPJB2MKowJk",
  "publishable_key" => "pk_live_nBfTynYqWdMp1j9s2sBOwITe"
);
*/


Stripe::setApiKey($stripe['secret_key']);

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

$total_payment = ($_SESSION['final_payment'] + $fee['fixed_booking_fee'] + $fee['percentage_credit_card_fee_total']) / 100;
$total_payment = $_SESSION['final_payment'] * 100;

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
<meta name="author" content="">
<!-- Mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Web Fonts -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700&amp;subset=latin,cyrillic,latin-ext,vietnamese,greek,greek-ext,cyrillic-ext" rel="stylesheet" type="text/css">

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



<!-- JS Files -->
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>
<script src="<?php echo $base_url; ?>assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo $base_url; ?>js/uniform.js"></script>
<script src="<?php echo $base_url; ?>js/template.js"></script>
<script src="<?php echo $base_url; ?>js/responsive.js"></script>

<script type="text/javascript" src="js/gumby.min.js"></script>
<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/jquery.ketchup.all.min.js" ></script>

<script type="text/javascript" src="js/jquery.colorbox-min.js" ></script>

<script src="<?php echo $base_url; ?>assets/js/jquery.geocomplete.js"></script>


<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<link rel='stylesheet' href='<?php echo $base_url; ?>assets/css/map.css' />

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
    var latitude_pickup = "<?php echo $latitude_pickup; ?>";
    var longitude_pickup = "<?php echo $longitude_pickup; ?>";
    var latitude_destination = "<?php echo $latitude_destination; ?>";
    var longitude_destination = "<?php echo $longitude_destination; ?>";


     
        var markers = [
            {
                "title": 'Alibaug',
                "lat": latitude_pickup,
                "lng": longitude_pickup,
                "description": 'Alibaug is a coastal town and a municipal council in Raigad District in the Konkan region of Maharashtra, India.'
            }
        ,

            {
                "title": 'Pune',
                "lat": latitude_destination,
                "lng": longitude_destination,
                "description": 'Pune is the seventh largest metropolis in India, the second largest in the state of Maharashtra after Mumbai.'
            }
];
        window.onload = function () {
            var mapOptions = {
                center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
            var infoWindow = new google.maps.InfoWindow();
            var lat_lng = new Array();
            var latlngbounds = new google.maps.LatLngBounds();
            for (i = 0; i < markers.length; i++) {
                var data = markers[i]
                var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                lat_lng.push(myLatlng);
                var marker = new google.maps.Marker({
                    position: myLatlng,
                    map: map,
                    title: data.title
                });
                latlngbounds.extend(marker.position);
                (function (marker, data) {
                    google.maps.event.addListener(marker, "click", function (e) {
                        infoWindow.setContent(data.description);
                        infoWindow.open(map, marker);
                    });
                })(marker, data);
            }
            map.setCenter(latlngbounds.getCenter());
            map.fitBounds(latlngbounds);

            //***********ROUTING****************//

            //Intialize the Path Array
            var path = new google.maps.MVCArray();

            //Intialize the Direction Service
            var service = new google.maps.DirectionsService();

            //Set the Path Stroke Color
            var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });

            //Loop and Draw Path Route between the Points on MAP
            for (var i = 0; i < lat_lng.length; i++) {
                if ((i + 1) < lat_lng.length) {
                    var src = lat_lng[i];
                    var des = lat_lng[i + 1];
                    path.push(src);
                    poly.setPath(path);
                    service.route({
                        origin: src,
                        destination: des,
                        travelMode: google.maps.DirectionsTravelMode.DRIVING
                    }, function (result, status) {
                        if (status == google.maps.DirectionsStatus.OK) {
                            for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                path.push(result.routes[0].overview_path[i]);
                            }
                        }
                    });
                }
            }
        }

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
      document.getElementById('book_pay_on_day').value='book_pay_on_day';
    }

    </script>

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
          <?php include('includes/social-media.php'); ?>
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

  
  
        <div id="dvMap" style="width: 100%; height: 300px"></div>

  <!--Content page-->
  <div id="content-wrap" class="row">
    <div id="content" class="twelve columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">








<div id="block-system-main" class="block block-system">
  <div class="content">
      <p style="text-align: center"><i class="fa fa-gbp fa-lg"></i> <?php echo $_SESSION['final_payment']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar fa-lg"></i> <?php echo $_SESSION['booking_date'] . ' ' . $_SESSION['hour'] . ':' . $_SESSION['minute'] . ':00'; ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker fa-lg"></i> <?php echo $_SESSION['pickup']; ?> - <?php echo $_SESSION['destination']; ?></p>

    <form action="charge.php" method="post" name="booking_details_form" onsubmit="return validateBookingDetailsForm()">
      

  <!-- payment container -->
  <div class='stripe_container'>
  
  <form action='charge' method='POST'>
  <?php if($pay_on_day['pay_on_day'] == 'Card') { ?>
  <div class='button-1'>
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-amount="<?php echo $total_payment; ?>" data-description="Book Journey"></script>
  </div>
  <?php } ?>
  <?php if($pay_on_day['pay_on_day'] == 'Cash') { ?>
  <div class='button-2'>
        <button type="button" onclick="changeValue(); this.form.submit();" value="Pay with Cash" name="book_pay_on_day" style="width:170px; margin: 0 auto; text-align: center;" class="btn-stripe">Pay with Cash</button>
        <input type='hidden' name='book_pay_on_day' id='book_pay_on_day' value='' />
  </div>
  <?php } ?>


  <?php if($pay_on_day['pay_on_day'] == 'Cash_and_card') { ?>
  <div class='button-1'>
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-amount="<?php echo $total_payment; ?>" data-description="Book Journey"></script>
  </div>
  <div class='button-2'>
        <button type="button" onclick="changeValue(); this.form.submit();" value="Pay with Cash" name="book_pay_on_day" style="width:170px; margin: 0 auto; text-align: center;" class="btn-stripe">Pay with Cash</button>
        <input type='hidden' name='book_pay_on_day' id='book_pay_on_day' value='' />
  </div>
  <?php } ?>
  </div>
  <!-- end of pay on day -->


      <!-- get variables from the previous page -->
      <input type="hidden" name="booking_date"  value="<?php echo $_SESSION['booking_date']; ?>" />
      <input type="hidden" name="hour"          value="<?php echo $_SESSION['hour']; ?>" />
      <input type="hidden" name="minute"        value="<?php echo $_SESSION['minute']; ?>" />
      <input type="hidden" name="return_date"   value="<?php echo $_SESSION['return_date']; ?>" />
      <input type="hidden" name="return_hour"   value="<?php echo $_SESSION['return_hour']; ?>" />
      <input type="hidden" name="return_minute" value="<?php echo $_SESSION['return_minute']; ?>" />
      <input type="hidden" name="payment"       value="<?php echo $_SESSION['final_payment']; ?>" />
      <input type="hidden" name="fullname"      value="<?php echo $_SESSION['fullname']; ?>" />
      <input type="hidden" name="email"         value="<?php echo $_SESSION['email']; ?>" />
      <input type="hidden" name="telephone"     value="<?php echo $_SESSION['telephone']; ?>" />
      <input type="hidden" name="note"          value="<?php echo $_SESSION['note']; ?>" />
      <input type="hidden" name="airport_name"  value="<?php echo $_SESSION['airport_name']; ?>" />
      <input type="hidden" name="terminal"      value="<?php echo $_SESSION['terminal']; ?>" />
      <input type="hidden" name="flight_number" value="<?php echo $_SESSION['flight_number']; ?>" />
      <input type="hidden" name="actual_pickup" value="<?php echo $_SESSION['actual_pickup']; ?>" />


      <!-- vehicles -->
      <input type="hidden" name="saloon" value="<?php echo $_SESSION['saloon']; ?>" />
      <input type="hidden" name="estate" value="<?php echo $_SESSION['estate']; ?>" />
      <input type="hidden" name="executive" value="<?php echo $_SESSION['executive']; ?>" />
      <input type="hidden" name="mpv" value="<?php echo $_SESSION['mpv']; ?>" />
      <input type="hidden" name="minibus" value="<?php echo $_SESSION['minibus']; ?>" />
      <input type="hidden" name="minicoach" value="<?php echo $_SESSION['minicoach']; ?>" />
      <!-- end of vehicles -->





    <div id="panel" style="display:none">
    <input type='text' name='start' id='start' value='<?php echo $_SESSION['pickup']; ?>' />
    <input type='text' name='end' id='end' value='<?php echo $_SESSION['destination']; ?>' />
    </div>
    <br /><br /><br />
    <!-- fixed fee -->
    <?php if($fee['fixed_booking_fee'] !== '0') { ?>
    <p style='font-size: 0.8em'>Note: Fixed fee for card payments applies: <strong>&pound;<?php echo $fee['fixed_booking_fee']; ?></strong></p>
    <?php } ?>
    <?php if($fee['percentage_credit_card_fee'] !== '0') { ?>
    <p style='font-size: 0.8em'>Note: Percentage fee for card payments applies: <strong><?php echo $fee['percentage_credit_card_fee']; ?>%</strong></p>
    <?php } ?>
    <!-- -->

    <input type="hidden" name="percentage_credit_card_fee" value="<?php echo $fee['percentage_credit_card_fee_total']; ?>" />




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