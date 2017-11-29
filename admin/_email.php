<?php
	$email=$_POST['email'];
	$subject = "Account created";
	$ps= $_POST['phone'];
	$link = "http://localhost:8080/SDP/Website/admin/login.php";
	$headers = "From: Technology Park's Bookstore";
	
	
	require_once "PHPMailer/PHPMailerAutoload.php";
	$mail = new PHPMailer;
	#$mail->SMTPDebug = 4; 
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'technologyparkbookstore@gmail.com';
	$mail->Password = 'Liyi<3Khaibin';
	$mail->SMTPSecure = 'tls';
	$mail->Port = 587;

	$mail->setFrom("technologyparkbookstore@gmail.com", "Technology Park's Bookstore");
	$mail->addAddress($email);
	$mail->Subject = $subject;
	$mail->Body    = "Welcome to join as Technology Park's Bookstore staff. Your staff account is just been created and your password would be your phone number. Click the link below to login! \n".$link;

			?>
