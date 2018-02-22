<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'include/PHPMailer/src/Exception.php';
require 'include/PHPMailer/src/PHPMailer.php';
require 'include/PHPMailer/src/SMTP.php';

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Technology Bookstore:Forgot Password</title>
    <?php include "_head.php"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $member = $db->getMemberByEmail($_POST['email']);

    if ($member != null) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            //$mail->SMTPDebug = 3;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'technologyparkbookstore@gmail.com';                 // SMTP username
            $mail->Password = 'Liyi<3Khaibin';                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ));

            //Recipients
            $mail->setFrom('technologyparkbookstore@gmail.com', 'Technology Park\'s Bookstore');
            $mail->addAddress($_POST['email']);               // Name
            //Attachments                               // Set email format to HTML
            $mail->Subject = "Reset password - Technology Park Bookstore";
            $mail->Body = "Please click on the below link to reset your password:\nhttp://localhost/Website/forgotpassword1.php?id={$member['member_id']}&token={$member['token']}";
            $mail->send();
            echo '<script>alert("Please check your email in order to proceed to the next step")</script>';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        echo '<script>alert("The email entered does not match any user.")</script>';
    }

}
?>
<body>
  <?php include "_header.php";?>
       <div class="login">
          <div class="wrap">
				<div class="col_2_of_login span_1_of_login" style="margin: auto;">
				  <div class="login-title">
	           		<h4 class="title">Reset password</h4>
					 <div class="comments-area">
						<form method="post">
							<p>
								<label>Email</label>
								<span>*</span>
								<input name="email" type="email" value="" style="width: 100%">
							</p>
							 <p>
								<input type="submit" value="Request Recovery Code">
							</p>
						</form>
					</div>
			      </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
        <?php include "_footer.php"; ?>
</body>
</html>