<?php
get_header(); ?>

<?php

   global $post;
   $slug = $post_slug=$post->post_name;
   if($slug !== 'anketa') {
?>

<?php $id = $_GET['narys']; ?>


 <style>
.header-bg {background-color:#000000; background-image: url("../wp-content/themes/pazintysUK/images/blurred_bg_01.jpg"); background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#header, #header .form-header .lead, #header label {color:#ffffff;} #header a:not(.button), div#main .widgets-container.sidebar_location .form-search a:not(.button), .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {color:#ffffff;} #header a:not(.button):hover,#header a:not(.button):focus{color:#ffffff;}.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #743349;}#header .top-bar ul > li:hover:not(.name) a {color:#ffffff}; .top-bar ul > li:not(.name):hover a, .top-bar ul > li:not(.name).active a, .top-bar ul > li:not(.name):focus a { color: #ffffff; }.top-bar ul > li.has-dropdown .dropdown:before { border-color: transparent transparent #743349 transparent; }.top-bar ul > li.has-dropdown .dropdown li a {color: #ffffff;background: #743349;}.top-bar ul > li.has-dropdown .dropdown li a:hover,.top-bar ul > li.has-dropdown .dropdown li a:focus { background: #92425d;}.top-bar ul > li.has-dropdown .dropdown li.has-dropdown .dropdown:before {border-color: transparent #743349 transparent transparent;}.lt-ie9 .top-bar section > ul > li a:hover, .lt-ie9 .top-bar section > ul > li a:focus { color: #ffffff; }.lt-ie9 .top-bar section > ul > li:hover, .lt-ie9 .top-bar section > ul > li:focus { background: #743349; }.lt-ie9 .top-bar section > ul > li.active { background: #743349; color: #ffffff; }#breadcrumbs-wrapp {background:#743349; }#breadcrumbs-wrapp, ul.breadcrumbs li:before {color:#f0f0f0;} #breadcrumbs-wrapp a{color:#ffffff;} #breadcrumbs-wrapp a:hover,#breadcrumbs-wrapp a:focus{color:#92425d;}.kleo-page {background:#ffffff; }div#main {color:#777777;}a:not(.button),div#main a:not(.button), #header .form-footer a:not(.button){color:#333333;} div#main a:not(.button):hover, a:not(.button):hover,a:not(.button):focus,div#main a:not(.button):focus{color:#92425d;}div#main .widgets-container.sidebar_location {color:#777777;} div#main .widgets-container.sidebar_location a:not(.button){color:#666666;} div#main .widgets-container.sidebar_location a:not(.button):hover,div#main a:not(.button):focus{color:#92425d;}#footer {background:#171717 url("http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/themes/sweetdate/assets/images/patterns/black_pattern.gif"); }#footer, #footer .footer-social-icons a:not(.button), #footer h5{color:#777777;} #footer a:not(.button){color:#743349;} #footer a:not(.button):hover,#footer a:not(.button):focus{color:#92425d;}h1 {font: normal 46px 'Lato'; color: #222222;}h2 {font: normal 30px 'Lato'; color: #222222;}h3 {font: normal 26px 'Lato'; color: #222222;}h4 {font: normal 20px 'Open Sans'; color: #222222;}h5 {font: normal 17px 'Open Sans'; color: #222222;}h6 {font: normal 14px 'Open Sans'; color: #222222;}body {font: normal 13px 'Open Sans'; color: #777777;}.form-search, .form-header, div.alert-box, div.pagination span.current {background:#743349}.top-links, .top-links a, .circular-progress-item input, .ajax_search_image .icon{color: #743349;}.form-search .notch {border-top: 10px solid #743349;}.form-search.custom div.custom.dropdown a.current, .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {background-color: #92425d; }.form-search.custom div.custom.dropdown a.selector, .form-search.custom div.custom.dropdown a.current, .form-search.custom select { border: solid 1px #92425d; }.form-search.custom input[type="text"],.form-search.custom input[type="password"] {border: 1px solid #743349 }.form-header, div.alert-box {color:#ffffff}.mejs-controls .mejs-time-rail .mejs-time-loaded{background-color: #92425d; }.form-search {border-left: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.form-header {border-left: 10px solid rgba(146, 66, 93, 0.3); border-top: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.tabs.pill.custom dd.active a, .tabs.pill.custom li.active a, div.item-list-tabs ul li a span, #profile .pmpro_label {background: #743349; color: #ffffff;}.tabs.pill.custom dd.active a:after {border-top: 10px solid #743349}.tabs.info dd.active a, .tabs.info li.active a, #object-nav ul li.current a, #object-nav ul li.selected a, .tabs.info dd.active, .tabs.info li.active, #object-nav ul li.selected, #object-nav ul li.current {border-bottom: 2px solid #743349;} .tabs.info dd.active a:after, #object-nav ul li.current a:after, #object-nav ul li.selected a:after {border-top:5px solid #743349;}div.item-list-tabs li#members-all.selected, div.item-list-tabs li#members-personal.selected, .section-members .item-options .selected {border-bottom: 3px solid #743349;} div.item-list-tabs li#members-all.selected:after, div.item-list-tabs li#members-personal.selected:after, .section-members .item-options .selected:after {border-top: 5px solid #743349}.button, ul.sub-nav li.current a, #subnav ul li.current a, .wpcf7-submit, #rtmedia-add-media-button-post-update, #rt_media_comment_submit, .rtmedia-container input[type="submit"] { border: 1px solid #743349; background: #743349; color: #ffffff; }.button:hover, .button:focus, .form-search .button, .form-search .button:hover, .form-search .button:focus, .wpcf7-submit:focus, .wpcf7-submit:hover, #rtmedia-add-media-button-post-update:hover, #rt_media_comment_submit:hover, .rtmedia-container input[type="submit"]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.button.secondary,.button.dropdown.split.secondary > a, #messages_search_submit, #rtmedia-whts-new-upload-button, #rtMedia-upload-button, #rtmedia_create_new_album,#rtmedia-nav-item-albums-li a,#rtmedia-nav-item-photo-profile-1-li a,#rtmedia-nav-item-video-profile-1-li a,#rtmedia-nav-item-music-profile-1-li a,.bp-member-dir-buttons div.generic-button a.add,.bp-member-dir-buttons div.generic-button a.remove { background-color: #E6E6E6; color: #1D1D1D; border: 1px solid #E6E6E6; }.button.secondary:hover, .button.secondary:focus, .button.dropdown.split.secondary > a:hover, .button.dropdown.split.secondary > a:focus, #messages_search_submit:hover, #messages_search_submit:focus,  #rtmedia-whts-new-upload-button:hover, #rtMedia-upload-button:hover, #rtmedia_create_new_album:hover,#rtmedia-nav-item-albums-li a:hover,#rtmedia-nav-item-photo-profile-1-li a:hover,#rtmedia-nav-item-video-profile-1-li a:hover,#rtmedia-nav-item-music-profile-1-li a:hover,.bp-member-dir-buttons div.generic-button a.add:hover,.bp-member-dir-buttons div.generic-button a.remove:hover { background-color: #DDDCDC;  border: 1px solid #DDDCDC; color: #1D1D1D; }.btn-profile .button.dropdown > ul, .button.dropdown.split.secondary > span {background: #E6E6E6;}.button.dropdown.split.secondary > span:hover, .button.dropdown.split.secondary > span:focus { background-color: #DDDCDC; color: #1D1D1D;}#header .btn-profile a:not(.button) {color: #1D1D1D;}#header .btn-profile .button.dropdown > ul li:hover a:not(.button),#header .btn-profile .button.dropdown > ul li:focus a:not(.button) {background-color: #DDDCDC; color:#1D1D1D;}.button.bordered { background-color: #fff; border: 1px solid #E6E6E6; color: #1D1D1D; }.button.bordered:hover,.button.bordered:focus  { background-color: #DDDCDC; border: 1px solid #DDDCDC; color: #1D1D1D; }div#profile {background-color:#FAFAFA; background-image: url("http://seventhqueen.com/demo/sweetdatewp/wp-content/uploads/2013/06/blurred_bg_01.jpg"); background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#profile, #profile h2, #profile span {color:#ffffff;} #profile .cite a, #profile .regulartab a, #profile .btn-carousel a {color:#ffffff;} #profile .cite a:hover,#profile .cite a:focus, #profile .regulartab a:hover, #profile .regulartab a:focus, .callout .bp-profile-details:before{color:#743349;}#profile .tabs.pill.custom dd.active a, #profile .pmpro_label {background: #743349 }#profile:after {border-color:#FAFAFA transparent transparent transparent;}#item-header-avatar img, .mySlider img {border-color: rgba(255,255,255,0.1) !important;}#profile .generic-button a, .tabs.pill.custom dd:not(.active) a, #profile .callout, .regulartab dt, .regulartab dd {background: rgba(255,255,255,0.1); color: #ffffff;}#profile hr {border-color: rgba(255,255,255,0.1);}.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button, .rtmedia-item-actions input[type=submit] {border: 1px solid #743349; background: #743349; color: #ffffff; }.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button:hover, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button:hover, .rtmedia-item-actions input[type=submit]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce span.onsale, .woocommerce-page span.onsale{background:#743349;} .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {border: 1px solid #743349;background:#92425d}.woocommerce .widget_layered_nav_filters ul li a, .woocommerce-page .widget_layered_nav_filters ul li a { border: 1px solid #743349; background-color: #743349; color: #ffffff; }.woocommerce div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active:after {border-top:5px solid #743349}.woocommerce #main ul.products li a.view_details_button:not(.button),.woocommerce ul.products li .add_to_cart_button:before,.woocommerce ul.products li .product_type_grouped:before,.woocommerce ul.products li .add_to_cart_button.added:before,.woocommerce ul.products li .add_to_cart_button.loading:before,.woocommerce ul.products li .product_type_external:before,.woocommerce ul.products li .product_type_variable:before, .woocommerce ul.products li .add_to_cart_button.loading,.woocommerce ul.products li .add_to_cart_button,.woocommerce ul.products li .product_type_grouped,.woocommerce ul.products li .view_details_button,.woocommerce ul.products li .product_type_external,.woocommerce ul.products li .product_type_variable{color:#743349}.woocommerce ul.products li .add_to_cart_button:hover:before, .woocommerce ul.products li .product_type_grouped:hover:before, .woocommerce ul.products li .view_details_button:hover:before, .woocommerce ul.products li .product_type_external:hover:before, .woocommerce ul.products li .product_type_variable:hover:before {color: #ffffff;}.woocommerce ul.products li .add_to_cart_button:hover, .woocommerce ul.products li .product_type_grouped:hover, .woocommerce ul.products li .view_details_button:hover, .woocommerce ul.products li .product_type_external:hover, .woocommerce ul.products li .product_type_variable:hover{color: #ffffff;background-color: #92425d}@media only screen and (max-width: 940px) {.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #92425d; }.top-bar { background: #743349; }.top-bar > ul .name h1 a { background: #92425d; }.top-bar ul > li.has-dropdown.moved > .dropdown li a:hover { background: #92425d; display: block; }.top-bar ul > li.has-dropdown .dropdown li.has-dropdown > a li a:hover, .top-bar ul > li.toggle-topbar { background: #92425d; }}@media screen and (max-width: 600px) {#wpadminbar { position: fixed; }}@media screen and ( max-width: 782px ) {.adminbar-enable .sticky.fixed { margin-top: 46px; }}.top-links { border-bottom: none; }
#profile:after { border: none; }
</style>


</head>

<body class="page page-id-629 page-template page-template-page-templatesleft-sidebar-php">
    


    
<!-- Page
================================================ -->
<!--Attributes-->
<!--class = kleo-page wide-style / boxed-style-->
<div class="kleo-page wide-style">

<!-- HEADER SECTION
================================================ -->
<header>
	<div class="header-bg clearfix">

				<!--Top links-->
		<div class="top-links">
			<div class="row">
				<ul class="no-bullet">
					<li class="nine columns">
						<a class="mail-top" href="<?php echo get_option('admin_email'); ?>"><i class="icon-envelope"></i> &nbsp; <?php echo get_option('admin_email') ?></a>
					</li>

					<li class="three columns hide-for-small">
						Facebook Puslapis: &nbsp;
						<a href="http://www.facebook.com/pazintysUK" class="has-tip tip-bottom" data-width="210" target="_blank" title="Rask mus Facebook!"><i class="icon-facebook icon-large"></i></a>																					
					</li>
				</ul>
			</div>
		</div>
		<!--end top-links-->
		
		<div id="header">
			<div class="row">




				<!-- Main Navigation -->
				<div class="eight columns">
					<div class="left">
						<nav class="top-bar">
							<a href="" class="small-logo"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/themes/sweetdate/assets/images/small_logo.png" height="43" alt="Sweet Date"></a>
							<ul>
								<!-- Toggle Button Mobile -->
								<li class="name">
									<h1><a href="#">Pasirinkite Puslapi</a></h1>
								</li>
								<li class="toggle-topbar"><a href="#"><i class="icon-reorder"></i></a></li>
								<!-- End Toggle Button Mobile -->
							</ul>

							<section><!-- Nav Section -->
								<ul id="menu-sweetdate" class="right">
									<li id="nav-menu-item-918" ><a href="http://www.pazintysuk.com">Pagrindinis</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/nariai">Nariai</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/paieska">Paieška</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/renginiai">Renginiai</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/apie-mus">Apie Mus</a></li>

									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/kontaktai">Kontaktai</a></li>
                                    <li id="nav-menu-item-search" class="menu-item kleo-menu-item-search"><a class="search-trigger" href="#"><i class="icon icon-search"></i></a></li>
                                </ul>							
                            </section><!-- End Nav Section -->

						</nav>
					</div><!--end contain-to-grid sticky-->
				</div>
				<!-- end Main Navigation -->
			</div><!--end row-->
			
						
			<div class="row just-after-header">
						</div>
			
						
			</div><!--end #header-->
			
					
				

	</div><!--end header-bg-->
</header>
<!--END HEADER SECTION-->

        <!-- BREADCRUMBS SECTION
        ================================================ -->

        
<!-- MAIN SECTION
================================================ -->
<section>
    <div id="main">
        
                
        <div class="row">
            
            			            <!-- SIDEBAR SECTION
================================================ -->

<!--END SIDEBAR SECTION-->            

<div class="twelve columns">


                                
                        
<!-- Begin Article -->
<div class="row">

    
  <div class="twelve columns">
      <h2 class="article-title text-center"><?php the_title() ?></h2>
  </div><!--end twelve-->
  
  
  <div class="twelve columns">
    <div class="article-content">
       
        	<?php 
        	    while (have_posts()) : the_post();
        		echo '<p class="text-center">' . the_content() . '</p>';
        		endwhile;
            ?>

    </div><!--end article-content-->
  </div><!--end twelve-->
</div><!--end row-->
<!-- End  Article -->


                        
						


                
            </div><!--end content-->

        </div><!--end row-->
    </div><!--end main-->
  
      
</section>
<!--END MAIN SECTION-->













<?php } else { ?>

<?php $user = wp_get_current_user(); ?>
<?php 
$profile = get_user_by('id', '1'); 
$profile->gender == 'M' ? $user_gender = 'Vyras' : $user_gender = 'Moteris';
?>



<style>
.header-bg {background-color:#000000; background-image: url("http://www.pazintysuk.com/wp-content/themes/pazintysUK/images/blurred_bg_01.jpg") !important; background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#header, #header .form-header .lead, #header label {color:#ffffff;} #header a:not(.button), div#main .widgets-container.sidebar_location .form-search a:not(.button), .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {color:#ffffff;} #header a:not(.button):hover,#header a:not(.button):focus{color:#ffffff;}.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #743349;}#header .top-bar ul > li:hover:not(.name) a {color:#ffffff}; .top-bar ul > li:not(.name):hover a, .top-bar ul > li:not(.name).active a, .top-bar ul > li:not(.name):focus a { color: #ffffff; }.top-bar ul > li.has-dropdown .dropdown:before { border-color: transparent transparent #743349 transparent; }.top-bar ul > li.has-dropdown .dropdown li a {color: #ffffff;background: #743349;}.top-bar ul > li.has-dropdown .dropdown li a:hover,.top-bar ul > li.has-dropdown .dropdown li a:focus { background: #92425d;}.top-bar ul > li.has-dropdown .dropdown li.has-dropdown .dropdown:before {border-color: transparent #743349 transparent transparent;}.lt-ie9 .top-bar section > ul > li a:hover, .lt-ie9 .top-bar section > ul > li a:focus { color: #ffffff; }.lt-ie9 .top-bar section > ul > li:hover, .lt-ie9 .top-bar section > ul > li:focus { background: #743349; }.lt-ie9 .top-bar section > ul > li.active { background: #743349; color: #ffffff; }#breadcrumbs-wrapp {background:#743349; }#breadcrumbs-wrapp, ul.breadcrumbs li:before {color:#f0f0f0;} #breadcrumbs-wrapp a{color:#ffffff;} #breadcrumbs-wrapp a:hover,#breadcrumbs-wrapp a:focus{color:#92425d;}.kleo-page {background:#ffffff; }div#main {color:#777777;}a:not(.button),div#main a:not(.button), #header .form-footer a:not(.button){color:#333333;} div#main a:not(.button):hover, a:not(.button):hover,a:not(.button):focus,div#main a:not(.button):focus{color:#92425d;}div#main .widgets-container.sidebar_location {color:#777777;} div#main .widgets-container.sidebar_location a:not(.button){color:#666666;} div#main .widgets-container.sidebar_location a:not(.button):hover,div#main a:not(.button):focus{color:#92425d;}#footer {background:#171717 url("http://www.pazintysuk.com/wp-content/themes/pazintysUK/black_pattern.gif"); }#footer, #footer .footer-social-icons a:not(.button), #footer h5{color:#777777;} #footer a:not(.button){color:#743349;} #footer a:not(.button):hover,#footer a:not(.button):focus{color:#92425d;}h1 {font: normal 46px 'Lato'; color: #222222;}h2 {font: normal 30px 'Lato'; color: #222222;}h3 {font: normal 26px 'Lato'; color: #222222;}h4 {font: normal 20px 'Open Sans'; color: #222222;}h5 {font: normal 17px 'Open Sans'; color: #222222;}h6 {font: normal 14px 'Open Sans'; color: #222222;}body {font: normal 13px 'Open Sans'; color: #777777;}.form-search, .form-header, div.alert-box, div.pagination span.current {background:#743349}.top-links, .top-links a, .circular-progress-item input, .ajax_search_image .icon{color: #743349;}.form-search .notch {border-top: 10px solid #743349;}.form-search.custom div.custom.dropdown a.current, .form-search.custom input[type="text"],.form-search.custom input[type="password"], .form-search.custom select {background-color: #92425d; }.form-search.custom div.custom.dropdown a.selector, .form-search.custom div.custom.dropdown a.current, .form-search.custom select { border: solid 1px #92425d; }.form-search.custom input[type="text"],.form-search.custom input[type="password"] {border: 1px solid #743349 }.form-header, div.alert-box {color:#ffffff}.mejs-controls .mejs-time-rail .mejs-time-loaded{background-color: #92425d; }.form-search {border-left: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.form-header {border-left: 10px solid rgba(146, 66, 93, 0.3); border-top: 10px solid rgba(146, 66, 93, 0.3);  border-right: 10px solid rgba(146, 66, 93, 0.3);}.tabs.pill.custom dd.active a, .tabs.pill.custom li.active a, div.item-list-tabs ul li a span, #profile .pmpro_label {background: #743349; color: #ffffff;}.tabs.pill.custom dd.active a:after {border-top: 10px solid #743349}.tabs.info dd.active a, .tabs.info li.active a, #object-nav ul li.current a, #object-nav ul li.selected a, .tabs.info dd.active, .tabs.info li.active, #object-nav ul li.selected, #object-nav ul li.current {border-bottom: 2px solid #743349;} .tabs.info dd.active a:after, #object-nav ul li.current a:after, #object-nav ul li.selected a:after {border-top:5px solid #743349;}div.item-list-tabs li#members-all.selected, div.item-list-tabs li#members-personal.selected, .section-members .item-options .selected {border-bottom: 3px solid #743349;} div.item-list-tabs li#members-all.selected:after, div.item-list-tabs li#members-personal.selected:after, .section-members .item-options .selected:after {border-top: 5px solid #743349}.button, ul.sub-nav li.current a, #subnav ul li.current a, .wpcf7-submit, #rtmedia-add-media-button-post-update, #rt_media_comment_submit, .rtmedia-container input[type="submit"] { border: 1px solid #743349; background: #743349; color: #ffffff; }.button:hover, .button:focus, .form-search .button, .form-search .button:hover, .form-search .button:focus, .wpcf7-submit:focus, .wpcf7-submit:hover, #rtmedia-add-media-button-post-update:hover, #rt_media_comment_submit:hover, .rtmedia-container input[type="submit"]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.button.secondary,.button.dropdown.split.secondary > a, #messages_search_submit, #rtmedia-whts-new-upload-button, #rtMedia-upload-button, #rtmedia_create_new_album,#rtmedia-nav-item-albums-li a,#rtmedia-nav-item-photo-profile-1-li a,#rtmedia-nav-item-video-profile-1-li a,#rtmedia-nav-item-music-profile-1-li a,.bp-member-dir-buttons div.generic-button a.add,.bp-member-dir-buttons div.generic-button a.remove { background-color: #E6E6E6; color: #1D1D1D; border: 1px solid #E6E6E6; }.button.secondary:hover, .button.secondary:focus, .button.dropdown.split.secondary > a:hover, .button.dropdown.split.secondary > a:focus, #messages_search_submit:hover, #messages_search_submit:focus,  #rtmedia-whts-new-upload-button:hover, #rtMedia-upload-button:hover, #rtmedia_create_new_album:hover,#rtmedia-nav-item-albums-li a:hover,#rtmedia-nav-item-photo-profile-1-li a:hover,#rtmedia-nav-item-video-profile-1-li a:hover,#rtmedia-nav-item-music-profile-1-li a:hover,.bp-member-dir-buttons div.generic-button a.add:hover,.bp-member-dir-buttons div.generic-button a.remove:hover { background-color: #DDDCDC;  border: 1px solid #DDDCDC; color: #1D1D1D; }.btn-profile .button.dropdown > ul, .button.dropdown.split.secondary > span {background: #E6E6E6;}.button.dropdown.split.secondary > span:hover, .button.dropdown.split.secondary > span:focus { background-color: #DDDCDC; color: #1D1D1D;}#header .btn-profile a:not(.button) {color: #1D1D1D;}#header .btn-profile .button.dropdown > ul li:hover a:not(.button),#header .btn-profile .button.dropdown > ul li:focus a:not(.button) {background-color: #DDDCDC; color:#1D1D1D;}.button.bordered { background-color: #fff; border: 1px solid #E6E6E6; color: #1D1D1D; }.button.bordered:hover,.button.bordered:focus  { background-color: #DDDCDC; border: 1px solid #DDDCDC; color: #1D1D1D; }div#profile {background-color:#FAFAFA; background-image: url("http://www.pazintysuk.com/wp-content/themes/pazintysUK/images/blurred_bg_01.jpg"); background-position: center top; background-repeat: no-repeat;background-attachment:fixed; background-size:cover }#profile, #profile h2, #profile span {color:#ffffff;} #profile .cite a, #profile .regulartab a, #profile .btn-carousel a {color:#ffffff;} #profile .cite a:hover,#profile .cite a:focus, #profile .regulartab a:hover, #profile .regulartab a:focus, .callout .bp-profile-details:before{color:#743349;}#profile .tabs.pill.custom dd.active a, #profile .pmpro_label {background: #743349 }#profile:after {border-color:#FAFAFA transparent transparent transparent;}#item-header-avatar img, .mySlider img {border-color: rgba(255,255,255,0.1) !important;}#profile .generic-button a, .tabs.pill.custom dd:not(.active) a, #profile .callout, .regulartab dt, .regulartab dd {background: rgba(255,255,255,0.1); color: #ffffff;}#profile hr {border-color: rgba(255,255,255,0.1);}.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button, .rtmedia-item-actions input[type=submit] {border: 1px solid #743349; background: #743349; color: #ffffff; }.rtmedia-container.rtmedia-single-container .row .rtmedia-single-meta button:hover, .rtmedia-single-container.rtmedia-activity-container .row .rtmedia-single-meta button:hover, .rtmedia-item-actions input[type=submit]:hover { color: #ffffff; background-color: #92425d; border: 1px solid #92425d; }.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-range, .woocommerce span.onsale, .woocommerce-page span.onsale{background:#743349;} .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {border: 1px solid #743349;background:#92425d}.woocommerce .widget_layered_nav_filters ul li a, .woocommerce-page .widget_layered_nav_filters ul li a { border: 1px solid #743349; background-color: #743349; color: #ffffff; }.woocommerce div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active:after, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active:after {border-top:5px solid #743349}.woocommerce #main ul.products li a.view_details_button:not(.button),.woocommerce ul.products li .add_to_cart_button:before,.woocommerce ul.products li .product_type_grouped:before,.woocommerce ul.products li .add_to_cart_button.added:before,.woocommerce ul.products li .add_to_cart_button.loading:before,.woocommerce ul.products li .product_type_external:before,.woocommerce ul.products li .product_type_variable:before, .woocommerce ul.products li .add_to_cart_button.loading,.woocommerce ul.products li .add_to_cart_button,.woocommerce ul.products li .product_type_grouped,.woocommerce ul.products li .view_details_button,.woocommerce ul.products li .product_type_external,.woocommerce ul.products li .product_type_variable{color:#743349}.woocommerce ul.products li .add_to_cart_button:hover:before, .woocommerce ul.products li .product_type_grouped:hover:before, .woocommerce ul.products li .view_details_button:hover:before, .woocommerce ul.products li .product_type_external:hover:before, .woocommerce ul.products li .product_type_variable:hover:before {color: #ffffff;}.woocommerce ul.products li .add_to_cart_button:hover, .woocommerce ul.products li .product_type_grouped:hover, .woocommerce ul.products li .view_details_button:hover, .woocommerce ul.products li .product_type_external:hover, .woocommerce ul.products li .product_type_variable:hover{color: #ffffff;background-color: #92425d}@media only screen and (max-width: 940px) {.top-bar ul > li:not(.name):hover, .top-bar ul > li:not(.name).active, .top-bar ul > li:not(.name):focus { background: #92425d; }.top-bar { background: #743349; }.top-bar > ul .name h1 a { background: #92425d; }.top-bar ul > li.has-dropdown.moved > .dropdown li a:hover { background: #92425d; display: block; }.top-bar ul > li.has-dropdown .dropdown li.has-dropdown > a li a:hover, .top-bar ul > li.toggle-topbar { background: #92425d; }}@media screen and (max-width: 600px) {#wpadminbar { position: fixed; }}@media screen and ( max-width: 782px ) {.adminbar-enable .sticky.fixed { margin-top: 46px; }}.top-links { border-bottom: none; }
#profile:after { border: none; }
.sliderEvent {
	cursor: pointer !important;
}

#edit-profile {
	font-size: 2em; 
	float: right; 
	padding-right: 10px;
	cursor: pointer;
}

#profile-input-gender,
#profile-input-name,
#profile-input-city,
#profile-input-country,
#profile-input-age,
#profile-input-status,
.icon-save {
	background: none !important;
    border: none !important;
    display: none;    
}

</style>

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>


<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>





<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();

		$(".draugauk").mouseover(function() {
			$(".draugauk").addClass("active");
		});

		$(".draugauk").mouseout(function() {
			$(".draugauk").removeClass("active");
		});


		$(".parasyk").mouseover(function() {
			$(".parasyk").addClass("active");
		});

		$(".parasyk").mouseout(function() {
			$(".parasyk").removeClass("active");
		});

		$("#edit-profile").click(function() {
			$(".profile-input-visible-2").css("display", "none");
			$("#profile-input-name").css("display", "block");
			$("#profile-input-gender").css("display", "block");
			$("#profile-input-city").css("display", "block");
			$("#profile-input-country").css("display", "block");
			$("#profile-input-age").css("display", "block");
			$("#profile-input-status").css("display", "block");
			$(".icon-pencil").css("display", "none");
			$(".icon-save").css("display", "block");
			$("#profile-input-status").focus();
		});

		
	});

