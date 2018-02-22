<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Technology Bookstore:Login</title>
    <?php include "_head.php"; ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = $db->login($_POST['email'], $_POST['password']);
    switch($login){
        case LOGIN_SUCCESS:
            //after loginsuccess
            echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
                <strong>Info!</strong>Login Successfully</div>';
            header("location:index.php");

            break;
        case LOGIN_USER_NOT_FOUND:
            echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
                <strong>Info!</strong>Email not found.</div>';
            break;
        case LOGIN_PASSWORD_INCORRECT:
            echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
                <strong>Info!</strong>Password Incorrect</div>';
            break;
        case LOGIN_NULL:
            echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
                <strong>Info!</strong>Please enter your email or password</div>';
            break;
    }


   /*if( $db->login($_POST['email'], $_POST['password'])){
       header("location: index.php");
   }elseif ($_POST['email'] =="" || $_POST['password']==""){
    echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
  <strong>Info!</strong>Please enter your email or password.
</div>';
   }else{
       echo'<div class="alert alert-info" style="background-color: #d5d5d5;border: none;">
  <strong>Info!</strong>Wrong Email or Password.
</div>';
   }
   */


}
?>
<body>
  <?php include "_header.php";?>
       <div class="login">
          <div class="wrap">
				<div class="col_1_of_login span_1_of_login">
					<h4 class="title">New Customers</h4>
					<h5 class="sub_title">Register Account</h5>
					<p>Online services provide in Technology Bookstore. When you become our member, free delivery services is provided by us. Register our member to get a reward point-1points = RM1.Reward point could exchange the cash voucher. Come to collect your reward point and become our Member to enjoy our discount.</p>
					<div class="button1">
					   <a href="register.php"><input type="submit" name="Submit" value="Continue"></a>
					 </div>
					 <div class="clear"></div>
				</div>
				<div class="col_1_of_login span_1_of_login">
				  <div class="login-title">
	           		<h4 class="title">Login</h4>
					 <div class="comments-area">
						<form method="post">
							<p>
								<label>Name</label>
								<span>*</span>
								<input name="email" type="email" value="">
							</p>
							<p>
								<label>Password</label>
								<span>*</span>
								<input name="password" type="password" value="">
							</p>
							 <p id="login-form-remember">
								<label><a href="#">Forget Your Password ? </a></label>
							 </p>
							 <p>
								<input type="submit" value="Login">
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