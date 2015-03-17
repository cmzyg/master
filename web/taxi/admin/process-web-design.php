<?php
ob_start();
session_start();
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/web-design.class.php');
$database   = new Database($db);
$controller = new Controller($db);
$design     = new Web_Design($db);

// update settings
$design->updateWebDesign();
?>