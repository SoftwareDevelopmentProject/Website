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
 $member = $db->isRecoveryGranted($_GET['id'], $_GET['token']);
 if (!is_null($member)):
     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = password_hash($_POST['newpw'], PASSWORD_DEFAULT);
        $db->memberChangePassword($_GET['id'], $password);
         echo '<script>window.location.replace("login.php");</script>';
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
                                <label>New password</label>
                                <span>*</span>
                                <input name="newpw" type="password" value="" style="width: 100%">
                            </p>
							 <p>
								<input type="submit" value="Change password">
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
<?php else: echo '<script>window.location.replace("index.php");</script>'; endif; ?>
</html>