</script>


</head>

<body class="activity bp-user my-activity just-me buddypress">
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery.leanModal.min.js"></script>
	<script type="text/javascript">
		$(function() {
    		$('a[rel*=leanModal]').leanModal({ top : 200, closeButton: ".modal_close" });		
		});
	</script>

		  	
		<div id="signup">


	    <form name="process-login" class="login-form" action="process-login" method="POST">
	
		<div class="header">
		<h1>Prisijungimas</h1>
		<a class="modal_close" href="#"></a>
		</div>
	
		<div class="content">
		<input name="username" type="text" class="input username" placeholder="Slapyvardis" />
		<div class="user-icon"></div>
		<input name="password" type="password" class="input password" placeholder="Slaptazodis" />
		<div class="pass-icon"></div>		
		</div>

		<div class="footer">
		<input type="submit" name="submit" value="Junktis" class="button" />
		<input type="submit" name="submit" value="Ne Narys?" class="register" />
		</div>
	
	    </form>


		</div>





    
    <div id="fb-root"></div>

<!-- Page
================================================ -->
<!--Attributes-->
<!--class = kleo-page wide-style / boxed-style-->
<div class="kleo-page wide-style">

<!-- HEADER SECTION
================================================ -->
<header>
	<div class="header-bg clearfix">

				<!--Top links-->
		<div class="top-links">
			<div class="row">
				<ul class="no-bullet">
					<li class="nine columns">
						
												<a class="mail-top" href="<?php get_option('admin_email'); ?>"><i class="icon-envelope"></i> &nbsp; <?php echo get_option('admin_email'); ?></a>
											</li>

					<li class="three columns hide-for-small">
					  Facebook Puslapis: &nbsp;
					  <a href="http://www.facebook.com/pazintysUK" class="has-tip tip-bottom" data-width="210" target="_blank" title="Find us on Facebook"><i class="icon-facebook icon-large"></i></a>
				    </li>
				</ul>
			</div>
		</div>
		<!--end top-links-->
		
		<div id="header">
			<div class="row">

				<!-- Logo -->
				<div class="four columns">
					<h1 id="logo">Sweet Date						<a href="<?php echo get_site_url() ?>"><img id="logo_img" src="<?php echo get_template_directory_uri(); ?>/images/hearticon.png" width="128" height="128" alt="PazintysUK.com"></a>
					</h1>
				</div>
				<!--end logo-->

				<!-- Login/Register/Forgot username/password Modal forms
					-  Hidden by default to be opened through modal
					-  For faster loading we put all forms at the bottom of page -->



				<!--Login buttons-->  
				<div class="eight columns login-buttons">
					<ul class="button-group radius right">
                        <?php if(!is_user_logged_in()) { ?>
					    <li><a id="go" rel="leanModal" name="signup" href="#signup" class="tiny secondary button radius"><i class="icon-user hide-for-medium-down"></i> PRISIJUNK</a></li>
						<li><a href="#" data-reveal-id="register_panel" class="tiny button radius"><i class="icon-group hide-for-medium-down"></i> REGISTRUOKIS</a></li>
                        <?php } else { ?>
                        <li><a href="<?php echo get_site_url() ?>/anketa?narys=<?php echo $user->id; ?>" class="tiny secondary button radius"><i class="icon-user hide-for-medium-down"></i> ANKETA</a></li>
                        <li><a href="<?php echo get_site_url() ?>/atsijunk"  class="tiny button radius"><i class="icon-group hide-for-medium-down"></i> ATSIJUNK</a></li>
                        <?php } ?>
					</ul>
				</div>
				<!--end login buttons-->



				<!-- Main Navigation -->
				<div class="eight columns">
					<div class="contain-to-grid sticky">
						<nav class="top-bar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern" class="small-logo"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/themes/sweetdate/assets/images/small_logo.png" height="43" alt="Sweet Date"></a>
							<ul>
								<!-- Toggle Button Mobile -->
								<li class="name">
									<h1><a href="#">Please select your page</a></h1>
								</li>
								<li class="toggle-topbar"><a href="#"><i class="icon-reorder"></i></a></li>
								<!-- End Toggle Button Mobile -->
							</ul>

							<section><!-- Nav Section -->
								<ul id="menu-sweetdate" class="right">
									<li id="nav-menu-item-918" ><a href="http://www.pazintysuk.com">Pagrindinis</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/nariai">Nariai</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/paieska">Paieška</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/renginiai">Renginiai</a></li>
									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/apie-mus">Apie Mus</a></li>

									<li class="main-menu-link"><a href="<?php echo get_site_url() ?>/kontaktai">Kontaktai</a></li>
                                    <li id="nav-menu-item-search" class="menu-item kleo-menu-item-search"><a class="search-trigger" href="#"><i class="icon icon-search"></i></a></li>
                                </ul>							
                            </section><!-- End Nav Section -->

						</nav>
					</div><!--end contain-to-grid sticky-->
				</div>
				<!-- end Main Navigation -->
			</div><!--end row-->
			
						
			<div class="row just-after-header">
						</div>
			
						
			</div><!--end #header-->
			
					
				

	</div><!--end header-bg-->
