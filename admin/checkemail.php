<?php
include_once '../include/DbFunction.php';
$db = new DbFunction;
if (!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
	echo 'Invalid email format! e.g. xxx@gmail.com';
else if ($db->checkEmailExists($_GET['email']))
	echo  'Email already exists';
?>
