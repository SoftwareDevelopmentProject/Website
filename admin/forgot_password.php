<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
    <?php include_once '_head.php'; ?>
</head>
<body>
	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sendCode'])) {
		 $code= $db->generateCode($_POST['email']);
         new Email($_POST['email'], "Recovery Code", "Your recovery code is " . $code);
		$sucess = true;
	}
            ?>
	<div class="row"  <?php if(isset($sucess)&&$sucess==true)echo 'style="display:none"';?>>
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Forgot Password</div>
				<div class="panel-body">
					<form role="form" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" id="email" onKeyUp="checkEmail(this.value)" autofocus>
								<p class="err" id="email_err"></p>								
							</div>
							<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="emailSub" value="Send Recovery Code" name="sendCode">
							<a href="index.php" class="btn btn-default" style="float: right">Back</a>
							
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	<!---After send code //-->
	<div class="row"  style="display:none<?php if(isset($sucess)&&$sucess==true)echo ';display:block';?>">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Forgot Password</div>
				<div class="panel-body">
					<form role="form" method="post" action="resetPs.php">
						<fieldset>
							<div class="form-group">
								<p>Recovery Code has been sent to <?php if(isset($sucess)&&$sucess==true)echo $_POST['email']; ?> </p>
								<input class="form-control" placeholder="Recovery Code" name="code" type="text" id="code" autofocus>
								<input type="hidden" name="userEmail" value="<?php if(isset($sucess)&&$sucess==true)echo $_POST['email']; ?> ">
							</div>
							<input type="submit" class="btn btn-primary" style="margin-right: 20px" id="emailSub" value="Submit" name="codeSub">
							<a href="forgot_password.php" class="btn btn-default" style="float: right">Back</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		function checkEmail(email) {
				  var xhttp;    
				  if (email == "") {
					  document.getElementById("email_err").style.display = "none";
					  document.getElementById("emailSub").disabled = false;
					  
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						document.getElementById("email_err").style.display = "block";
						document.getElementById("email_err").innerHTML = "";
						document.getElementById("emailSub").disabled = false;
						
						if (this.response =='' || this.response !='Email already exists'){
							document.getElementById("email_err").innerHTML = "Email not found";
							document.getElementById("emailSub").disabled = true;
						}
					}
				  };
				  xhttp.open("GET", "checkemail.php?email="+email, true);
				  xhttp.send();
				}
		
		
	
	</script>
</body>
</html>
