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

if(isset($_SESSION['latitude_pickup']) && isset($_SESSION['longitude_pickup'])) 
{
  $latitude_pickup  = $_SESSION['latitude_pickup'];
  $longitude_pickup = $_SESSION['longitude_pickup']; 
}

if(isset($_SESSION['latitude_pickup']) && isset($_SESSION['longitude_pickup'])) 
{
  $latitude_destination  = $_SESSION['latitude_destination'];
  $longitude_destination = $_SESSION['longitude_destination'];
}

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


// uplifts for JS
$js_total            = $_SESSION['total'];
$js_saloon_uplift    = $saloon['uplift'];
$js_estate_uplift    = $estate['uplift'];
$js_executive_uplift = $executive['uplift'];
$js_mpv_uplift       = $mpv['uplift'];
$js_minibus_uplift   = $minibus['uplift'];
$js_minicoach_uplift = $minicoach['uplift'];



if($saloon['status']    == 'inactive') { $saloon_visibility    = 'style="display:none"'; } else { $saloon_visibility    = ''; }
if($estate['status']    == 'inactive') { $estate_visibility    = 'style="display:none"'; } else { $estate_visibility    = ''; }
if($executive['status'] == 'inactive') { $executive_visibility = 'style="display:none"'; } else { $executive_visibility = ''; }
if($mpv['status']       == 'inactive') { $mpv_visibility       = 'style="display:none"'; } else { $mpv_visibility       = ''; }
if($minibus['status']   == 'inactive') { $minibus_visibility   = 'style="display:none"'; } else { $minibus_visibility   = ''; }
if($minicoach['status'] == 'inactive') { $minicoach_visibility = 'style="display:none"'; } else { $minicoach_visibility = ''; }


$home = $settings->getHomepageSettings();

if(!isset($_SESSION['pickup']))
{
  $_SESSION['pickup'] = '';
}

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
<meta name="author" content="">
<!-- Mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Web Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700&amp;subset=latin,cyrillic,latin-ext,vietnamese,greek,greek-ext,cyrillic-ext" rel="stylesheet" type="text/css">

<!-- FAV ICON -->
<link rel="shortcut icon" href="assets/img/favicon.png">

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






