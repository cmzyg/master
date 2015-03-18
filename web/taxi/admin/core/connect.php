<?php 
ob_start();
session_start();

$site_url = 'http://www.aylesburytaxicabs.co.uk/';

if(!isset($no_session))
{
if(!isset($_SESSION['admin_user']))
{
	header('location: http://www.aylesburytaxicabs.co.uk/admin/login');
}
}

$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'aylesbur_admin',
	'password' 	=> 'admin123',
	'dbname' 	=> 'aylesbur_CabSearch'
);

$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>