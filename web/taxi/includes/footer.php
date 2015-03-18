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

$database->select('SELECT * FROM payment_options');
$payment_options = $database->fetch();
?>

<div id="footer">
    <div id="background-footer-overlay">
      <div class="row">
        <div class="twelve columns"> 
          <!--About us block-->
          <div class="three columns">
            <div class="region region-footer-first">
              <div id="block-block-1" class="block block-block contextual-links-region" style='text-align:center'>
                <h5> <span><strong>About us</strong></span> </h5>
                <div class="content">
                  <p style='font-size: 0.9em;'>Website owned and operated by Tradewinds Global Limited trading as <a href='http://cabsearch.net'><strong>CabSearch</strong></a>  -a network of independent private hire companies providing transport services across the UK</p>
                  <br />
                  <p style='font-size: 0.9em;'><?php echo $other_pages['footer_about_us_text']; ?></p>
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
                <div id="block-simplenews-6" class="block block-simplenews contextual-links-region" style='text-align:center'>
                  <h5> <span><strong>Sitemap</strong></span> </h5>
                  <div class="content">
                    <ul>
                      <p style='font-size: 0.9em;'><a href='/'>Home</a></p>
                      <p style='font-size: 0.9em;'><a href='book'>Book</a></p>
                      <p style='font-size: 0.9em;'><a href='about'>About Us</a></p>
                      <p style='font-size: 0.9em;'><a href='contact'>Contact Us</a></p>
                      <p style='font-size: 0.9em;'><a href='faq'>FAQ</a></p>
                      <p style='font-size: 0.9em;'><a href='terms'>Terms</a></p>
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
                <div id="block-simplenews-6" class="block block-simplenews contextual-links-region" style='text-align:center'>
                  <h5> <span><strong>Contact</strong></span> </h5>
                  <div class="content">
                    <ul>
                      <p style='font-size: 0.9em;'>Location: <?php echo $general_settings['main_area']; ?></p>
                      <p style='font-size: 0.9em;'>Phone: <?php echo $general_settings['website_phone']; ?></p>
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
                <div id="block-simplenews-6" class="block block-simplenews contextual-links-region" style='text-align:center'>
                  <h5> <span><strong>Licenced Hire Service</strong></span> </h5>
                   <div class="content">
                    <div><img style="margin: 0 auto;" src='<?php echo $other_pages['footer_fully_licenced_service_image']; ?>' /></div>
                    <br />
                    <ul>
                      <p style='font-size: 0.9em;'>Operator Licence: <?php echo $general_settings['operator_licence']; ?></p>
                      <p style='font-size: 0.9em;'>Licencing Authority: <?php echo $general_settings['licencing_authority']; ?></p>
                    </ul>

                 
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
                <h6> <strong class="left">Powered by <a href='http://cabsearch.net'>CabSearch</a></strong> <br />
                  Copyright © 2014 Tradewinds Global Limited. All Rights Reserved.</h6>
              </div>

              <!-- if payment method is not cash only then display payment methods image -->
              <?php if($payment_options['pay_on_day'] !== 'Cash') { ?>
              <div class="right"> <img alt="" src="images/payment-methods.png" /> </div>
              <?php } ?>
              <!-- -->

            </div>
          </div>
          <!-- /.block --> 
        </div>

        <!-- google analytics -->

        <?php echo $analytics['google_analytics_code']; ?>

        <!-- end of google analytics -->