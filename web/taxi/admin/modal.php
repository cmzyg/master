<?php
require_once('core/connect.php');
require_once('includes/settings.php');

require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/pagination.class.php');
require_once('core/bookings.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$bookings   = new Bookings($db);


$count_bookings = $bookings->countBookings();

$count = 0;
$bookings_array = array();

if(isset($_POST['action']))
{
	if($_POST['action'] !== 'delete')
	{
		$bookings_list = $bookings->sortBookings();
	}
	else
	{
		$bookings->deleteBookings();
	}
}
else
{
	$bookings_list = $bookings->getBookings();
}

foreach($bookings_list as $rows)
{
	$bookings_array[$count]['booking_date'] = date('d-m-Y H:i:s', strtotime($rows['booking_date']));
	$bookings_array[$count]['id']           = $rows['id'];
	$bookings_array[$count]['payment']      = $rows['payment'];
	$bookings_array[$count]['booking_type'] = $rows['booking_type'];
	$bookings_array[$count]['status']       = $rows['status'];
	$bookings_array[$count]['from']         = $rows['pickup'];
	$bookings_array[$count]['to']           = $rows['destination'];
	$bookings_array[$count]['fullname']     = $rows['fullname'];
	$bookings_array[$count]['email']        = $rows['email'];
	$bookings_array[$count]['telephone']    = $rows['telephone'];
    $count++;
}


?>
<!DOCTYPE html>
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" class="ie8 wp-toolbar"  lang="en-US">
<![endif]-->
<!--[if !(IE 8) ]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" class="wp-toolbar" lang="en-US">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name='viewport' content='width=device-width,initial-scale=1.0' />

<title>Bookings</title>
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/dashicons.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/admin-bar.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/wp-admin.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/buttons.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/colors.min.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/fancybox.css' />
<link rel='stylesheet' media='all' href='<?php echo $admin_url; ?>assets/css/osx.css' />
<link rel='stylesheet' id='open-sans-css' href='//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038;ver=3.8.3' type='text/css' media='all' />

<!--[if lte IE 7]>
<link rel='stylesheet' id='ie-css'  href='http://sexdirectoryuk.com/wp-admin/css/ie.min.css?ver=3.8.3' type='text/css' media='all' />
<![endif]-->

<script src='<?php echo $admin_url; ?>assets/js/jquery-1.11.1.min.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/utils.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/json2.js'></script>


<!-- Page styles -->
<link type='text/css' href='assets/css/demo.css' rel='stylesheet' media='screen' />

<!-- OSX Style CSS files -->
<link type='text/css' href='assets/css/osx.css' rel='stylesheet' media='screen' />



<style type="text/css">

.fancybox-custom .fancybox-skin {
	box-shadow: 0 0 50px #222;
}

.cancelled {
	background-color: #F8E0E0;
}

.accepted {
	background-color: #E0ECF8;
}

.today {
	background-color: #E0F8E6;
}

.new {
	background-color: #F7F8E0;
}

.completed {
	background-color: #D8D8D8;
}

</style>

</head>


<!-- JS files are loaded at the bottom of the page -->
</head>


<body class="wp-admin wp-core-ui no-js options-general-php auto-fold admin-bar branch-3-8 version-3-8-3 admin-color-fresh locale-en-us no-customize-support no-svg">

<div id="wpwrap">

<div id="adminmenuback"></div>

<?php include('includes/admin_navigation.php'); ?>

<div id="wpcontent">

<?php include('includes/admin_bar.php'); ?>
		
<div id="wpbody">

<div id="wpbody-content" aria-label="Main content" tabindex="0">

<div class="wrap">
<h2>
Bookings
</h2>

<?php echo $controller->flashdata('Success'); ?>





<p class="search-box">
	<label class="screen-reader-text" for="user-search-input">Search Bookings:</label>
	<input type="search" id="user-search-input" name="s" value="" />
	<input type="submit" name="" id="search-submit" class="button" value="Search Bookings"  /></p>

<div class="tablenav top">

<div class="alignleft actions bulkactions">
<form method='POST' action='<?php echo $admin_url; ?>actions'>
<select name='action'>
    <option value='' selected='selected'>Actions</option>
	<option value='delete'>Delete</option>
	<option value='new'>Show New</option>
	<option value='completed'>Show Completed</option>
	<option value='cancelled'>Show Cancelled</option>
	<option value='today'>Show Today</option>
	<option value='accepted'>Show Accepted</option>
</select>

<input type="submit" name="" id="doaction" class="button action" value="Apply"  />

</div>



<div class="alignleft actions">
	<div id='group-bulk-actions' class='groups-bulk-container'>
		<div class='groups-select-container'></div>
	</div>
</div>


<br class="clear" />


	</div>
<table class="wp-list-table widefat fixed users" cellspacing="0">
	<thead>
	<tr>
		<th scope='col' id='cb' class='manage-column column-cb check-column'><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox" /></th>
		<th scope='col'><strong>Booking Date</strong></th>
		<th scope='col'><strong>Booking Type</strong></th>
		<th scope='col'><strong>Payment</strong></th>
		<th scope='col'><strong>Journey</strong></th>
		<th scope='col'><strong>More Info</strong></th>
	</tr>
	</thead>




	<tfoot>
	<tr>
		<th scope='col' class='manage-column column-cb check-column'><label class="screen-reader-text" for="cb-select-all-2">Select All</label><input id="cb-select-all-2" type="checkbox" /></th>
		<th scope='col'><strong>Booking Date</strong></th>
		<th scope='col'><strong>Booking Type</strong></th>
		<th scope='col'><strong>Payment</strong></th>
		<th scope='col'><strong>Journey</strong></th>
		<th scope='col'><strong>More Info</strong></th>
    </tr>
	</tfoot>

	<tbody id="the-list" data-wp-lists='list:user'>
	
	<?php

       if (count($bookings_array)) {
          // Create the pagination object
          $pagination = new pagination($bookings_array, (isset($_GET['page']) ? $_GET['page'] : 1), 10, 'bookings');
          // Decide if the first and last links should show
          $pagination->setShowFirstAndLast(false);
          // You can overwrite the default seperator
          $pagination->setMainSeperator(' | ');
          // Parse through the pagination class
          $productPages = $pagination->getResults();
          // If we have items 
          if (count($productPages) != 0) {
            // Create the page numbers
            $pageNumbers = '<div class="numbers">'.$pagination->getLinks($_GET).'</div>';
            // Loop through all the items in the array
            foreach ($productPages as $row) {
              // Show the information about the item
              // echo '<p><b>'.$productArray['id'].'</b> &nbsp; &pound;'.$productArray['title'].'</p>';


	?>
	<tr id='user-1' class="alternate">
		<th scope='row' class='check-column <?php echo $row['status']; ?>'><label class="screen-reader-text" for="cb-select-1">Select Admin</label><input type='checkbox' name='bookings[]' id='user_1' class='administrator' value='<?php echo $row['id']; ?>' /></th>
		<td class='<?php echo $row['status']; ?>'><?php echo $row['booking_date']; ?><br /><div class="row-actions"></span><span class='delete'><a class='submitdelete' href='<?php echo $admin_url; ?>cancel-booking/<?php echo $row['id']; ?>'>Cancel</a></span>&nbsp;&nbsp;&nbsp;<span class='delete'><a class='submitdelete' href='<?php echo $admin_url; ?>accept-booking/<?php echo $row['id']; ?>'>Accept</a></span>&nbsp;&nbsp;&nbsp;<span class='delete'><a class='submitdelete' href='<?php echo $admin_url; ?>complete-booking/<?php echo $row['id']; ?>'>Complete</a></span></div></td>
		<td class='<?php echo $row['status']; ?>'><?php echo $row['booking_type']; ?></td>
		<td class='<?php echo $row['status']; ?>'>&pound;<?php echo $row['payment']; ?></td>
		<td class='<?php echo $row['status']; ?>'><?php echo $row['from']; ?> - <?php echo $row['to']; ?></td>
		<td class='<?php echo $row['status']; ?>'>
			<input type='button' name='osx' value='Open' class='osx demo'/>
			<!-- modal content -->
			<div id="osx-modal-content">
			<div id="osx-modal-title">OSX Style Modal Dialog</div>
			<div class="close"><a href="#" class="simplemodal-close">x</a></div>
			<div id="osx-modal-data">
				<h2>More Info</h2>
				<p><strong>Fullname:</strong> <?php echo $row['fullname']; ?></p>
				<p><strong>Email Address:</strong> <?php echo $row['email']; ?></p>
				<p><strong>Telephone:</strong> <?php echo $row['telephone']; ?></p>
				<p><button class="simplemodal-close">Close</button> <span>(or press ESC or click the overlay)</span></p>
			</div>
		    </div>
		</td>
	</tr>

    <?php
    }
    echo '<div style="float: right">' . $count_bookings . ' bookings&nbsp;&nbsp;&nbsp;<br />';
    echo $pageNumbers . '</div>';
          }
        }
        ?>
	




    
    </tbody>
</table>


</form>

<br class="clear" />
</div>


<div class="clear"></div></div><!-- wpbody-content -->
<div class="clear"></div></div><!-- wpbody -->
<div class="clear"></div></div><!-- wpcontent -->

<div id="wpfooter">
		<p id="footer-left" class="alignleft">
		<span id="footer-thankyou"></span>	</p>
	<p id="footer-upgrade" class="alignright">
		<strong><a href=""></a></strong>	</p>
	<div class="clear"></div>
</div>


<!-- javascript -->
<script src='<?php echo $admin_url; ?>assets/js/hoverIntent.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/admin-bar.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/common.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/wp-lists.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/jquery.fancybox.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/mousewheel.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/functions.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/jquery.simplemodal.js'></script>
<script src='<?php echo $admin_url; ?>assets/js/osx.js'></script>
<!--            -->

<div class="clear"></div></div><!-- wpwrap -->

<!-- Load JavaScript files -->
<script type='text/javascript' src='assets/js/jquery-1.11.1.min.js'></script>
<script type='text/javascript' src='assets/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='assets/js/osx.js'></script>


</body>
</html>