</header>
<!--END HEADER SECTION-->

        <!-- BREADCRUMBS SECTION
        ================================================ -->
        <section>
          <div id="breadcrumbs-wrapp">
            <div class="row">


                
      <div class="twelve columns left">
      	<div class="row">
      		<div class="two columns" style="text-align: left">
      			<p style="margin-top: 13px;">
      				<a href="http://www.facebook.com/pazintysUK" class="has-tip tip-bottom" target="_blank" title="Find us on Facebook"><i class="icon-facebook icon-large"></i>&nbsp; PazintysUK</a></p>
                </p>
            </div>
            <div class="three columns" style="text-align: left">
                <p style="margin-top: 13px;">
                	<a class="mail-top" href="<?php get_option('admin_email'); ?>"><i class="icon-envelope"></i> &nbsp; <?php echo get_option('admin_email'); ?></a>
                </p>
            </div>
            <div class="three columns"></div>
            <div class="four columns"></div>
        </div>

      </div>

    
            </div><!--end row-->
          </div><!--end breadcrumbs-wrapp-->
        </section>
        <!--END BREADCRUMBS SECTION-->
        
    <!-- PROFILE SECTION
================================================ -->
<section>
  <div id="profile">

        <div class="row">

        



<div class="five columns">

    
    <h2></h2>
    <span class="user-nicename" style="font-size:2em; text-align: center; margin: 0 auto"><i class="icon-user"></i> <?php echo $profile->user_login; ?></span>
    <!--<span class="activity" style="font-size:1em; color: green"><i class="icon-user"></i> Prisijunges </span>-->
		
			
        <p>&nbsp;</p>

    <div class="row">
        <div id="item-header-avatar" class="eight columns image-hover">
            <!--<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar photo">	-->
            <a class="fancybox" rel="group" href="http://www.99degreeentertainment.com/wp-content/uploads/2013/10/1757649-me_avatar_big.png"><img src="http://www.99degreeentertainment.com/wp-content/uploads/2013/10/1757649-me_avatar_big.png" alt="" class="avatar photo" /></a>
            <div class="row">
            	<div class="four columns"><a class="fancybox" rel="group" href="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>.jpg"><img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" alt="" class="avatar photo" /></a></div>
            	<div class="four columns"><a class="fancybox" rel="group" href="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>.jpg"><img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" alt="" class="avatar photo" /></a></div>
            	<div class="four columns"><a class="fancybox" rel="group" href="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>.jpg"><img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" alt="" class="avatar photo" /></a></div>
            </div>		 			
        </div>
        


            
	<div class="two columns pull-two">
		<div id="item-buttons">
			<div id="friendship-button-" class="generic-button friendship-button not_friends">
					<a data-reveal-id="login_panel" class="has-tip tip-right friendship-button not_friends add" data-width="350" rel="add" id="friend-" title="Please Login to Add Friend" href="#"><i class="fa fa-thumbs-up" style="font-size: 1.7em"></i> Patinka</a>
			</div>

			<div id="send-private-message" class="generic-button">
					<a data-reveal-id="login_panel" class="has-tip tip-right friendship-button not_friends add" data-width="350" rel="add" id="friend-" title="Please Login to Add Friend" href="#"><i class="fa fa-thumbs-down" style="font-size: 1.7em"></i> Nepatinka</a>
			</div>
					
		</div><!-- #item-buttons -->
	</div>
    		
    </div><!--end row-->
