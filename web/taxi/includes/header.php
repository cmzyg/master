  <div id="header" class="container">
    <div id="header_line" class="container header_line"> 
      <!-- features top -->


      <!-- end .features top --> 
    </div>
    <div class="row">
      <div id="logo" class="four columns logo"> 
        <!-- logo & slogan --> 
        <?php include('includes/logo.php'); ?>
        <!-- end. logo & slogan --> 
      </div>
      <div class="one columns" style='margin-top: 30px;'></div>
      <div class="three columns" style='margin-top: 30px;'> 
        <!-- logo & slogan --> 
        <?php include('includes/social-media.php'); ?>
        <!-- end. logo & slogan --> 
      </div>
      <div class="four columns"> 
        <!--Site menu-->
         <br />
         <h4 class='right'>Call Us Now</h4>
         <ul><li class="right" style='margin-left:20px'><i class='icon-phone'></i><span style="font-size:2em"><?php echo $general_settings['website_phone']; ?></span></li></ul>
         <h5 class='right'><?php echo $general_settings['free_text']; ?></h5>
        <!--end of Site menu--> 
      </div>
    </div>

        <div id="header_line" class="container header_line" style='border-radius: 6px; margin-left: 26px; margin-right: 26px;'> 
      <!-- features top -->
      <div class="row">
        <div class="twelve columns left"> 
          <!-- Phone number -->
        
          <!-- End of Phone number -->      
          <!-- Social Icons -->
                 <?php include('includes/navigation.php'); ?>
          <!-- end of Social Icons --> 
        
        </div>
      </div>


      <!-- end .features top --> 
    </div>


  </div>
  
  <input type='hidden' id='website_telephone' value='<?php echo $general_settings['website_phone']; ?>' />

  <?php include('settings/settings-web-design.php'); ?>