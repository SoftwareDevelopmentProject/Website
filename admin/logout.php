<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
    <?php include_once '_head.php'; unset($_SESSION['staff_id'],$_SESSION['staff_password']); header('location:login.php') ?>
    
</head>