</div><!--end five-->

<div class="seven columns">
	<dl class="tabs pill custom">
		<dd class="sliderEvent draugauk">
			<a href="draugauk"><i class="icon-heart"></i> <strong>Draugauk</strong></a>
		</dd>
		<dd class="sliderEvent parasyk">
			<a href="#my-photos"><i class="icon-envelope"></i> <strong>Parašyk</span></a>
		</dd>
	</dl>

	<ul class="tabs-content custom">
		<li active id="looking-forTab" class="active citetab">
			<div class="callout">
				<div class="bp-profile-details">Statusas <i id="edit-profile" class="icon-pencil"></i><i id="edit-profile" class="icon-save"></i></div>
				<div class="cite">
					<p class="profile-input-visible-2">Nzn kazkoks statusas ir tiek</p>
					<textarea id="profile-input-status" name="status" placeholder="tavo statusas..."></textarea>
				</div>
			</div>
		</li>


		<li id="about-meTab" class="active regulartab">
			<dl class="dl-horizontal">
				<dt>Vardas</dt><dd><p class="profile-input-visible-2"><?php echo $user_name; ?></p><input id="profile-input-name" type="text" name="name" placeholder="tavo vardas..." /></dd>
				<dt>Lytis</dt><dd><p class="profile-input-visible-2"><?php echo $user_gender; ?></p><input id="profile-input-gender" type="text" name="city" placeholder="tavo lytis..." /></dd>
				<dt>Miestas</dt><dd><p class="profile-input-visible-2"><?php echo $profile->city; ?></p><input id="profile-input-city" type="text" name="city" placeholder="miesto pavadinimas..." /></dd>
				<dt>Valstybė</dt><dd><p class="profile-input-visible-2">UK</p><input id="profile-input-country" type="text" name="country" placeholder="valstybes pavadinimas..." /></dd>
				<dt>Amžius</dt><dd><p class="profile-input-visible-2">24</p><input id="profile-input-age" type="text" name="age" placeholder="tavo amžius..." /></dd>
		   </dl>
		</li><li  id="my-photosTab" class="mySlider"><div id="gallery-carousel"><span class="circle"><a href="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>.jpg" class="imagelink" data-rel="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>.jpg"><span class="overlay"></span><span class="read"><i class="icon-heart"></i></span><img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>.jpg" alt=""></a></span><span class="circle"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/secondarytile.png" class="imagelink" data-rel="prettyPhoto[gallery2]"><span class="overlay"></span><span class="read"><i class="icon-heart"></i></span><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/secondarytile.png" alt=""></a></span><span class="circle"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/newt.png" class="imagelink" data-rel="prettyPhoto[gallery2]"><span class="overlay"></span><span class="read"><i class="icon-heart"></i></span><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/newt-150x150.png" alt=""></a></span><span class="circle"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/model-299694.jpg" class="imagelink" data-rel="prettyPhoto[gallery2]"><span class="overlay"></span><span class="read"><i class="icon-heart"></i></span><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/model-299694-150x150.jpg" alt=""></a></span><span class="circle"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/03/Sponsor.jpg" class="imagelink" data-rel="prettyPhoto[gallery2]"><span class="overlay"></span><span class="read"><i class="icon-heart"></i></span><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/03/Sponsor-150x145.jpg" alt=""></a></span><span class="circle"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/03/644.png" class="imagelink" data-rel="prettyPhoto[gallery2]"><span class="overlay"></span><span class="read"><i class="icon-heart"></i></span><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/03/644-150x150.png" alt=""></a></span><span class="circle"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/03/pâtes-à-lamatriciana.jpg" class="imagelink" data-rel="prettyPhoto[gallery2]"><span class="overlay"></span><span class="read"><i class="icon-heart"></i></span><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/03/pâtes-à-lamatriciana-150x150.jpg" alt=""></a></span></div><div class="clearfix"></div>
