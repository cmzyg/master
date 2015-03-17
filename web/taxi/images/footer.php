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

$database->select('SELECT google_analytics_code FROM analytics');
$analytics = $database->fetch();
?>

<div id="footer">
    <div id="background-footer-overlay">
      <div class="row">
        <div class="twelve columns"> 
          <!--About us block-->
          <div class="three columns">
            <div class="region region-footer-first">
              <div id="block-block-1" class="block block-block contextual-links-region">
                <h2> <span><strong>About us</strong></span> </h2>
                <div class="content">
                  <h5><?php echo $other_pages['footer_about_us_text']; ?></h5>
                 <!-- <h6></h6> -->
                </div>
              </div>
            </div>
          </div>
          <!--end of About us block--> 
          
          <!--Recent Blog Post block-->
        <!-- Newsletter block -->
          <div id="block-views-latest-news-block">
            <div class="three columns">
              <div class="region region-footer-second">
                <div id="block-simplenews-6" class="block block-simplenews contextual-links-region">
                  <h2> <span><strong>Sitemap</strong></span> </h2>
                  <div class="content">
                    <ul>
                      <li><a href='terms'>Home</a></li><br />
                      <li><a href='terms'>Book</a></li><br />
                      <li><a href='terms'>About Us</a></li><br />
                      <li><a href='terms'>Contact Us</a></li><br />
                      <li><a href='terms'>FAQ</a></li><br />
                      <li><a href='terms'>Terms</a></li>

                    </ul>
                 
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of Newsletter block --> 


                  <!-- Newsletter block -->
          <div id="block-views-latest-news-block">
            <div class="three columns">
              <div class="region region-footer-third">
                <div id="block-simplenews-6" class="block block-simplenews contextual-links-region">
                  <h2> <span><strong>Contact</strong></span> </h2>
                  <div class="content">
                    <ul>
                      <p>Location: <?php echo $general_settings['main_area']; ?></p>
                      <p>Phone: <?php echo $general_settings['website_phone']; ?></p>
                      <p>Email: <?php echo $general_settings['website_email_address']; ?></p>
                    </ul>
                 
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of Newsletter block --> 

          
          <!-- Newsletter block -->
          <div id="block-views-latest-news-block">
            <div class="three columns">
              <div class="region region-footer-fourth">
                <div id="block-simplenews-6" class="block block-simplenews contextual-links-region">
                  <h2> <span><strong>Licenced Hire Service</strong></span> </h2>
                   <div class="content">
                    <div><img style="margin: 0 auto;" src='<?php echo $other_pages['footer_fully_licenced_service_image']; ?>' /></div>
                 
                    </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of Newsletter block --> 
        </div>
      </div>
      <div class="footer-overlay"></div>
    </div>
  </div>
  <div class="copyright" id="copyright">
    <div class="row">
      <div class="twelve columns">
        <div class="region region-copyright">
          <div id="block-block-9" class="block block-block contextual-links-region">
            <div class="content">
              <div class="left">
                <h6> <strong class="left"><?php echo $general_settings['company_name']; ?></strong> <br />
                  Copyright © 2014 <?php echo $general_settings['company_name']; ?>, Inc. All Rights Reserved.</h6>
              </div>
              <div class="right"> <img alt="" src="images/payment-methods.png" /> </div>
            </div>
          </div>
          <!-- /.block --> 
        </div>

        <!-- google analytics -->

        <?php echo $analytics['google_analytics_code']; ?>

        <!-- end of google analytics -->