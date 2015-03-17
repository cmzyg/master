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

$page = 'book';

$seo = $settings->getBookingsSEO();

$fixed_prices     = $settings->getFixedPrices();

$database->select('SELECT minimum_booking_notice FROM rates');
$rates = $database->fetch();
$notice_db = $rates['minimum_booking_notice'];
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
<link rel="stylesheet" href="<?php echo $base_url; ?>css/responsive.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/default.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>vendor/rs-plugin/css/font-style.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/styles.css" />
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/jquery.ui.all.css">
<link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/slider.css" />
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
  $("#hour").change(function(){
    error_div    = document.getElementById('error_div');
    notice_hours = document.getElementById('notice_hours');
        error_div.value = 0;
        dataString = $("#rooms-booking-availability-search-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-date.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      success: function(data) {
        //$("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
        if(data.date == false)
        {
          error_div.value = '1';

        }
        else if(data.notice == false)
        {
          error_div.value = '2';
          notice_hours.value = data.notice_hours;
        }

      }
    });
return false;

  });
});

$(function(){
  $("#minute").change(function(){
    error_div = document.getElementById('error_div');
    notice_hours = document.getElementById('notice_hours');
        error_div.value = 0;
        dataString = $("#rooms-booking-availability-search-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-date.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      success: function(data) {
        //$("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
        if(data.date == false)
        {
          error_div.value = '1';

        }
        else if(data.notice == false)
        {
          error_div.value = '2';
          notice_hours.value = data.notice_hours;
        }

      }
    });
return false;

  });
});


$(function(){
  $("#datepicker").change(function(){
    error_div = document.getElementById('error_div');
    notice_hours = document.getElementById('notice_hours');
    error_div.value = 0;
        dataString = $("#rooms-booking-availability-search-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-date.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      success: function(data) {
        //$("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
        if(data.date == false)
        {
          error_div.value = '1';

        }
        else if(data.notice == false)
        {
          error_div.value = '2';
          notice_hours.value = data.notice_hours;
        }


      }
    });
return false;

  });
});

    </script>

    <style>
    a:link .regular-bookings {
      color: #dd9f42 !important;
    }
    a:visited .regular-bookings {
      color: #dd9f42 !important;
    }
    a:active .regular-bookings {
      color: #dd9f42 !important;
    }
    a:hover .regular-bookings {
      color: #dd9f42 !important;
    }

    a:link .fixed-bookings {
      color: #FFFFFF !important;
    }
    a:visited .fixed-bookings {
      color: #FFFFFF !important;
    }
    a:active .fixed-bookings {
      color: #FFFFFF !important;
    }
    a:hover .fixed-bookings {
      color: #dd9f42 !important;
    }
    h2 {
    text-transform: none !important;
}
    </style>


  </head>



  <body>
  <div class="extra-space"></div>
  <input style="display:none" type='text' id='error_div' />
  <input style="display:none" type='text' id='notice_hours' />
  <div id="layout-mode" class="boxed"><!-- Use classes Wide: wide, Boxed: boxed -->
  <?php include('includes/header.php'); ?>


          <!--Page title & breadcrumb-->
          <div id="pre-content">
            <div class="row"> 
              <!--start breadcrumb -->
              <div id="breadcrumb">
              <div class="breadcrumb"> <span class="crumbs"><a href="<?php echo $base_url; ?>">Home</a></span> <span class="crumbs-current">>
              Book Online </span> </div>
              </div>
              <!-- end breadcrumb -->
              <div class="page-title">Book Online</div>
            </div>
    <div class="pre-content-overlay"></div>
  </div>
          <!--end of Page title & breadcrumb-->  

          

         

<div id="content-wrap" class="row">
  <div id="content" class="eight columns">
    <div class="region region-content">
      <h2 class='lead'><strong>Choose Your Journey</strong></h2>
      <p>Enter a custom journey or select a journey from airport transfers and special prices below</p>
    </div>
  </div>