</li></ul></div>

    </div><!--end row-->
  </div><!--end profile-->
</section>
<!--END PROFILE SECTION-->
    

<!-- MAIN SECTION
================================================ -->
<section>
    <div id="main">
    	
        
			
			<div class="row">

								
				<!--begin content-->
								<div class="eight columns">
							
			<div id="item-nav">
				<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
					<ul>

						<li id="activity-personal-li"  class="current selected"><a id="user-activity" href="">Aktyvumas</a></li><li id="xprofile-personal-li" ><a id="user-xprofile" href="">Profilis</a></li><li id="friends-personal-li" ><a id="user-friends" href="">Draugai <span>7</span></a></li><li id="groups-personal-li" ><a id="user-groups" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/groups/">Groups <span>4</span></a></li><li id="album-personal-li" ><a id="user-album" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/album/">Album</a></li><li id="media-personal-li" ><a id="user-media" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/media/">Media<span>7</span></a></li>
						
					</ul>
				</div>
				<div class="clearfix"></div>
			</div><!-- #item-nav -->

			<div id="item-body">

				
<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
    
  
	<ul class="sub-nav">

		<li id="just-me-personal-li"  class="current selected"><a id="just-me" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/activity/">Personal</a></li><li id="activity-mentions-personal-li" ><a id="activity-mentions" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/activity/mentions/">Mentions</a></li><li id="activity-favs-personal-li" ><a id="activity-favs" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/activity/favorites/">Favorites</a></li><li id="activity-friends-personal-li" ><a id="activity-friends" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/activity/friends/">Friends</a></li><li id="activity-groups-personal-li" ><a id="activity-groups" href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/activity/groups/">Groups</a></li>
		<li id="activity-filter-select" class="last">

			<select id="activity-filter-by">
				<option value="-1">Everything</option>
				<option value="activity_update">Updates</option>

				
						<option value="new_blog_post">Posts</option>
						<option value="new_blog_comment">Comments</option>

					
						<option value="friendship_accepted,friendship_created">Friendships</option>

					
					<option value="created_group">New Groups</option>
					<option value="joined_group">Group Memberships</option>

				
		<option value="bbp_topic_create">Topics</option>
		<option value="bbp_reply_create">Replies</option>

	
			</select>
		</li>
	</ul>
</div><!-- .item-list-tabs -->



<div class="activity" role="main">

	


		<noscript>
		<div class="pagination">
			<div class="pag-count">Viewing item 1 to 20 (of 37 items)</div>
			<div class="pagination-links"><span class='page-numbers current'>1</span>
<a class='page-numbers' href='/demo/sweetdatewp-modern/members/demo/?acpage=2'>2</a>
<a class="next page-numbers" href="/demo/sweetdatewp-modern/members/demo/?acpage=2">&rarr;</a></div>
		</div>
	</noscript>

	
		<ul id="activity-stream" class="activity-list item-list">

	
	
		



<li class="groups activity_update activity-item message" id="activity-2015">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update in the group <a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/virtual-only/">Virtual only</a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/2015/" title="View Discussion"><span class="time-since">6 days ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p>Hi!</p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="groups joined_group activity-item mini message" id="activity-2014">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> joined the group <a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/virtual-only/">Virtual only</a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/2014/" title="View Discussion"><span class="time-since">6 days ago</span></a></p>

		</div>

		
		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="groups activity_update activity-item has-comments message" id="activity-1930">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update in the group <a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/site-lovers/">Site lovers</a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1930/" title="View Discussion"><span class="time-since">4 weeks, 1 day ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p>tzuzurtzu</p>

			</div>

		
		
		
	</div>

	
	
		<div class="activity-comments">

			<ul>

