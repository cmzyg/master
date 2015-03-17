<div id="block-system-main" class="block block-system">
  <div class="content" style="padding: 8px;">
     <h2><strong>Choose Your Vehicle</strong></h2>
     <form action="calculate2.php" method="post" id="booking-form" name="booking_details_form" onsubmit="return validateBookingDetailsForm()">
      <span <?php echo $saloon_visibility; ?>>
      <div class="form-item form-type-textfield form-item-subject">
       <h4>Saloon Car</h4>
        <img src='assets/img/car-saloon.jpg' /><br />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $saloon['seats']; ?></strong>&nbsp;
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $saloon['large_bags']; ?></strong>&nbsp;
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $saloon['small_bags']; ?></strong>  
      </div>
      <select class='form-text' style="width:60px; cursor: pointer; text-align: center" name='saloon' id='saloon'>
        <option value='0'>0</option>
        <option value='1'>1</option>
      </select>

      <hr />
      </span>

      <span <?php echo $estate_visibility; ?>>
      <div class="form-item form-type-textfield form-item-subject">
        <h4>Estate Car</h4>
        <img src='assets/img/car-estate.jpg' />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $estate['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $estate['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $saloon['small_bags']; ?></strong>  
      </div>
      <select class='form-text' style="width:60px; cursor: pointer; text-align: center" name='estate' id="estate">
        <option value='0'>0</option>
        <option value='1'>1</option>
      </select>

      <hr />
      </span>


      <span <?php echo $executive_visibility; ?>>
      <div class="form-item form-type-textfield form-item-subject">
        <h4>Executive Car</h4>
        <img src='assets/img/car-exec.jpg' />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $executive['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $executive['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $executive['small_bags']; ?></strong>  
      </div>
      <select class='form-text' style="width:60px; cursor: pointer; text-align: center" name='executive' id='executive'>
        <option value='0'>0</option>
        <option value='1'>1</option>
      </select>

      <hr />
      </span>


      <span <?php echo $mpv_visibility; ?>>
      <div class="form-item form-type-textfield form-item-subject">
       <h4>MPV</h4>
        <img src='assets/img/car-mpv.jpg' />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $mpv['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $mpv['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $mpv['small_bags']; ?></strong>  
      </div>
      <select class='form-text' style="width:60px; cursor: pointer; text-align: center" name='mpv' id='mpv'>
        <option value='0'>0</option>
        <option value='1'>1</option>
      </select>

      <hr />
      </span>



     
      <span <?php echo $minibus_visibility; ?>>
      <div class="form-item form-type-textfield form-item-subject">
        <h4>Minibus</h4>
        <img src='assets/img/car-minibus.png' />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $minibus['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $minibus['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $minibus['small_bags']; ?></strong>  
      </div>
      <select class='form-text' style="width:60px; cursor: pointer; text-align: center" name='minibus' id='minibus'>
        <option value='0'>0</option>
        <option value='1'>1</option>
      </select>
    </span>

    <hr />

    <span <?php echo $minicoach_visibility; ?>>
      <div class="form-item form-type-textfield form-item-subject">
        <h4>Minicoach</h4>
        <img src='assets/img/car-minicoach.jpg' />
        <img src='assets/img/car-passenger.png' /> <strong>x<?php echo $minicoach['seats']; ?></strong>
        <img src='assets/img/car-large-bag.png' /> <strong>x<?php echo $minicoach['large_bags']; ?></strong>
        <img src='assets/img/car-small-bag.png' /> <strong>x<?php echo $minicoach['small_bags']; ?></strong>  
      </div>
      <select class='form-text' style="width:60px; cursor: pointer; text-align: center" name='minicoachh' id='minicoach'>
        <option value='0'>0</option>
        <option value='1'>1</option>
      </select>
    </span>
   
  </div>
</div>
