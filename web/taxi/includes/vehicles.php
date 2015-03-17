<style>
.fix-width {
  width:160px !important;
}
</style>
<div id="block-system-main" class="block block-system">
  <div class="content" style="padding: 5px;">
     <h2><strong>Choose Your Vehicle</strong></h2>
     <form action="calculate2.php" method="post" id="booking-form" name="booking_details_form" onsubmit="return validateBookingDetailsForm()">
     <p>Select the vehicle(s) required to meet your passenger and luggage requirements.</p>

      <span <?php echo $saloon_visibility; ?>>
      <div class="two columns car-border fix-width">

      <div class="form-item form-type-textfield form-item-subject">
       <h4><strong>Saloon Car</strong></h4>
        <img src='assets/img/car-saloon.jpg' /><br />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $saloon['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $saloon['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $saloon['small_bags']; ?></strong>  
      </div>
      <br />
      <select class='form-text' style="width:100%; cursor: pointer;" name='saloon' id='saloon' onchange='removeErrorVehicle()'>
        <option value='0'>--Select--</option>
        <option value='1'>1</option>
      </select>
      </div>
      </span>

      <span <?php echo $estate_visibility; ?>>
      <div class="two columns car-border fix-width">
      <div class="form-item form-type-textfield form-item-subject">
        <h4><strong>Estate Car</strong></h4>
        <img src='assets/img/car-estate.jpg' /><br />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $estate['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $estate['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $saloon['small_bags']; ?></strong>  
      </div>
      <br />
      <select class='form-text' style="width:100%; cursor: pointer;" name='estate' id="estate" onchange='removeErrorVehicle()'>
        <option value='0'>--Select--</option>
        <option value='1'>1</option>
      </select>

      </div>
      </span>


      <span <?php echo $executive_visibility; ?>>
      <div class="two columns car-border fix-width">
      <div class="form-item form-type-textfield form-item-subject">
        <h4><strong>Executive Car</strong></h4>
        <img src='assets/img/car-exec.jpg' /><br />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $executive['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $executive['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $executive['small_bags']; ?></strong>  
      </div>
      <br />
      <select class='form-text' style="width:100%; cursor: pointer;" name='executive' id='executive' onchange='removeErrorVehicle()'>
        <option value='0'>--Select--</option>
        <option value='1'>1</option>
      </select>

      </div>
      </span>


      <span <?php echo $mpv_visibility; ?>>
      <div class="two columns car-border fix-width">
      <div class="form-item form-type-textfield form-item-subject">
       <h4><strong>MPV</strong></h4>
        <img src='assets/img/car-mpv.jpg' /><br />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $mpv['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $mpv['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $mpv['small_bags']; ?></strong>  
      </div>
      <br />
      <select class='form-text' style="width:100%; cursor: pointer;" name='mpv' id='mpv'>
        <option value='0'>--Select--</option>
        <option value='1'>1</option>
      </select>

      </div>
      </span>



     
      <span <?php echo $minibus_visibility; ?>>
      <div class="two columns car-border fix-width">
      <div class="form-item form-type-textfield form-item-subject">
        <h4><strong>Minibus</strong></h4>
        <img src='assets/img/car-minibus.png' /><br />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $minibus['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $minibus['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $minibus['small_bags']; ?></strong>  
      </div>
      <br />
      <select class='form-text' style="width:100%; cursor: pointer;" name='minibus' id='minibus' onchange='removeErrorVehicle()'>
        <option value='0'>--Select--</option>
        <option value='1'>1</option>
      </select>
      </div>
    </span>


    <span style='display:none'>
      <div class="two columns">
      <div class="form-item form-type-textfield form-item-subject">
        <h4><strong>Minicoach</strong></h4>
        <img src='assets/img/car-minicoach.jpg' />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $minicoach['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $minicoach['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $minicoach['small_bags']; ?></strong>  
      </div>
      <br />
      <select class='form-text' style="width:60px; cursor: pointer;" name='minicoachh' id='minicoach'>
        <option value='0'>--Select--</option>
        <option value='1'>1</option>
      </select>
    </div>
    </span>

   
  </div>
</div>