<li id="acomment-1993">
	<div class="acomment-avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tatoospirit/">
			<img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/avatars/9535/5a954b6e9b1efde6f42154f7f8cf6baf-bpthumb.jpg" class="avatar user-9535-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of Martin" />		</a>
	</div>

	<div class="acomment-meta">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tatoospirit/">Martin</a> replied <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1930/" class="activity-time-since"><span class="time-since">1 week, 5 days ago</span></a>	</div>

	<div class="acomment-content"><p>Test Comment <img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-includes/images/smilies/icon_smile.gif" alt=":)" class="wp-smiley" /> </p>
</div>

	<div class="acomment-options">

		
		
		
	</div>

	</li>

</ul>
			
		</div>

	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity rtmedia_update activity-item message" id="activity-1929">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1929/" title="View Discussion"><span class="time-since">4 weeks, 1 day ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<div class="rtmedia-activity-container"><span class="rtmedia-activity-text">testing</span>
<ul class="rtmedia-list large-block-grid-3">
<li class="rtmedia-list-item media-type-photo"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/media/116/" rel="nofollow">
<div class="rtmedia-item-thumbnail"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/5-women-320x240.jpg" /></div>
<div class="rtmedia-item-title">5-women.jpg</div>
<p></a>
<div class="rtmedia-item-actions"></div>
</li>
</ul>
</div>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_update activity-item message" id="activity-1922">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1922/" title="View Discussion"><span class="time-since">1 month ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p><a href='http://seventhqueen.com/demo/sweetdatewp-modern/members/s-michael/' rel="nofollow">@s-michael</a> </p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_comment activity-item message" id="activity-1914">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted a new activity comment <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/65/" title="View Discussion"><span class="time-since">1 month, 1 week ago</span></a></p>

		</div>

		
			<div class="activity-inreplyto">
				<strong>In reply to: </strong><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/becca/" title="Becca Morgan">Becca Morgan</a> uploaded a new picture: <a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/becca/album/picture/27/">Pretty me</a>  <a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/becca/album/picture/27/" class="picture-activity-thumb" title="Pretty me"><img alt="" src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/album/7/sexy_woman_02.jpg" /></a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/65/" class="view" title="View Thread / Permalink">View</a>
				<div class='clear'></div>
			</div>

		
		
			<div class="activity-inner">

				<p>Vay</p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_comment activity-item message" id="activity-1913">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted a new activity comment <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/42/" title="View Discussion"><span class="time-since">1 month, 1 week ago</span></a></p>

		</div>

		
			<div class="activity-inreplyto">
				<strong>In reply to: </strong><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/hanna-marcovick/" title="Hanna Marcovick">Hanna Marcovick</a> uploaded a new picture: <a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/hanna-marcovick/album/picture/25/">Like my little purs&#8230;</a>  <a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/hanna-marcovick/album/picture/25/" class="picture-activity-thumb" title="Like my little purs&#8230;"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/album/5/sweet_admin_04.jpg" /></a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/42/" class="view" title="View Thread / Permalink">View</a>
				<div class='clear'></div>
			</div>

		
		
			<div class="activity-inner">

				<p>deh</p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity rtmedia_update activity-item message" id="activity-1911">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1911/" title="View Discussion"><span class="time-since">1 month, 1 week ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<div class="rtmedia-activity-container"><span class="rtmedia-activity-text">45564</span>
<ul class="rtmedia-list large-block-grid-3">
<li class="rtmedia-list-item media-type-photo"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/media/114/" rel="nofollow">
<div class="rtmedia-item-thumbnail"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/secondarytile.png" /></div>
<div class="rtmedia-item-title">secondarytile.png</div>
<p></a>
<div class="rtmedia-item-actions"></div>
</li>
</ul>
</div>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity rtmedia_update activity-item message" id="activity-1902">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1902/" title="View Discussion"><span class="time-since">1 month, 1 week ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<div class="rtmedia-activity-container"><span class="rtmedia-activity-text">test</span>
<ul class="rtmedia-list large-block-grid-3">
<li class="rtmedia-list-item media-type-photo"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/media/113/" rel="nofollow">
<div class="rtmedia-item-thumbnail"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/newt-320x240.png" /></div>
<div class="rtmedia-item-title">newt.png</div>
<p></a>
<div class="rtmedia-item-actions"></div>
</li>
</ul>
</div>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="friends friendship_created activity-item mini has-comments message" id="activity-1896">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> and <a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tomasz-kurdziel-5/" title="tomasz.kurdziel.5">tomasz.kurdziel.5</a> are now friends <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1896/" title="View Discussion"><span class="time-since">1 month, 1 week ago</span></a></p>

		</div>

		
		
		
		
	</div>

	
	
		<div class="activity-comments">

			<ul>

<li id="acomment-1898">
	<div class="acomment-avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tomasz-kurdziel-5/">
			<img src="http://gravatar.com/avatar/24dbf245f2b3ff4f9c4d38fc36901220?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-6475-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of Tomasz Kurdziel" />		</a>
	</div>

	<div class="acomment-meta">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tomasz-kurdziel-5/">tomasz.kurdziel.5</a> replied <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1896/" class="activity-time-since"><span class="time-since">1 month, 1 week ago</span></a>	</div>

	<div class="acomment-content"><p>dadadas</p>
</div>

	<div class="acomment-options">

		
		
		
	</div>

	<ul>

<li id="acomment-1899">
	<div class="acomment-avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tomasz-kurdziel-5/">
			<img src="http://gravatar.com/avatar/24dbf245f2b3ff4f9c4d38fc36901220?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-6475-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of Tomasz Kurdziel" />		</a>
	</div>

	<div class="acomment-meta">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tomasz-kurdziel-5/">tomasz.kurdziel.5</a> replied <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1896/" class="activity-time-since"><span class="time-since">1 month, 1 week ago</span></a>	</div>

	<div class="acomment-content"><p>dasda</p>
</div>

	<div class="acomment-options">

		
		
		
	</div>

	</li>

</ul></li>

</ul>
			
		</div>

	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity rtmedia_update activity-item message" id="activity-1881">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1881/" title="View Discussion"><span class="time-since">1 month, 2 weeks ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<div class="rtmedia-activity-container"><span class="rtmedia-activity-text">lol</span>
<ul class="rtmedia-list large-block-grid-3">
<li class="rtmedia-list-item media-type-photo"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/media/111/" rel="nofollow">
<div class="rtmedia-item-thumbnail"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/rtMedia/users/5070/2014/05/model-299694-320x240.jpg" /></div>
<div class="rtmedia-item-title">model-299694.jpg</div>
<p></a>
<div class="rtmedia-item-actions"></div>
</li>
</ul>
</div>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_update activity-item message" id="activity-1880">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1880/" title="View Discussion"><span class="time-since">1 month, 2 weeks ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p>lol good</p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="profile new_avatar activity-item mini message" id="activity-1873">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> changed their profile picture <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1873/" title="View Discussion"><span class="time-since">1 month, 2 weeks ago</span></a></p>

		</div>

		
		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_update activity-item message" id="activity-1853">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1853/" title="View Discussion"><span class="time-since">1 month, 3 weeks ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p><a href='http://seventhqueen.com/demo/sweetdatewp-modern/members/manish0786/' rel="nofollow">@manish0786</a>  thanks</p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_comment activity-item message" id="activity-1852">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted a new activity comment <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1851/" title="View Discussion"><span class="time-since">1 month, 3 weeks ago</span></a></p>

		</div>

		
			<div class="activity-inreplyto">
				<strong>In reply to: </strong><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update in the group <a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/europe/">Europe</a> Testing comment on group. <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1851/" class="view" title="View Thread / Permalink">View</a>
				<div class='clear'></div>
			</div>

		
		
			<div class="activity-inner">

				<p>Reply to my comment.</p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="groups activity_update activity-item has-comments message" id="activity-1851">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update in the group <a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/europe/">Europe</a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1851/" title="View Discussion"><span class="time-since">1 month, 3 weeks ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p>Testing comment on group.</p>

			</div>

		
		
		
	</div>

	
	
		<div class="activity-comments">

			<ul>

<li id="acomment-1852">
	<div class="acomment-avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="acomment-meta">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/"><?php echo $profile->user_login; ?></a> replied <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1851/" class="activity-time-since"><span class="time-since">1 month, 3 weeks ago</span></a>	</div>

	<div class="acomment-content"><p>Reply to my comment.</p>
</div>

	<div class="acomment-options">

		
		
		
	</div>

	</li>

</ul>
			
		</div>

	
	    <div class="clearfix"></div>
</li>


	
		



