<?php

$page_label == 'settings'  ? $settings_status  = 'wp-has-current-submenu' : $settings_status  = 'wp-not-current-submenu';
$page_label == 'index'     ? $index_status     = 'wp-has-current-submenu' : $index_status     = 'wp-not-current-submenu';
$page_label == 'bookings'  ? $bookings_status  = 'wp-has-current-submenu' : $bookings_status  = 'wp-not-current-submenu';
$page_label == 'social'    ? $analytics_status = 'wp-has-current-submenu' : $analytics_status = 'wp-not-current-submenu';

?>

<div id="adminmenuwrap">
<ul id="adminmenu" role="navigation">


	<li class="wp-has-submenu wp-has-current-submenu wp-menu-open menu-top menu-icon-dashboard menu-top-first" id="menu-dashboard">
	<a href='<?php echo $admin_url; ?>' class="wp-first-item wp-has-submenu <?php echo $index_status; ?> wp-menu-open menu-top menu-top-first menu-icon-dashboard menu-top-first" ><div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image'><br /></div><div class='wp-menu-name'>Dashboard</div></a>
	<ul class='wp-submenu wp-submenu-wrap'><li class='wp-submenu-head'>Manage Bookings</li></ul></li>
	</li>


	


	<li class="<?php echo $bookings_status; ?> menu-icon-event">
	<a href='<?php echo $admin_url; ?>bookings/1' class="<?php echo $bookings_status; ?> menu-top menu-icon-event" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image'><img src="<?php echo $admin_url; ?>assets/img/calendar-16.png" alt="" /></div><div class='wp-menu-name'>Reports</div></a>

    </li>


    <!-- settings menu -->
    <li class="wp-has-submenu <?php echo $settings_status; ?> menu-top menu-icon-event" id="menu-posts-event">
	<a href='<?php echo $admin_url; ?>settings/business-settings' class="wp-has-submenu <?php echo $settings_status; ?> menu-top menu-icon-settings" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image'></div><div class='wp-menu-name'>Settings</div></a>
	<ul class='wp-submenu wp-submenu-wrap'>
		<li class='wp-submenu-head'>Settings</li>
		<li class="wp-first-item"><a href='<?php echo $admin_url; ?>settings/business-settings' class="wp-first-item">Business Settings</a></li>
		<li><a href='<?php echo $admin_url; ?>settings/payment-options'>Payment Options</a></li>
		<li><a href='<?php echo $admin_url; ?>settings/meter-rates'>Meter Rates</a></li>
		<li><a href='<?php echo $admin_url; ?>settings/vehicles-and-uplifts'>Vehicles & Uplifts</a></li>
		<li><a href='<?php echo $admin_url; ?>settings/fixed-prices'>Fixed Prices</a></li>
		<li><a href='<?php echo $admin_url; ?>settings/homepage'>Homepage</a></li>
		<li><a href='<?php echo $admin_url; ?>settings/other-pages'>Other Website Pages</a></li>
	    <li><a href='<?php echo $admin_url; ?>settings/web-design'>Web Design</a></li>
		<li><a href='<?php echo $admin_url; ?>settings/SEO'>SEO</a></li>
	</ul>
    </li>

    <!-- social media -->
    <li class="wp-has-submenu <?php echo $analytics_status; ?> menu-top">
	<a href='<?php echo $admin_url; ?>website-integration' class="wp-has-submenu <?php echo $analytics_status; ?> menu-top menu-icon-event" aria-haspopup="true"><div class="wp-menu-arrow"><div></div></div><div class='wp-menu-image'><img src="<?php echo $admin_url; ?>assets/img/fbicon.png" alt="" /></div><div class='wp-menu-name'>Web Integration</div></a>
	<ul class='wp-submenu wp-submenu-wrap'>
		<li class='wp-submenu-head'>Website Integration</li>
		<li class="wp-first-item"><a href='<?php echo $admin_url; ?>website-integration' class="wp-first-item">Integration</a></li>
		<li class="wp-first-item"><a href='<?php echo $admin_url; ?>analytics' class="wp-first-item">Analytics</a></li>
	</ul>
    </li>


	<li class="wp-not-current-submenu wp-menu-separator"><div class="separator"></div></li>

    <li id="collapse-menu" class="hide-if-no-js"><div id="collapse-button"><div></div></div><span>Collapse menu</span></li>

</ul>
</div>