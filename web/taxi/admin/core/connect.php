<?php 
ob_start();
session_start();

$site_url = 'https://yateley-taxicabs.co.uk/';

if(!isset($no_session))
{
if(!isset($_SESSION['admin_user']))
{
	header('location: https://yateley-taxicabs.co.uk/admin/login');
}
}

$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'yateley_cab',
	'password' 	=> 'skllksklskls!!1',
	'dbname' 	=> 'yateley_taxi'
);


$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>