<li class="groups joined_group activity-item mini message" id="activity-1850">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> joined the group <a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/europe/">Europe</a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1850/" title="View Discussion"><span class="time-since">1 month, 3 weeks ago</span></a></p>

		</div>

		
		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="groups joined_group activity-item mini message" id="activity-1841">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> joined the group <a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/europe/">Europe</a> <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1841/" title="View Discussion"><span class="time-since">1 month, 3 weeks ago</span></a></p>

		</div>

		
		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_update activity-item message" id="activity-1778">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1778/" title="View Discussion"><span class="time-since">2 months, 2 weeks ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p>Let me test this</p>

			</div>

		
		
		
	</div>

	
	
	    <div class="clearfix"></div>
</li>


	
		



<li class="activity activity_update activity-item has-comments message" id="activity-1773">
	<div class="avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/">
			<img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" />		</a>
	</div>

	<div class="activity-content">

		<div class="activity-header">

			<p><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a> posted an update <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1773/" title="View Discussion"><span class="time-since">2 months, 3 weeks ago</span></a></p>

		</div>

		
		
			<div class="activity-inner">

				<p><a href='http://seventhqueen.com/demo/sweetdatewp-modern/members/office168/' rel="nofollow">@office168</a> Test</p>

			</div>

		
		
		
	</div>

	
	
		<div class="activity-comments">

			<ul>

<li id="acomment-1865">
	<div class="acomment-avatar">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/armandolouder-perfil/">
			<img src="http://gravatar.com/avatar/213334f820a3492c7563ee48c30fbafc?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-7994-avatar avatar-120 photo" width="120" height="120" alt="Profile picture of Armando Louder" />		</a>
	</div>

	<div class="acomment-meta">
		<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/armandolouder-perfil/">armandolouder.perfil</a> replied <a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/p/1773/" class="activity-time-since"><span class="time-since">1 month, 2 weeks ago</span></a>	</div>

	<div class="acomment-content"><p>show</p>
</div>

	<div class="acomment-options">

		
		
		
	</div>

	</li>

</ul>
			
		</div>

	
	    <div class="clearfix"></div>
</li>


	
	
		<li class="load-more">
			<a href="#more">Load More</a>
		</li>

	
	
		</ul>

	


<form action="#" name="activity-loop-form" id="activity-loop-form" method="post">

	<input type="hidden" id="_wpnonce_activity_filter" name="_wpnonce_activity_filter" value="dc1e0a1d1f" /><input type="hidden" name="_wp_http_referer" value="/demo/sweetdatewp-modern/members/demo/" />
</form>
</div><!-- .activity -->


			</div><!-- #item-body -->

			
    
            </div><!--end content-->
  
                        <!-- SIDEBAR SECTION
================================================ -->
<aside class="four columns">

	<div class="widgets-container sidebar_location">
		<div id="bp_core_members_widget-4" class="widgets clearfix widget_bp_core_members_widget buddypress widget"><h5>Members</h5>
					<div class="item-options" id="members-list-options">
				<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/" id="newest-members" >Newest</a>
				|  <a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/" id="recently-active-members" class="selected">Active</a>

				
					| <a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/" id="popular-members" >Popular</a>

							</div>

			<ul id="members-list" class="item-list">
									<li class="vcard">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar- photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" /></a>
						</div>

						<div class="item">
							<div class="item-title fn"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><?php echo $profile->user_login; ?></a></div>
							<div class="item-meta">
								<span class="activity">
								active 2 hours, 35 minutes ago								</span>
							</div>
						</div>
					</li>

									<li class="vcard">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/abhilash008/" title="abhilash008"><img src="http://gravatar.com/avatar/1a10a7e18d41fd42c94b41c0a9afd331?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10258-avatar avatar- photo" width="120" height="120" alt="Profile picture of abhilash008" /></a>
						</div>

						<div class="item">
							<div class="item-title fn"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/abhilash008/" title="abhilash008">abhilash008</a></div>
							<div class="item-meta">
								<span class="activity">
								active 3 hours, 11 minutes ago								</span>
							</div>
						</div>
					</li>

									<li class="vcard">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/kali-dass-543908/" title="kali.dass.543908"><img src="http://gravatar.com/avatar/4f3b5faa7344ef5190a3c3e428a5f54e?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10207-avatar avatar- photo" width="120" height="120" alt="Profile picture of kali.dass.543908" /></a>
						</div>

						<div class="item">
							<div class="item-title fn"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/kali-dass-543908/" title="kali.dass.543908">kali.dass.543908</a></div>
							<div class="item-meta">
								<span class="activity">
								active 22 hours, 51 minutes ago								</span>
							</div>
						</div>
					</li>

									<li class="vcard">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/albcoder/" title="albcoder"><img src="http://gravatar.com/avatar/4229ad09c0708a86804d5b6060979fd4?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10168-avatar avatar- photo" width="120" height="120" alt="Profile picture of albcoder" /></a>
						</div>

						<div class="item">
							<div class="item-title fn"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/albcoder/" title="albcoder">albcoder</a></div>
							<div class="item-meta">
								<span class="activity">
								active 1 day, 15 hours ago								</span>
							</div>
						</div>
					</li>

									<li class="vcard">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/sorin-popa/" title="sorin.popa"><img src="http://gravatar.com/avatar/d2aaf6059ba59c3997b6306104597305?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10167-avatar avatar- photo" width="120" height="120" alt="Profile picture of sorin.popa" /></a>
						</div>

						<div class="item">
							<div class="item-title fn"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/sorin-popa/" title="sorin.popa">sorin.popa</a></div>
							<div class="item-meta">
								<span class="activity">
								active 1 day, 16 hours ago								</span>
							</div>
						</div>
					</li>

							</ul>
			<input type="hidden" id="_wpnonce-members" name="_wpnonce-members" value="411333d144" /><input type="hidden" name="_wp_http_referer" value="/demo/sweetdatewp-modern/members/demo/" />			<input type="hidden" name="members_widget_max" id="members_widget_max" value="5" />

		
		</div>	<div id="bp_groups_widget-3" class="widgets clearfix widget_bp_groups_widget buddypress widget"><h5>Groups</h5>
					<div class="item-options" id="groups-list-options">
				<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/" id="newest-groups">Newest</a> |
				<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/" id="recently-active-groups" class="selected">Active</a> |
				<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/" id="popular-groups" >Popular</a>
			</div>

			<ul id="groups-list" class="item-list">
									<li class="odd public">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/virtual-only/" title="Virtual only"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/group-avatars/3/a1071409170939d689457fae71708145-bpthumb.png" class="avatar group-3-avatar avatar- photo" width="120" height="120" alt="Group logo of Virtual only" title='Virtual only' /></a>
						</div>

						<div class="item">
							<div class="item-title"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/virtual-only/" title="Virtual only">Virtual only</a></div>
							<div class="item-meta">
								<span class="activity">
								active 6 days ago								</span>
							</div>
						</div>
					</li>

									<li class="even public">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/site-lovers/" title="Site lovers"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/group-avatars/2/69371488d76a66c7c11492dd23eac49c-bpthumb.png" class="avatar group-2-avatar avatar- photo" width="120" height="120" alt="Group logo of Site lovers" title='Site lovers' /></a>
						</div>

						<div class="item">
							<div class="item-title"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/site-lovers/" title="Site lovers">Site lovers</a></div>
							<div class="item-meta">
								<span class="activity">
								active 1 week, 6 days ago								</span>
							</div>
						</div>
					</li>

									<li class="odd public">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/singles-in-bern/" title="Singles in Bern"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/group-avatars/27/2df0ec256f39d4248bc4df21c0dcaf73-bpthumb.png" class="avatar group-27-avatar avatar- photo" width="120" height="120" alt="Group logo of Singles in Bern" title='Singles in Bern' /></a>
						</div>

						<div class="item">
							<div class="item-title"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/singles-in-bern/" title="Singles in Bern">Singles in Bern</a></div>
							<div class="item-meta">
								<span class="activity">
								active 2 weeks, 2 days ago								</span>
							</div>
						</div>
					</li>

									<li class="even private">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/wdfgsdfgsd/" title="wdfgsdfgsd"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/group-avatars/26/94e2c65c803476f43baf8b195f63bd6b-bpthumb.jpg" class="avatar group-26-avatar avatar- photo" width="120" height="120" alt="Group logo of wdfgsdfgsd" title='wdfgsdfgsd' /></a>
						</div>

						<div class="item">
							<div class="item-title"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/wdfgsdfgsd/" title="wdfgsdfgsd">wdfgsdfgsd</a></div>
							<div class="item-meta">
								<span class="activity">
								active 4 weeks, 1 day ago								</span>
							</div>
						</div>
					</li>

									<li class="odd public">
						<div class="item-avatar">
							<a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/europe/" title="Europe"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/group-avatars/4/e7340924fb3baa763766b0bf6a800567-bpthumb.jpg" class="avatar group-4-avatar avatar- photo" width="120" height="120" alt="Group logo of Europe" title='Europe' /></a>
						</div>

						<div class="item">
							<div class="item-title"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/europe/" title="Europe">Europe</a></div>
							<div class="item-meta">
								<span class="activity">
								active 1 month, 3 weeks ago								</span>
							</div>
						</div>
					</li>

							</ul>
			<input type="hidden" id="_wpnonce-groups" name="_wpnonce-groups" value="9ee7dd5bd9" /><input type="hidden" name="_wp_http_referer" value="/demo/sweetdatewp-modern/members/demo/" />			<input type="hidden" name="groups_widget_max" id="groups_widget_max" value="5" />

		
		</div>	<div id="simple_ads_manager_widget-3" class="widgets clearfix simple_ads_manager_widget"><h5>Advertise here (Banner rotate)</h5><a  href='http://seventhqueen.com/demo/sweetdatewp-modern' target='_blank' ><img src='http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/sam-images/sweetdate_wordpress_buddypress.png'  alt=''  /></a></div><div id="bp_core_recently_active_widget-3" class="widgets clearfix widget_bp_core_recently_active_widget buddypress widget"><h5>Recently Active Members</h5>
					<div class="avatar-block">
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/demo/" title="<?php echo $profile->user_login; ?>"><img src="<?php echo get_avatar_url(get_avatar( $id, 150 )); ?>" class="avatar user-5070-avatar avatar- photo" width="120" height="120" alt="Profile picture of <?php echo $profile->user_login; ?>" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/abhilash008/" title="abhilash008"><img src="http://gravatar.com/avatar/1a10a7e18d41fd42c94b41c0a9afd331?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10258-avatar avatar- photo" width="120" height="120" alt="Profile picture of abhilash008" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/kali-dass-543908/" title="kali.dass.543908"><img src="http://gravatar.com/avatar/4f3b5faa7344ef5190a3c3e428a5f54e?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10207-avatar avatar- photo" width="120" height="120" alt="Profile picture of kali.dass.543908" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/albcoder/" title="albcoder"><img src="http://gravatar.com/avatar/4229ad09c0708a86804d5b6060979fd4?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10168-avatar avatar- photo" width="120" height="120" alt="Profile picture of albcoder" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/sorin-popa/" title="sorin.popa"><img src="http://gravatar.com/avatar/d2aaf6059ba59c3997b6306104597305?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10167-avatar avatar- photo" width="120" height="120" alt="Profile picture of sorin.popa" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/admincute/" title="admincute"><img src="http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/uploads/avatars/10112/41f0207e7012d64d028414c51c054412-bpthumb.jpg" class="avatar user-10112-avatar avatar- photo" width="120" height="120" alt="Profile picture of admincute" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/ana-reis-79069323/" title="ana.reis.79069323"><img src="http://gravatar.com/avatar/d335b55a9daf5b021cfc6b4884fff980?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10109-avatar avatar- photo" width="120" height="120" alt="Profile picture of ana.reis.79069323" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/yoshihiro-koitani/" title="yoshihiro.koitani"><img src="http://gravatar.com/avatar/02af69d825752d7fd39916a44534da30?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10088-avatar avatar- photo" width="120" height="120" alt="Profile picture of yoshihiro.koitani" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/tomasz-kurdziel-5/" title="tomasz.kurdziel.5"><img src="http://gravatar.com/avatar/24dbf245f2b3ff4f9c4d38fc36901220?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-6475-avatar avatar- photo" width="120" height="120" alt="Profile picture of tomasz.kurdziel.5" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/bull3231/" title="bull3231"><img src="http://gravatar.com/avatar/26571e17a26d679d63c5b879f82aabcb?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-6304-avatar avatar- photo" width="120" height="120" alt="Profile picture of bull3231" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/sato-mark/" title="sato.mark"><img src="http://gravatar.com/avatar/e401649dbd9ee49b6fba9459f997c6d2?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-10004-avatar avatar- photo" width="120" height="120" alt="Profile picture of sato.mark" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/cvellabone/" title="cvellabone"><img src="http://gravatar.com/avatar/49f84f24802c877881669550d524393d?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-9951-avatar avatar- photo" width="120" height="120" alt="Profile picture of cvellabone" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/paddy-ontel/" title="paddy.ontel"><img src="http://gravatar.com/avatar/c651d34d0e02a81cfddd33a0ebffc5db?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-9858-avatar avatar- photo" width="120" height="120" alt="Profile picture of paddy.ontel" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/jonny-alexander-925/" title="jonny.alexander.925"><img src="http://gravatar.com/avatar/12387f23e4881315649beb0513bb908d?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-9822-avatar avatar- photo" width="120" height="120" alt="Profile picture of jonny.alexander.925" /></a>
					</div>
									<div class="item-avatar">
						<a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/ravibhan-rajan/" title="ravibhan.rajan"><img src="http://gravatar.com/avatar/9c7e4ea665a6adac3d28181003245aa9?d=http://seventhqueen.com/demo/sweetdatewp-modern/wp-content/plugins/buddypress/bp-core/images/mystery-man.jpg&amp;s=120&amp;r=G" class="avatar user-9666-avatar avatar- photo" width="120" height="120" alt="Profile picture of ravibhan.rajan" /></a>
					</div>
							</div>
		
		</div>	<div id="nav_menu-5" class="widgets clearfix widget_nav_menu"><h5>Pages</h5><div class="menu-footer-container"><ul id="menu-footer" class="menu"><li id="menu-item-932" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-932"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/activity/">Activity</a></li>