<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">



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


          $("#geocomplete2").geocomplete({
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
$(function(){
  $( "#datepicker2" ).datepicker({ minDate: 0, dateFormat: "dd-mm-yy"});
});



 $(function(){
      $("#saloon").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#estate").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#executive").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#mpv").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#minibus").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});



    $(function(){
      $("#minicoach").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


        $(function(){
      $("#return_hour").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});

      $(function(){
      $("#return_minute").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});

    $(function(){
      $("#datepicker2").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


  $(function(){
      $("#meet_and_greet").change(function(){
        dataString = $("#booking-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price-booking.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});

  </script>

  </head>



  <body>
 <input type="text" id="js_hidden_total" name="js_hidden_total" value="Total: &pound;<?php echo $_SESSION['total']; ?>" readonly />

<div id="layout-mode" class="boxed"><!-- Use classes Wide: wide, Boxed: boxed -->
  
<?php include('includes/header.php'); ?> 




  <?php if(isset($_SESSION['latitude_pickup']) && isset($_SESSION['longitude_pickup']) && isset($_SESSION['latitude_pickup']) && isset($_SESSION['longitude_pickup']))
  { ?>
  <!-- map -->
  <!--<div class="cont" style="width:100%">
  <div id="content-top" style="width: 50%; height: 300px; float: left;">
    <?php if(isset($_SESSION['pickup']) && isset($_SESSION['destination']) && isset($_SESSION['total']) && isset($_SESSION['booking_date']) && isset($_SESSION['hour']) && isset($_SESSION['minute'])) { ?>
      <div class='booking-summary-black'><span class='booking-summary-center'>Price: &pound;<?php echo $_SESSION['total']; ?></span></div>
      <div class='booking-summary'><span class='booking-summary-center'>Date: <?php echo $_SESSION['booking_date'] . ' ' . $_SESSION['hour'] . ':' . $_SESSION['minute'] . ':00'; ?></span></div>
      <div class='booking-summary-black'><span class='booking-summary-center'>Journey: <?php echo $_SESSION['pickup']; ?> - <?php echo $_SESSION['destination']; ?></span></div>
    <?php } ?>
  </div>
  <div id="dvMap" style="width: 50%; height: 300px; float: left"></div>
  </div>-->
  <!-- end of map -->

    <div class="cont" style="width:95%; height: 320px; border: 1px solid black; padding: 10px; border-radius: 8px; margin-left: 25px;">
  <div id="content-top" style="width: 33%; height: 300px; float: left; background-color: white; color: black">
    <?php if(isset($_SESSION['pickup']) && isset($_SESSION['destination']) && isset($_SESSION['total']) && isset($_SESSION['booking_date']) && isset($_SESSION['hour']) && isset($_SESSION['minute'])) { ?>
      <h3 style='color:black'><strong>Your Journey Details</strong></h3><br />
      <h5>Pickup: <?php echo $_SESSION['pickup']; ?></h5><br />
      <h5>Destination: <?php echo $_SESSION['destination']; ?></h5><br />
      <h5>Date & Time: <?php echo $_SESSION['booking_date'] . ' ' . $_SESSION['hour'] . ':' . $_SESSION['minute'] . ':00'; ?></h5><br /><br />
      <div><span class='booking-summary-center'>Please Complete Steps Below to Book this Journey</div>
     
    <?php } } ?>
  </div>
  <div id="dvMap" style="width: 63%; height: 300px; float: left; margin-left: 30px;"></div>
  </div>







  <!--Content page-->
  <div id="content-wrap" class="row">



    <div id="content" class="twelve columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">






<!-- vehicles -->

<?php include('includes/vehicles.php'); ?>

<!-- end vehicles -->



        
    </div>
        
        </div>
        <!-- end of Content --> 
        
      </div>
    </div>








    <div id="content" class="six columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">








<div id="block-system-main" class="block block-system">
  <div class="content" style="padding: 8px;">
     <h2><strong>Passenger Details</strong>  <span style="font-size:0.4em;">Please fill in below</span></h2>
    <!--<?php if(isset($_SESSION['pickup']) && isset($_SESSION['destination']) && isset($_SESSION['total']) && isset($_SESSION['booking_date']) && isset($_SESSION['hour']) && isset($_SESSION['minute'])) { ?>
      <p><i class="fa fa-gbp fa-lg"></i> <?php echo $_SESSION['total']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar fa-lg"></i> <?php echo $_SESSION['booking_date'] . ' ' . $_SESSION['hour'] . ':' . $_SESSION['minute'] . ':00'; ?>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker fa-lg"></i> <?php echo $_SESSION['pickup']; ?> - <?php echo $_SESSION['destination']; ?></p>
    <?php } ?>-->

    
      
      <div class="form-item form-type-textfield form-item-name">
        <label class="required">Fullname <span class="form-required" title="This field is required.">*</span></label>
        <input type="text" id="contact_name" name="fullname" value="" size="60" maxlength="255" class="valid form-text required" />
      </div>
      <br />

      <div class="form-item form-type-textfield form-item-mail">
        <label class="required">E-mail Address <span class="form-required" title="This field is required.">*</span></label>
        <input type="email" id="contact_email" name="email" value="" size="60" maxlength="255" class="form-text required" />
      </div>
      <br />
      
      <div class="form-item form-type-textfield form-item-subject">
        <label>Mobile No <span class="form-required" title="This field is required.">*</span></label>
        <input type="text" id="edit-subject" name="telephone" value="" size="60" maxlength="255" class="form-text required" />
      </div>
      <br />


      <div class="form-item form-type-textfield form-item-subject">
        <label>Flight Details/ Additional Notes/ Requirements </label>
        <textarea id="note" name="note" class="form-text" cols="100" style="width:100%; height: 140px;"></textarea>
      </div>



      <input type="hidden" name="booking_date" value="<?php echo $_SESSION['booking_date']; ?>" />
      <input type="hidden" name="hour" value="<?php echo $_SESSION['hour']; ?>" />
      <input type="hidden" name="minute" value="<?php echo $_SESSION['minute']; ?>" />
      <input type="hidden" name="payment" value="<?php echo $_SESSION['total']; ?>" />


    <div id="panel" style="display:none">
    <input type='text' name='start' id='start' value='<?php echo $_SESSION['pickup']; ?>' />
    <input type='text' name='end' id='end' value='<?php echo $_SESSION['destination']; ?>' />
    </div>


      <div class="clear"></div>
    
  </div>
</div>



        
    </div>
        
        </div>
        <!-- end of Content --> 
        
      </div>
    </div>









    <div id="content" class="six columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">








<div id="block-system-main" class="block block-system">
  <div class="content" style="padding: 8px;">
     <h2><strong>Travel Details</strong> <span style="font-size:0.4em;">Please fill in below</span></h2>
    

    <form action="calculate2.php" method="post" name="booking_details_form" onsubmit="return validateBookingDetailsForm()">

      <div class="form-item form-type-textfield form-item-subject">
        <label>Pickup Address <span class="form-required" title="This field is required.">*</span></label>
        <input type="hidden" name="pickup_address" class="form-text" value="<?php echo $_SESSION['pickup']; ?>" style="width:100%" />
        <input type="text" name="actual_pickup_address" id="actual_pickup_address" class="form-text" value="" style="width:100%" />
      </div><br />


      <div class="form-item form-type-textfield form-item-subject">
        <label>Destination Address <span class="form-required" title="This field is required.">*</span></label>
      
        <input type="text" name="actual_destination" id="actual_destination" class="form-text" value="" style="width:100%" />
      </div><br />

       <div class="form-item form-type-textfield form-item-subject">
        <label>Return Date &amp; Time</label><br />
        <input type="text" id="datepicker2" class="form-text" name="return_date" placeholder="Return Date" style='width:50%'>
                                  <select class="form-text" name="return_hour" id="return_hour" style="width:60px; margin-top: -3px;">
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                  </select>
                                  <select class="form-text" name="return_minute" id="return_minute" style="width:60px; margin-top: -3px;">
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                  </select>
      </div>
      <br />



      
       
        <input type="hidden" name="destination" class="form-text" value="<?php echo $_SESSION['destination']; ?>" style="width:100%" />
      
      <!--<div class="form-item form-type-textfield form-item-name">
        <label class="required">Airport Name</label>
        <input type="text" id="airport_name" name="airport_name" value="" size="60" maxlength="255" class="valid form-text" />
      </div>
      <br />

      <div class="form-item form-type-textfield form-item-mail">
        <label class="required">Flight Number</label>
        <input type="text" id="flight_number" name="flight_number" value="" size="60" maxlength="255" class="form-text" />
      </div>
      <br />
      
      <div style="display:none" class="form-item form-type-textfield form-item-subject">
        <label>Terminal</label>
        <input type="text" id="terminal" name="terminal" value="" size="60" maxlength="255" class="form-text" />
      </div>-->
      

      <div class="form-actions form-wrapper" id="submit-edit-actions" style="float:left">
        <input type="checkbox" name="meet_and_greet" id="meet_and_greet" value="1" style="cursor: pointer;" class="form-submit" /> Meet &amp; Greet Service<br />
        <span style='font: inherit; font-size: 33px; font-size: 2.0625rem; font-weight: 300; font-size: 0.9em; margin-left: 24px;'>Your driver will meet you at a designated area inside the airport</span><br />
      </div>

      <!--<h2>Return Journey <span style="font-size:0.4em;">Leave blank if no return is required</span></h2>-->
      
      
      <div class="form-actions form-wrapper" id="submit-edit-actions" style="float:left">
        <input type="checkbox" name="terms" id="terms" value="1" style="cursor: pointer;" class="form-submit" /> <a href='terms'>I Agree to the Terms and Conditions</a>
      </div>
      <br /><br />

      <br /><br /><br />
      <div class="form-actions form-wrapper" id="submit-edit-actions">
        <input type="submit" id="submit-contact" value="Continue" style="cursor: pointer; width:170px; float:left; text-align: center;" class="form-submit" />
      </div>
      




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
<div id="msg"></div>
</body>
</html>