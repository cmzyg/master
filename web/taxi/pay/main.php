<?php


require_once('class.standard.php');

$friends = array(
	"name"     => "Zygis",
	"lastname" => "Simkus",
	"email"    => "z.simkus@yahoo.com"
);

$standard = new Standard($friends);
$friends = $standard->getName();

$dob = $standard->addDOB('10.04.1990');
echo $dob['DOB'];

echo $standard->search("Zygis");




?>