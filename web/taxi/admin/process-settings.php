<?php
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');

// update settings
$settings = new Settings($db);
$settings->update_general_settings();

?>