</div>




  <!--Availability search Block -->
  <div id="content-top" style="margin-left:24px;margin-right:24px;border-radius:6px; padding: 10px; margin-top: -30px">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div id="block-rooms-booking-manager-rooms-availability-search" class="block block-rooms-booking-manager contextual-links-region">
            <h2 style="width: 400px;" class='get-quote-text'>Get a Quote & Book Online </h2><br /><br /><br />
            <div class="content">
              <form action="calculate" method="post" name="form1" id="rooms-booking-availability-search-form" accept-charset="UTF-8" onsubmit='return validateBookingForm()'>
                <!-- location and date form -->
                <input type='hidden' id='pickup' name='pickup' value='' />
                <input type='hidden' id='destination' name='destination' value='' />
                <!-- form end -->
                <div>
                  <div class="start-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-start-date">
                        <label>Pickup</label>
                        <div id="edit-rooms-start-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-start-date-date" style="width:220px;">
                           
                            <input type="text" id="geocomplete" class="form-text" onblur='changePickup();' oninput='changePickup(); removeErrorPickup()' onkeypress='changePickup()' onclick='changePickup()' style="width:100%; background-color: white" />
                       
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="end-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-end-date">
                        <label>Destination</label>
                        <div id="edit-rooms-end-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-end-date-date" style="width:220px;">
                            <label>Date</label>
                            
                            <input type="text" id="geocomplete2" class="form-text" onblur='changeDestination();' oninput='changeDestination(); removeErrorDestination()' onclick='changeDestination();' onkeypress='changeDestination()' style="width:100%; background-color: white" />
                   
                       
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="end-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-end-date">
                        <label>Date</label>
                        <div id="edit-rooms-end-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-end-date-date" style="width: 85px;">
                            <label>Date</label>
                            
                                <p><input type="text" id="datepicker" class="form-text" name="booking_date" oninput='removeErrorDate()' onmouseout='removeErrorDate()' placeholder="Date" style="background-color: white"></p>
                       
                        
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                    <div class="end-date">
                    <div class="container-inline-date">
                      <div class="form-item form-type-date-popup form-item-rooms-end-date">
                        <label>Time</label>
                        <div id="edit-rooms-end-date" class="date-padding">
                          <div class="form-item form-type-textfield form-item-rooms-end-date-date">
                            <label>Time</label>
                            
                                <p>
                                  <select class="form-text" name="hour" id="hour" style="width:60px; background-color:white">
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
                                  <select class="form-text" name="minute" id="minute" style="width:60px; background-color:white;">
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
                                </p>
                            
                     
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <input type="hidden" name="form_build_id" value="form-TGE2i6Da1LPZSs1n-d65GEQY4G1lQqOLbbftzGyhN5c" />
                  <input type="hidden" name="form_id" value="rooms_booking_availability_search_form" />
                  <div class="form-actions form-wrapper" id="edit-actions">
                    <input type="submit" id="edit-submit" name="op" value="Book Now" class="form-submit" onclick='changePickup(); changeDestination();' />
                  </div>
                   <!--<div class="form-actions form-wrapper" id="edit-actions">
                    <span><?php echo $notice_db; ?> hours notice required for online bookings</span>
                   </div>-->
                                                   
                </div>
              </form>
            </div>
          </div>
          <!-- /.block --> 
        </div>
        <!-- /.region --> 
      </div>
    </div>
  </div>
  <!--End of Availability search Block -->  



   <!-- <div id="content-top">
    <div class="row">
      <div>
        <div class="region region-content-top">
          <div style="text-align:center" id="" class="block block-rooms-booking-manager contextual-links-region">
            <h2> <a href='fixed-bookings'><span class='fixed-bookings'>Fixed Bookings</span></a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href='bookings'><span class='regular-bookings'>Regular Bookings</span></a></h2>
            <div class="content">
                  

            </div>
          </div>

        </div>

      </div>
    </div>
  </div> -->

  <br /><br />
 <div id="content-bottom" style="margin-top: -25px;">
    <div class="row">
      <div>
        <div class="region region-content-bottom">
          <div id="block-views-aba6fc0651a70555fe194f16d93de3d1" class="block block-views contextual-links-region">
            <!--<h2> <span>Airport Transfers & Special Prices</span> </h2>-->

                  <div style='background-color:black; border-radius: 6px; color:white; margin: 3px'>
                    <div style='height:40px; background-color: #242a31; border-radius: 6px;' class='black-stripe'>
                      <div style='padding:8px; font-size: 1.3em; float: left; width:50%'>Airport Transfers & Special Prices</div>
                      <div style='text-align:right; float: left; padding: 8px; width: 50%'><?php echo $fixed_prices['fixed_price_intro']; ?></div>
                    </div>
                  </div>
            <div class="content">
              <div id="accomodation-slider">
                <ul class="slides">
                   <?php if($fixed_prices['fixed_1_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-1"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_1_img']; ?>" width="200" height="100" /> </a>
                      <div class="title" style='font-size: 14pt'> <a href="fixed-journey-1"><?php echo $fixed_prices['fixed_location_1']; ?><div class='freetext'><?php echo $fixed_prices['free_text_1']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_1']; ?>
                        <div class='starting-from'>From</div>
                      </div>
                      
                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_2_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-2"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_2_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-2"><?php echo $fixed_prices['fixed_location_2']; ?><div class='freetext'><?php echo $fixed_prices['free_text_2']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_2']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_3_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-3"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_3_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-3"><?php echo $fixed_prices['fixed_location_3']; ?><div class='freetext'><?php echo $fixed_prices['free_text_3']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_3']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_4_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-4"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_4_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-4"><?php echo $fixed_prices['fixed_location_4']; ?><div class='freetext'><?php echo $fixed_prices['free_text_4']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_4']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_5_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-5"> <img alt="fixed-journey-5" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_5_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-5"><?php echo $fixed_prices['fixed_location_5']; ?><div class='freetext'><?php echo $fixed_prices['free_text_5']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_5']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_6_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-6"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_6_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-6"><?php echo $fixed_prices['fixed_location_6']; ?><div class='freetext'><?php echo $fixed_prices['free_text_6']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_6']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_7_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-7"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_7_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-7"><?php echo $fixed_prices['fixed_location_7']; ?><div class='freetext'><?php echo $fixed_prices['free_text_7']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_7']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_8_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-8"> <img alt="fixed-journey-8" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_8_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-8"><?php echo $fixed_prices['fixed_location_8']; ?><div class='freetext'><?php echo $fixed_prices['free_text_8']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_8']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_9_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-9"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_9_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-9"><?php echo $fixed_prices['fixed_location_9']; ?><div class='freetext'><?php echo $fixed_prices['free_text_9']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_9']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_10_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-10"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_10_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-10"><?php echo $fixed_prices['fixed_location_10']; ?><div class='freetext'><?php echo $fixed_prices['free_text_10']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_10']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_11_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-11"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_11_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-11"><?php echo $fixed_prices['fixed_location_11']; ?><div class='freetext'><?php echo $fixed_prices['free_text_11']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_11']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>

                  <?php if($fixed_prices['fixed_12_status'] == 'Active') { ?>
                  <li>
                    <div class="accomodation-carousel-item" style="margin-bottom:10px; position:relative;"> <a href="fixed-journey-12"> <img alt="" src="<?php echo $base_url; ?><?php echo $fixed_prices['fixed_price_12_img']; ?>" width="200" height="100" /> </a>
                      <div class="title"> <a href="fixed-journey-12"><?php echo $fixed_prices['fixed_location_12']; ?><div class='freetext'><?php echo $fixed_prices['free_text_12']; ?></div></a> </div>
                      <div class="price">&pound;<?php echo $fixed_prices['fixed_price_12']; ?>
                        <div class='starting-from'>From</div>
                      </div>

                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
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