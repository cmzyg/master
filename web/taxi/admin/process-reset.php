<?php
require_once('core/connect.php');
require_once('core/database.class.php');
require_once('core/controller.class.php');
require_once('core/settings.class.php');
require_once('core/admin.class.php');

$database   = new Database($db);
$controller = new Controller($db);
$settings   = new Settings($db);
$admin      = new Admin($db);

echo $_POST['new_password'];
echo $_POST['repeat_new_password'];
$admin->resetPassword($_POST['user_pass'], $_POST['repeat_user_pass'], $_POST['token']);

?>