<li id="menu-item-933" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-97 current_page_item menu-item-933"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/members/">Members</a></li>
<li id="menu-item-934" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-934"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/contact/">Contact</a></li>
<li id="menu-item-935" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-935"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/shortcodes/">Shortcodes</a></li>
<li id="menu-item-936" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-936"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/blog/">Blog</a></li>
<li id="menu-item-954" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-954"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/reasons-to-join/">Reasons to join</a></li>
<li id="menu-item-965" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-965"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/full-width/">Full Width Template</a></li>
<li id="menu-item-966" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-966"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/404-page/">404 Page</a></li>
<li id="menu-item-967" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-967"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/shortcodes/layout/">Layout</a></li>
<li id="menu-item-968" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-968"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/shortcodes/pricing-table/">Pricing table</a></li>
<li id="menu-item-969" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-969"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/shortcodes/posts-carousel/">Posts Carousel</a></li>
<li id="menu-item-970" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-970"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/shortcodes/image-slider/">Image Slider</a></li>
<li id="menu-item-877" class="menu-item menu-item-type-post_type menu-item-object-forum menu-item-877"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/europe/forum/">Europe</a></li>
<li id="menu-item-878" class="menu-item menu-item-type-post_type menu-item-object-forum menu-item-878"><a href="http://seventhqueen.com/demo/sweetdatewp-modern/groups/couples/forum/">Couples</a></li>
</ul></div></div><div id="text-2" class="widgets clearfix widget_text"><h5>Custom text</h5>			<div class="textwidget"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
<p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
</div>
		</div>	</div>

</aside> <!--end four columns-->
<!--END SIDEBAR SECTION-->
        </div><!--end row-->
    </div><!--end main-->
  
      
</section>
<!--END MAIN SECTION-->            


<!-- TESTIMONIALS SECTION ================================================ -->
<section class="with-top-border">
  	<div class="row">
    	<div class="twelve columns">
        <div id="kleo_testimonials-2" class="widgets clearfix widget_kleo_testimonials">
        <ul class="testimonials-carousel">
                                <li >
                    <div class="quote-content">
                        <i class="icon-quote-right iconq"></i>
                        <p>This is one of the most comprehensive, well-documented, well-planned theme we’ve ever seen. Cheers to great work! Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                    </div>
                    <div class="quote-author">
                        <strong>Mark Walberg</strong>
                        <span class="author-description"> - Designer, WESTWOOD</span>
                    </div>
                </li>
                                <li class="hide-on-mobile" >
                    <div class="quote-content">
                        <i class="icon-quote-right iconq"></i>
                        <p>Absolutely amazing! This was more than worth the purchase! Great job, and thanks for your amazing work!</p>
                    </div>
                    <div class="quote-author">
                        <strong><?php echo $profile->user_login; ?></strong>
                        <span class="author-description"> - Public speaker, MEDIADOT</span>
                    </div>
                </li>
                                <li class="hide-on-mobile" >
                    <div class="quote-content">
                        <i class="icon-quote-right iconq"></i>
                        <p>Love this theme and so impressed with the customer support!!! Has been great for someone like myself with very little experience! Absolutely Fantastic!</p>
                    </div>
                    <div class="quote-author">
                        <strong>Elena Doe</strong>
                        <span class="author-description"> - Developer, W.T.D. Ltd</span>
                    </div>
                </li>
                                
        </ul>

		</div>      </div>
    </div>
</section>
<!--END TESTIMONIALS SECTION-->






<?php } ?>





<?php get_footer() ?>